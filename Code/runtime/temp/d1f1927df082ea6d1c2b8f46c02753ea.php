<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:91:"D:\shengxi\hc\photography_site\Code\public/../application/index\view\compile\post_blog.html";i:1551660795;}*/ ?>
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
            <a href="/index/Blog/toBlog" style="text-decoration: none;color: #000;">
                <div class="post_forum container">The blog title</div>
            </a>
            <a href="/index/Blog/toBlog" style="text-decoration: none;color: #000;">
                <div class="post_forum container">The blog title</div>
            </a>
            <a href="/index/Blog/toBlog" style="text-decoration: none;color: #000;">
                <div class="post_forum container">The blog title</div>
            </a>
        </div>
        <div class="post_line"></div>
        <div class="post_up">
            <div class="post_name container">The hot article</div>
            <a href="/index/Blog/toBlog" style="text-decoration: none;color: #000;">
                <div class="post_forum container">The blog title</div>
            </a>
            <a href="/index/Blog/toBlog" style="text-decoration: none;color: #000;">
                <div class="post_forum container">The blog title</div>
            </a>
            <a href="/index/Blog/toBlog" style="text-decoration: none;color: #000;">
                <div class="post_forum container">The blog title</div>
            </a>
        </div>
    </div>

    <div class="blog_editor">
        <div class="post_input_title container">
            <div class="post_title">Post Title</div>
            <div class="post_input">
                <form>
                    <input name="title" type="text" class="form-control" placeholder="输入标题">
                </form>
            </div>
        </div>
        <div id="div1" class="post_wangEditor editor_toolbar"></div>
    </div>


    <div class="post_blog">
        <div class="post_line"></div>
        <div class="container post_label">
            <div class="label">文章标签：
                <span class="glyphicon glyphicon-tag label_sign"></span>
            </div>
            <div class="label_ico">添加标签</div>
            <div class="label_ico">添加标签</div>
        </div>
        <div class="blog_input">
            <div class="post_button">
                <input type="button" value="publish" id="btn">
            </div>
        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    var content;
    $(function () {
        content = make_editor("#div1", "#btn","/index/Blog/saveBlog");
    })
</script>
<?php include("/common/html/footer.html"); ?>
</html>