<?php

namespace app\index\controller;

use app\index\controller\common\Base;

class course extends Base
{
    public function toCourse()
    {
        return view('course/course');
    }
}
