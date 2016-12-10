function closeCookieWindow() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == XMLHttpRequest.DONE ) {
        	var element = document.getElementsByClassName('cookie-overlay');
			element[0].className += ' cookie-close';
        }
    };
    console.log('Ajax sent');
    xmlhttp.open("GET", "/setcookie", true);
    xmlhttp.send();
}