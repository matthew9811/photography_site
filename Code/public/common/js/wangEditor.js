function make_editor(id,id2) {
    var E = window.wangEditor;
    var editor = new E(id);
// 下面两个配置，使用其中一个即可显示“上传图片”的tab。但是两者不要同时使用！！！
    editor.customConfig.uploadImgShowBase64 = true;   // 使用 base64 保存图片
// 配置服务器端地址 其中/upload是上传图片的服务器端接口
//editor.customConfig.uploadImgServer = '/upload';  // 上传图片到服务器
    editor.create();
    var content;
    $(id2).click(function () {
        content = editor.txt.html();
        ajax({'content': content}, "/index/Blog/saveBlog");
    })
}
