(function(){
	if(document.getElementById('dropdownMenu1'))
	{
		var displaySelectedValueField 	= document.getElementById('dropdownMenu1');
		var sortBy 						= getParameterByName('sort');
		var selectedSortFunction		= document.getElementById('selectedSortFunction');
		var values						= document.getElementsByClassName('filter-dropdown-value');
		var valuesArray					= [];

		for (var i = 0; i < values.length; i++) {
			valuesArray.push(values[i].text);
		}

		switch(sortBy)
		{
			case 'price_asc': 	sortByOutput = valuesArray[1];
				break;
			case 'price_desc': 	sortByOutput = valuesArray[2];
				break;
			case 'latest': 		sortByOutput = valuesArray[3];
				break;
			case 'oldest': 		sortByOutput = valuesArray[4];
				break;
			default: 			sortByOutput = valuesArray[0];
								sortBy 		 = 'relevance';
		}

		selectedSortFunction.value 			= sortBy;
		displaySelectedValueField.innerHTML = sortByOutput + ' <span class="caret"></span>';
	}
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