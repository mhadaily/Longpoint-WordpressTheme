function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){		
	
		var shortcode_name = $('.shortcode-config #rch_column').val();
		 
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]),.shortcode-config select[name!="column"].rch-input').each(function(){
			if($(this).val() != ''){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';	
			}
		 });
		 $('.shortcode-config input.rch-input[name^="display"]').each(function(){					
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';				
			}
		 });
		 var contents = '';
		 $('.shortcode-config textarea.rch-input').each(function(){
			if($(this).val() != ''){
				contents = contents + " " + $(this).val();
			}
		 });
		 shortcode = '[' + shortcode_name + ' ' + params + ']' + contents + '[/' + shortcode_name + ']';		
	});
	return shortcode;
}	
