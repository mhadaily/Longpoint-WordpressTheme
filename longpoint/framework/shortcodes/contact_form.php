<?php
/**************************************
 * RCHTHEME Contact Form Shortcode
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**************************************
 * RCHTHEME Contact Shortcode
**************************************/
if ( !function_exists('RCHContact') ) {
	function RCHContact($atts)
	{			
		extract( shortcode_atts( array( 												
			'show_title' => 1,
			'title' => __('Contact Form', 'Longpoint'),			
			'display_large' => 1,
			'display_medium' => 1,
			'display_small' => 1,
			'display_extrasmall' => 1,	
			'animation' => '',			
			'class' => '',
			'style' => ''
		), $atts, 'contact' ) );
		
		global $smof_data;
		
		$id_attr = "rch-contact-" . mt_rand (10,1000);			
		
		$contact_form  = '<div id="' . $id_attr . '-block" class="contact-form">';
		$contact_form  .= $show_title == 1 ? '<h3>' . $title . '</h2>' : '';			
		$contact_form .= '<form id="' . $id_attr . '-form" class="rch-contact" actiom="" role="form">
						<div class="input-groups">
							<input type="name" class="form-control" name="first_name" id="first_name" placeholder="' . __('First Name', 'Longpoint') . '">
							<input type="name" class="form-control" name="last_name" id="last_name" placeholder="' . __('Last Name', 'Longpoint') . '">							
						</div>
						<input type="tel" class="form-control" name="phone" id="phone" placeholder="' . __('Contact Number', 'Longpoint') . '">
						<input type="email" class="form-control" name="email" id="email" placeholder="' . __('Enter email', 'Longpoint') . '">
						<textarea class="form-control" name="message" rows="5" placeholder="' . __('Message', 'Longpoint') . '"></textarea>
						<input type="submit" data-loading-text="' . __('Sending...', 'Longpoint') . '" value="' . __('Send', 'Longpoint') . '">
					</form>';
		$contact_form  .= '</div><div id="message"></div>';

		$classes =  ($class != '' ? " {$class}" : '') . 
					($animation != '' ? " animate {$animation}" : '') . 
					($display_large == 0 ? ' hidden-lg' : '' ) . 
					($display_medium == 0 ? ' hidden-md' : '') . 
					($display_small == 0 ? ' hidden-sm' : '') . 
					($display_extrasmall == 0 ? ' hidden-xs' : '');	
		
		$output = '
<div class="col-md-6  animate fadeInLeft">
	<ul class="address">
		<!--<li><img class="alignnone size-full" src="' . $smof_data['contactus_marker'] . '" alt="marker"></li>-->
		<li>
		<p class="heading">' . $smof_data['contactus_title'] . '</p>
		' . $smof_data['contactus_address'] . '
		<p class="bold">' . __('Telephone', 'Longpoint') . '</p>' . $smof_data['contactus_show_phone'] . '
		<p class="bold">' . __('E-mail', 'Longpoint') . '</p>' . $smof_data['contactus_show_email'] . '
		</li>
	</ul>
</div>
<div id="rch-column-604" class="col-md-6  animate fadeInRight  animated" style="visibility: visible;">' . $contact_form . '</div>	';
		
		$output .= '<div id="googlemap-' . $id_attr . '" class="rch-googlemap  googleMap"></div>';
		$output = '<section id="' . $id_attr . '" class="contact-us ' . $classes .'">' . $output . '</section>';
		
		if($style != ''){
			$output  .= "<style type='text/css'>#{$id_attr}{ {$style} }</style>";
		}
		
		$output .= '
<script type="text/javascript"> 
	jQuery.noConflict();
	jQuery(document).ready(function($){	
		$("#' . $id_attr . '-form").submit(function(e) {
			e.preventDefault();
			var btn = $(this).find("input[type=submit]");
			btn.button("loading");
			
			// validate and process form here
			var str = $(this).serialize();			 
			$.ajax({
				type: "POST",
				url: "' . get_template_directory_uri() . '/framework/sendmail.php",
				data: str,
				success: function(message){
					if($.trim(message) == "Success")
					{						
						result = "<div class=\"alert alert-success fade in\">' . $smof_data['contactus_success_message'] . '</div>";
						$("#' . $id_attr . '-block").hide();
					}
					else
					{
						result = message;
					}	
					$("#message").ajaxComplete(function(event, request, settings)
					{ 														
						$(this).html(result);				 
					});					 
				}					 
			}).always(function () {
			  btn.button("reset")
			});;					 
			return false;
		});

		function initializeGoogleMap() {
     
		  var myLatlng = new google.maps.LatLng('.$smof_data['contactus_latitude'].','.$smof_data['contactus_longitude'].');
		  var myOptions = {
			center: myLatlng,  
			zoom: 14,
			disableDefaultUI: true,
			scrollwheel: false,
			draggable: false,
			mapTypeId: google.maps.MapTypeId.road
		  };
		  var map = new google.maps.Map(document.getElementById("googlemap-' . $id_attr . '"), myOptions);		  
		  var $w = $( document ).width();
		  if( $w > 1200){
			map.panBy(480,-50);
		  }
		  else if( $w > 992){
			map.panBy(450,-50);
		  }
		  else if($w > 767){
			map.panBy(200,50);
		  }else if($w > 480){
			map.panBy(200,150);
		  }else{
			map.panBy(-100,150);
		  }
		  var contentString = "";
		  var infowindow = new google.maps.InfoWindow({
			  content: contentString
		  });
		   
		  var marker = new google.maps.Marker({
			  icon: "' . $smof_data['contactus_marker'] . '",
			  position: myLatlng
		  });
		   
		  google.maps.event.addListener(marker, "click", function() {
			  infowindow.open(map,marker);
		  });
		   
		  marker.setMap(map);
		 
		  var styles = [
			  {
				stylers: [
				  { hue: "#018797" },
				  { saturation: -80 },
				  { lightness: 50 },
				  { gamma: 0 }
				]
			  },{
				featureType: "road",
				elementType: "geometry",
				stylers: [
				  { lightness: 100 },
				  { visibility: "simplified" }
				]
			  },{
				featureType: "road",
				elementType: "labels",
				stylers: [
				  { visibility: "off" }
				]
			  }
			];
		  map.setOptions({styles: styles});
		}
		initializeGoogleMap();
		$( window ).resize(function() {
		  initializeGoogleMap();
		});
	});
</script>';
		
		return $output;		
	}	
}
add_shortcode('contact', 'RCHContact');

?>