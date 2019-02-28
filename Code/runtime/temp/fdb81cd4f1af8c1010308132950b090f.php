<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"F:\photography_site\Code\public/../application/index\view\course\course.html";i:1551055607;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course</title>
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
        <div class="course_nav">
            <div class="course_tab">
                <ul id="test">
                    <li class="selected">ALL</li>
                    <li>PHOTO</li>
                    <li>CAMERA</li>
                    <li>COLOR</li>
                    <li>LIGHT</li>
                </ul>
            </div>
        </div>
        <div class="course_article">
            <div class="course_line"></div>
            <div class="course_article_one">
                <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
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
                <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
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
                <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
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
                <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
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
        <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Course Title
            </div>
        </a>

        <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Course Title
            </div>
        </a>

        <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Course Title
            </div>
        </a>

        <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Course Title
            </div>
        </a>

        <a href="/index/Course/toObject" style="color: #0f0f0f;text-decoration: none">
            <div class="course_title">
                Course Title
            </div>
        </a>
    </div>
    <!-- //right -->

</div>
</body>
<script type="text/javascript">
    $(function () {
        //页面卡片
        var $div_li =$("div.course_tab ul li");
        $div_li.click(function(){
            $(this).addClass("selected")            //当前<li>元素高亮
                .siblings().removeClass("selected");  //去掉其它同辈<li>元素的高亮
            var index =  $div_li.index(this);  // 获取当前点击的<li>元素 在 全部li元素中的索引。
            $("div.tab_box > div")     //选取子节点。不选取子节点的话，会引起错误。如果里面还有div
                .eq(index).removeClass("hide")
                .show()   //显示 <li>元素对应的<div>元素
                .siblings().hide(); //隐藏其它几个同辈的<div>元素
        });

        //输出文章内容时，超出200个字时显示...
        $(".course_describe").each(function() {
            var str = $(this).html();
            var subStr = str.substring(0, 200);
            $(this).html(subStr + (str.length > 200 ? '...' : ''));
        });
    })
</script>
<?php include("/common/html/footer.html"); ?>
</html>