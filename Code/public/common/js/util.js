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
        type: 'post',
        data: data,
        success: function (data) {
            alert("成功");
            if (data.value == 1) {
                layer.msg(data.msg, {
                    icon: 1,
                    time: 1000
                }, function () {
                    parent.layer.close(index);
                })
            } else if (data.code == 500) {
                layer.msg(data.msg, {
                    icon: 2,
                    time: 1000
                }, function () {
                });
            }
        },
        error: function (data) {
            console.log(data);
        }
    })
}

function ajax(data, rsqUrl) {
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

