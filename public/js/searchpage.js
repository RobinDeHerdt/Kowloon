function toggleFilter()
{
	var productFilter = document.getElementById('productFilter');
	productFilter.classList.toggle('hide');
}

function keyPress(e)
{
	var searchfield = document.getElementsByClassName('search-field')[0];
	if(e.keyCode === 13)
	{
		var form = document.getElementById('search_form');
		form.submit();
	}
}