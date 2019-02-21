<?php

namespace app\index\controller;

use app\index\controller\common\Base;

use think\Request;

class personal extends Base
{
    public function toPersonal()
    {
        return view('personal/personal');
    }
}
