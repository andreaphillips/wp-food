(function( $ ) {
	'use strict';

	jQuery(document).ready(function($) {
		
		// Function to toggle custom fields
		function toggle_custom_product_fields() {
			var productType = $('#product-type').val();
			
			// Hide/Show custom fields based on product type
			if (productType === 'prepaid_plan') {
				$('.show_if_prepaid_plan').show();
			} else {
				$('.show_if_prepaid_plan').hide();
			}
			
			// Add more conditions for other custom product types
		}
		
		// Run on page load
		toggle_custom_product_fields();
		
		$('body').on('woocommerce-product-type-change', function() {
			var productType = $('select#product-type').val();
			if (productType === 'prepaid_plan_2weeks') {
				// Show your 2-week plan custom fields here
			} else if (productType === 'prepaid_plan_4weeks') {
				// Show your 4-week plan custom fields here
			} else {
				// Hide your custom fields here
			}
		});
	});
})( jQuery );
