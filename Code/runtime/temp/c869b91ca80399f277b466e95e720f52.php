<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"F:\photography_site\Code\public/../application/index\view\blog\blog.html";i:1550931279;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("/common/html/bar.html"); ?>
    <link href="/common/css/blog.css" rel="stylesheet" />
</head>
<body class="blog_bg">
<div class="container blog_container">
    <br>
    <div class="blog_author">
        <div class="blog_head">
            <img src="/common/image/account.jpg" class="img-circle blog_img">
        </div>
        <div class="blog_name">
            暮凉同学
        </div>
        <div class="blog_sign">
            孤单是一个人的狂欢，狂欢是一群人的孤单
        </div>
    </div>
    <div class="blog_article">
        <div class="blog_title">
            下雨天是最美
        </div>
        <div class="blog_content">
            <?php echo $content; ?>
        </div>
        <div class="blog_l"></div>
    </div>

    <div class="blog_comment">
        <div class="blog_line"></div>
        <div class="blog_input">
            <input type="text" placeholder="想对作者说些什么" class="form-control blog_i">
            <button type="submit" class="btn btn-default" style="margin-left: 20px">Submit</button>
        </div>
        <div class="blog_line"></div>
        <div class="blog_people">
            <div class="blog_who">
                <img src="/common/image/account.jpg" class="img-circle blog_people_head">
            </div>
            <div class="blog_people_content">
                不负相遇，错负相遇 不负相遇，错负相遇 不负相遇，错负相遇 不负相遇，错负相遇 不负相遇，错负相遇
                不负相遇，错负相遇 不负相遇，错负相遇 不负相遇，错负相遇 不负相遇，错负相遇 不负相遇，错负相遇
                不负相遇，错负相遇 不负相遇，错负相遇 不负相遇，错负相遇 不负相遇，错负相遇
            </div>
        </div>
    </div>
</div>
</body>
<?php include("/common/html/footer.html"); ?>
</html>