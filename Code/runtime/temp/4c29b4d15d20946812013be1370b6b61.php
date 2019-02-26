<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\shengxi\hc\Code\public/../application/index\view\register\register.html";i:1551011694;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("/common/html/import.html"); ?>
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
            <!--<div class="reg_button">-->
                <!--&lt;!&ndash;<button id="Submit" type="submit" class="btn btn-default hidden" style="margin-right: 20px">Submit</button>&ndash;&gt;-->
                <!--&lt;!&ndash;<button type="submit" class="btn btn-default hidden">Cancel</button>&ndash;&gt;-->
            <!--</div>-->
        </form>
    </div>
</div>
<script>

</script>

</body>
</html>