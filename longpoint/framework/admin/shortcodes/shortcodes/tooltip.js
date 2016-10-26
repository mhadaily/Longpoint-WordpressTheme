function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){													
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');
		 		 
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]):not([name^="text"]), .shortcode-config select.rch-input, .shortcode-config textarea.rch-input').each(function(){		
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

jQuery(document).ready(function($){	 
	
	if($('.shortcode-config .cb-disable[data-id="popover"]').hasClass('selected')){
		$('.shortcode-config li.title').css('display', 'none');
		$('.shortcode-config li.link').css('display', 'block');
	}
	
	jQuery('.shortcode-config .cb-disable[data-id="popover"]').click(function(){
		$('.shortcode-config li.title').css('display', 'none');
		$('.shortcode-config li.link').css('display', 'block');		
	});
	
	jQuery('.shortcode-config .cb-enable[data-id="popover"]').click(function(){
		$('.shortcode-config li.title').css('display', 'block');
		$('.shortcode-config li.link').css('display', 'none');
	});				
});

