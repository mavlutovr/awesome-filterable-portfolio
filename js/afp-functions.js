jQuery(document).ready(function($) {

	// get the action filter option item on page load
	var $filterType = $('#afp-filter li.afp-active-cat a').attr('class');

	// get and assign the afp-items element to the
	// $holder varible for use later
	var $holder = $('ul.afp-items');

	// clone all items within the pre-assigned $holder element
	var $data = $holder.clone(true, true);
	//console.log($data.find('.afp-item-details'));

	// attempt to call Quicksand when a filter option
	// item is clicked
	$('#afp-filter li a').click(function(e) {
		// reset the active class on all the buttons
		$('#afp-filter li').removeClass('afp-active-cat');

		// assign the class of the clicked filter option
		// element to our $filterType variable
		var $filterType = $(this).attr('data-value');
		$(this).parent().addClass('afp-active-cat');

		var $filteredData;

		if ($filterType == 'All') {
			// assign all li items to the $filteredData var when
			// the 'All' filter option is clicked
			$filteredData = $data.find('li[data-type]');
		}
		else {
			// find all li elements that have our required $filterType
			// values for the data-type element
			$filteredData = $data.find('li[data-type="' + $filterType + '"]');
		}

		// call quicksand and assign transition parameters
		$holder.quicksand($filteredData,
			{
				duration: window.afp_dur,
				easing:   window.afp_easing
			},
			function () {
				$holder.find(".colorbox").colorbox({
					transition: 'elastic',
					fadeOut:    250
				});
			});
		return false;
	});

	$holder.find(".colorbox").colorbox({
		transition: 'elastic',
		fadeOut: 250
	});

	$('.img-link-initial').adipoli({
		'startEffect' : window.afp_startFX,
		'hoverEffect' : window.afp_hoverFX
	});

  
});