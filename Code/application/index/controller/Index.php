<?php
namespace app\index\controller;

use think\Request;

class Index
{
    public function index()
    {
        return view();
    }


    public function loginSelect(){
        return view("index");
    }

    public function toReg(){
        return view('register/register');
    }

    public function toLogin(){
        return view('register/login');
    }

}
