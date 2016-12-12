(function(){
	var scrollPos   = getCookie('scrollPosition');
    var url         = window.location.href.split('?')[0];

    if(url == getCookie('prevPageUrl'))
    {
        scrollTo(0, scrollPos);
    }

})();

function savePos() {
	document.cookie = 'scrollPosition=' + window.pageYOffset;
    document.cookie = 'prevPageUrl=' + window.location.href.split('?')[0];
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

function scroll(element, to, duration) {
    if (duration <= 0) return;
    var difference = to - element.scrollTop;
    var perTick = difference / duration * 10;

    setTimeout(function() {
        element.scrollTop = element.scrollTop + perTick;
        if (element.scrollTop === to) return;
        scrollTo(element, to, duration - 10);
    }, 10);
}