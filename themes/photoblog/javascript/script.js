jQuery.noConflict();

(function($) {
	jQuery(document).ready(function() {
	
		jQuery('a[rel=external], a.new-window').click(function () {
			window.open(jQuery(this).attr('href'));
			return false;
		});
		
	});
}(jQuery));
