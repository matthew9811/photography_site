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
            if (data == "success") {
                alert("操作成功");
                var nickName = "{:session('nickName')}";
                if(nickName) {
                    window.location.href = "/index/index/toHome";
                    return;
                }
                else{
                    alert("1111");
                    window.location.href = "/index/index/Content";
                    return;
                }
            } else if (data == "error") {
                alert("操作失败");
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
        success: function (data) {
            console.log(data.status);
            alert("成功");
        },
        error: function (data) {
            console.log(data);
        }
    })
}

function login(data) {

}

function register() {

}


