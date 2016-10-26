<?php
/**************************************
 * RCHTHEME Team Members Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Team Members Shortcode
**************************************/
if ( !function_exists('RCHTeamMembers') ) {
	function RCHTeamMembers($atts)
	{			
		extract( shortcode_atts( array( 															
			'count' => 3,
			'limit' => 150,
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'team' ) );
				
		$args = array(
			'post_type' => 'rch_team',
			'post_count' => $count
		);		
		
		$query = new WP_Query( $args );
		
		$id_attr = "rch-team-" . mt_rand (10,1000);
		
		$team = ''; // no errors
		
		// The Loop
		if ( $query->have_posts() ) {
			$i = 0;
			
			switch($count){
				case '1':
					$columnNumber = 12;
				break;
				case '2':
					$columnNumber = 6;
				break;
				case '3':
					$columnNumber = 4;
				break;				
				case '4':
					$columnNumber = 3;
				break;
			}
			
			while ( $query->have_posts() ) {	
				
				$query->the_post();
				$options = get_post_meta(get_the_ID());
				
				$icons  = $options['teamfacebook'][0] != '' ? '<a href="' . $options['teamfacebook'][0] . '"><i class="fa fa-facebook-square"></i></a>' : ''; 
				$icons .= $options['teamtwitter'][0] != '' ? '<a href="' . $options['teamtwitter'][0] . '"><i class="fa fa-twitter-square"></i></a>' : ''; 
				$icons .= $options['teamgoogleplus'][0] != '' ? '<a href="' . $options['teamgoogleplus'][0] . '"><i class="fa fa-google-plus-square"></i></a>' : ''; 
				$icons .= $options['teamlinkedin'][0] != '' ? '<a href="' . $options['teamlinkedin'][0] . '"><i class="fa fa-linkedin-square"></i></a>' : ''; 
				
				$team .= '<div class="col-sm-' . $columnNumber . '"><div class="thumbnail">';
				$team .= '<h3>' . get_the_title() . '</h3>';
				$team .= '<h4>' . $options['teamposition'][0] .'</h4>';
				$team .= get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('class' => 'img-circle img-responsive')) ;
				$team .= '<p class="email">'. $options['teamemail'][0] .'</p>';
				$team .= '<p class="icons">' . $icons . '</p>';
				$team .= '<div class="caption"><p>'. substr(remove_tags(get_the_content(), array('p')), 0, $limit) . '</p></div>';
				$team .= '</div></div>';
			}
			$output = '<div class="row">' . $team . '</div>';	
		}		
		/* Restore original Post Data */
		wp_reset_postdata();
		
		$classes =  ($class != '' ? " {$class}" : '') . 
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output = '<section  id="section-' . $id_attr . '" class="team ' . $classes .'">' . $output . '</section>';
		
		if($style != ''){
			$output  .= "<style type='text/css'>#section-{$id_attr}{ {$style} }</style>";
		}
		
		return $output;		
	}
	
}
add_shortcode('team', 'RCHTeamMembers');
