<?php
/**************************************
 * RCHTHEME Framworks Functions
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

require_once (get_template_directory() . '/framework/admin/shortcodes/config.php');

global $wp_scripts;
?>	
        <form name="rchtheme" action="#">
			<?php  
			if($_GET['page'] == 'config'){
					
					$shortcode_name = $_GET['shortcode'];
					if(!array_key_exists ( $shortcode_name , $rch_shortcodes )):
						_e("Shortcode not found.", 'Longpoint');
						exit;
					endif;	
					$shortcode = $rch_shortcodes[$shortcode_name];
				?>
				<div class="selectshortcode"><h3><i class="fa fa-<?php echo $shortcode['icon']; ?> fa-lg"></i>&nbsp; <?php echo $shortcode['title']; ?></h3></div>
				<div class="shortcode-config" data-shortcode="<?php echo $shortcode_name?>">
				<?php do_action('shortcode_generator_options_ui', $shortcode);?>						
				 <div class="actions">
					<div class="alignleft">
						<input type="button" id="cancel" name="back" value="<?php _e("Back", 'Longpoint'); ?>" />
					</div>

					<div class="alignright">
						<input type="submit" id="insert" name="insert" class="insert_shortcode" value="<?php _e("Insert", 'Longpoint'); ?>" />
					</div>
				</div>
				</div>
				<?php
				}else{
				?>
				<div class="selectshortcode"><h4><?php _e("Select a shortcode: Scroll down to see more", 'Longpoint'); ?></h4></div>
				<div id="shortcodes-links">
					<?php foreach($rch_shortcodes as $key => $value):?>
					<span class="list-icon -<?php echo $key?>" data-shortcode="<?php echo $key?>"><i class="fa fa-<?php echo $value['icon'];?>"></i> <?php echo $value['title'];?></span>
					<?php endforeach;?>					
				</div>
				<?php }?>            
           
        </form>	
	<script type="text/javascript">// <![CDATA[				 
	 framework_url = '<?php echo get_template_directory_uri(); ?>/framework';
	 selected_icon = '<?php _e("Selected icon: ", 'Longpoint'); ?>';
	 required_fields_alert = '<?php _e("ERROR: please fill the required fields.", 'Longpoint'); ?>';
	 are_you_sure = '<?php _e("Are you sure?", 'Longpoint'); ?>';
	 need_one_item = '<?php _e("You need at least one item.", 'Longpoint'); ?>';
	 
	// ]]></script>   