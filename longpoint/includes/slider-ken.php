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
	if($smof_data['Ken_shortcode'] != ''){
		echo do_shortcode($smof_data['Ken_shortcode']); 		
	}
	?>

</section>