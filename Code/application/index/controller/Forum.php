<?php

namespace app\common\controller;

//use app\index\controller\common\Base;
use think\Request;

class Forum
{
    public function toEditor()
    {
        return view('compile/post_forum');
    }

}
