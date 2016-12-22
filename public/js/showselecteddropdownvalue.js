(function(){
	var displaySelectedValueField 	= document.getElementById('dropdownMenu1');
	var sortBy 						= getParameterByName('sort');
	var selectedSortFunction		= document.getElementById('selectedSortFunction');

	switch(sortBy)
	{
		case 'price_asc': 	sortByOutput = 'Price: low to high';
			break;
		case 'price_desc': 	sortByOutput = 'Price: high to low';
			break;
		case 'oldest': 		sortByOutput = 'Oldest';
			break;
		case 'latest': 		sortByOutput = 'Latest';
			break;
		default: 			sortByOutput = 'Relevance';
							sortBy 		 = 'relevance';
	}

	selectedSortFunction.value 			= sortBy;
	displaySelectedValueField.innerHTML = 'Sort by ' + sortByOutput + ' <span class="caret"></span>';
})();

// http://stackoverflow.com/questions/901115/how-can-i-get-query-string-values-in-javascript
function getParameterByName(name, url) {
    if (!url) {
      url = window.location.href;
    }

    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);

    if (!results) return null;
    if (!results[2]) return '';

    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function toggleFilter()
{
	var productFilter = document.getElementById('productFilter');
	productFilter.classList.toggle('hide');
}