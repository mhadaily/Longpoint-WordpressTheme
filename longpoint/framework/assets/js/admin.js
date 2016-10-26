function rch_options() {
  var rch_custom_addmedia = true,
  rch_send_attachment = wp.media.editor.send.attachment;
  jQuery('.rch-upload-button').click(function(e) {
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = jQuery(this);
    var id = button.attr('id').replace('_rchbutton', '');
    rch_custom_addmedia = true;
    wp.media.editor.send.attachment = function(props, attachment){
      if ( rch_custom_addmedia ) {
        jQuery("#"+id).val(attachment.url);
        jQuery("#"+id+"-rchpreview img").attr("src", attachment.url);
      } else {
        return rch_send_attachment.apply( this, [props, attachment] );
      };
    }
    wp.media.editor.open(button);
    return false;
  });
  jQuery('.add_media').on('click', function(){
    rch_custom_addmedia = false;
  });
}
jQuery(document).ready(function() {
  rch_options();
  jQuery('#datepicker').datepicker({
	 			inline: true,
				showOtherMonths: true,
				dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
              dateFormat : 'dd-mm-yy'
         });
});