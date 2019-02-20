open = function (url, title) {
    layer.open({
        type: 2,
        title: title,
        maxmin: true,
        shadeClose: true, //点击遮罩关闭层
        area: ['550px', '450px'],
        content: [url]
    });
};
openBtn = function (url, title) {
    layer.open({
        type: 1,
        title: title,
        maxmin: true,
        area: ['800px', '500px'],
        content: [url],
        yes: function (index, layero) {
            //do something
            layer.close(index); //如果设定了yes回调，需进行手工关闭
        }
    });
};