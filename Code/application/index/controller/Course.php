<?php

namespace app\index\controller;

use app\common\util\Constant;
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

    public function saveCourse(Request $request)
    {
        $post = $request->post();
        $content = $post['content'];
        $title = $post['title'];
        $label = $post['label'];
        $path = Constant::BLOG_URL . Session::get("id");
        if (!is_dir(Constant::BLOG_URL . Session::get("id"))) {
            mkdir(iconv("UTF-8", "UTF-8", $path), 0777, true);
        }
        $blog = fopen($path . '/' . iconv("UTF-8", "gbk", $title) . '.html', "w+");
        fwrite($blog, $content);
        Db::table("blog")->insert([
            'user_id' => Session::get('id'),
            'status' => 0,
            'title' => $title,
            'content' => $path . '/' . $title . '.html',
            'type' => 1,
            'label_id' => $label,
            'like' => 0,
            'count' => 0,
            'delete_flag' => '0',
            'create_time' => new DateTime(),

        ]);
        $blog = Db::table('blog')->where('user_id',Session::get('id'))
            ->where('title',$title)->select()[0];
//        $this->redirect("ok",array('id' => $blog['id']));
//        $this->assign("blog", $blog);
//        return view('blog/blog');
        return json('/index/index/toBlog?id=' . $blog['id']);
    }

}
