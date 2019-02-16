<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;
use think\Validate;

//注册功能页面
class Reg extends Controller
{
    /**
     * 加载注册模版方法
     */
    public function index(){
        return view();
    }

    public function action(Request $request){
        //利用依赖注入的方式进行数据获取
        $req = $request->post();
        /*
         * 表单验证模块
         * 使用Validate::make
         * 键名代表定义需要验证的字段名
         * 键值代表验证的规则
         */
        $validate = Validate::make([
            'phoneNum' => 'require',
        ]);
        /*
         * 利用定义好的规则进行验证
         */
        $status = $validate->check($req);
        halt($status);
    }
}
