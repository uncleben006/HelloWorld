/*首頁*/
/*大富翁圖片按鈕-店家地圖*/
function mouseOver1() {
    document.getElementById('a1').src = "jomor_html/img/button00.png"
}

function mouseOut1() {
    document.getElementById('a1').src = "jomor_html/img/button01.png"
}
/*大富翁圖片按鈕-我要揪團*/
function mouseOver2() {
    document.getElementById('a2').src = "jomor_html/img/button03.png"
}

function mouseOut2() {
    document.getElementById('a2').src = "jomor_html/img/button02.png"
}
/*大富翁圖片按鈕-桌遊專欄*/
function mouseOver3() {
    document.getElementById('a3').src = "jomor_html/img/button05.png"
}

function mouseOut3() {
    document.getElementById('a3').src = "jomor_html/img/button04.png"
}
/*大富翁圖片按鈕-我要討論*/
function mouseOver4() {
    document.getElementById('a4').src = "jomor_html/img/button07.png"
}

function mouseOut4() {
    document.getElementById('a4').src = "jomor_html/img/button06.png"
}
/*店家列表*/
function opendiv(divID) {
    //根據傳遞的參數確定顯示的層
    divID.style.display = 'block';
    divID.style.left = (document.body.clientWidth - 240) / 2;
    divID.style.top = (document.body.clientHeight - 139) / 2;
}
/*店家列表三角形變色按鍵*/
/*變色按鍵01*/
function store_mouseOver1() {
    document.getElementById('store_triangle_id01').src = "jomor_html/img/store_triangle2.png"
}

function store_mouseOut1() {
    document.getElementById('store_triangle_id01').src = "jomor_html/img/store_triangle.png"
}
/*變色按鍵02*/
function store_mouseOver2() {
    document.getElementById('store_triangle_id02').src = "jomor_html/img/store_triangle2.png"
}

function store_mouseOut2() {
    document.getElementById('store_triangle_id02').src = "jomor_html/img/store_triangle.png"
}
/*變色按鍵03*/
function store_mouseOver3() {
    document.getElementById('store_triangle_id03').src = "jomor_html/img/store_triangle2.png"
}

function store_mouseOut3() {
    document.getElementById('store_triangle_id03').src = "jomor_html/img/store_triangle.png"
}
/*變色按鍵04*/
function store_mouseOver4() {
    document.getElementById('store_triangle_id04').src = "jomor_html/img/store_triangle2.png"
}

function store_mouseOut4() {
    document.getElementById('store_triangle_id04').src = "jomor_html/img/store_triangle.png"
}
/*變色按鍵05*/
function store_mouseOver5() {
    document.getElementById('store_triangle_id05').src = "jomor_html/img/store_triangle2.png"
}

function store_mouseOut5() {
    document.getElementById('store_triangle_id05').src = "jomor_html/img/store_triangle.png"
}
/*變色按鍵06*/
function store_mouseOver6() {
    document.getElementById('store_triangle_id06').src = "jomor_html/img/store_triangle2.png"
}

function store_mouseOut6() {
    document.getElementById('store_triangle_id06').src = "jomor_html/img/store_triangle.png"
}
/*揪團創建房間div*/
function openroom(divID) {
    //根據傳遞的參數確定顯示的層
    divID.style.display = 'block';
    divID.style.left = (document.body.clientWidth - 240) / 2;
    divID.style.top = (document.body.clientHeight - 139) / 2;
}
/*測試測試頁籤功能*/
$(function() {
    // 預設顯示第一個 Tab
    var _showTab = 0;
    var $defaultLi = $('ul.tabs_ul li').eq(_showTab).addClass('active');
    $($defaultLi.find('a').attr('href')).siblings().hide();

    // 當 li 頁籤被點擊時...
    // 若要改成滑鼠移到 li 頁籤就切 換時, 把 click 改成 mouseover
    $('ul.tabs_ul li').click(function() {
        // 找出 li 中的超連結 href(#id)
        var $this = $(this),
            _clickTab = $this.find('a').attr('href');
        // 把目前點擊到的 li 頁籤加上 .active
        // 並把兄弟元素中有 .active 的都移除 class
        $this.addClass('active').siblings('.active').removeClass('active');
        // 淡入相對應的內容並隱藏兄弟元素
        $(_clickTab).stop(false, true).fadeIn().siblings().hide();

        return false;
    }).find('a').focus(function() {
        this.blur();
    });
});
/*揪團觸發瀏覽房間所跳出的房間div*/
function openviewroom(divID) {
    //根據傳遞的參數確定顯示的層
    divID.style.display = 'block';
    divID.style.left = (document.body.clientWidth - 240) / 2;
    divID.style.top = (document.body.clientHeight - 139) / 2;
}
/*房間內的”加入“按鈕所跳出的"確定加入嗎？“div*/
function openjoin(divID) {
    //根據傳遞的參數確定顯示的層
    divID.style.visibility = 'visible';
    divID.style.left = (document.body.clientWidth - 240) / 2;
    divID.style.top = (document.body.clientHeight - 139) / 2;
}
/*確定加入房間嗎？視窗裡的“確定”鍵按下後出現的“成功加入”視窗“div*/
function jo_sure(divID) {
    sure.style.visibility = 'hidden';
    //根據傳遞的參數確定顯示的層
    divID.style.visibility = 'visible';
    divID.style.left = (document.body.clientWidth - 240) / 2;
    divID.style.top = (document.body.clientHeight - 139) / 2;
}


/*login登入頁面的臉書圖案變色*/
function login_fb_Over() {
    document.getElementById('fb_img01').src = "../../jomor_html/img/login_fb2.png"
}

function login_fb_Out() {
    document.getElementById('fb_img01').src = "../../jomor_html/img/login_fb.png"
}
/*首頁的頭貼選單div*/
function openNav() {
    var x = document.getElementById('nav');
    if (x.style.visibility === 'hidden') {
        x.style.visibility = 'visible';
    } else {
        x.style.visibility = 'hidden';
    }
}
/*註冊頁面的「上傳」button變色*/
function pic1() {
    document.getElementById('pic').style.backgroundImage = "url('../../jomor_html/img/upload_button_02.png')";
}

function pic2() {
    document.getElementById('pic').style.backgroundImage = "url('../../jomor_html/img/upload_button_01.png')";
}

/*揪團頁面裡，瀏覽房間中對成員的「查看與踢除」功能，selection的hidden與show*/
function selectShow(x) {
    x.select.option.style.visibility = 'hidden';
    if (x.style.visibility === 'hidden') {
        x.style.visibility = 'visible';
    } else {
        x.style.visibility = 'hidden';
    }
}
/*首頁的頭貼選單div*/
function opennav(divID) {
    //根據傳遞的參數確定顯示的層
    divID.style.display = 'block';
    divID.style.left = (document.body.clientWidth - 240) / 2;
    divID.style.top = (document.body.clientHeight - 139) / 2;
}
/*首頁的通知欄跳出div*/
function opennotify(divID) {
    if (divID.style.visibility == 'hidden') {
        //根據傳遞的參數確定顯示的層
        divID.style.visibility = 'visible';
        divID.style.left = (document.body.clientWidth - 240) / 2;
        divID.style.top = (document.body.clientHeight - 139) / 2;
    } else {
        divID.style.visibility = 'hidden';
        divID.style.left = (document.body.clientWidth - 240) / 2;
        divID.style.top = (document.body.clientHeight - 139) / 2;
    }
}

function openNotify() {
    var x = document.getElementById('notify');
    if (x.style.visibility === 'hidden') {
        x.style.visibility = 'visible';
    } else {
        x.style.visibility = 'hidden';
    }
}
/*店家列表的地區選單div*/
function openlocal(divID) {
    if (divID.style.visibility == 'hidden') {
        //根據傳遞的參數確定顯示的層
        divID.style.visibility = 'visible';
        divID.style.left = (document.body.clientWidth - 240) / 2;
        divID.style.top = (document.body.clientHeight - 139) / 2;
    } else {
        divID.style.visibility = 'hidden';
        divID.style.left = (document.body.clientWidth - 240) / 2;
        divID.style.top = (document.body.clientHeight - 139) / 2;
    }
}
