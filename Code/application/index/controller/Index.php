<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        $User = User::select();
        return view('', $User);
    }


    public function loginSelect(){
        return view("index");
    }
}
