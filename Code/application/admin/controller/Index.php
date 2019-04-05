<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 2019/2/13
 * Time: 20:01
 */

namespace app\admin\controller;

use app\admin\controller\common\Base;
use app\common\model\User;
use think\Db;
use think\Request;
use app\common\util\AES;
use think\Session;


class Index extends Base
{
    public function index()
    {
        return view("index/admin");
    }

    public function toMain()
    {
        $blog = Db::table('blog')->select();
        $forum = Db::table('forum')->select();
        $user = Db::table('user')->select();
        $boss = Db::table('user')->where('id','17')
            ->select()[0];
        $this->assign('boss',$boss);
        return $this->fetch("index/main",[
            'blog' => count($blog),
            'forum' => count($forum),
            'user' => count($user)
        ]);
    }

    public function toArticle()
    {
        $list = DB::table("blog")->where("status","0")
            ->where('delete_flag', '0')->paginate(10);
//        halt($blogList);
        $this->assign("list",$list);
        return view("index/article");
    }

    public function toNotice()
    {
        return view("index/notice");
    }


    public function toUser()
    {
        $user = Db::table('user')->where('delete_flag','0')->select();
        $peoples = [];
        for($i = 0; $i < count($user);$i = $i + 1) {
            $people = $user[$i];
            $id = $people['id'];
            $blog = Db::table('blog')->where('user_id',$id)->select();
            $people['count'] = count($blog);
            $peoples[$i] = $people;
        }
        $this->assign('user',$peoples);
        return view("index/manage-user");
    }

    public function delUser(Request $request)
    {
        $req = $request->post();
        $id = $req['id'];
        $user = Db::table('user')->where('id',$id)
            ->update(['delete_flag' => 1]);
        if ($user) {
            return json('success');
        }
    }

    public function toLog()
    {
        $user = Db::table('user')->where('delete_flag','0')
            ->select();
        $this->assign('user',$user);
        return view("index/loginlog");
    }

    public function check()
    {
        return view("index/check_blog");
    }

    public function toBlog()
    {
        return view("index/check_blog");
    }

    public function toForum()
    {
        return view("index/check_forum");
    }


    //管理员登录
    public function admin_login(Request $request)
    {

        $user = new User();
        $post = $request->post();
        $req = Request::instance();
        $ip = $req->ip();
        $aes = new AES();
        /**当登录成功
         * 将用户的nickname存进session
         * 为校验数据进行
         */
        $admin = \think\Db::name('user')->where('nick_name',"=",$post['nickName'])->find();
        if($admin){
            if($admin['password'] == $aes->encode($post['password']) && $admin['id'] == 17){
                Session::set("user", $admin['id']);
                Db::table('user')->where('nick_Name', $post['nickName'])
                    ->update([
                        'ip' => $ip,
                        'create_time' => date("Y-m-d H:i:s",time())
                    ]);
                $boss = Db::table('user')->where('id','17')
                    ->select()[0];
                $this->assign('boss',$boss);
                $blog = Db::table('blog')->select();
                $forum = Db::table('forum')->select();
                $user = Db::table('user')->select();
                return $this->fetch("index/main",[
                    'blog' => count($blog),
                    'forum' => count($forum),
                    'user' => count($user)
                ]);
            }
        }
        return json("error");
    }


    public function toOut()
    {
        session(null);
        return view("/index/index");
    }


    public function removeBlog(Request $request)
    {
        $req = $request->post();
        $id = $req['id'];
        $status = $req['status'];
        $blog = DB::table("blog")->where('id',$id)->update(["status" => $status]);
        if ($blog) {
            return json('success');
        }
    }

    public function removeForum(Request $request)
    {
        $req = $request->post();
        $id = $req['id'];
        $status = $req['status'];
        $forum = DB::table("forum")->where('id',$id)->update(["status" => $status]);
        if ($forum) {
            return json('success');
        }
    }


}
