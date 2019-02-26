<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\shengxi\hc\Code\public/../application/index\view\blog\blogs.html";i:1550924708;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PhotoHome</title>
    <?php include("/common/html/bar.html"); ?>
    <link href="/common/css/course.css" rel="stylesheet" />
</head>
<body class="course_bg">

<div class="container">

    <!-- left -->
    <div class="course_left">
        <div class="course_slide">
            <img src="/common/image/course.jpg">
        </div>
        <br>
        <div class="course_article">
            <div class="course_line"></div>
            <div class="course_article_one">
                <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration:none">
                    <div class="course_article_title">
                        The title The title The title The title The title
                    </div>
                    <div class="course_describe">
                        The describe The describe The describe The describe The describe
                        The describe The describe The describe The describe The describe
                        The describe The describe The describe The describe The describe
                    </div>
                </a>
                <div class="course_icon">
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-thumbs-up">123</span>
                    </div>
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-heart-empty">123</span>
                    </div>
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-eye-open">123</span>
                    </div>
                </div>
            </div>
            <div class="course_line"></div>
            <div class="course_article_one">
                <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration:none">
                    <div class="course_article_title">
                        The title The title The title The title The title
                    </div>
                    <div class="course_describe">
                        The describe The describe The describe The describe The describe
                        The describe The describe The describe The describe The describe
                        The describe The describe The describe The describe The describe
                    </div>
                </a>
                <div class="course_icon">
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-thumbs-up">123</span>
                    </div>
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-heart-empty">123</span>
                    </div>
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-eye-open">123</span>
                    </div>
                </div>
            </div>
            <div class="course_line"></div>
            <div class="course_article_one">
                <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration:none">
                    <div class="course_article_title">
                        The title The title The title The title The title
                    </div>
                    <div class="course_describe">
                        The describe The describe The describe The describe The describe
                        The describe The describe The describe The describe The describe
                        The describe The describe The describe The describe The describe
                    </div>
                </a>
                <div class="course_icon">
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-thumbs-up">123</span>
                    </div>
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-heart-empty">123</span>
                    </div>
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-eye-open">123</span>
                    </div>
                </div>
            </div>
            <div class="course_line"></div>
            <div class="course_article_one">
                <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration:none">
                    <div class="course_article_title">
                        The title The title The title The title The title
                    </div>
                    <div class="course_describe">
                        The describe The describe The describe The describe The describe
                        The describe The describe The describe The describe The describe
                        The describe The describe The describe The describe The describe
                    </div>
                </a>
                <div class="course_icon">
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-thumbs-up">123</span>
                    </div>
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-heart-empty">123</span>
                    </div>
                    <div class="course_ico">
                        <span class="glyphicon glyphicon-eye-open">123</span>
                    </div>
                </div>
            </div>
            <!--<div class="course_line"></div>-->
            <!--<div class="course_article_one">-->

            <!--</div>-->

        </div>
    </div>
    <!-- left -->

    <!-- right -->
    <div class="course_right">
        <div class="course_list">
            <span class="glyphicon glyphicon-flag">&nbsp</span>
            RANKING LIST
        </div>
        <div class="course_list_line"></div>
        <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Blog Title
            </div>
        </a>

        <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Blog Title
            </div>
        </a>

        <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Blog Title
            </div>
        </a>

        <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Blog Title
            </div>
        </a>

        <a href="/index/Blog/toBlog" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Blog Title
            </div>
        </a>
    </div>
    <!-- //right -->

</div>
</body>
<script type="text/javascript">
    $(function () {
        //输出文章内容时，超出200个字时显示...
        $(".course_describe").each(function() {
            var str = $(this).html();
            var subStr = str.substring(0, 200);
            $(this).html(subStr + (str.length > 200 ? '...' : ''));
        });

        $("#good").click(function () {
            $this.css("background-color","#FFCC33");
        })
    })
</script>
<?php include("/common/html/footer.html"); ?>
</html>