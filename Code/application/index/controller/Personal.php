<?php

namespace app\index\controller;

use app\index\controller\common\Base;
use think\Db;
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
        $id = Session::get("id");
        $user = $this->getUser($id);
        $user = $user[0];
        $photo = model("common/Photo")->where("user_id", $id)->select();
        if ($photo) {
            $photo = $photo[0];
        }
        $this->assign("user", $user);
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
        $file = request()->file('photo');
        $suffix = explode(".", $file->getInfo()["name"])[1];
        $file->setSaveName("update." + $suffix)->move("root\images", "update." + $suffix);

        return $this->success("success");
    }

    /**
     * 上传个人背景图
     */
    public function saveBg()
    {
        $file = request()->file('photo');
        $name = \session("nickName");
//        $suffix = explode(".", $file->getInfo()["name"])[1];
        $file->setSaveName( $name )->move("root\images", $name);
        $url = "/root/images";
        Db::name('user')->where('nick_name',$name)->update(['templete_img'=>$url]);
        return $this->success("success");
    }
}
