<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\shengxi\hc\Code\public/../application/index\view\personal\article.html";i:1550924708;}*/ ?>
<html>
<head>
    <meta charset="UTF-8">
    <?php include("/common/html/personal.html"); ?>
    <link rel="stylesheet" href="/common/css/article.css" type="text/css" />
</head>
<body style="background-color: #F4F7F9">
<br>
<div class="container">
    <div class="about4">
        <div class="about4_main">
            <div class="line"></div>
            <ul id="article">
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
                        <div class="li_article">
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
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(e) {
        //获取ul中li的个数，计算时间轴的长度
        var a = $("#article li").length;
        // console.log(a);
        $(".line").css("top",60);
        $(".line").height(150 * a - 150);

        //输出文章内容时，超出80个字时显示...
        $(".li_contend").each(function() {
            var str = $(this).html();
            var subStr = str.substring(0, 80);
            $(this).html(subStr + (str.length > 80 ? '...' : ''));
        });

        $(".bg-img").css("background","url(/common/image/content.jpg)");
        $("div.tab_menu ul li").eq(1).css({"color":"#FFCC33"});
        $("div.tab_menu ul li").eq(0).css({"color":"#000"});
        $("div.tab_menu ul li").eq(2).css({"color":"#000"});
    });
</script>
</body>
<?php include("/common/html/footer.html"); ?>
</html>