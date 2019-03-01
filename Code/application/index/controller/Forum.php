<?php

namespace app\index\controller;

use app\index\controller\common\Base;
use think\Request;

class Forum extends Base
{
    public function toForum()
    {
        return view('forum/forum');
    }

    public function toEditor()
    {
        return view('compile/post_forum');
    }

    public function toInvitation()
    {
        return view('forum/invitation');
    }

    public function toPost(Request $request)
    {
        $post = $request->param();
        $view = new View();
        $content = $post['content'];
        $view->content = $content;
        return $view->fetch('forum/invitation');
    }
}
