<?php

namespace app\index\controller;

use app\index\controller\common\Base;

use think\Request;

class personal
{
    public function toPersonal()
    {
        return view('personal/photo');
    }

    public function toArticle()
    {
        return view('personal/article');
    }

    public function toPost()
    {
        return view('compile/post_blog');
    }

    public function toBlog()
    {
        return view('blog/blog');
    }

    public function toAlter()
    {
        return view('alter/alter');
    }


}
