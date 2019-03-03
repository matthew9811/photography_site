open = function (option) {
    layer.open({
        type: 2,
        title: option.title,
        maxmin: true,
        shadeClose: true, //点击遮罩关闭层
        area: ['550px', '450px'],
        content: [option.url],
        btn: 'Submit',
        yes: function (index, layero) {
            var body = layer.getChildFrame('body', index);
// var iframeWin = window[layero.find('iframe')[0]['name']]; //得到iframe页的窗口对象，执行iframe页的方法：iframeWin.method();
            var data = body.find('form').serialize();
            var url = option.actionUrl;
            var type = 'post';
            ajax(data, url, type, index);
        }
    });
};

function ajax(data, rsqUrl, type, index) {
    $.ajax({
        url: rsqUrl,
        type: type,
        data: data,
        success: function (data) {
            layer.closeAll(index);
            if (data) {
                alert("success");
                window.location.href = data;
            }
        },
        error: function (data) {
            console.log(data);
        }
    })
}

function ajaxOfPost(data, rsqUrl) {
    $.ajax({
        url: rsqUrl,
        type: 'post',
        data: data,
        success: function (datas) {
            // window.location.href = data;
            $.post(datas.url, datas);
            return;

        },
        error: function (data) {
            console.log(data.status);
        }
    })
}

/**
 * 获取上传的文件，获取预览的路径即url
 * @param file
 * @returns {*}
 */
function getObjectURL(file) {
    var url = null;
    if (window.createObjectURL != undefined) {
        url = window.createObjectURL(file);
    } else if (window.URL != undefined) { // mozilla(firefox)
        url = window.URL.createObjectURL(file);
    } else if (window.webkitURL != undefined) { // webkit or chrome
        url = window.webkitURL.createObjectURL(file);
    }
    return url;
}

/**
 * 上传图片到photo表
 * @param option
 */
function updataPhoto(option) {
    $.ajax({
        url: option.url,
        type: 'post',
        data: option.data,
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        success: function (data) {
            alert("success");
            // alert(data.status);
        },
        error: function (data) {
            alert("error");
            alert(data.status);
        }
    })
}


/**
 * 修改个人信息——头像和背景图
 * @param option
 */
function updataPicture(option) {
    $.ajax({
        url: option.url,
        type: 'post',
        data: option.data,
        dataType: 'json',
        contentType: false,
        processData: false,
        cache: false,
        success: function () {
            alert("success");
            window.location.reload();
        },
        error: function () {
            alert("error");
        }
    })
}