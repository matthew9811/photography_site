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
            var data = body.find("form").serializeArray();
            var url = option.actionUrl;
            var type = 'post';
            ajax(data, url, type, index);
        }
    });
};
openBtn = function (url, title) {
    layer.open({
        type: 1,
        title: title,
        maxmin: true,
        area: ['800px', '500px'],
        content: [url],
        closeBtn: 1,
        yes: function (index, layero) {
            //do something
            layer.close(index); //如果设定了yes回调，需进行手工关闭
        },
        cancel: function () {
            layer.open({
                type: 1
                ,
                title: false //不显示标题栏
                ,
                closeBtn: false
                ,
                area: '300px;'
                ,
                shade: 0.8
                ,
                id: 'LAY_layuipro' //设定一个id，防止重复弹出
                ,
                btn: ['是的关闭它', '我再考虑一下']
                ,
                yes: function () {
                    layer.closeAll();
                }
                ,
                btnAlign: 'c'
                ,
                moveType: 1 //拖拽模式，0或者1
                ,
                content: '<div style="padding: 50px;line-height: 22px;background-color: #393D49; color: #fff; font-weight: 300;text-align:center;font-size:20px;">确定关闭吗~!</div>'

            });

            return false;
        },
        end: function () {
            layer.closeAll();
            location.reload();
        }
    });
};

function ajax(data, url, type, index) {
    $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: 'json',
        success: function (data) {

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
            alert("1234");
            console.log(data);

        }
    })
}
