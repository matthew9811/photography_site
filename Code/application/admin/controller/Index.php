<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 2019/2/13
 * Time: 20:01
 */

namespace app\admin\controller;

use app\common\model\User;
use think\Request;
use app\common\util\AES;


class Index
{
    public function index()
    {
        return view("index/admin");
    }

    public function check()
    {
        return view("index/check_blog");
    }


    //管理员登录
    public function admin_login(Request $request)
    {

        $user = new User();
        $post = $request->post();
        $aes = new AES();
        /**当登录成功
         * 将用户的nickname存进session
         * 为校验数据进行
         */
        $admin = \think\Db::name('user')->where('nick_name',"=",$post['nickName'])->find();
        if($admin){
            if($admin['password'] == $aes->encode($post['password']) && $admin['id'] == 17){
                return json("success");
            }
        }
        return json("error");
    }
}
