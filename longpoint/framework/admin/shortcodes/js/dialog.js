jQuery(document).ready(function($){	 			
	//go to config page
	$('.list-icon').live('click',function() {
		$("#TB_window").remove();
		$("body").append("<div id='TB_window'></div>");					
		tb_show('RCH Shortcodes', ajaxurl + '?action=rchshortcodes_tinymce&page=config&shortcode=' + $(this).attr('data-shortcode') + '&width=670');		
		return false;
	});
	
	//back button
	$('#cancel').live("click",function() {	
		$("#TB_window").remove();
		$("body").append("<div id='TB_window'></div>");		
		tb_show('RCH Shortcodes', ajaxurl + '?action=rchshortcodes_tinymce&page=list&width=670');
		return false;
	});
	
	//we use unbind to prevent the click event to fire multiple times
	$('.insert_shortcode').live("click",function() {
		//prepare shortcode variabel
		var shortcode = '';		
		 
		if($('#TB_window .required').length > 0){			
			$('#TB_window .required').each(function(){
				if(($(this).val() == '') || ($(this).val() == 'undefined')){
					$(this).parent().addClass('error');										
				}else{
					$(this).parent().removeClass('error');
				}				
			});
		}
		
		if($('#TB_window .error').length > 0){
			alert(required_fields_alert);	
				
		}else{
			shortcode = generation_shortcode();		 		
			 
			 //check if visual editor is active or not
			 is_tinyMCE_active = false;
			 if (typeof(tinyMCE) != "undefined") {
				 if (tinyMCE.activeEditor != null) {  
					is_tinyMCE_active = true;
				 }	 
			 }
			 
			//append shortcode to the content of the editor
			 if ( is_tinyMCE_active ) {
				tinymce.execCommand('mceInsertContent', false, shortcode);
			 } else {								 
				 $('#wp-content-wrap .wp-editor-area').append(shortcode);
			 }	 						
			tb_remove();
		}
		return false;
	});
	
	//hide or show devices
	$('.rch-list-devices li').live("click",function() {
		if($(this).hasClass("active")){
			$(this).removeClass("active");
			$(this).find('input').val('0');
		}else{
			$(this).addClass("active");
			$(this).find('input').val('1');
		}
	});
	
	//select icon
	$('.iconcontainer i').live('click', function(){		
		if($(this).hasClass('selected')){
			$('.iconcontainer i').removeClass( "selected" );
			$(this).parent().parent().find("input.rch-icon").val('');
			$(this).parent().parent().find('.selected-icon').html('');
		}else{
			$('.iconcontainer i').removeClass( "selected" );		
			$(this).addClass( "selected" );
			$(this).parent().parent().find("input.rch-icon").val($(this).attr( "data-name" ));
			$(this).parent().parent().find('.selected-icon').html(selected_icon + $(this).clone().wrap('<p>').parent().html());
		}
	});
	
	//switch button
	jQuery(".cb-enable").live('click', function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-disable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.checkbox',parent).val('1');
		
		//fold/unfold related options
		var obj = jQuery(this);
		var $fold='.f_'+obj.data('id');
		jQuery($fold).slideDown('normal', "swing");
	});
	jQuery(".cb-disable").live('click', function(){
		var parent = $(this).parents('.switch-options');
		jQuery('.cb-enable',parent).removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery('.checkbox',parent).val('');;
		
		//fold/unfold related options
		var obj = jQuery(this);
		var $fold='.f_'+obj.data('id');
		jQuery($fold).slideUp('normal', "swing");
	});
	//disable text select(for modern chrome, safari and firefox is done via CSS)
	if (($.browser.msie && $.browser.version < 10) || $.browser.opera) { 
		$('.cb-enable span, .cb-disable span').find().attr('unselectable', 'on');
	}
	
	//icon rotation
	$('.rch-icon-rotation li').live("click",function() {
		$('input[name="rotation"]').val($(this).attr('data-name'));
		$('.rch-icon-rotation li').removeClass("active");
		$(this).addClass("active");		
	});
	
	//add row
	$('div.addrow').live("click",function() {
		var cl = $('#sortable li.ui-state-default:first-child').clone(true);
		cl.find('.rch-input').val('');
		cl.find('.rch-display').val(1);
		cl.find('.rch-list-devices li').addClass('active');
		$('#sortable li.ui-state-default:last-child').after(cl);		
	});
	//remove row
	$('.remove-icon').live("click",function() {
		if($('#sortable li.ui-state-default').length > 1){
			if (confirm(are_you_sure)) {
				$(this).closest('li.ui-state-default').remove();
			}
			return false;
		}else{
			alert(need_one_item);
		}		
	});		
		
	$('.rch-tiles .of-radio-tile-img').live("click",function() {
		if($(this).hasClass("active")){
			$(this).removeClass("active");
			$(this).closest('.rch-tiles').find('input.rch-tiles').val('');
		}else{
			$('.rch-tiles .of-radio-tile-img').removeClass("active");
			$(this).addClass("active");
			$(this).closest('.rch-tiles').find('input.rch-tiles').val($(this).attr('data-attribute'));
		}
	});
		
});
