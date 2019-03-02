<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"F:\photography_site\Code\public/../application/index\view\forum\forum.html";i:1550923400;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course</title>
    <?php include("/common/html/bar.html"); ?>
    <link href="/common/css/forum.css" rel="stylesheet" />
</head>
<body class="forum_bg">
<!-- header -->
<div class="headerpage"></div>
<!-- //header -->

<div class="container">

    <!-- left -->
    <div class="forum_left">
        <div class="forum_slide">
            <img src="/common/image/personal_bg.jpg">
        </div>
        <br>
        <div class="forum_new">The New Post</div>
        <div class="forum_quiz">
            <a href="/index/forum/toEditor" style="color: #FFCC33;text-decoration:none">Go to quiz</a>
        </div>
        <div class="forum_invitation">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Quizzer</th>
                    <th>Replies</th>
                    <th>Page View</th>
                </tr>
                <tr>
                    <td>
                        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                            I like Photo
                        </a>
                    </td>
                    <td>Lilith</td>
                    <td>7</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>
                        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                            I like Photo
                        </a>
                    </td>
                    <td>Lilith</td>
                    <td>7</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>
                        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                            I like Photo
                        </a>
                    </td>
                    <td>Lilith</td>
                    <td>7</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>
                        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                            I like Photo
                        </a>
                    </td>
                    <td>Lilith</td>
                    <td>7</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>
                        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                            I like Photo
                        </a>
                    </td>
                    <td>Lilith</td>
                    <td>7</td>
                    <td>7</td>
                </tr>
                <tr>
                    <td>
                        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
                            I like Photo
                        </a>
                    </td>
                    <td>Lilith</td>
                    <td>7</td>
                    <td>7</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- left -->

    <!-- right -->
    <div class="forum_right">
        <div class="forum_list">
            <span class="glyphicon glyphicon-bullhorn">&nbsp</span>
            Bulletin Board
        </div>
        <div class="forum_list_line"></div>
        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
            <div class="forum_title">
                Bulletin Board Bulletin Board Bulletin Board Bulletin Board
            </div>
        </a>

        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
            <div class="forum_title">
                Bulletin Board Bulletin Board Bulletin Board Bulletin Board
            </div>
        </a>

        <a href="/index/Forum/toInvitation" style="color: #0f0f0f;text-decoration: none">
            <div class="forum_title">
                Bulletin Board Bulletin Board Bulletin Board Bulletin Board
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