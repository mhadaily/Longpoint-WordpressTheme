function generation_shortcode(){
	//prepare shortcode variable
	var shortcode = '';	
	jQuery(function($){													
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');
		 		 
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]):not([name^="item"]):not([name^="active"]),.shortcode-config select.rch-input').each(function(){		
			if(($(this).closest('li').attr('style') != 'display: none;') && ($(this).val() != '') && ($(this).val() != '0')){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';
			}
		 });
		 $('.shortcode-config li.display input.rch-input[name^="display"]').each(function(){		
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
			}
		 });
		var activetab =  $('.shortcode-config input.rch-input[name^="active"]').val();
		var tabs = "";
		var display = "";		
		var i = 1;
		 $('.shortcode-config #sortable li.item').each(function(){
			$(this).find('input.rch-input[name^="display"]').each(function(){		
				if($(this).val() != 1){
					display = display + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
				}
			 });			
			tabs = tabs + '[toggle title="' + $(this).find('input.rch-input[name="item"]').val()+ '"' + (activetab == i ? ' active="1"' : '') + ' ' + display + ']' + $(this).find('textarea.rch-input').val()+ '[/toggle]';									
			display = "";
			i++;
		 });				 		
		 shortcode = '[' + shortcode_name + ' ' + params + ']' + tabs + '[/' + shortcode_name + ']';
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
		
});


