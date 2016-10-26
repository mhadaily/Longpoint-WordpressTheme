<?php
/**************************************
 * RCHTHEME Metabox Generator
 
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
class RCHMetaboxesGenerator {
    var $options;
    var $config;
    var $saved_options;

    function RCHMetaboxesGenerator( $config, $options ) {
        $this->config = $config;
        $this->options = $options;
        add_action( 'admin_menu', array( &$this, 'create' ) );
		 add_action( 'save_post', array( &$this, 'save' ) );
    }

    function create() {
        if ( function_exists( 'add_meta_box' ) ) {
            if ( ! empty( $this->config['callback'] ) && function_exists( $this->config['callback'] ) ) {
                $callback = $this->config['callback'];
            } else {
                $callback = array( &$this, 'render' );
            }
            foreach ( $this->config['pages'] as $page ) {
                add_meta_box( $this->config['id'], $this->config['title'], $callback, $page, $this->config['context'], $this->config['priority'] );
            }
        }
    }

    function save( $post_id ) {
        if ( ! isset( $_POST[$this->config['id'] . '_noncename'] ) ) {
            return $post_id;
        }

        if ( ! wp_verify_nonce( $_POST[$this->config['id'] . '_noncename'], plugin_basename( __FILE__ ) ) ) {
            return $post_id;
        }

        if ( 'page' == $_POST['post_type'] ) {
            if ( ! current_user_can( 'edit_page', $post_id ) ) {
                return $post_id;
            }
        } else {
            if ( ! current_user_can( 'edit_post', $post_id ) ) {
                return $post_id;
            }
        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
        }
        add_post_meta( $post_id, 'textfalse', false, true );

        foreach ( $this->options as $option ) {
            if ( isset( $option['id'] ) && ! empty( $option['id'] ) ) {

                if ( isset( $_POST[$option['id']] ) ) {
                    if ( $option['type'] == 'multidropdown' ) {
                        $value = array_unique( explode( ',', $_POST[$option['id']] ) );
                    } else {
                        $value = $_POST[$option['id']];
                    }
                } else if ( $option['type'] == 'toggle' ) {
                        $value = - 1;
                    } else {
                    $value = false;
                }

                if ( get_post_meta( $post_id, $option['id'] ) == "" ) {
                    add_post_meta( $post_id, $option['id'], $value, true );
                } elseif ( $value != get_post_meta( $post_id, $option['id'], true ) ) {
                    update_post_meta( $post_id, $option['id'], $value );
                } elseif ( $value == "" ) {
                    delete_post_meta( $post_id, $option['id'], get_post_meta( $post_id, $option['id'], true ) );
                }
            }
        }
    }

    function render() {
        global $post;
        echo '<div class="masterkey-options-page rch-metabox-wrapper rch-resets">';
        foreach ( $this->options as $option ) {
            if ( method_exists( $this, $option['type'] ) ) {
                if ( isset( $option['id'] ) ) {
                    $default = get_post_meta( $post->ID, $option['id'], true );
                    if ( $default != "" ) {
                        $option['default'] = $default;
                    }
                }
                $this->$option['type']( $option );
            }
        }
        echo '<div class="clearboth"></div></div>';
        echo '<input type="hidden" name="' . $this->config['id'] . '_noncename" id="' . $this->config['id'] . '_noncename" value="' . wp_create_nonce( plugin_basename( __FILE__ ) ) . '" />';
    }

    function heading( $value ) {

        echo '<div class="rch-single-option no-divider" style="background:#000;padding:15px;color:#fff;font-size:16px;">';
        echo '<span class="option-title-main">'.$value['name'] .'</span>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }
        echo '</div>';
    }

/* Type : Text Box */

    function text( $value ) {

        echo '<div id="' . $value['id'] . '_wrapper" class="inside">';
        echo '<div style="width:25%; float:left;">';
        echo '<h4>'.$value['name'] .'</h4>';
		 echo '</div>';
        echo '<div style="width:74%; float:left;padding-top:5px;">';
		 echo '<input style="box-shadow:#DDDDDD 2px 3px;width:100%;border:1px solid #ccc; border-radius:5px; padding:10px;" name="' . $value['id'] . '" id="' . $value['id'] . '" type="text" value="' . ( isset( $value['default'] ) ?  $value['default'] : '' ) . '" />';
        if ( isset( $value['desc'] ) ) {
            echo '<br/><p style="color:#666666;padding:5px;">'.$value['desc'] .'</p>';
        }
        echo '</div>';
        echo '</div><div class="clear"></div>';
      	 echo '<hr/>';
    }

/* Type : Upload Image */

    // function upload( $value ) {
		
        // echo '<div id="' . $value['id'] . '_wrapper" class="inside">';
        // echo '<div style="width:25%; float:left;">';
        // echo '<h4>'.$value['name'] .'</h4>';
		 // echo '</div>';
        // echo '<div style="width:74%; float:left;padding-top:11px;">';

        // if ( version_compare( get_bloginfo( 'version' ), '3.5.0', '>=' ) ) {
            // echo '<div class="wp-media-buttons"><input class="rch-upload-url" type="text" id="' . $value['id'] . '" name="' . $value['id'] . '" size="50"  value="'.$value['default'].'" /><a class="button rch-upload-button thickbox" id="' . $value['id'] . '_rchbutton" href="#" >'.__( 'Upload', 'rchtheme' ).'</a></div>';
        // } else {
            // echo '<input class="rch-upload-url" type="text" id="' . $value['id'] . '" name="' . $value['id'] . '" size="50"  value="'.$value['default'].'" /><a class="button rch-upload-button thickbox" id="' . $value['id'] . '" href="media-upload.php?&post_id=0&target=' . $value['id'] . '&option_image_upload=1&type=image&TB_iframe=1&width=640&height=644">'.__( 'Upload', 'rchtheme' ).'</a>';
        // }
        // if($value['preview'] != false) {
             // echo '<span id="' . $value['id'] . '-rchpreview" class="show-uploaded-image"><img src="'.$value['default'].'" title="Logo Preview" style="max-width:260px;max-height:125px;" /></span>';
        // }

         // if ( isset( $value['desc'] ) ) {
            // echo '<br/><p style="color:#666666;padding:5px;">'.$value['desc'] .'</p>';
        // }		
        // echo '</div>';
        // echo '</div><div class="clear"></div>';
      	 // echo '<hr/>';

    // }
	function media( $value ) {	
		echo '<div id="' . $value['id'] . '_wrapper" class="inside">';
        echo '<div style="width:25%; float:left;">';
        echo '<h4>'.$value['name'] .'</h4>';
		echo '</div>';
        echo '<div style="width:74%; float:left;padding-top:11px;">';
			
		$mod = $default = '';
		if(isset($value['default'])){
			$default = $value['default'];
		}
		echo '<div class="section-media">';
		echo Options_Machine::optionsframework_media_uploader_function($value['id'], $default, $mod);
		echo '</div>';
			
		if ( isset( $value['desc'] ) ) {
            echo '<br/><p style="color:#666666;padding:5px;">'.$value['desc'] .'</p>';
        }	
		echo '</div>';
		echo '</div><div class="clear"></div>';
		echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/framework/admin/shortcodes/js/script.js"></script>';
		echo '<hr/>';
	}

/*Type : Color Picker*/

    // function color( $value ) {

        // $no_divider = $value['divider'] ? 'with-divider' : 'no-divider';
        // echo '<div id="' . $value['id'] . '_wrapper" class="rch-single-option-wrapper">';
        // echo '<div class="rch-single-option '.$no_divider.'">';

        // echo '<label for="'.$value['id'].'"><span class="option-title-'.$value['option_structure'].'">'.$value['name'] .'</label>';

        // echo '<input name="' . $value['id'] . '" id="' . $value['id'] . '" size="8" type="minicolors" class="of-color rch-text rch-input color-picker" value="'. $value['default'] .'" />';
        
		// if ( isset( $value['desc'] ) ) {
            // echo '<span class="option-desc">'.$value['desc'] .'</span>';
        // }
		
        // echo '</div>';
        // if ( isset( $value['divider'] ) && $value['divider'] == true ) {

            // echo '<div class="option-divider"></div>';
        // }
        // echo '</div>';
    // }
	function color( $value ) {
		
		echo '<div id="' . $value['id'] . '_wrapper" class="inside">';
        echo '<div style="width:25%; float:left;">';
        echo '<h4>'.$value['name'] .'</h4>';
		echo '</div>';
        echo '<div style="width:74%; float:left;padding-top:11px;">';
			
		$mod = $default = '';
		if(isset($value['default'])){
			$default = $value['default'];
		}
		echo '<div class="section-media">';
		echo '<input name="' . $value['id'] . '" id="' . $value['id'] . '" size="8" type="minicolors" class="of-color rch-text rch-input color-picker" value="'. $value['default'] .'" />';
		echo '</div>';
			
		if ( isset( $value['desc'] ) ) {
            echo '<br/><p style="color:#666666;padding:5px;">'.$value['desc'] .'</p>';
        }	
		echo '</div>';
		echo '</div><div class="clear"></div>';
		echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/framework/admin/shortcodes/js/script.js"></script>';
		echo '<hr/>';		
    }
	
	
/* Type : Date picker */
    function datepicker( $value ) {
 		 echo '<div id="' . $value['id'] . '_wrapper" class="inside">';
        echo '<div style="width:25%; float:left;">';
        echo '<h4>'.$value['name'] .'</h4>';
		 echo '</div>';
        echo '<div style="width:74%; float:left;padding-top:11px;">';
        echo '<input style="box-shadow:#DDDDDD 2px 3px;width:100%;border:1px solid #ccc; border-radius:5px; padding:10px;" id="datepicker"  name="' . $value['id'] . '" >' . $value['default'] . '</textarea>';
 
        if ( isset( $value['desc'] ) ) {
            echo '<br/><p style="color:#666666;padding:5px;">'.$value['desc'] .'</p>';
        }		
        echo '</div>';
        echo '</div><div class="clear"></div>';
      	 echo '<hr/>';
    }



/* Type : Textarea */
    function textarea( $value ) {
 		 echo '<div id="' . $value['id'] . '_wrapper" class="inside">';
        echo '<div style="width:25%; float:left;">';
        echo '<h4>'.$value['name'] .'</h4>';
		 echo '</div>';
        echo '<div style="width:74%; float:left;padding-top:11px;">';
        echo '<textarea style="box-shadow:#DDDDDD 2px 3px;width:100%;border:1px solid #ccc; border-radius:5px; padding:10px;" id="' . $value['id'] . '" row="7" name="' . $value['id'] . '" class="code">' . $value['default'] . '</textarea>';
 
        if ( isset( $value['desc'] ) ) {
            echo '<br/><p style="color:#666666;padding:5px;">'.$value['desc'] .'</p>';
        }		
        echo '</div>';
        echo '</div><div class="clear"></div>';
      	 echo '<hr/>';
    }


/* Type : Checkbox */

    function checkbox( $value ) {
       if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }

        $no_divider = $value['divider'] ? 'with-divider' : 'no-divider';
        echo '<div id="' . $value['id'] . '_wrapper" class="rch-single-option-wrapper">';
        echo '<div class="rch-single-option '.$no_divider.' ">';

        echo '<label><span class="option-title-'.$value['option_structure'].'">'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="rch-select-radio">';


        foreach ( $value['options'] as $key => $option ) {
            echo '<input type="checkbox" value="' . $key . '" id="' . $value['id'] . '-checkbox-' . $key . '" name="' . $value['id'] . '[]"';
            if ( isset( $this->saved_options[$value['id']] ) ) {
                    if ( stripslashes( $this->saved_options[$value['id']] ) == $key ) {
                        echo ' checked="checked"';
                    }
                }
                else if ( in_array( $key, $default )) {
                        echo ' checked="checked"';
                }
            echo '><label for="' . $value['id'] . '-checkbox-' . $key . '"><span></span>' . $option . '</label>';
        }
        echo '</div>';

        echo '</div>';
        if ( isset( $value['divider'] ) && $value['divider'] == true ) {

            echo '<div class="option-divider"></div>';
        }
        echo '</div>';
    }



/*Type : Radio Button*/
    function radio( $value ) {
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }

        $no_divider = $value['divider'] ? 'with-divider' : 'no-divider';
        echo '<div id="' . $value['id'] . '_wrapper" class="rch-single-option-wrapper">';
        echo '<div class="rch-single-option '.$no_divider.' ">';

        echo '<label><span class="option-title-'.$value['option_structure'].'">'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<div class="rch-select-radio">';


        foreach ( $value['options'] as $key => $option ) {
            echo '<input type="radio" value="' . $key . '" id="' . $value['id'] . '-radio-' . $key . '" name="' . $value['id'] . '[]"';

             if ( isset( $this->saved_options[$value['id']] ) ) {
                    if ( stripslashes( $this->saved_options[$value['id']] ) == $key ) {
                        echo ' checked="checked"';
                    }
                }
                else if ( in_array( $key, $default )) {
                        echo ' checked="checked"';
                }
            echo '><label for="' . $value['id'] . '-radio-' . $key . '"><span></span>' . $option . '</label>';
        }
        echo '</div>';

        echo '</div>';
        if ( isset( $value['divider'] ) && $value['divider'] == true ) {

            echo '<div class="option-divider"></div>';
        }
        echo '</div>';
    }

/* Type : Multi Select*/

    function multiselect( $value ) {
        if ( isset( $value['target'] ) ) {
            if ( isset( $value['options'] ) ) {
                $value['options'] = $value['options'] + $this->get_select_target_options( $value['target'] );
            }
            else {
                $value['options'] = $this->get_select_target_options( $value['target'] );
            }
        }
        $width = isset( $value['width'] ) ? $value['width'] : '500';
        $no_divider = $value['divider'] ? 'with-divider' : 'no-divider';
        $margin_bottom = isset( $value['margin_bottom'] ) ? $value['margin_bottom'] : '0';
        echo '<div id="' . $value['id'] . '_wrapper" class="rch-single-option-wrapper" style="margin-bottom:'.$margin_bottom.'px">';
        echo '<div class="rch-single-option '.$no_divider.' ">';

        echo '<label><span class="option-title-'.$value['option_structure'].'">'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        echo '<select class="rch-chosen" name="' . $value['id'] . '[]" id="' . $value['id'] . '" multiple="multiple" style="width:'.$width.'px;">';

        if ( !empty( $value['options'] ) && is_array( $value['options'] ) ) {
            foreach ( $value['options'] as $key => $option ) {
                echo '<option value="' . $key . '"';
                if ( in_array( $key, $value['default'] ) ) {
                    echo ' selected="selected"';
                }
                echo '>' . $option . '</option>';
            }
        }
        echo '</select>';

        echo '</div>';
        if ( isset( $value['divider'] ) && $value['divider'] == true ) {

            echo '<div class="option-divider"></div>';
        }
        echo '</div>';
    }



/* Type :  Select*/

    function select( $value ) {
       if ( isset( $value['target'] ) ) {
            if ( isset( $value['options'] ) ) {
                $value['options'] = $value['options'] + $this->get_select_target_options( $value['target'] );
            }
            else {
                $value['options'] = $this->get_select_target_options( $value['target'] );
            }
        }

        if ( isset( $this->saved_options[$value['id']] ) ) {
            $default = $this->saved_options[$value['id']];
        }
        else {
            $default = $value['default'];
        }
		 echo '<div id="' . $value['id'] . '_wrapper" class="inside">';
        echo '<div style="width:25%; float:left;">';
        echo '<h4>'.$value['name'] .'</h4>';
		 echo '</div>';
        echo '<div style="width:74%; float:left;padding-top:11px;">';
        echo '<select class="rch-chosen" name="' . $value['id'] . '" id="' . $value['id'] . '">';
        echo '<option value="">'. __('Select Option', 'theme_rchtheme').'</option>';
        if ( !empty( $value['options'] ) && is_array( $value['options'] ) ) {
            foreach ( $value['options'] as $key => $option ) {
                echo '<option value="' . $key . '"';
                if ( isset( $this->saved_options[$value['id']] ) ) {
                    if ( stripslashes( $this->saved_options[$value['id']] ) == $key ) {
                        echo ' selected="selected"';
                    }
                }
                else if ( $key == $default ) {
                        echo ' selected="selected"';
                    }
                echo '>' . $option . '</option>';
            }
        }
        echo '</select>';
        if ( isset( $value['desc'] ) ) {
            echo '<br/><p style="color:#666666;padding:5px;">'.$value['desc'] .'</p>';
        }		
        echo '</div>';
        echo '</div><div class="clear"></div>';
      	 echo '<hr/>';

    }

/*Type : Wrodpress Built-in Editor*/
    function editor( $value ) {
        $rows = isset( $value['rows'] ) ? $value['rows'] : '7';
        if ( isset( $this->saved_options[$value['id']] ) ) {
            $value['default'] = stripslashes( $this->saved_options[$value['id']] );
        }
        $no_divider = $value['divider'] ? 'with-divider' : 'no-divider';
        $item_padding = isset( $value['item_padding'] ) ? $value['item_padding'] : '20px 30px 0 0';
        echo '<div id="' . $value['id'] . '_wrapper" class="rch-single-option-wrapper">';
        echo '<div class="rch-single-option '.$no_divider.' ">';

        echo '<label><span class="option-title-'.$value['option_structure'].'">'.$value['name'] .'</span></label>';

        if ( isset( $value['desc'] ) ) {
            echo '<span class="option-desc">'.$value['desc'] .'</span>';
        }

        wp_editor( $value['default'], $value['id'] );
       
	    echo '</div>';
        if ( isset( $value['divider'] ) && $value['divider'] == true ) {

            echo '<div class="option-divider"></div>';
        }
        echo '</div>';

    }
	
	function parallax_sorter( $value ) {
		// Make sure to get list of all the default blocks first
		$all_blocks = $value['std'];

		$temp = array(); // holds default blocks
		$temp2 = array(); // holds saved blocks

		foreach($all_blocks as $blocks) {
			$temp = array_merge($temp, $blocks);
		}

		$sortlists = isset($data[$value['id']]) && !empty($data[$value['id']]) ? $data[$value['id']] : $value['std'];

		foreach( $sortlists as $sortlist ) {
			$temp2 = array_merge($temp2, $sortlist);
		}

		// now let's compare if we have anything missing
		foreach($temp as $k => $v) {
		if(!array_key_exists($k, $temp2)) {
			$sortlists['disabled'][$k] = $v;
		}
		}

		// now check if saved blocks has blocks not registered under default blocks
		foreach( $sortlists as $key => $sortlist ) {
		foreach($sortlist as $k => $v) {
			if(!array_key_exists($k, $temp)) {
			unset($sortlist[$k]);
			}
		}
		$sortlists[$key] = $sortlist;
		}

		// assuming all sync'ed, now get the correct naming for each block
		foreach( $sortlists as $key => $sortlist ) {
		foreach($sortlist as $k => $v) {
			$sortlist[$k] = $temp[$k];
		}
		$sortlists[$key] = $sortlist;
		}

		$output .= '<div id="'.$value['id'].'" class="sorter">';


		if ($sortlists) {

		foreach ($sortlists as $group=>$sortlist) {

			$output .= '<ul id="'.$value['id'].'_'.$group.'" class="sortlist_'.$value['id'].'">';
			$output .= '<h3>'.$group.'</h3>';

			foreach ($sortlist as $key => $list) {

			$output .= '<input class="sorter-placebo" type="hidden" name="'.$value['id'].'['.$group.'][placebo]" value="placebo">';

			if ($key != "placebo") {

				$output .= '<li id="'.$key.'" class="sortee">';
				$output .= '<input class="position" type="hidden" name="'.$value['id'].'['.$group.']['.$key.']" value="'.$list.'">';
				$output .= $list;
				$output .= '</li>';

			}

			}

			$output .= '</ul>';
		}
		}

		$output .= '</div>';
    }

function get_sidebar_options() {
    $sidebars = theme_option( THEME_OPTIONS, 'sidebars' );
    if ( !empty( $sidebars ) ) {
        $sidebars_array = explode( ',', $sidebars );
        $options        = array();
        foreach ( $sidebars_array as $sidebar ) {
            $options[$sidebar] = $sidebar;
        }
        return $options;
    }
    else {
        return array();
    }
  }
}