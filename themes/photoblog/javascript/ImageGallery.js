var ImageGallery = {

	limit: 10,
	loader: null,
	loading: false,
	start: 0,

	init: function () {
		var thisObj = this;
		this.loader = jQuery('.loading')[0];
		this.getImages();
		
		jQuery(window).scroll(function (e) {
			if (thisObj.loading !== true && (jQuery(document).scrollTop() + jQuery(document).height()) > jQuery('div.gallery-image:last-of-type').offset().top) {
				thisObj.loading = true;
				thisObj.showLoader();
				thisObj.getImages();
			}
		});
	},
	
	getImages: function () {
		var thisObj = this;
		
		jQuery.ajax({
			url: '/photo-stream/renderImages/' + '?start=' + this.start + '&limit=' + this.limit
		}).complete(function (response) {
			thisObj.hideLoader();
			thisObj.loading = false;
			thisObj.start = thisObj.start + thisObj.limit;
			
			var html = jQuery('#Images').html();
			jQuery('#Images').append(response.responseText);
			
			if (response.responseText == '') {
				thisObj.hideLoader();
				thisObj.loading = true;	
			}
		});
	},
	
	hideLoader: function () {
		jQuery(this.loader).addClass('hidden');
	},
	
	showLoader: function () {
		jQuery(this.loader).removeClass('hidden');
	}

};