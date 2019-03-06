<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"F:\photography_site\Code\public/../application/index\view\personal\photo.html";i:1551857409;}*/ ?>
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
<!-- //background_images -->
<div class="blank"></div>
<br>
<div class="container">
    <div id="photos">
        <div class="photo_div">
            <div class="icon_div">
                <span class="glyphicon glyphicon-plus add_icon"></span>
            </div>
            <form id="upload" enctype="multipart/form-data" style="position:absolute;opacity:0;">
                <input type="file" name="name" id="name" class="icon_div" style="position:absolute;opacity:0;" accept="image/gif,image/jpeg,image/x-png"/>
            </form>
        </div>
        <div class='photo_div'>
            <img id="photo" src=<?php echo $user->img; ?> class='img_div'>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function () {
        //页面卡片
        $("div.tab_menu ul li").eq(0).css({"color":"#FFCC33"});
        $("div.tab_menu ul li").eq(1).css({"color":"#000"});
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
        }

            //获取上传的文件并预览
            $("#name").change(function () {
                var objUrl = getObjectURL(this.files[0]);//获取文件信息
                var formData = new FormData();
                formData.append('pic', $(this).get(0).files[0]);
                console.log(formData);
                var option = {
                    'data' : formData,
                    'url' : '/index/Personal/savePhoto'
                };
                updataPhoto(option);
                if (objUrl) {
                    $("#photos").append("<div class='photo_div'>" +
                        "            <img src='" + objUrl + "' class='img_div'>" +
                        "        </div>");
                }
            });


    })
</script>
<?php include("/common/html/footer.html"); ?>
</html>