var containers 	= document.getElementsByClassName('color');
var hexvalues	= document.getElementsByClassName('hexval');

for (var i = hexvalues.length - 1; i >= 0; i--) {
	containers[i].style.backgroundColor = hexvalues[i].value;
}