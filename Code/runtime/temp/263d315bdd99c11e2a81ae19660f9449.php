<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\shengxi\hc\Code\public/../application/index\view\reg\index.html";i:1550376166;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/static/jquery.js"></script>
</head>
<body>
<form class="form-group" action="/index/reg/action" method="post">
    <div class="form-group">
        <input name="phoneNum" class="form-control" type="text" placeholder="手机号/邮箱">
    </div>
    <div class="form-group">
        <input name="password" class="form-control" type="password" placeholder="密码">
    </div>
    <div class="form-group">
        <input name="passwordagin" class="form-control" type="password" placeholder="再次输入密码">
    </div>
    <div class="text-right">
        <button class="btn btn-primary" type="submit">提交</button>
        <button class="btn btn-danger" data-dismiss="modal">取消</button>
    </div>
    <a href="" data-toggle="modal" data-dismiss="modal" data-target="#login">已有账号？点我登录</a>
</form>
</body>
</html>