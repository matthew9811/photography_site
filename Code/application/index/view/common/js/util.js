document.write("<script language=javascript src='/Code/public/static/jquery.js'></script>");
function interposition() {
    //引入导航栏bar.html
    $(".headerpage").load("../common/html/bar.html");
    //引入脚部的固定部分
    $(".footerpage").load("../common/html/footer.html");
}
