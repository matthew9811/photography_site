<?php

namespace app\common\model;

use think\Model;

class User extends Model
{
    protected $_map = array(
        'table' => 'user',
        'deleteFlag' => 'delete_flag',
        'nickName' => 'nick_name',
        'realName' => 'real_name',
        'password' => 'password',
        'sex' => 'sex',
        'email' => 'email',
        'mobile' => 'mobile',
        'idNumber' => 'id_number',
        'type' => 'type',
        'blogNumber' => 'blog_number',
        'templeteImg' => 'templete_img',
        'signature' => 'signature',
    );

}
