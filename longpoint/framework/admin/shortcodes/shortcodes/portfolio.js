function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){		
	
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');
		 
		 var params = '';
		 if($('.shortcode-config #rch_show_filter').val() == '' ) 
			$('.shortcode-config #rch_show_filter').val('0');
		 $('.shortcode-config input.rch-input:not([name^="display"]), .shortcode-config select.rch-input').each(function(){		
			if($(this).val() != ''){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';
			}
		 });
		 $('.shortcode-config input.rch-input[name^="display"]').each(function(){		
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
			}
		 });
		
		 shortcode = '[' + shortcode_name + ' ' + params + ']';		
	});
	return shortcode;
}	
