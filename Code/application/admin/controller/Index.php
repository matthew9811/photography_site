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
        return view("index/main");
    }

    public function toArticle()
    {
        $list = DB::table("blog")->where("status","0")->where('delete_flag', '0')->paginate(10);
//        halt($blogList);
        $this->assign("list",$list);
        return view("index/article");
    }

    public function toNotice()
    {
        return view("index/notice");
    }

//    public function toComment()
//    {
//        return view("index/comment");
//    }

    public function toUser()
    {
        return view("index/manage-user");
    }

    public function toLog()
    {
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
        $aes = new AES();
        /**当登录成功
         * 将用户的nickname存进session
         * 为校验数据进行
         */
        $admin = \think\Db::name('user')->where('nick_name',"=",$post['nickName'])->find();
        if($admin){
            if($admin['password'] == $aes->encode($post['password']) && $admin['id'] == 17){
                Session::set("user", $admin['id']);
                return view('index/main');
            }
        }
        return json("error");
    }


    public function toOut()
    {
        session(null);
        return view("/index/index");
    }

    public function reviewBlog(Request $request)
    {
        $req = $request->post();
        halt($request);
        $id = $req['id'];
        $status = $req['status'];
        $blog = DB::table("blog")->where('id',$id)->update("status",$status);
        return json('success');
    }

    public function deleteBlog(Request $request)
    {
        $req = $request->post();
        $id = $req['id'];
        $status = $req['status'];
        $blog = DB::table("blog")->where('id',$id)->update("status",$status);
        return json('success');
    }

}
