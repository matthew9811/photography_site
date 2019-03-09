<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/20
 * Time: 8:51
 */

namespace app\admin\controller\common;

use think\Controller;
use \traits\controller\Jump;//类里面引入jump类

class Base extends Controller
{


    //绑定到CheckAuth标签，可以用于检测Session以用来判断用户是否登录
    public function run(&$params)
    {
        $uid = session('user');
        // 这里的session 是当用户登录成功后创建的一个session 如果没有的话就代表没有用户登录
        // var_dump($uid);
        if (!isset($uid)) {
            $uid = "";
        }
        if ($uid == null || $uid == "" || $uid == "null" || $uid == 0) {
            return $this->error('您还未登录，请先登录！', 'index/index');
        }
    }
}