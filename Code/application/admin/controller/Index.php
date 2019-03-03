<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 2019/2/13
 * Time: 20:01
 */

namespace app\admin\controller;

use app\common\model\User;
use think\Request;
use app\common\util\AES;


class Index
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
                return view('index/main');
            }
        }
        return json("error");
    }
}
