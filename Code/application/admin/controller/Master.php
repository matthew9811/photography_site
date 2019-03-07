<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/7
 * Time: 0:48
 */

namespace app\admin\controller;

class Master
{
    /**
     * 实现admin模块跳转到其他模块页面下
     */
    public function toIndex()
    {
//        return $this->redirect("../index/index/index");
//        Header("Location: http://blog.csdn.net/abandonship");
        Header('Location: '.$_SERVER['HTTP_HOST']);
        exit();
//        header('Location: '.$_SERVER['SERVER_ADDR'].'/index/index/index');
    }
}