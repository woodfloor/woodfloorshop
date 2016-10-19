$(function() {

	// Custom Category Filter
	$("#addon_cat_subset").on("change",function(){
		var location = document.URL.replace(/&?page=[0-9]/,"");
		location = location.replace('#productaddons', "");
		location = location.replace(/&?addon_cat_id=([^&]$|[^&]*)/i, "");
		location = location+"&addon_cat_id="+$(this).val()+"#productaddons";
		window.location.replace(location);
	});

	// Set all form options to disabled
	$("input[type='text'][name^='addon_price']").prop('disabled', true);
	$("input[type='checkbox'][name^='addon_dynamic_price']").prop('disabled', true);
	
	// Fire when we select a new item
	$("input[type='checkbox'][name^='addon_product']").click(function(){
	
		// Enable the items
		var addon_price = "#addon_price_"+$(this).val();
		var addon_product = "#addon_product_"+$(this).val();
		var dynamic_addon_price = "#addon_dynamic_price_"+$(this).val();
		
		// Enable/Disable
		if($(addon_product).is(':checked')){
			$(addon_price).prop('disabled', false);
			$(dynamic_addon_price).prop('disabled', false);
		}else{
			$(addon_price).prop('disabled', true);
			$(dynamic_addon_price).prop('disabled', true);
		}
	});

});