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

    public function reg(Request $request)
    {
        $req = $request->post();
        $user = new User([
            'nickName' => $req['nickName'],
            'mobile' => $req['mobile'],
            'password' => $req['password'],
            'deleteFlag' => '0'
        ]);

        $result = $user->save();
        if ($result > 0) {
            return json("1", "1");
        }
        return json("0", "0");
    }

}
