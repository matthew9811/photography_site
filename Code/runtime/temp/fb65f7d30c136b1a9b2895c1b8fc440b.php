<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"F:\photography_site\Code\public/../application/index\view\register\login.html";i:1551015857;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("/common/html/import.html"); ?>
    <link href="/common/css/register.css" rel="stylesheet">
</head>
<body>
<div class="container reg_container">
    <div class="login_form">
        <form action="/index/index/login" method="post" id="login_form">
            <br>
            <div class="reg_mobile">
                <label>ID</label>
                <div class="reg_right">
                    <input name="nickName" type="text" placeholder="昵称" class="form-control reg_input"/>
                </div>
            </div>
            <div class="reg_mobile">
                <label>Password</label>
                <div class="reg_right">
                    <input name="password" type="password" placeholder="请输入密码" class="form-control reg_input"/>
                </div>
            </div>
            <!--<div class="reg_button">-->
            <!--<button type="submit" class="btn btn-default" style="margin-right: 20px">Submit</button>-->
            <!--<button class="btn btn-default">Cancel</button>-->
            <!--</div>-->
        </form>
    </div>
</div>
<script>
</script>
</body>
</html>