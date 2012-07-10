		jQuery(function () {
			var tabContainers = jQuery('#tf-tabs > div');
			tabContainers.hide().filter(':first').show();
			
			jQuery('#tf-tabs ul.tf-tabs-nav a').click(function () {
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				jQuery('#tf-tabs ul.tf-tabs-nav a').removeClass('selected');
				jQuery(this).addClass('selected');
				return false;
			}).filter(':first').click();
		});
		
jQuery(document).ready(function() {
		
});
