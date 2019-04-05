<?php

namespace app\index\controller;

use app\index\controller\common\Base;
use think\Request;

class Forum extends Base
{
    public function toForum()
    {
        return view('forum/forum');
    }

    public function toEditor()
    {
        return view('compile/post_forum');
    }

    public function toInvitation()
    {
        return view('forum/invitation');
    }

    public function toPost(Request $request)
    {
        $post = $request->param();
        $view = new View();
        $content = $post['content'];
        $view->content = $content;
        return $view->fetch('forum/invitation');
    }

    public function saveForum(Request $request)
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
        Db::table("forum")->insert([
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
        return json($blog);
    }
}
