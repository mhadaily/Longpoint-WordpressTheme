<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
global $smof_data;
?>

<section id="home" data-stellar-background-ratio="0.5">
    <?php 
	if($smof_data['video_slider_shortcode'] != ''){
		echo do_shortcode($smof_data['video_slider_shortcode']); 		
	}
		?>
</section>
<script type="text/javascript">
    jQuery(function($){
        $.okvideo({ source: '<?php echo $smof_data['video_id']; ?>', 
			volume: <?php echo intval($smof_data['video_audio_volume']); ?>, 
			disablekeyControl: false,
			loop: <?php echo $smof_data['video_loop'] == 1; ?>,
			hd:true, 
			adproof: true,
			annotations: false,			
		 });
		$("#home").css('height',$(window).height());
		$("body").addClass('background-video');
    });
  </script>