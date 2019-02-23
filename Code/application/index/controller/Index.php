<?php

namespace app\index\controller;

use app\common\model\User;
use think\Controller;
use think\Db;
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
        print_r($_GET);
        print_r($request->param());
        $req = $request->post();
//        $a = json_decode($request, true);
//        echo gettype($req);
//        print_r($req);
//        print_r($request);
//        $aa['id'] = $request->post['id'];
//        print_r($aa);
//        $user = new User();
//        $user->nickName = $req["nickName"];
//        $user->mobile = $req["mobile"];
//        $user->password = $req["password"];
//        $user->deleteFlag = '0';
//        $user->save();
        $result = Db::table("user")->insert([
            'nick_Name' => $req["nickName"],
            'mobile' => $req["mobile"],
            'password' => $req["password"],
            'delete_flag' => '0',
        ]);
        if ($result) {
            return $this->success("注册成功", '/');
        } else {
            return $this->error("注册失败");
        }
    }

}
