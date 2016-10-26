function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){													
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');
		 		 
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]):not([name^="item"]), .shortcode-config select.rch-input').each(function(){		
			if(($(this).closest('li').attr('style') != 'display: none;') && ($(this).val() != '') && ($(this).val() != '0')){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';
			}
		 });
		 $('.shortcode-config input.rch-input[name^="display"]').each(function(){		
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
			}
		 });
		
		var list = "<ul>"
		 $('.shortcode-config input.rch-input[name^="item"]').each(function(){	
			if($(this).val() != ''){
				list = list + "<li>" + $(this).val()+ " </li>";		
			}
		 });
		list = list + "</ul>";		 
		 shortcode = '[' + shortcode_name + ' ' + params + ']' + list + '[/' + shortcode_name + ']';			
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
	
	if($('.shortcode-config .cb-enable[data-id="circle"]').hasClass('selected')){
		$('.shortcode-config li.bordercolor, .shortcode-config li.bordersize').css('display', 'none');
	}
	
	jQuery('.shortcode-config .cb-disable[data-id="circle"]').click(function(){
		$('.shortcode-config li.bordercolor, .shortcode-config li.bordersize').css('display', 'block');		
	});
	
	jQuery('.shortcode-config .cb-enable[data-id="circle"]').click(function(){
		$('.shortcode-config li.bordercolor, .shortcode-config li.bordersize').css('display', 'none');
	});
});

