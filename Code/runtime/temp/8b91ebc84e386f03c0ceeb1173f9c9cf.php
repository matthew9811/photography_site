<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"F:\photography_site\Code\public/../application/admin\view\index\add-article.html";i:1551602008;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理系统</title>
  <link href="/common/css/admin/bootstrap.min.css" rel="stylesheet" />
  <link href="/common/css/admin/font-awesome.min.css" rel="stylesheet" />

  <link href="/common/css/admin/long.css" rel="stylesheet" />
  <link href="/common/css/admin/style.css" rel="stylesheet" />
  <script src="/static/jquery.js"></script>
  <script type="text/javascript" src="/static/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript" src="/static/admin/admin-scripts.js"></script>
  <script type="text/javascript" src="/static/admin/html5shiv.min.js"></script>
  <script type="text/javascript" src="/static/admin/respond.min.js"></script>
  <script type="text/javascript" src="/static/admin/selectivizr-min.js"></script>
</head>

<body class="user-select">
<section class="container-fluid">
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="/">PhotoHome</a> </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">消息 <span class="badge"></span></a></li>
            <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">admin <span class="caret"></span></a>
              <ul class="dropdown-menu dropdown-menu-left">
                <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
              </ul>
            </li>
            <li><a href="/Index/outLogin" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="row">
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
      <ul class="nav nav-sidebar">
        <li><a href="/admin/index/toMain">报告</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li class="active"><a href="/admin/index/toArticle">文章</a></li>
        <li><a href="/admin/index/toNotice">论坛</a></li>
        <li><a href="/admin/index/toComment">评论</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
          <ul class="dropdown-menu" aria-labelledby="userMenu">
            <li><a data-toggle="modal" data-target="#areDeveloping">管理用户组</a></li>
            <li><a href="/admin/index/toUser">管理用户</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/admin/index/toLog">管理登录日志</a></li>
          </ul>
        </li>
      </ul>
    </aside>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <form action="/Article/add" method="post" class="add-article-form">
          <div class="col-md-9">
            <h1 class="page-header">撰写新文章</h1>
            <div class="form-group">
              <label for="article-title" class="sr-only">标题</label>
              <input type="text" id="article-title" name="title" class="form-control" placeholder="在此处输入标题" required autofocus autocomplete="off">
            </div>
            <div class="form-group">
              <label for="article-content" class="sr-only">内容</label>
              <script id="article-content" name="content" type="text/plain"></script>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>关键字</span></h2>
              <div class="add-article-box-content">
              	<input type="text" class="form-control" placeholder="请输入关键字" name="keywords" autocomplete="off">
                <span class="prompt-text">多个标签请用英文逗号,隔开。</span>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>描述</span></h2>
              <div class="add-article-box-content">
              	<textarea class="form-control" name="describe" autocomplete="off"></textarea>
                <span class="prompt-text">描述是可选的手工创建的内容总结，并可以在网页描述中使用</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>栏目</span></h2>
              <div class="add-article-box-content">
                <ul class="category-list">
                  <li>
                    <label>
                      <input name="category" type="radio" value="1" checked>
                      这是栏目 <em class="hidden-md">( 栏目ID: <span>1</span> )</em></label>
                  </li>
                  <li>
                    <label>
                      <input name="category" type="radio" value="2">
                      这是栏目 <em class="hidden-md">( 栏目ID: <span>2</span> )</em></label>
                  </li>
                  <li>
                    <label>
                      <input name="category" type="radio" value="3">
                      这是栏目 <em class="hidden-md">( 栏目ID: <span>3</span> )</em></label>
                  </li>
                  <li>
                    <label>
                      <input name="category" type="radio" value="4">
                      这是栏目 <em class="hidden-md">( 栏目ID: <span>4</span> )</em></label>
                  </li>
                  <li>
                    <label>
                      <input name="category" type="radio" value="5">
                      这是栏目 <em class="hidden-md">( 栏目ID: <span>5</span> )</em></label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>标签</span></h2>
              <div class="add-article-box-content">
                <input type="text" class="form-control" placeholder="输入新标签" name="tags" autocomplete="off">
                <span class="prompt-text">多个标签请用英文逗号,隔开</span> </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>标题图片</span></h2>
              <div class="add-article-box-content">
                <input type="text" class="form-control" placeholder="点击按钮选择图片" id="pictureUpload" name="titlepic" autocomplete="off">
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-default" type="button" ID="upImage">选择</button>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-content">
              	<p><label>状态：</label><span class="article-status-display">未发布</span></p>
                <p><label>公开度：</label><input type="radio" name="visibility" value="0" checked/>公开 <input type="radio" name="visibility" value="1" />加密</p>
                <p><label>发布于：</label><span class="article-time-display"><input style="border: none;" type="datetime" name="time" value="2016-01-09 17:29:37" /></span></p>
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-primary" type="submit" name="submit">发布</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!--个人信息模态框-->
<div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" >个人信息</h4>
        </div>
        <div class="modal-body">
          <table class="table" style="margin-bottom:0px;">
            <thead>
              <tr> </tr>
            </thead>
            <tbody>
              <tr>
                <td wdith="20%">姓名:</td>
                <td width="80%"><input type="text" value="王雨" class="form-control" name="truename" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">用户名:</td>
                <td width="80%"><input type="text" value="admin" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
              </tr>
              <tr>
                <td wdith="20%">电话:</td>
                <td width="80%"><input type="text" value="18538078281" class="form-control" name="usertel" maxlength="13" autocomplete="off" /></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </form>
  </div>
</div>

<!--提示模态框-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
      </div>
      <div class="modal-body"> <img src="/common/image/baoman_01.gif" alt="深思熟虑" />
        <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>
<!--右键菜单列表-->
<div id="rightClickMenu">
  <ul class="list-group rightClickMenuList">
    <li class="list-group-item disabled">欢迎访问异清轩博客</li>
    <li class="list-group-item"><span>IP：</span>172.16.10.129</li>
    <li class="list-group-item"><span>地址：</span>河南省郑州市</li>
    <li class="list-group-item"><span>系统：</span>Windows10 </li>
    <li class="list-group-item"><span>浏览器：</span>Chrome47</li>
  </ul>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/admin-scripts.js"></script>
<script src="lib/ueditor/ueditor.config.js"></script>
<script src="lib/ueditor/ueditor.all.min.js"> </script>
<script src="lib/ueditor/lang/zh-cn/zh-cn.js"></script>
<script id="uploadEditor" type="text/plain" style="display:none;"></script>
<script type="text/javascript">
var editor = UE.getEditor('article-content');
window.onresize=function(){
    window.location.reload();
}
var _uploadEditor;
$(function () {
    //重新实例化一个编辑器，防止在上面的editor编辑器中显示上传的图片或者文件
    _uploadEditor = UE.getEditor('uploadEditor');
    _uploadEditor.ready(function () {
        //设置编辑器不可用
        //_uploadEditor.setDisabled();
        //隐藏编辑器，因为不会用到这个编辑器实例，所以要隐藏
        _uploadEditor.hide();
        //侦听图片上传
        _uploadEditor.addListener('beforeInsertImage', function (t, arg) {
            //将地址赋值给相应的input,只去第一张图片的路径
            $("#pictureUpload").attr("value", arg[0].src);
            //图片预览
            //$("#imgPreview").attr("src", arg[0].src);
        })
        //侦听文件上传，取上传文件列表中第一个上传的文件的路径
        _uploadEditor.addListener('afterUpfile', function (t, arg) {
            $("#fileUpload").attr("value", _uploadEditor.options.filePath + arg[0].url);
        })
    });
});
//弹出图片上传的对话框
$('#upImage').click(function () {
    var myImage = _uploadEditor.getDialog("insertimage");
    myImage.open();
});
//弹出文件上传的对话框
function upFiles() {
    var myFiles = _uploadEditor.getDialog("attachment");
    myFiles.open();
}
</script>
</body>
</html>
