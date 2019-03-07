<?php

namespace app\index\controller;

use app\common\util\Constant;
use app\index\controller\common\Base;

use think\Db;
use think\Request;
use think\Session;
use DateTime;
use think\View;

class Blog 
{
    public function toBlogs()
    {
        return view('blog/blogs');
    }

    public function toBlog(Request $request)
    {
        $post = $request->post();
        $view = new View();
        $blog = Db::table('blog')->where('user_id', $post['id'])->where('title', $post['title'])->select();
        $file = fopen($blog->content, "r");
        if ($file) {
            $content = fread($file, filesize($file));
            $view->content = $content;
        }
        $view->title = $blog->title;
        return $view->fetch('blog/blog');
    }


    public function saveBlog(Request $request)
    {
        $post = $request->post();
        $content = $post['content'];
        $title = $post['title'];
        $path = Constant::BLOG_URL . Session::get("nickName");
        if (!is_dir(Constant::BLOG_URL . Session::get("nickName"))) {
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
        $url = '/index/Blog/toBlog';
        return json(['url' => $url, 'title' => $title, 'id' => Session::get('id')]);
    }
}
