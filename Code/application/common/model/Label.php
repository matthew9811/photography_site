<?php

namespace app\common\model;

use think\Model;

class Label extends Model
{
    protected $table = 'label';
    protected $id = 'id';
    protected $name = 'name';
    protected $deleteFlag = 'delete_flag';
}
