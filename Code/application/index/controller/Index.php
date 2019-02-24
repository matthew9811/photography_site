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


    public function login(Request $request)
    {

        $user = new User();
        $post = $request->post();

        /**当登录成功
         * 将用户的nickname存进session
         * 为校验数据进行
         */
        $result = $user->where('nick_Name', $post['nickName'])->select();
        if ($result[0]) {
            if ($result[0]['password'] == md5($post['password'])) {
                Session::set("nickName", $result[0]['nick_name']);
                session('loginTime', time());
                return json("success");
            }
        }
        return json("error");
    }

    public function reg(Request $request)
    {
        $req = $request->post();
        $user = new User();
        $user->nick_name = $req["nickName"];
        $user->mobile = $req["mobile"];
        $user->password = md5($req["password"]);
        $user->delete_flag = '0';
        $result = $user->save();
        if ($result) {
            return $this->success("success");
        } else {
            return $this->error("error");
        }

    }

}
