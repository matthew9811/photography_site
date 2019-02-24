<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;
use think\Validate;
use app\common\model\User;

//注册功能页面
class Reg extends Controller
{

    /**
     * 加载注册模版方法
     */
    public function index()
    {
        return view('reg');
    }

    public function action(Request $request)
    {
        $User = new User();
        //利用依赖注入的方式进行数据获取
        $req = $request->post();
        /*
         * 表单验证模块
         * 使用Validate::make
         * 键名代表定义需要验证的字段名
         * 键值代表验证的规则
         */
        $validate = Validate::make([
            'phoneNum' => 'require|min:3',
        ]);
        /*
         * 利用定义好的规则进行验证
         */
        $status = $validate->check($req);
        if ($status) {
            //验证通过
//            $result = DB::table('user')->insert([
//               'nick_name' => "admin",
//                'mobile' => $req['phoneNum'],
//                'password' => $req['password'],
//                'real_name' => "梁焰豪",
//            ]);
//            halt(Constant::INSERT_MARK);
            $result = $User->save([
                $User->setNickName("admin"),
                $User->setMobile($req['phoneNum']),
                $User->setPassword($req['password']),
                $User->setRealName("海绸")
            ]);

            if ($result > 0) {
            } else {
                return view('Error/not_login');
            }
        } else {
            return view('Error/not_login');
        }
    }

    public function register(Request $request)
    {
        $post = $request->post();
//        $data = input('$_POST.mobile');//获取值
//        return json(1);
        halt($post["mobile"]);
        return json("success");
    }


    public function testFind()
    {
        $user = new User();
        $result = $user->where("nick_name", "admin")->select();
        halt($result[0]['nick_name']);
    }
}
