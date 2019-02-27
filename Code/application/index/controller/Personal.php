<?php

namespace app\index\controller;

use app\index\controller\common\Base;
use think\Request;
use think\Session;

class personal extends Base
{
    /**
     * 获取对应的个人信息信息，然后进入对应的页面
     * @param Request $request
     * @return \think\response\View
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function toPersonal()
    {
        $id = Session::get("id");
        $user = $this->getUser($id);
        $user = $user[0];
        $photo = model("common/Photo")->where("user_id", $id)->select();
        if ($photo) {
            $photo = $photo[0];
        }
        $this->assign("user", $user);
        $this->assign("photo", $photo);
        return View('personal/photo');
    }

    public function toArticle()
    {
        return view('personal/article');
    }

    public function toPost()
    {
        return view('compile/post_course');
    }

    public function toBlog()
    {
        return view('blog/blog');
    }

    public function toAlter()
    {
        return view('alter/alter');
    }


    protected function getUser($id)
    {

        $user = model("common/User")->where("id", $id)->select();

        return $user;
    }

    /**
     * 保存图片
     * @param Request $request
     *
     */
    public function savePhoto()
    {
        $file = request()->file('name');
        $file->setSaveName("update.jpg")->move("root\images", "update.jpg");
        return $this->success("success");

    }
}
