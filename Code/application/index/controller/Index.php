<?php

namespace app\index\controller;

use app\common\model\User;
use think\Controller;
use think\Request;
use think\Session;
use app\common\util\AES;

class Index extends Controller
{
    public function index()
    {
        $nickName = Session::get("nickName");
        if ($nickName) {
            return view("index/home");
        }
        return view("index/content");
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

    public function toAbout()
    {
        return view('index/content');
    }

    public function toBlog()
    {
        return view('blog/blog');
    }


    public function Content()
    {
        return view('index/login_content');
    }

    public function toHome()
    {
        return view('index/home');
    }


    //用户登录
    public function login(Request $request)
    {

        $user = new User();
        $post = $request->post();
        $aes = new AES();
        /**当登录成功
         * 将用户的nickname存进session
         * 为校验数据进行
         */
        $result = $user->where('nick_Name', $post['nickName'])->select();
        if ($result[0]) {
            if ($result[0]['password'] == $aes->encode($post['password'])) {
                Session::set("nickName", $result[0]['nick_name']);
                Session::set("id", $result[0]['id']);
                session('loginTime', time());
                return json("/index/index/toHome");
            }
        }
        return json("error");
    }

    //用户注册
    public function reg(Request $request)
    {
        $aes = new AES();
        $req = $request->post();
        $user = new User();
        $user->nick_name = $req["nickName"];
        $user->mobile = $req["mobile"];
        $user->password = $aes->encode($req["password"]);
        $user->delete_flag = '0';
        $user->img = '/root/images/head.jpg';
        $user->signature = 'noting';
        $user->templete_img = '/root/images/bg.jpg';
        $result = $user->save();
        if ($result) {
            return json("/index/index/Content");
        } else {
            return json("error");
        }

    }

    public function toOut()
    {
        session(null);
        return view("index/index");
    }


}
