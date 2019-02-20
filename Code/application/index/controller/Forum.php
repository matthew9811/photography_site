<?php

namespace app\index\controller;

use app\index\controller\common\Base;
use think\Request;

class Forum extends Base
{
    public function toEditor()
    {
        return view('compile/post_forum');
    }

}
