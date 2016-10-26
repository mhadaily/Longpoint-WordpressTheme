<?php
/**
 *
 * @return string folder content
 */
add_action('wp_ajax_rchshortcodes_tinymce', 'rchshortcodes_ajax_tinymce');
/**
 * Call TinyMCE window content via admin-ajax
 *
 * @since 1.7.0
 * @return html content
 */
if ( !function_exists('rchshortcodes_ajax_tinymce') ) {
	function rchshortcodes_ajax_tinymce() {
		if (!current_user_can('edit_pages') && !current_user_can('edit_posts')) // check for permission
			die(_e("You are not allowed to be here",'Longpoint'));
		include_once(get_template_directory() . '/framework/admin/shortcodes/dialog.php');
		die();//exit;
	}
}
?>