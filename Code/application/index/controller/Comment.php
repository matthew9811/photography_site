<?php

namespace app\index\controller;

use app\common\util\Constant;
use app\index\controller\common\Base;
use think\Db;
use think\Request;
use think\Session;
use DateTime;

class Comment extends Base
{
    public function commentBlog(Request $request)
    {
        $req = $request->post();
        $blogId = $req['blogId'];
        $comment = $req['comment'];
        $id = Session::get("id");
        Db::table('comment')->insert([
            'user_id' => $id,
            'type' => '1',
            'type_id' => $blogId,
            'content' => $comment,
            'delete_flag' => '0',
            'comment_time' => new \DateTime()
        ]);
    }
}
