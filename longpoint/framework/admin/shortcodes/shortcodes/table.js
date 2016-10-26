function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){		
	
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');
		 var rows = $('.shortcode-config #row').val();
		 var columns = $('.shortcode-config #column').val();
		 $('.shortcode-config #rch_row').val('');
		 $('.shortcode-config #rch_column').val('');
		 if($('.shortcode-config #rch_hover').val() == 1) $('.shortcode-config #rch_hover').val('');
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]), .shortcode-config select.rch-input').each(function(){		
			if(($(this).closest('li').attr('style') != 'display: none;') && ($(this).val() != '')){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';
			}
		 });
		 $('.shortcode-config input.rch-input[name^="display"]').each(function(){		
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
			}
		 });
		 var contents = '<table><thead><tr>';
		 for(var i=0;i<columns;i++) {
			contents += '<th>Column ' + (i + 1) + '</th>';
		}		
		 contents += '</tr></thead><tbody>';	
		 var z = 0
		 for(var i=0;i<rows;i++) {
			contents += '<tr>';	
			 for(var j=0;j<columns;j++) {
				contents += '<td>Item #' + (z + 1) + '</td>';z++;
			 }	
			contents += '</tr>';	
		}					         
		 contents += '</tbody></table>';		 		
		 shortcode = '[' + shortcode_name + ' ' + params + ']' + contents + '[/' + shortcode_name + ']';		
	});
	return shortcode;
}	
jQuery(function($){	
	//switch button	
	jQuery(".shortcode-config .cb-disable").click(function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-enable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.checkbox',parent).val('0');
		
		//fold/unfold related options
		var obj = jQuery(this);
		var $fold = '.f_'+obj.data('id');
		jQuery($fold).slideUp('normal', "swing");
	});
});