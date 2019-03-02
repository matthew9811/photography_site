<?php

namespace app\index\controller;

use app\index\controller\common\Base;

use think\Request;
use think\View;

class Blog
{
    public function toBlogs()
    {
        return view('blog/blogs');
    }

    public function toBlog()
    {

        return view('blog/blog');
    }


    public function saveBlog(Request $request)
    {
        $post = $request->post();
        $content = $post['content'];

        return json("/index/Blog/toBlog");
    }
}
