function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){		
	
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');
		 
		 if($('.shortcode-config #padding_vertical').val() == 10) $('.shortcode-config #padding_vertical').val(0);
		 if($('.shortcode-config #padding_horizental').val() == 10) $('.shortcode-config #padding_horizental').val(0);
		 if($('.shortcode-config #min_height').val() == 100) $('.shortcode-config #min_height').val(0);
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]), .shortcode-config select.rch-input').each(function(){		
			if(($(this).closest('li').attr('style') != 'display: none;') && ($(this).val() != '') && ($(this).val() != '0')){
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
		 shortcode = '[' + shortcode_name + ' ' + params + ']';		
	});
	return shortcode;
}	


jQuery(document).ready(function($){	 

	$('.shortcode-config li.border_size, .shortcode-config li.border_color').css('display', 'none');		
	$(".shortcode-config #rch_frame").change(function(){
		
		if($(this).val() == 'border'){
			$('.shortcode-config li.border_size,.shortcode-config li.border_color').css('display', 'block');	
		}else{
			$('.shortcode-config li.border_size, .shortcode-config li.border_color').css('display', 'none');	
		}
	});	
	
});

