<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\shengxi\hc\Code\public/../application/index\view\personal\photo.html";i:1551156525;}*/ ?>
<!DOCTYPE html>
<html lang="en">
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
                <img class="img-circle image" src="/common/image/account.jpg" alt="头像"/>
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
                    <p><font color="aqua"><?php echo $user->signature; ?></font>
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
<!-- //background_images -->
<div class="blank"></div>

<html>
<head>
    <meta charset="UTF-8">
    <link href="/common/css/personal.css" rel="stylesheet" />
</head>
<body style="background-color: #F4F7F9">
<div class="container">
    <div id="photos">
        <div class="photo_div">
            <div class="icon_div">
                <span class="glyphicon glyphicon-plus add_icon"></span>
            </div>
            <input type="file" name="name" id="name" class="icon_div" style="position:absolute;opacity:0;"/>
        </div>
        <div class='photo_div'>
            <img src='/common/image/d7.jpg' class='img_div'>
        </div>
        <div class='photo_div'>
            <img src='/common/image/d8.jpg' class='img_div'>
        </div>

    </div>
</div>

</body>
<script type="text/javascript">
    $(function () {
        //获取上传的文件并预览
        $("#name").change(function(){
            var objUrl = getObjectURL(this.files[0]) ;//获取文件信息
            console.log("objUrl = "+objUrl);
            if (objUrl) {
                $("#photos").append("<div class='photo_div'>" +
                    "            <img src='" + objUrl + "' class='img_div'>" +
                    "        </div>");
            }
        }) ;

        function getObjectURL(file) {
            var url = null;
            if (window.createObjectURL!=undefined) {
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        }

        $("div.tab_menu ul li").eq(0).css({"color":"#FFCC33"});
        $("div.tab_menu ul li").eq(1).css({"color":"#000"});
        $("div.tab_menu ul li").eq(2).css({"color":"#000"});

    })
</script>
<?php include("/common/html/footer.html"); ?>
</html>