<?php

namespace app\index\controller;

use app\common\util\Constant;
use app\index\controller\common\Base;
use think\Db;
use think\Request;
use think\Session;
use think\Controller;
use DateTime;
use think\View;

class Blog extends Controller
{
    public function toBlogs()
    {
        $art = Db::table('blog')->where('status','1')
            ->order('create_time desc')->select();
        $list = Db::table('blog')->order('like desc')->limit(5)
            ->select();
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
        return view('blog/blogs');
    }

    public function toBlog(Request $request)
    {
//        $post = $request->post();
//        $view = new View();
//        $blog = Db::table('blog')->where('id', $post['id'])->where('title', $post['title'])->select()[0];
//        $file = fopen($blog['content'], "r");
//        if ($file) {
//            $content = file_get_contents($blog['content']);
//            $view->content = $content;
//        }
//        $view->title = $blog['title'];
//        return $view->fetch('blog/blog');
        $post = $request->post();
        $id = $post['id'];
        $blog = Db::table('blog')->where('id',$id)->select();
        $this->assign("blog", $blog);
        halt($blog);
        return view('blog/blog');

    }

    public function saveBlog(Request $request)
    {
        $post = $request->post();
        $content = $post['content'];
        $title = $post['title'];
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
            'type' => 0,
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

    public function toLike(Request $request)
    {
        $req = $request->post();
        $id = $req['id'];
        Db::table('blog')->where('id',$id)->setInc('like');
        $like = Db::table('blog')->where('id',$id)->select()[0];
        return json(
            [
                $id,
                $like['like']
            ]
        );
    }
}
