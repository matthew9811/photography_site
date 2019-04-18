<?php

namespace app\index\controller;

use app\common\model\User;
use app\common\util\Constant;
use app\index\controller\common\Base;
use think\Db;
use think\Request;
use think\Session;
use app\common\util\AES;

class personal extends Base
{
    /**
     * 获取对应的个人信息信息，然后进入对应的页面
     * @param Request $request
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function toPersonal()
    {
        $id = Session::get("id");
        $user = $this->getUser($id);
        $user = $user[0];
//        $photo = model("common/Photo")->where("user_id", $id)->select();
//        if ($photo) {
//            $photo = $photo[0];
//        }
        $photo = DB::table("photo")->where('user_id',$id)->select();
//        halt($photo);
        $this->assign("user", $user);
        $this->assign("photo", $photo);
        return View('personal/photo');
    }

    //点击用户头像跳转用户主页
    public function toUser()
    {
        $id = Session::get("id");
        $userId = input()['id'];
        if ($userId == $id) {
            $user = $this->getUser($id);
            $user = $user[0];
            $photo = DB::table("photo")->where('user_id',$id)->select();
        }
        else {
            $user = $this->getUser($userId);
            $user = $user[0];
            $photo = DB::table("photo")->where('user_id', $userId)->select();
        }
        $this->assign("user", $user);
        $this->assign("photo", $photo);
        return View('personal/photo');
    }

    //点击用户头像跳转用户主页的博客页面
    public function toUserBlog()
    {
        $id = Session::get("id");
        $userId = input()['id'];
        if ($userId == $id) {
            $user = $this->getUser($id);
            $user = $user[0];
            $blogs = DB::table("blog")->where('delete_flag','0')
                ->where('type','0')->where('status','1')
                ->where('user_id',$id)->select();
            $course = DB::table("blog")->where('delete_flag','0')
                ->where('type','1')
                ->where('user_id',$id)->select();
        }
        else {
            $user = $this->getUser($userId);
            $user = $user[0];
            $blogs = DB::table("blog")->where('delete_flag','0')
                ->where('type','1')->where('status','1')
                ->where('user_id', $userId)->select();
            $course = DB::table("blog")->where('delete_flag','0')
                ->where('type','1')->where('status','1')
                ->where('user_id',$userId)->select();
        }
        for ($i = 0; $i < count($blogs); $i = $i + 1) {
            $blog = $blogs[$i];
            $content = fopen(iconv("UTF-8", "gbk", $blog['content']),"r");
            if ($content) {
                $content = file_get_contents(iconv("UTF-8", "gbk", $blog['content']));
                $blog['content'] = $content;
            }
            $blogs[$i] = $blog;
        }
        $this->assign("user", $user);
        $this->assign("course",$course);
        $this->assign("blog", $blogs);
        return View('personal/article');
    }

    public function toArticle()
    {
        $id = Session::get("id");
        $user = $this->getUser($id);
        $user = $user[0];
        $photo = DB::table("photo")->where('user_id',$id)->select();
        $course = Db::table('blog')->where('user_id',$id)
            ->where('status','1')->where('type','1')
            ->where('delete_flag','0')->select();
        $blogs = Db::table('blog')->where('user_id',$id)
            ->where('status','1')->where('type','0')
            ->where('delete_flag','0')->select();
        for ($i = 0; $i < count($blogs); $i = $i + 1) {
            $blog = $blogs[$i];
            $content = fopen(iconv("UTF-8", "gbk", $blog['content']),"r");
            if ($content) {
                $content = file_get_contents(iconv("UTF-8", "gbk", $blog['content']));
                $blog['content'] = $content;
            }
            $blogs[$i] = $blog;
        }
        $this->assign("user", $user);
        $this->assign("photo", $photo);
        $this->assign('blog',$blogs);
        $this->assign('course',$course);
        return view('personal/article');
    }

    public function toPost()
    {
        $new = Db::table('blog')->where('delete_flag','0')
            ->where('status','1')
            ->order('create_time desc')
            ->limit(3)->select();
        $hot = Db::table('blog')->where('delete_flag','0')
            ->order('like desc')
            ->where('status','1')
            ->limit(3)->select();
        $this->assign('new',$new);
        $this->assign('hot',$hot);
        return view('compile/post_blog');
    }

    public function postCourse()
    {
        $new = Db::table('blog')->where('type','1')
            ->where('status','1')->order('create_time desc')
            ->where('delete_flag','0')->limit(3)->select();
        $hot = Db::table('blog')->where('type','1')
            ->where('status','1')->order('like desc')
            ->where('delete_flag','0')->limit(3)->select();
        $this->assign('new',$new);
        $this->assign('hot',$hot);
        return view("compile/post_course");
    }

    public function toAlter()
    {
        $aes = new AES();
        $id = Session::get("id");
        $user = $this->getUser($id);
        $user = $user[0];
        $user->password = $aes->decode($user->password);
        $this->assign("user", $user);
        return view('alter/alter');
    }


    protected function getUser($id)
    {
        $user = model("common/User")->where("id", $id)->select();
        return $user;
    }

    /**
     * 保存相册图片
     *
     */
    public function savePhoto()
    {
        $file = request()->file('pic');
        $path = Constant::PIC_URL . Session::get("nickName");
        if (!is_dir(Constant::PIC_URL . Session::get("nickName"))) {
            mkdir(iconv("UTF-8", "UTF-8", $path), 0777, true);
        }
        $time = new \DateTime();
        $time = $time->format("Y-m-d-h-m-s");
        $suffix = explode(".", $file->getInfo()["name"])[1];
        $file->setSaveName( $time )->move($path, $time);
        $url = Constant::PREFIX  . $path . DS . $file->getSaveName() .   "."  . $suffix;
        Db::table("photo")->insert([
            'user_id' => Session::get('id'),
            'src' => $url,
            'update_time' => new \DateTime(),
        ]);
        return json("success");

    }

    /**
     * 上传个人背景图
     */
    public function saveBg()
    {
        $file = request()->file('photo');
        $name = session("id");
        $url = "root/images/background/";
        $suffix = explode(".", $file->getInfo()["name"])[1];
        $file->setSaveName( $name )->move($url, $name);
        $result = Db::table("user")->where("id", session("id"))
            ->update(['templete_img' => Constant::PREFIX  . $url . $file->getSaveName() .   "."  . $suffix]);
        if ($result > Constant::INSERT_MARK) {
            return $this->success("success");
        }
        return $this->error("error");
    }

    /**
     * 上传个人头像
     */
    public function saveHead()
    {
        $url = "root\images\common";
        $nickName = session("id");
        $file = request()->file('head');
        $suffix = explode(".", $file->getInfo()['name'])[1];
        $file->setSaveName($nickName)->move($url, $nickName);
        $result = Db::table("user")->where("id", session("id"))
            ->update(['img' => Constant::PREFIX  . $url . DS . $file->getSaveName() .   "."  . $suffix]);
        if ($result > Constant::INSERT_MARK) {
            return $this->success("success");
        }
        return $this->error("error");
    }

    /**
     * 修改个人信息后上传
    */
    public function update(Request $request)
    {
        $req = $request->post();
//        halt($req);
        $nick_name = $req["nickName"];
        $signature = $req["signature"];
        $sex = $req["optionsRadios"];
        $result = Db::table("user")->where("id",session("id"))
            ->setField(["nick_name"=>$nick_name,"signature"=>$signature,"sex"=>$sex]);
        if ($result){
            echo "<script>window.location.href = document.referrer</script>";
        }
    }

    /**
     * 修改个人私密信息后上传
     */
    public function Privacy(Request $request)
    {
        $aes = new AES();
        $req = $request->post();
        $real_name = $req["real"];
        $email = $req["email"];
        $number = $req["number"];
        $password = $aes->encode($req["password"]);
        $result = Db::table("user")->where("id",session("id"))
            ->setField(["real_name"=>$real_name,"email"=>$email,"id_number"=>$number,"password"=>$password]);
        if ($result){
            echo "<script>window.location.href = document.referrer</script>";
        }
    }
}
