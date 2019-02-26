<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\shengxi\hc\Code\public/../application/index\view\reg\reg.html";i:1550897456;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!--<?php include("/common/html/import.html"); ?>-->
    <script src="/static/jquery.js"></script>
    <link href="/common/css/register.css" rel="stylesheet">
</head>
<body>
<div class="container reg_container">
    <div class="reg_form">
        <form id="register_form" action="/index/index/reg" method="post">
        <br>
        <div class="reg_mobile">
            <label for="nickName">nickName</label>
            <div class="reg_right">
                <input id="nickName" name="nickName" type="text" placeholder="昵称" class="form-control reg_input"/>
            </div>
        </div>
        <div class="reg_mobile">
            <label for="mobile">mobile</label>
            <div class="reg_right">
                <input id="mobile" name="mobile" type="text" placeholder="手机" class="form-control reg_input"/>
            </div>
        </div>
        <div class="reg_mobile">
            <label for="password">Password</label>
            <div class="reg_right">
                <input id="password" name="password" type="password" placeholder="请输入密码"
                       class="form-control reg_input"/>
            </div>
        </div>
        <div class="reg_mobile">
            <label for="confirm">Affirm</label>
            <div class="reg_right">
                <input id="confirm" name="confirm" type="password" placeholder="再次输入密码"
                       class="form-control reg_input"/>
            </div>
        </div>
        <button type="button" id="button" class="btn btn-danger">tiajio</button>
        </form>
    </div>
</div>
<!--<?php include("/common/html/footer.html"); ?>-->
</body>
<script>
    $("button").on("click", function () {
        var data = $("#register_form").serializeArray();
        $.ajax({
            url: "/index/index/reg",
            type: 'post',
            data: data,
            success: function (data) {
                alert(data.msg);
            },
            error: function (data) {
                alert(data.status);
                console.log(data);
            }
        });
    })
</script>
</html>