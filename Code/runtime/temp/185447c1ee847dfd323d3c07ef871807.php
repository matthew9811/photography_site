<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"F:\photography_site\Code\public/../application/index\view\alter\alter.html";i:1551359015;}*/ ?>
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
                        <br>
                        <div class="head_portrait">
                            <img id="myPhoto" class="img-circle image" src=<?php echo $user->img; ?>>
                            <div style="width: 100%;height: 10px;"></div>
                            <div class="file_button">
                                <label class="btn btn-default" style="width: 100px;height: 30px">修改头像
                                    <input type="file" name="portrait" id="portrait" class="icon_div" style="position:absolute;opacity:0;"/>
                                </label>
                            </div>
                        </div>
                        <form action="/index/Personal/update">
                            <div class="nickName">
                                <div class="text">Nickname</div>
                                <input name="nickName" type="text" class="form-control" value=<?php echo $user->nick_name; ?>>
                            </div>

                            <div class="nickName">
                                <div class="text">Signature</div>
                                <input name="signature" type="text" class="form-control" value="<?php echo $user->signature; ?>">
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
                        </form>
                        <div class="sex_radio">
                            <img id="bg" class="bg_photo" src=<?php echo $user->templete_img; ?>>
                            <div class="btn_photo">
                                <label class="btn btn-default" style="width: 100px;height: 30px;">修改背景
                                    <input type="file" name="bg_file" id="bg_file" class="icon_div"  style="position:absolute;opacity:0;"/>
                                </label>
                            </div>
                        </div>
                        <br>
                        <button id="personal" type="submit" class="btn btn-warning">提交</button>
                    </div>
                </div>
            </a>

            <a name="account">
                <div class="account">
                    <div class="title">Account Of Privacy</div>
                    <div class="form">
                        <form action="">
                            <br>
                            <div class="nickName">
                                <div class="text">Name</div>
                                <input type="text" class="form-control" value=<?php echo $user->real_name; ?>>
                            </div>

                            <div class="nickName">
                                <div class="text">E-mail</div>
                                <input type="email" class="form-control" value=<?php echo $user->email; ?>>
                            </div>

                            <div class="nickName">
                                <div class="text">ID Card</div>
                                <input type="text" class="form-control" value=<?php echo $user->id_number; ?>>
                            </div>

                            <div class="nickName">
                                <div class="text">Password</div>
                                <input type="password" class="form-control" value=<?php echo $user->password; ?>>
                            </div>
                            <br>
                            <button id="privacy" type="submit" class="btn btn-warning">提交</button>
                        </form>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){  //一定要有这个
        //获取上传的头像
        $("#portrait").on("change",function(){
            var formData = new FormData();
            formData.append('head', $(this).get(0).files[0]);
            console.log(formData);
            var option = {
                'data' : formData,
                'url' : '/index/Personal/saveHead'
            };
            if(formData){
                updataPicture(option);
            }
        }) ;

        //获取上传的背景图
        $("#bg_file").change(function(){
            var formData = new FormData();
            formData.append('photo', $(this).get(0).files[0]);
            console.log(formData);
            var option = {
                'data' : formData,
                'url' : '/index/Personal/saveBg'
            };
            if(formData){
                updataPicture(option);
            }
        });

        //上传个人数据
        $("#personal")
    });
</script>
</body>
<?php include("/common/html/footer.html"); ?>
</html>