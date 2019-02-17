<?php

namespace app\common\model;

use think\Model;

class Deal extends Model
{
    protected $table = 'deal';
    protected $id = 'id';
    protected $userId = 'user_id';
    protected $need = 'need';
    protected $deleteFlag = 'delete_flag';
}
