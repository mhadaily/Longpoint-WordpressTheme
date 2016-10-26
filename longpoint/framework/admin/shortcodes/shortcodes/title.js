function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){													
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');
		 
		 if($('#font_size').val() == 24) $('#font_size').val(0);
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]):not([name^="title"]), .shortcode-config select.rch-input').each(function(){		
			if(($(this).closest('li').attr('style') != 'display: none;') && ($(this).val() != '') && ($(this).val() != '0')){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';
			}
		 });
		 $('.shortcode-config input.rch-input[name^="display"]').each(function(){		
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
			}
		 });	
		 var title = $('.shortcode-config input.rch-input[name^="title"]').val();
		 shortcode = '[' + shortcode_name + ' ' + params + ']' + title + '[/' + shortcode_name + ']';			
	});	
	return shortcode;
}	

jQuery(document).ready(function($){	 
	
	if($('.shortcode-config .cb-enable[data-id="spinning"]').hasClass('selected')){
		$('.shortcode-config li.rotation').css('display', 'none');
	}
	
	jQuery('.shortcode-config .cb-disable[data-id="spinning"]').click(function(){
		$('.shortcode-config li.rotation').css('display', 'block');		
	});
	
	jQuery('.shortcode-config .cb-enable[data-id="spinning"]').click(function(){
		$('.shortcode-config li.rotation').css('display', 'none');
	});			
	
	if($('.shortcode-config .cb-disable[data-id="pattern"]').hasClass('selected')){
		$('.shortcode-config li.pattern_color').css('display', 'none');
	}
	
	jQuery('.shortcode-config .cb-disable[data-id="pattern"]').click(function(){
		$('.shortcode-config li.pattern_color').css('display', 'none');		
	});
	
	jQuery('.shortcode-config .cb-enable[data-id="pattern"]').click(function(){
		$('.shortcode-config li.pattern_color').css('display', 'block');
	});				
});

