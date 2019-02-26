<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\shengxi\hc\Code\public/../application/index\view\alter\alter.html";i:1551006209;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PhotoHome</title>
    <?php include("/common/html/bar.html"); ?>
    <link href="/common/css/alter.css" rel="stylesheet" />
</head>
<body style="background-color: #F4F7F9">
<div class="container" >
    <!-- nav-justified类可以设置导航项等宽显示--->
    <!--设置ul的flex-column类用于创建垂直导航-->
    <!--nav是为了JS调用导航-->
    <div class="set">
        <div class="kind">
            <a href="#personal" class="kinda">Personal Data</a>
        </div>
        <div class="kind">
            <a href="#account" class="kinda">Account Of Privacy</a>
        </div>
    </div>

    <div class="alter">
        <div class="data">
            <a name="personal">
                <div class="personal">
                    <div class="title">Personal Data</div>
                    <div class="form">
                        <form action="/index/Personal/update">
                            <br>
                            <div class="head_portrait">
                                <img id="myPhoto" src="/common/image/account.jpg" class="img-circle image">
                                <div style="width: 100%;height: 10px;"></div>
                                <div class="file_button">
                                    <label class="btn btn-default" style="width: 100px;height: 30px">修改头像
                                        <input type="file" name="portrait" id="portrait" class="icon_div" style="position:absolute;opacity:0;"/>
                                    </label>
                                </div>
                            </div>

                            <div class="nickName">
                                <div class="text">Nickname</div>
                                <input name="nickName" type="text" class="form-control" value=""/>
                            </div>

                            <div class="nickName">
                                <div class="text">Signature</div>
                                <input name="signature" type="text" class="form-control" value=""/>
                            </div>
                            <div class="sex_radio">
                                <div class="text">Sex</div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>boy
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">gril
                                    </label>
                                </div>
                            </div>
                            <div class="sex_radio">
                                <img id="bg" src="/common/image/personal_bg.jpg" class="bg_photo">
                                <div class="btn_photo">
                                    <label class="btn btn-default" style="width: 100px;height: 30px;">修改背景
                                        <input type="file" name="bg_file" id="bg_file" class="icon_div"  style="position:absolute;opacity:0;"/>
                                    </label>
                                </div>
                            </div>
                            <br>
                            <button type="button" class="btn btn-warning">提交</button>
                        </form>
                    </div>
                </div>
            </a>

            <a name="account">
                <div class="account">
                    <div class="title">Account Of Privacy</div>
                    <div class="form">
                        <form>
                            <br>
                            <div class="nickName">
                                <div class="text">Photo</div>
                                <input type="text" class="form-control" value=""/>
                            </div>

                            <div class="nickName">
                                <div class="text">E-mail</div>
                                <input type="email" class="form-control" value=""/>
                            </div>

                            <div class="nickName">
                                <div class="text">ID Card</div>
                                <input type="text" class="form-control" value=""/>
                            </div>

                            <div class="nickName">
                                <div class="text">Password</div>
                                <input type="password" class="form-control" value=""/>
                            </div>
                            <br>
                            <button type="button" class="btn btn-warning">提交</button>
                        </form>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){  //一定要有这个
        //获取上传的头像并预览
        $("#portrait").change(function(){
            var objUrl = getObjectURL(this.files[0]) ;//获取文件信息
            //console.log("objUrl = "+objUrl);
            if (objUrl) {
                $("#myPhoto").attr("src",objUrl);
            }
        }) ;

        //获取上传的背景图，并预览
        $("#bg_file").change(function(){
            var objUrl = getObjectURL(this.files[0]) ;//获取文件信息
            //console.log("objUrl = "+objUrl);
            if (objUrl) {
                $("#bg").attr("src",objUrl);
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
    });
</script>
</body>
<?php include("/common/html/footer.html"); ?>
</html>