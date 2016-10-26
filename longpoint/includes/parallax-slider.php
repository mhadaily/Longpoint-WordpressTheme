<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
global $smof_data;

?>

<section id="home">

	<?php 
	if($smof_data['parallax_slider'] != ''){
		echo do_shortcode($smof_data['parallax_slider']); 		
	}
	?>

</section>