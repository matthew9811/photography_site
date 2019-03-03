<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"F:\photography_site\Code\public/../application/admin\view\index\admin.html";i:1551546377;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("/common/html/import.html"); ?>
    <link href="/common/css/register.css" rel="stylesheet">
    <link href="/common/css/first.css" rel="stylesheet">
</head>
<body>
<div class="first">
    <div class="container admin_container">
        <div class="login_form">
            <form action="/admin/index/admin_login" method="post">
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
                <div class="admin_btn">
                <input type="submit" class="btn btn-default" value="Submit"/>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
</script>
</body>
</html>