<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/17
 * Time: 18:58
 */

namespace app\chat\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
       return view("/test");
    }
}