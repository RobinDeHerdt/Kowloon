var id 		= 1;
var colorId = 0;

if(document.getElementById('colorCount'))
{
	colorId = document.getElementById('colorCount').value;
}

function createForm(){
	id++;
	var clone = document.getElementById('image-upload').cloneNode(false);
	document.getElementById('imageupload-container').appendChild(clone);
	clone.innerHTML = '<input name="image[]" type="file"><label for="imagedescription[]">Image description</label><input class="form-control" name="imagedescription[]" type="text" value="">';
}

function createColor() {
	colorId++;

	var colorContainer = document.getElementById('colorPicker');
	var createdElement = document.createElement('div');

	createdElement.innerHTML = '<input type="color" name="colors[]" value="#ff0000"><button type="button" id="deleteColor' + colorId + '" onclick="deleteColor(this);">Remove</button>';
	createdElement.className += " colorContainer";
	createdElement.setAttribute('id', 'colorId' + colorId);
	colorContainer.appendChild(createdElement);
}

function deleteColor(element) {
	var id = element.id.replace(element.id.substring(0,11), '');

	document.getElementById('colorId'+id).remove();
}