<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"F:\photography_site\Code\public/../application/admin\view\index\article.html";i:1552390249;}*/ ?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理系统</title>
    <link href="/common/css/admin/bootstrap.min.css" rel="stylesheet"/>
    <link href="/common/css/admin/font-awesome.min.css" rel="stylesheet"/>
    <link href="/common/css/admin/login.css" rel="stylesheet"/>
    <link href="/common/css/admin/style.css" rel="stylesheet"/>
    <script src="/static/jquery.js"></script>
    <script type="text/javascript" src="/static/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="/static/admin/admin-scripts.js"></script>
    <script type="text/javascript" src="/static/admin/html5shiv.min.js"></script>
    <script type="text/javascript" src="/static/admin/respond.min.js"></script>
    <script type="text/javascript" src="/static/admin/selectivizr-min.js"></script>
    <script type="text/javascript" src="/common/js/util.js"></script>
</head>

<body class="user-select">
<section class="container-fluid">
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span
                            class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand">PhotoHome</a></div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="">消息 <span class="badge"></span></a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-haspopup="true" aria-expanded="false">admin <span
                                class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
                            </ul>
                        </li>
                        <li><a href="/admin/index/toOut">退出登录</a></li>
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
                <!--<li><a href="/admin/index/toComment">评论</a></li>-->
            </ul>
            <ul class="nav nav-sidebar">
                <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">用户</a>
                    <ul class="dropdown-menu" aria-labelledby="userMenu">
                        <li><a href="/admin/index/toUser">管理用户</a></li>
                        <li><a data-toggle="modal" data-target="#areDeveloping">管理用户组</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/admin/index/toLog">管理登录日志</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
            <form action="/Article/checkAll" method="post">
                <h1 class="page-header">管理</h1>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th><span class="visible-lg">选择</span></th>
                            <th><span class="visible-lg">标题</span></th>
                            <th class="hidden-sm"><span class="visible-lg">标签</span></th>
                            <th><span class="visible-lg">日期</span></th>
                            <th><span class="visible-lg">操作</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><input type="checkbox" class="input-control" name="checkbox[]" value=""/></td>
                                <td class="article-title">
                                    <a href="/admin/index/toBlog">
                                       <?php echo $item['id']; ?> + <?php echo $item['title']; ?>
                                    </a>
                                </td>
                                <td class="hidden-sm">PHP、JavaScript</td>
                                <td><?php echo $item['create_time']; ?></td>
                                <td><a id='<?php echo $item['id']; ?>,1'>通过</a> <a id='<?php echo $item['id']; ?>,2'>驳回</a></td>
                            </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
                <footer class="message_footer">
                    <nav>
                        <div class="btn-toolbar operation" role="toolbar">
                            <div class="btn-group" role="group"><a class="btn btn-default" onClick="select()">全选</a> <a
                                    class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default"
                                                                                          onClick="noselect()">不选</a>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-default" data-toggle="tooltip"
                                        data-placement="bottom" title="删除全部选中" name="checkbox_delete">删除
                                </button>
                            </div>
                        </div>
                        <ul class="pagination pagenav">
                            <li class="disabled"><a aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#" aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a></li>
                        </ul>
                    </nav>
                </footer>
            </form>
        </div>
    </div>
</section>
<!--个人信息模态框-->
<div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">个人信息</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                        <tr></tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td wdith="20%">姓名:</td>
                            <td width="80%"><input type="text" value="王雨" class="form-control" name="truename"
                                                   maxlength="10" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td wdith="20%">用户名:</td>
                            <td width="80%"><input type="text" value="admin" class="form-control" name="username"
                                                   maxlength="10" autocomplete="off"/></td>
                        </tr>
                        <tr>
                            <td wdith="20%">电话:</td>
                            <td width="80%"><input type="text" value="18538078281" class="form-control" name="usertel"
                                                   maxlength="13" autocomplete="off"/></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>

<!--提示模态框-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog"
     aria-labelledby="areDevelopingModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
            </div>
            <div class="modal-body"><img src="/common/image/baoman_01.gif" alt="深思熟虑"/>
                <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">
                    很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //是否确认删除
    $(function () {
        $("#main table tbody tr td a").click(function (e) {
            var name = $(this);
            var id = name.attr("id");
            var laber = document.getElementById(id).innerHTML;
            console.log(laber);
            // console.log(name);
            if (laber == "通过") {
                review(name,'/admin/index/reviewBlog');
            }
        });
    });
</script>
</body>
</html>
