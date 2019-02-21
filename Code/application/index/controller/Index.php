<?php

namespace app\index\controller;

use app\common\model\User;
use think\Controller;
use think\Request;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        return view("first/index");
    }


    public function loginSelect()
    {
        return view("index");
    }

    public function toReg()
    {
        return view('register/register');
    }

    public function toLogin()
    {
        return view('register/login');
    }

    public function toBlogs()
    {
        return view('compile/post_blog');
    }

    public function toForum()
    {
        return view('forum/forum');
    }

    public function toCourse()
    {
        return view('course/course');
    }

    public function toAbout()
    {
        return view('index/index');
    }

    public function toPersonal()
    {
        return view('personal/personal');
    }

    public function toBlog()
    {
        return view('blog/blog');
    }


    public function login(Request $request)
    {

        $user = new User();
        $post = $request->post();

        /**当登录成功
         * 将用户的nickname存进session
         * 为校验数据进行
         */
        $result = $user->where('nick_Name', $user->getNickName())->find();
        if (!$result . is_null()) {
            Session::set("nickName", $result->getNickName());
        }
    }

}
