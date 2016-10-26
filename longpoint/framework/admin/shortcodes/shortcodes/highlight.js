function generation_shortcode(){
	//prepare shortcode variable
	var shortcode = '';	
	jQuery(function($){													
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');
		 
		 if($('.shortcode-config #font_size').val() == 14) $('.shortcode-config #font_size').val(0);
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]):not([name^="text"]), .shortcode-config select.rch-input').each(function(){		
			if(($(this).closest('li').attr('style') != 'display: none;') && ($(this).val() != '') && ($(this).val() != '0')){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';
			}
		 });
		 $('.shortcode-config input.rch-input[name^="display"]').each(function(){		
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
			}
		 });	
		 var text = $('.shortcode-config input.rch-input[name^="text"]').val();
		 shortcode = '[' + shortcode_name + ' ' + params + ']' + text + '[/' + shortcode_name + ']';			
	});	
	return shortcode;
}	


