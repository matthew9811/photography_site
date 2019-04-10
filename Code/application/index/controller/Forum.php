<?php

namespace app\index\controller;

use app\index\controller\common\Base;
use think\Request;
use app\common\util\Constant;
use think\Db;
use think\Session;
use think\Controller;
use DateTime;

class Forum extends Base
{
    public function toForum()
    {
        $forum = Db::table('forum')->where('delete_flag','0')
            ->order('publish_time desc')->select();
        for ($i = 0; $i < count($forum); $i = $i + 1) {
            $id = $forum[$i]['user_id'];
            $user = Db::table('user')->where('id',$id)->select()[0];
            $forum[$i]['user_id'] = $user['nick_name'];
        }
        $board = Db::table('forum')->where('delete_flag','0')
            ->order("like desc")
            ->limit(3)->select();
        $this->assign('board',$board);
        $this->assign('forum',$forum);
        return view('forum/forum');
    }

    public function toEditor()
    {
        $new = Db::table("forum")->where("delete_flag", '0')
            ->order("publish_time desc")->limit(3)
            ->select();
        $hot = Db::table('forum')->where('delete_flag','0')
            ->order("count desc")->limit(3)
            ->select();
        $this->assign('new',$new);
        $this->assign('hot',$hot);
        return view('compile/post_forum');
    }

    public function toInvitation()
    {
        $id = input()['id'];
        $forum = Db::table('forum')->where('id',$id)->select()[0];
        $user = Db::table('user')->where('id',$forum['user_id'])->select()[0];
        $content = fopen(iconv("UTF-8", "gbk", $forum['content']),"r");
        if ($content) {
            $content = file_get_contents(iconv("UTF-8", "gbk", $forum['content']));
            $forum['content'] = $content;
        }
        $this->assign('user',$user);
        $this->assign('forum',$forum);
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
        $path = Constant::FORUM_URL . Session::get("nickName");
        if (!is_dir(Constant::FORUM_URL . Session::get("nickName"))) {
            mkdir(iconv("UTF-8", "UTF-8", $path), 0777, true);
        }
        $forum = fopen($path . '/' . iconv("UTF-8", "gbk", $title) . '.html', "w+");
        fwrite($forum, $content);
        Db::table("forum")->insert([
            'user_id' => Session::get('id'),
            'title' => $title,
            'content' => $path . '/' . $title . '.html',
            'like' => 0,
            'count' => 0,
            'delete_flag' => '0',
            'publish_time' => new DateTime(),

        ]);
        $blog = Db::table('forum')->where('user_id',Session::get('id'))
            ->where('title',$title)->select()[0];
//        $this->redirect("ok",array('id' => $blog['id']));
//        $this->assign("blog", $blog);
//        return view('blog/blog');
        return json($blog);
    }
}
