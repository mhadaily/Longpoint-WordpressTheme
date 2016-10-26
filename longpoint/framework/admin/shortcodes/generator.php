<?php 
/**************************************
 * RCHTHEME Framworks Shortcode Generator
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/

/**
* 
* Shortcode Generator Options
*
* @return Options
*/
if ( !function_exists('RCHShortcode_generator_options') ) {
	function RCHShortcode_generator_options($shortcode) {

		$output = '<ul class="params">';
		foreach($shortcode['params'] as $key => $value){
			$value['fullwidth'] ='';
			$output .= '<li class="param '. $key . '"><div class="param-desc ' . ( $value['fullwidth'] === true ? '' : 'one_half') . '">
							<div class="param-label"><label>' . $value['label'] .'</label></div>
							<span class="param-row-desc">' . $value['desc'] . '</span>
						</div>
						<div class="param-field  ' . ( $value['fullwidth'] === true ? '' : 'one_half_last') . '">'; 
			$output .= RCHGetHtmlField($key,$value);
			$output .= '</div></li>';		
		}
		$output .= '</ul>';	
		$output .= '<script type="text/javascript" src="' . get_template_directory_uri() . '/framework/admin/shortcodes/shortcodes/' . $shortcode['js'] .'.js"></script>';
		$output .= '<script type="text/javascript" src="' . get_template_directory_uri() . '/framework/admin/shortcodes/js/script.js"></script>';
		echo $output;
	}
}
add_action('shortcode_generator_options_ui', 'RCHShortcode_generator_options');

/**
* 
* Shortcode Generator Option Fields
*
* @return Option Fields
*/
	function RCHGetHtmlField($name, $param){
		$output = '';
		$param['required']='';
		switch($param['type']){
			case 'select':
				$output .= '<select id="rch_' . $name . '" name="' . $name . '" class="rch-select rch-input ' . ($param['required'] == true ? 'required' : '') . '">';
				foreach($param['options'] as $key => $value){
					$output .= '<option value="' . $key . '">' . $value . '</option>';			
				}
				$output .= '</select>';
			break;
			case 'textarea':
				$output .= '<textarea id="rch_' . $name . '" name="' . $name . '" class="rch-textarea rch-input ' . ($param['required'] == true ? 'required' : '') . '"></textarea>';
			break;
			case 'text':
				$output .= '<input type="text" id="rch_' . $name . '" name="' . $name . '" class="rch-text rch-input ' . ($param['required'] == true ? 'required' : '') . '" value="">';
			break;
			case 'number':				
				$output .= '<input type="number" id="rch_' . $name . '" name="' . $name . '" min="' . $param['min'] . '" max="' . $param['max'] . '" class="rch-text rch-input ' . ($param['required'] == true ? 'required' : '') . '" data-default="' . $param['default'] . '" value="' . $param['default'] . '">';
			break;
			case 'devices':
				$output .= '<ul class="rch-list-devices">							
								<li class="rch-icon-large active"><i class="fa fa-desktop"></i><input type="hidden" name="' . $name . '_large" value="1" class="rch-display rch-input" ></li>
								<li class="rch-icon-medium active"><i class="fa fa-laptop"></i><input type="hidden" name="' . $name . '_medium" value="1" class="rch-display rch-input" ></li>
								<li class="rch-icon-small active"><i class="fa fa-tablet"></i><input type="hidden" name="' . $name . '_small" value="1" class="rch-display rch-input" ></li>
								<li class="rch-icon-extra-small active"><i class="fa fa-mobile"></i><input type="hidden" name="' . $name . '_extrasmall" value="1" class="rch-display rch-input" ></li>
							</ul>';
			break;
			case 'animation':
				$output .= '<select id="rch_animation" name="animation" class="rch-select rch-input ' . ($param['required'] == true ? 'required' : '') . '">
									<option value="">' . __('None','Longpoint') . '</option>
									<optgroup label="' . __('Attention Seekers','Longpoint') . '">
									  <option value="bounce">' . __('bounce','Longpoint') . '</option>
									  <option value="flash">' . __('flash','Longpoint') . '</option>
									  <option value="pulse">' . __('pulse','Longpoint') . '</option>
									  <option value="rubberBand">' . __('rubberBand','Longpoint') . '</option>
									  <option value="shake">' . __('shake','Longpoint') . '</option>
									  <option value="swing">' . __('swing','Longpoint') . '</option>
									  <option value="tada">' . __('tada','Longpoint') . '</option>
									  <option value="wobble">' . __('wobble','Longpoint') . '</option>
									</optgroup>
									<optgroup label="' . __('Bouncing Entrances','Longpoint') . '">
									  <option value="bounceIn">' . __('bounceIn','Longpoint') . '</option>
									  <option value="bounceInDown">' . __('bounceInDown','Longpoint') . '</option>
									  <option value="bounceInLeft">' . __('bounceInLeft','Longpoint') . '</option>
									  <option value="bounceInRight">' . __('bounceInRight','Longpoint') . '</option>
									  <option value="bounceInUp">' . __('bounceInUp','Longpoint') . '</option>
									</optgroup>
								    <optgroup label="' . __('Bouncing Exits','Longpoint') . '">
									  <option value="bounceOut">' . __('bounceOut','Longpoint') . '</option>
									  <option value="bounceOutDown">' . __('bounceOutDown','Longpoint') . '</option>
									  <option value="bounceOutLeft">' . __('bounceOutLeft','Longpoint') . '</option>
									  <option value="bounceOutRight">' . __('bounceOutRight','Longpoint') . '</option>
									  <option value="bounceOutUp">' . __('bounceOutUp','Longpoint') . '</option>
									</optgroup>
									<optgroup label="' . __('Fading Entrances','Longpoint') . '">
									  <option value="fadeIn">' . __('fadeIn','Longpoint') . '</option>
									  <option value="fadeInDown">' . __('fadeInDown','Longpoint') . '</option>
									  <option value="fadeInDownBig">' . __('fadeInDownBig','Longpoint') . '</option>
									  <option value="fadeInLeft">' . __('fadeInLeft','Longpoint') . '</option>
									  <option value="fadeInLeftBig">' . __('fadeInLeftBig','Longpoint') . '</option>
									  <option value="fadeInRight">' . __('fadeInRight','Longpoint') . '</option>
									  <option value="fadeInRightBig">' . __('fadeInRightBig','Longpoint') . '</option>
									  <option value="fadeInUp">' . __('fadeInUp','Longpoint') . '</option>
									  <option value="fadeInUpBig">' . __('fadeInUpBig','Longpoint') . '</option>
									</optgroup>									
									<optgroup label="' . __('Fading Exits','Longpoint') . '">
									  <option value="fadeOut">' . __('fadeOut','Longpoint') . '</option>
									  <option value="fadeOutDown">' . __('fadeOutDown','Longpoint') . '</option>
									  <option value="fadeOutDownBig">' . __('fadeOutDownBig','Longpoint') . '</option>
									  <option value="fadeOutLeft">' . __('fadeOutLeft','Longpoint') . '</option>
									  <option value="fadeOutLeftBig">' . __('fadeOutLeftBig','Longpoint') . '</option>
									  <option value="fadeOutRight">' . __('fadeOutRight','Longpoint') . '</option>
									  <option value="fadeOutRightBig">' . __('fadeOutRightBig','Longpoint') . '</option>
									  <option value="fadeOutUp">' . __('fadeOutUp','Longpoint') . '</option>
									  <option value="fadeOutUpBig">' . __('fadeOutUpBig','Longpoint') . '</option>
									</optgroup>	
									<optgroup label="' . __('Flippers','Longpoint') . '">
									  <option value="flip">' . __('flip','Longpoint') . '</option>
									  <option value="flipInX">' . __('flipInX','Longpoint') . '</option>
									  <option value="flipInY">' . __('flipInY','Longpoint') . '</option>  
									  <option value="flipOutX">' . __('flipOutX','Longpoint') . '</option>
									  <option value="flipOutY">' . __('flipOutY','Longpoint') . '</option>
									</optgroup>
									<optgroup label="' . __('Lightspeed','Longpoint') . '">
									  <option value="lightSpeedIn">' . __('lightSpeedIn','Longpoint') . '</option> 
									  <option value="lightSpeedOut">' . __('lightSpeedOut','Longpoint') . '</option>
									</optgroup>
									<optgroup label="' . __('Rotating Entrances','Longpoint') . '">
									  <option value="rotateIn">' . __('rotateIn','Longpoint') . '</option>
									  <option value="rotateInDownLeft">' . __('rotateInDownLeft','Longpoint') . '</option>
									  <option value="rotateInDownRight">' . __('rotateInDownRight','Longpoint') . '</option>
									  <option value="rotateInUpLeft">' . __('rotateInUpLeft','Longpoint') . '</option>
									  <option value="rotateInUpRight">' . __('rotateInUpRight','Longpoint') . '</option>
									</optgroup> 
									<optgroup label="' . __('Rotating Exits','Longpoint') . '">
									  <option value="rotateOut">' . __('rotateOut','Longpoint') . '</option>
									  <option value="rotateOutDownLeft">' . __('rotateOutDownLeft','Longpoint') . '</option>
									  <option value="rotateOutDownRight">' . __('rotateOutDownRight','Longpoint') . '</option>
									  <option value="rotateOutUpLeft">' . __('rotateOutUpLeft','Longpoint') . '</option>
									  <option value="rotateOutUpRight">' . __('rotateOutUpRight','Longpoint') . '</option>
									</optgroup>
									<optgroup label="' . __('Sliders','Longpoint') . '">
									  <option value="slideInDown">' . __('slideInDown','Longpoint') . '</option>
									  <option value="slideInLeft">' . __('slideInLeft','Longpoint') . '</option>
									  <option value="slideInRight">' . __('slideInRight','Longpoint') . '</option>
									  <option value="slideOutLeft">' . __('slideOutLeft','Longpoint') . '</option>
									  <option value="slideOutRight">' . __('slideOutRight','Longpoint') . '</option>
									  <option value="slideOutUp">' . __('slideOutUp','Longpoint') . '</option>
									</optgroup>
									<optgroup label="' . __('Specials','Longpoint') . '">  
									  <option value="hinge">' . __('hinge','Longpoint') . '</option>
									  <option value="rollIn">' . __('rollIn','Longpoint') . '</option>
									  <option value="rollOut">' . __('rollOut','Longpoint') . '</option>
									</optgroup>
							</select>';
			break;
			case 'fonticon':
				$output .= RCHGetfontawsomelist($name, $param['required']);
			break;
						
			case 'switch':				
				
				$cb_enabled = $cb_disabled = '';//no errors, please
				
				//Get selected
				if ($param['default'] == 1){
					$cb_enabled = ' selected';
					$cb_disabled = '';
				}else{
					$cb_enabled = '';
					$cb_disabled = ' selected';
				}
				
				//Label ON
				if(!isset($param['on'])){
					$on = __('On', 'Longpoint');
				}else{
					$on = $param['on'];
				}
				
				//Label OFF
				if(!isset($param['off'])){
					$off = __('Off', 'Longpoint');
				}else{
					$off = $param['off'];
				}
				
				$output .= '<p class="switch-options">';
					$output .= '<label class="cb-enable'. $cb_enabled .'" data-id="' . $name . '"><span>'. $on .'</span></label>';
					$output .= '<label class="cb-disable'. $cb_disabled .'" data-id="' . $name . '"><span>'. $off .'</span></label>';					
					$output .= '<input type="hidden" class="checkbox rch-text rch-input" name="' . $name . '" id="rch_' . $name . '" value="' . $param['default'] . '"/>';										
				$output .= '</p>';
				
			break;
			
			case 'fontrotation':
				$output .= '<ul class="rch-icon-rotation"><input type="hidden" name="' . $name . '" value="" class="rch-text rch-input" >							
								<li class="rch-rotation-type active" data-name=""><i class="fa fa-shield" title="' . __('Normal', 'Longpoint') . '"></i></li>
								<li class="rch-rotation-type" data-name="rotate-90"><i class="fa fa-shield fa-rotate-90" title="' . __('Rotate 90', 'Longpoint') . '"></i></li>
								<li class="rch-rotation-type" data-name="rotate-180"><i class="fa fa-shield fa-rotate-180" title="' . __('Rotate 180', 'Longpoint') . '"></i></li>
								<li class="rch-rotation-type" data-name="rotate-270"><i class="fa fa-shield fa-rotate-270" title="' . __('Rotate 270', 'Longpoint') . '"></i></li>
								<li class="rch-rotation-type" data-name="flip-horizontal"><i class="fa fa-shield fa-flip-horizontal" title="' . __('Flip Horizontally', 'Longpoint') . '"></i></li>
								<li class="rch-rotation-type" data-name="flip-vertical"><i class="fa fa-shield fa-flip-vertical" title="' . __('Flip Vertically', 'Longpoint') . '"></i></li>
							</ul>';
			break;
			
			case "color":					
				$output .= '<input name="' . $name . '" id="rch_' . $name . '" class="of-color rch-text rch-input"  type="text" value=""/>';										
			break;

			case 'textAddrowSortable'	:
				$output .= '<ul id="sortable"><li class="ui-state-default param '. $name . '"><div class="param-desc ' . ( $param['itemFullwidth'] === true ? '' : 'one_half') . '">
							<i class="fa fa-arrows-v sort-icon" data-name="fa-arrows-v"></i><div class="param-label"><label>' . $param['itemLabel'] .'</label></div>
							<span class="param-row-desc">' . $param['itemDesc'] . '</span>
						</div>
						<div class="param-field  ' . ( $param['itemFullwidth'] === true ? '' : 'one_half_last') . '">'; 
				$output .= '<input type="text" id="rch_' . $name . '" name="' . $name . '" class="rch-text rch-input ' . ($param['required'] == true ? 'required' : '') . '" value=""><i class="fa fa-trash-o remove-icon"></i>';
				$output .= '</div></li></ul><div class="addrow"><i class="fa fa-plus add-icon"></i> '. $param['addrowTitle'] . '</div>';				
			break;
			
			case 'textAddrowSortableWithTextarea'	:
				$output .= '<ul id="sortable" class="groupheading"><li class="ui-state-default param '. $name . '">
							<div class="row">
								<div class="param-desc ' . ( $param['itemFullwidth'] === true ? '' : 'one_half') . '">
									<div class="param-label"><label>' . $param['itemHeadingLabel'] .'</label></div>
									<span class="param-row-desc">' . $param['itemHeadingDesc'] . '</span>
								</div>
								<div class="param-field  ' . ( $param['itemFullwidth'] === true ? '' : 'one_half_last') . '">
									<input type="text" id="rch_' . $name . '" name="' . $name . '" class="rch-text rch-input ' . ($param['required'] == true ? 'required' : '') . '" value="">
								</div>
							</div>
							<div class="row">
								<div class="param-desc ' . ( $param['itemFullwidth'] === true ? '' : 'one_half') . '">
									<div class="param-label"><label>' . $param['itemLabel'] .'</label></div>
									<span class="param-row-desc">' . $param['itemDesc'] . '</span>
								</div>
								<div class="param-field  ' . ( $param['itemFullwidth'] === true ? '' : 'one_half_last') . '">
									<textarea id="rch_' . $name . '" name="' . $name . '" class="rch-textarea rch-input "></textarea>
								</div>
							</div>
							
							<div class="row">
								<i class="fa fa-arrows-v sort-icon" data-name="fa-arrows-v"></i><i class="fa fa-trash-o remove-icon"></i>
							</div>'; 			
				$output .= '</li></ul><div class="addrow"><i class="fa fa-plus add-icon"></i> '. $param['addrowTitle'] . '</div>';							
			break;
			
			case 'tab'	:
				$output .= '<ul id="sortable" class="tab"><li class="ui-state-default param '. $name . '">
						<div class="row">
							<div class="param-desc ' . ( $param['itemFullwidth'] === true ? '' : 'one_half') . '">
								<div class="param-label"><label>' . $param['itemHeadingLabel'] .'</label></div>
								<span class="param-row-desc">' . $param['itemHeadingDesc'] . '</span>								
							</div>
							<div class="param-field  ' . ( $param['itemFullwidth'] === true ? '' : 'one_half_last') . '">
							<input type="text" id="rch_' . $name . '" name="' . $name . '" class="rch-text rch-input ' . ($param['required'] == true ? 'required' : '') . '" value="">
							</div>
						</div>
						<div class="row">
							<div class="param-desc ' . ( $param['itemFullwidth'] === true ? '' : 'one_half') . '">
								<div class="param-label"><label>' . $param['itemLabel'] .'</label></div>
							<span class="param-row-desc">' . $param['itemDesc'] . '</span>							
							</div>
							<div class="param-field  ' . ( $param['itemFullwidth'] === true ? '' : 'one_half_last') . '">
							<textarea id="rch_' . $name . '" name="' . $name . '" class="rch-textarea rch-input "></textarea>
							</div>
						</div>
						<div class="row">
							<div class="param-desc ' . ( $param['itemFullwidth'] === true ? '' : 'one_half') . '">
								<div class="param-label"><label>' . $param['itemDeviceLabel'] .'</label></div>
							<span class="param-row-desc">' . $param['itemDeviceDesc'] . '</span>							
							</div>
							<div class="param-field  ' . ( $param['itemFullwidth'] === true ? '' : 'one_half_last') . '">
							<ul class="rch-list-devices">							
								<li class="rch-icon-large active"><i class="fa fa-desktop"></i><input type="hidden" name="display_large" value="1" class="rch-display rch-input" ></li>
								<li class="rch-icon-medium active"><i class="fa fa-laptop"></i><input type="hidden" name="display_medium" value="1" class="rch-display rch-input" ></li>
								<li class="rch-icon-small active"><i class="fa fa-tablet"></i><input type="hidden" name="display_small" value="1" class="rch-display rch-input" ></li>
								<li class="rch-icon-extra-small active"><i class="fa fa-mobile"></i><input type="hidden" name="display_extrasmall" value="1" class="rch-display rch-input" ></li>
							</ul>
							</div>
						</div>
						<div class="row"><i class="fa fa-arrows-v sort-icon" data-name="fa-arrows-v"></i><i class="fa fa-trash-o remove-icon"></i></div>';
				
				$output .= '</li></ul><div class="addrow"><i class="fa fa-plus add-icon"></i> '. $param['addrowTitle'] . '</div>';								
			break;
						
			case 'sliderui':
				$s_val = $s_min = $s_max = $s_step = $s_unit = '';//no errors, please
				
				$s_val  = stripslashes($param['default']);

				$s_unit = !isset($param['unit']) ? 'px' : $param['unit'];
				$s_min = !isset($param['min']) ? '0' : $param['min'];					
				$s_max = !isset($param['max']) ? $s_min + 1 : $param['max'];
				$s_step = !isset($param['step']) ? '1' : $param['step'];
				$s_val = $s_val != '' ? $s_val : $s_min;
				
				//values
				$s_data = 'data-id="' . $name . '" data-val="' . $s_val . '" data-min="' . $s_min . '" data-max="' . $s_max . '" data-step="' . $s_step . '"';
				
				//html output
				$output .= '<div id="' . $name . '-slider" class="rch_sliderui" style="margin-left: 7px;" '. $s_data .'></div>';
				$output .= '<input type="text" name="' . $name . '" id="' . $name . '" value="' . $s_val . '" class="rch-sliderui rch-input mini"  /> <span class="unit">' . $s_unit . '</span>';
				
			break;
			
			//background images option
			case 'tiles':				
				$value[] = 'bg0.png';
				$value[] = 'bg1.png';
				$value[] = 'bg2.png';
				$value[] = 'bg3.png';
				$value[] = 'bg4.png';
				$value[] = 'bg5.png';
				$value[] = 'bg6.jpg';
				$value[] = 'bg7.jpg';
				$value[] = 'bg8.png';
				$value[] = 'bg9.png';
				$value[] = 'bg10.png';
				$value[] = 'bg11.png';
				
				$output .= '<div class="rch-tiles">';
				$output .= '<input type="hidden" name="' . $name . '" class="rch-tiles rch-input ' . ($param['required'] == true ? 'required' : '') . '"  value="" />';
				foreach ($value as $option) { 			
					
					$bg = get_template_directory_uri() . '/images/bg/' . $option;
					$output .= '<span>';					
					$output .= '<div class="of-radio-tile-img " style="background: url('.$bg.')" data-attribute="' . $option . '"></div>';
					$output .= '</span>';				
				}
				$output .= '</div>';
			break;
			
			case "media":

				if(!isset($param['mod'])) $param['mod'] = '';
				
				$default = '';
				if(isset($param['default'])){
					$default = $param['default'];
				}
				$output .= '<div class="section-media">';
				$output .= Options_Machine::optionsframework_media_uploader_function($name, $default, $param['mod']);
				$output .= '</div>';
				
			break;
			
		}
		return $output;
	}
	
/**************************************
 * RCH Shortcodes Fontawesome Icons List
**************************************/
if ( !function_exists('RCHGetfontawsomelist') ) {
	function RCHGetfontawsomelist( $name = 'icon',$required = false) {
	
		$css = file_get_contents(get_template_directory() . '/framework/assets/font-awesome/css/font-awesome.css');

		$pattern = '/\.(fa-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';

		preg_match_all($pattern, $css, $matches, PREG_SET_ORDER);
		$output ='';
		$output .= '<div class="selected-icon"></div><input type="hidden" name="' . $name . '" value="" class="rch-icon rch-input ' . ($required == true ? 'required' : '') . '" ><div class="iconcontainer">';
		foreach ($matches as $match) {			
			$output .= "<i class='fa {$match[1]}' data-name='{$match[1]}'></i>";
		}
		$output .= '</div>';
		
		return $output;
	}
}
