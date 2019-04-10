<?php

namespace app\index\controller;

use app\index\controller\common\Base;
use think\Db;
use think\Request;
use think\Session;
use think\Controller;
use DateTime;

class course extends Base
{
    public function toCourse()
    {
        $art = Db::table('blog')->where('status','1')
            ->where('delete_flag','0')
            ->where('type','1')->order('create_time desc')->select();
        $list = Db::table('blog')->where('type','1')
            ->where('delete_flag','0')
            ->order('like desc')->limit(5)->select();
        for ($i = 0; $i < count($art); $i = $i + 1) {
            $blog = $art[$i];
            $content = fopen(iconv("UTF-8", "gbk", $blog['content']),"r");
            if ($content) {
                $content = file_get_contents(iconv("UTF-8", "gbk", $blog['content']));
                $blog['content'] = $content;
            }
            $art[$i] = $blog;
        }
        $this->assign('blog',$art);
        $this->assign('list',$list);
        return view('course/course');
    }

    public function toSelect()
    {
        $label = input()['id'];
        $list = Db::table('blog')->where('type','1')
            ->where('delete_flag','0')
            ->order('like desc')->limit(5)->select();
        if ($label == 0) {
            $art = Db::table('blog')->where('status','1')
                ->where('type','1')->where('delete_flag','0')
                ->order('create_time desc')->select();
        }
        else {
            $art = Db::table('blog')->where('label_id',$label)
                ->where('status','1')->where('delete_flag','0')
                ->where('type','1')->order('create_time desc')
                ->select();
        }
        for ($i = 0; $i < count($art); $i = $i + 1) {
            $blog = $art[$i];
            $content = fopen(iconv("UTF-8", "gbk", $blog['content']),"r");
            if ($content) {
                $content = file_get_contents(iconv("UTF-8", "gbk", $blog['content']));
                $blog['content'] = $content;
            }
            $art[$i] = $blog;
        }
        $this->assign('blog',$art);
        $this->assign('list',$list);
        return view('course/course');
    }

}
