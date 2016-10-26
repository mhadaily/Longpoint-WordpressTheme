function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){						
	
		var shortcode_name = $('.shortcode-config #rch_type').val();
		 
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]), .shortcode-config select[name!="type"].rch-input').each(function(){		
			if(($(this).closest('li').attr('style') != 'display: none;') && ($(this).val() != '')){
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

jQuery(document).ready(function($){	 
    $('.shortcode-config li.text, .shortcode-config li.align, .shortcode-config li.h, .shortcode-config li.animation, .shortcode-config li.icon').css('display', 'none');		
	$("#rch_type").change(function(){
		switch($(this).val()){
			case 'br':				
				$('.shortcode-config li.text, .shortcode-config li.align, .shortcode-config li.animation, .shortcode-config li.h, .shortcode-config li.display, .shortcode-config li.class, .shortcode-config li.style, .shortcode-config li.icon').css('display', 'none');
			break;
			case 'gap':
				$('.shortcode-config li.h, .shortcode-config li.display, .shortcode-config li.class, .shortcode-config li.style').css('display', 'block');	
				$('.shortcode-config li.text, .shortcode-config li.align, .shortcode-config li.animation, .shortcode-config li.icon').css('display', 'none');
			break;
			case 'divider':	
				$('.shortcode-config li.display, .shortcode-config li.class, .shortcode-config li.style').css('display', 'block');	
				$('.shortcode-config li.text, .shortcode-config li.align, .shortcode-config li.h, .shortcode-config li.animation, .shortcode-config li.icon').css('display', 'none');
			break;
			case 'divider_text':
			case 'double_divider_text':
				$('.shortcode-config li.text, .shortcode-config li.align, .shortcode-config li.animation, .shortcode-config li.display, .shortcode-config li.class, .shortcode-config li.style,.shortcode-config li.icon').css('display', 'block');	
				$('.shortcode-config li.h').css('display', 'none');
			break;
			default:
				$('.shortcode-config li.animation, .shortcode-config li.display, .shortcode-config li.class, .shortcode-config li.style').css('display', 'block');	
				$('.shortcode-config li.text, .shortcode-config li.align, .shortcode-config li.h, .shortcode-config li.icon').css('display', 'none');	
		}
	});		
});

