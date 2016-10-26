jQuery(function($){		
	//we use unbind to prevent the click event to fire multiple times
	$('#insert-shortcodes-button').unbind('click').bind("click",function() {
		//switch to tinymce mode
		var ctmce= jQuery('#content-tmce');
		switchEditors.switchto(ctmce[0]); // [0] to get DOM element out of jQuery object		
		tb_show('RCH Shortcodes', ajaxurl + '?action=rchshortcodes_tinymce&page=list&width=670&height=500');		
	});
	
 });
