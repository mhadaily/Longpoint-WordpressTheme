function generation_shortcode(){
	//prepare shortcode variabel
	var shortcode = '';	
	jQuery(function($){		
	
		var shortcode_name = $('.shortcode-config').attr('data-shortcode');		 
		var columns = $('.shortcode-config #column').val();		 		 
		 var params = '';
		 $('.shortcode-config input.rch-input:not([name^="display"]), .shortcode-config select.rch-input').each(function(){		
			if($(this).val() != ''){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';
			}
		 });
		 $('.shortcode-config input.rch-input[name^="display"]').each(function(){		
			if($(this).val() != 1){
				params = params + " " + $(this).attr('name') + '="' + $(this).val()+ '"';		
			}
		 });
		
		var contents = '';
		for(var i=0 ; i<columns ; i++) {
			contents += '[pricing_column ' + (i == 1 ? 'feature="1" ' : '') + 'title="Pricing Column" price="56" currency="$" button_title="More Info" link="#" ]<ul><li>Option 1</li><li>Option 2</li></ul>[/pricing_column]';
		}		
	 		
		shortcode = '[' + shortcode_name + ' ' + params + ']' + contents + '[/' + shortcode_name + ']';		
	});
	return shortcode;
}	