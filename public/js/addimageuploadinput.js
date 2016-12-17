var id = 1;
function createForm(){
	id++;
	var clone = document.getElementById('image-upload').cloneNode(false);
	document.getElementById('imageupload-container').appendChild(clone);
	clone.innerHTML = '<input name="image[]" type="file"><label for="imagedescription[]">Image description</label><input class="form-control" name="imagedescription[]" type="text" value="">';
}