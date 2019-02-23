<?php

namespace app\index\controller;

use app\index\controller\common\Base;
use think\Request;

class Forum
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
}
