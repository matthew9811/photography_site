function make_editor(id, id2, url) {
    var E = window.wangEditor;
    var editor = new E(id);
// 下面两个配置，使用其中一个即可显示“上传图片”的tab。但是两者不要同时使用！！！
    editor.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
// 配置服务器端地址 其中/upload是上传图片的服务器端接口
//editor.customConfig.uploadImgServer = '/upload';  // 上传图片到服务器
    editor.create();
    var content;
    var title = null;
    // $("#btn").on("click", function () {
    //     title = $("input[name='title']").val();
    // });
    $(id2).click(function () {
        content = editor.txt.html();
        title = $("input[name='title']").val();
        ajaxOfPost({
            'content': content,
            'title': title
        }, url);
    })
}
function postTheCourse(id, id2, url,id3) {
    var E = window.wangEditor;
    var editor = new E(id);
    editor.customConfig.uploadImgShowBase64 = true;
    editor.create();
    var content;
    var title = null;
    var obj = null;
    $(id2).click(function () {
        content = editor.txt.html();
        title = $("input[name='title']").val();
        obj = document.getElementsByName(id3);
        for(var i = 0; i < obj.length; i ++){
            if(obj[i].checked){
                var label = obj[i].value;
            }
        }
        console.log(label);
        ajaxOfPost({
            'content': content,
            'title': title,
            'label' : label
        }, url);
    })
}
