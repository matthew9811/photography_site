open = function (url, title) {
    layer.open({
        type: 2,
        title: title,
        maxmin: true,
        area: ['800px', '500px'],
        content: url,
        end: function () {
            layer.tips('Hi', '#about', {tips: 1})
        }
    });
}