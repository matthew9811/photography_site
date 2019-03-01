<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"F:\photography_site\Code\public/../application/index\view\personal\article.html";i:1551358974;}*/ ?>
<html>
<head>
    <meta charset="UTF-8">
    <?php include("/common/html/bar.html"); ?>
    <link href="/common/css/personal.css" rel="stylesheet"/>
    <link href="/common/css/article.css" rel="stylesheet"/>
</head>
<body class="bg">
<!-- background_images -->
<div id="home" class="bg-img">
    <div class="box"></div>
    <div class="come_up">
        <div class="container">
            <div class="image_div">
                <img class="img-circle image" src=<?php echo $user->img; ?> alt="头像"/>
            </div>
            <div class="div_right">
                <br>
                <p><?php echo $user->nick_name; ?></p>
                <div class="div_fans">
                    <span>Focus </span><?php echo $user->focus; ?>
                    <span> | </span>
                    <span>Fans </span><?php echo $user->fans; ?>
                </div>
                <div class="div_signature">
                    <p><?php echo $user->signature; ?>
                        <a href="/index/Personal/toAlter" style="color: white">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                    </p>

                </div>
                <div class="my_tab">
                    <div class="tab_menu">
                        <ul id="test">
                            <li>Photo</li>
                            <li>Blog</li>
                            <li>Chat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blank"></div>
<br>
<div class="container">
    <div class="about4">
        <div class="about4_main">
            <div class="line"></div>
            <ul id="article" class="about4_ul">
                <li>
                    <div class="li_div">
                        <div class="li_date">现在</div>
                        <a href="/index/Personal/toPost">
                            <div class="li_article li_add">
                                <span class="glyphicon glyphicon-plus add_icon"></span>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="li_div">
                        <div class="li_date">19.02.16</div>
                        <div class="li_article container">
                            <a href="/index/Personal/toBlog" style="color: #0f0f0f;text-decoration:none">
                                <div class="li_title">文章题目</div>
                                <div class="li_contend">在设置拍摄参数时主要遵循4个原则。第一个原则在光线够的时候不要用
                                    太高的感光度，不然画面的噪点会比较大，画质不好，所以这次选择的感光度是100。
                                    第二个原则，快门速度最好要高于镜头焦段的数值，比如我用的是35镜头，最慢的快门速度不能低于
                                    1\35秒，一般相机没有1\35秒，而是1\60秒，或者1\30秒，这是安全快门速度，一般我们手持拍摄，
                                    要保证快门速度不能因为手抖而把画面拍糊。我这次选择的是1\400秒，远高于安全快门速度。
                                </div>
                            </a>
                            <div class="li_icon">
                                <div class="li_span">
                                    <span class="glyphicon glyphicon-thumbs-up"></span>
                                    <div class="li_num">123</div>
                                </div>
                                <div class="li_span">
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <div class="li_num">123</div>
                                </div>
                                <div class="li_span">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                    <div class="li_num">123</div>
                                </div>
                                <div class="li_span">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    <div class="li_num">123</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="like_course">
                <div class="container">
                    <div class="course">
                        My Course
                    </div>
                    <div class="my_course">
                        <a href="/index/Course/toCourse" style="text-decoration: none;color: #0f0f0f">
                            Course topic
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        
        $("div.tab_menu ul li").eq(0).css({"color":"#000"});
        $("div.tab_menu ul li").eq(1).css({"color":"#FFCC33"});
        $("div.tab_menu ul li").eq(2).css({"color":"#000"});

        //获取点击后的li的内容
        var obj_lis = document.getElementById("test").getElementsByTagName("li");
        for(var i = 0; i < obj_lis.length; i++) {
            obj_lis[i].onclick = function () {
                if (this.innerHTML == "Photo") {
                    window.location.href = "/index/personal/toPersonal";
                } else if (this.innerHTML == "Blog") {
                    window.location.href = "/index/personal/toArticle";
                }
            };
            //获取ul中li的个数，计算时间轴的长度
            var a = $("#article li").length;
            // console.log(a);
            $(".line").css("top", 60);
            $(".line").height(150 * a - 150);

            //输出文章内容时，超出80个字时显示...
            $(".li_contend").each(function () {
                var str = $(this).html();
                var subStr = str.substring(0, 80);
                $(this).html(subStr + (str.length > 80 ? '...' : ''));
            });
        }
    });
</script>
</body>
<?php include("/common/html/footer.html"); ?>
</html>