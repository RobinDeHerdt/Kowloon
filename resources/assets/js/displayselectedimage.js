(function() {
	if(document.getElementsByClassName('details-img-container'))
	{
		var imageContainers = getImageContainers();
		changeStyles(0, imageContainers);
	}
})();

function getImageContainers() {
	return document.getElementsByClassName('details-img-container');
}

function selectImage(selectedElement) {
		var imageContainers = getImageContainers();
		document.getElementById('selected-image').src = selectedElement.src;
		changeStyles(selectedElement.id, imageContainers);
}

function changeStyles(id, imageContainers) {
	for (var i = imageContainers.length - 1; i >= 0; i--) {
		if(i != id)
		{
			imageContainers[i].style.opacity = 0.5;
			imageContainers[i].style.border = 'none';
		}
		else 
		{
			imageContainers[i].style.border = '2px solid white';
			imageContainers[i].style.opacity = 1;
		}
	}
}