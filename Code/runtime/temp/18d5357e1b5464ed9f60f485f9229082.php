<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"D:\shengxi\hc\Code\public/../application/index\view\compile\post_forum.html";i:1551006209;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PhotoHome</title>
    <?php include("/common/html/bar.html"); ?>
    <link href="/common/css/post_forum.css" rel="stylesheet" />
    <script src="/common/js/wangEditor.js"></script>
</head>
<body class="post_bg">
<div class="container">
    <div class="post_left">
        <div class="post_up">
            <div class="post_name container">The New</div>
            <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                <div class="post_forum container">The forum title</div>
            </a>
            <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                <div class="post_forum container">The forum title</div>
            </a>
            <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                <div class="post_forum container">The forum title</div>
            </a>
        </div>
        <div class="post_line"></div>
        <div class="post_up">
            <div class="post_name container">The hot topic</div>
            <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                <div class="post_forum container">The forum title</div>
            </a>
            <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                <div class="post_forum container">The forum title</div>
            </a>
            <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                <div class="post_forum container">The forum title</div>
            </a>
        </div>
    </div>

    <div class="post_editor">
        <div class="post_input_title container">
            <div class="post_title">Post Title</div>
            <div class="post_input">
                <input name="title" type="text" class="form-control" placeholder="输入标题">
            </div>
        </div>
        <div id="div1" class="post_wangEditor editor_toolbar"></div>
        <div class="post_replenish">
            <div class="post_button">
                <input type="button" value="publish" id="btn">
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    $(function () {
        make_editor("#div1","#btn");
    })
</script>
<?php include("/common/html/footer.html"); ?>
</html>