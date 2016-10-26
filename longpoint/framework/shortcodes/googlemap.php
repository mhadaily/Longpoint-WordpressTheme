<?php
/**************************************
 * RCHTHEME Google Map Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Google Map Shortcode
**************************************/
if ( !function_exists('RCHGoogleMap') ) {
	function RCHGoogleMap($atts)
	{				
		extract( shortcode_atts( array( 
			"type" => 'road', 
			"latitude" => '36.394757', 
			"longitude" => '-105.600586', 			 
			"message" => 'We are here', 
			'width_unit' => 'px',
			'width' => '300',	
			'height' => '400',
			'zoom' => '14',						
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'googlemap' ) );
		
		$id = "rch-googlemap-" . mt_rand (10,1000);

		$mapType = '';
		if($type == "satellite") 
			$mapType = "SATELLITE";
		else if($type == "terrain")
			$mapType = "TERRAIN";  
		else if($type == "hybrid")
			$mapType = "HYBRID";
		else
			$mapType = "ROADMAP";  
			
		$classes =   $class . 
					($animation != '' ? " animate {$animation} " : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
								
		$output = '<div id="'.$id.'" class="rch-googlemap  googleMap ' . $classes . '"></div>';
				
		$output  .= "<style type='text/css'>#{$id}{ width:{$width}{$width_unit}; height:{$height}px; {$style} }</style>";
		
		$output  .= '<!-- Google Map -->
        <script type="text/javascript">  
        jQuery(document).ready(function($) {
          function initializeGoogleMap() {
     
              var myLatlng = new google.maps.LatLng('.$latitude.','.$longitude.');
              var myOptions = {
                center: myLatlng,  
                zoom: ' . $zoom . ',
                mapTypeId: google.maps.MapTypeId.' . $mapType . '
              };
              var map = new google.maps.Map(document.getElementById("' . $id . '"), myOptions);
     
              var contentString = "' . $message . '";
              var infowindow = new google.maps.InfoWindow({
                  content: contentString
              });
               
              var marker = new google.maps.Marker({
                  position: myLatlng
              });
               
              google.maps.event.addListener(marker, "click", function() {
                  infowindow.open(map,marker);
              });
               
              marker.setMap(map);
             
          }
          initializeGoogleMap();
     
        });
        </script>';

		return $output;		
	}
	
}
add_shortcode('googlemap', 'RCHGoogleMap');