<?php

namespace app\index\controller;

use app\common\util\Constant;
use app\index\controller\common\Base;
use think\Db;
use think\Request;
use think\Session;
use app\common\util\AES;
use app\common\model\User;

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
        $photo = model("common/Photo")->where("user_id", $id)->select();
        if ($photo) {
            $photo = $photo[0];
        }
        $this->assign("user", $user);
        $this->assign("photo", $photo);
        return View('personal/photo');
    }

    public function toArticle()
    {
        $id = Session::get("id");
        $user = $this->getUser($id);
        $user = $user[0];
        $photo = model("common/Photo")->where("user_id", $id)->select();
        if ($photo) {
            $photo = $photo[0];
        }
        $this->assign("user", $user);
        $this->assign("photo", $photo);
        return view('personal/article');
    }

    public function toPost()
    {
        return view('compile/post_blog');
    }

    public function toBlog()
    {
        return view('blog/blog');
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
     * @param Request $request
     *
     */
    public function savePhoto()
    {
        $file = request()->file('photo');
        $suffix = explode(".", $file->getInfo()["name"])[1];
        $file->setSaveName("update." + $suffix)->move("root\images", "update." + $suffix);

        return $this->success("success");
    }

    /**
     * 上传个人背景图
     */
    public function saveBg()
    {
        $file = request()->file('photo');
        $name = session("nickName");
        $url = "root\images\background";
        $suffix = explode(".", $file->getInfo()["name"])[1];
        $file->setSaveName( $name )->move($url, $name);
        $result = Db::table("user")->where("id", session("id"))
            ->update(['templete_img' => Constant::PREFIX  . $url . DS . $file->getSaveName() .   "."  . $suffix]);
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
        $nickName = session("nickName");
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
