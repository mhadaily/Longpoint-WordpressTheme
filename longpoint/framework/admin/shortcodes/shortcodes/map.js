function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){		
	
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');		 
		 var params, width = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]):not([name^="width"]), .shortcode-config select.rch-input').each(function(){		
			if($(this).val() != ''){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';
			}
		 });
		 $('.shortcode-config input.rch-input[name^="display"]').each(function(){		
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
			}
		 });
		 
		 if($('.shortcode-config input[name=width_unit]').val() == 1){
			width = ' width_unit="%" width="' + $('.shortcode-config input[name=width_in_percent]').val() + '"';
		 }else{
			width = ' width_unit="px" width="' + $('.shortcode-config input[name=width_in_pixel]').val() + '"';
		 }
		 shortcode = '[' + shortcode_name + ' ' + params + width + ']';		
	});
	return shortcode;
}	

jQuery(document).ready(function($){	 
	
	if($('.shortcode-config .cb-enable[data-id="width_unit"]').hasClass('selected')){
		$('.shortcode-config li.width_in_percent').css('display', 'block');
		$('.shortcode-config li.width_in_pixel').css('display', 'none');
	}
	
	jQuery('.shortcode-config .cb-disable[data-id="width_unit"]').click(function(){
		$('.shortcode-config li.width_in_percent').css('display', 'none');
		$('.shortcode-config li.width_in_pixel').css('display', 'block');	
	});
	
	jQuery('.shortcode-config .cb-enable[data-id="width_unit"]').click(function(){
		$('.shortcode-config li.width_in_percent').css('display', 'block');
		$('.shortcode-config li.width_in_pixel').css('display', 'none');
	});		
	
});