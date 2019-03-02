<?php

namespace app\index\controller;

use app\index\controller\common\Base;

class course extends Base
{
    public function toCourse()
    {
        return view('course/course');
    }

    public function toObject()
    {
        return view('admin/check_blog');
    }
}
