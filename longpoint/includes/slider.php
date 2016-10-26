<?php
/**************************************
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
global $smof_data;

	$args = array(
		'post_type' => 'rch_elastic',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		// 'caller_get_posts'=> 1
	);

	$query = new WP_Query($args);
	
	$buttons = '';
	$slides = '';

	if( $query->have_posts() ):
		$i = 0;
		while ($query->have_posts()) : 
			$query->the_post(); 
			
			if ( $smof_data['all_txt_slider_on_off'] == '1' && $smof_data['elastic_buttons_on_off'] == '1') {

			$buttons .= '<div class="col-xs-4 col-sm-4 hidden-xs" data-target="#rch-elastic-slider" data-slide-to="'.$i.'">
                            <figure>
                                <img src="' . get_post_meta($post->ID, 'slider_buttonicon', true) . '">
                            </figure>
                            <h3>' . get_post_meta($post->ID, 'slider_buttontitle', true) . '</h3>
                        </div>';

            } else {
            	
            		$buttons .= '';
            	
            }
           	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
             
			
			if ($smof_data['all_txt_slider_on_off'] == '1') {

			if ($smof_data['elastic_title_on_off'] == '1') {  $title = get_the_title() ;       }
			if ($smof_data['elastic_alternative_on_off'] == '1') {		$alttext = get_post_meta($post->ID, 'slider_alternativetitle', true) ; }
			if ($smof_data['elastic_description_on_off'] == '1') {	    $descslider = get_post_meta($post->ID, 'slider_description', true); }				
			if ($smof_data['elastic_description_on_off'] == '1') {	    $divider = '<div class="divider hidden-xs"></div>'; }				


			$slides .= '<div id="id-slider-'.$i.'" class="item' . ($i == 1 ? ' active' : '') . '">' .
						
						//get_the_post_thumbnail($post->ID, 'full', array('class' => 'slider-image', 'alt' => get_the_title() )) .
							'<div class="carousel-text">
                               <h2>' . $title . '</h2>
								<h4 style="hidden-xs">' . $alttext . '</h4>
								' . $divider . '
								<p style="hidden-xs">' . $descslider . '</p>
							</div>
					</div>';

			} else {

			$slides .= '<div id="id-slider-'.$i.'" class="item' . ($i == 1 ? ' active' : '') . '">' .
							//get_the_post_thumbnail($post->ID, 'full', array('class' => 'slider-image', 'alt' => get_the_title() )) . 
					'</div>';

			}
						
			$i++;
		endwhile;
	endif;
	wp_reset_query();  // Restore global post data stomped by the_post().
?>

<section id="home">
<!-- BEGIN ELASTIC SLIDER -->
<div id="home-elastic-slider">
        <div id="rch-elastic-slider" class="carousel" data-ride="carousel">
          
            <!-- Indicators -->
			<div class="muscots">
                <div class="container">
                    <div class="row">
						<?php echo $buttons; ?>
                    </div>
                </div>
            </div>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
				<?php echo $slides; ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#rch-elastic-slider" data-slide="prev">
                <span class="left-icon"></span>
            </a>
            <a class="right carousel-control" href="#rch-elastic-slider" data-slide="next">
                <span class="right-icon"></span>
            </a>
        </div>
    </div>
</section>
<!-- END ELASTIC SLIDER -->