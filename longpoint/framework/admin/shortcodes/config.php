<?php 
/**************************************
 * RCHTHEME Framworks Functions
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/


require_once (get_template_directory() . '/framework/admin/shortcodes/generator.php');


/**************************************
 * RCH Shortcodes Dictionary
**************************************/
$dictionary['display_label'] = __('Display', 'Longpoint');
$dictionary['display_description'] = __('Show on selected devices.', 'Longpoint');
$dictionary['animation_label'] = __('Animation', 'Longpoint');
$dictionary['animation_description'] = __('When you scroll down on the page it seems triggers an animated element.', 'Longpoint');
$dictionary['extraclass_label'] = __('Extra Class', 'Longpoint');
$dictionary['extraclass_description'] = __('Insert the column extra class.', 'Longpoint');
$dictionary['inlinestyle_label'] = __('Inline Style', 'Longpoint');
$dictionary['inlinestyle_description'] = __('The style attribute can contain any CSS property. [ex: color: red;]', 'Longpoint');
$dictionary['icon_label'] = __('Select Icon', 'Longpoint');
$dictionary['icon_description'] = __('Click an icon to select,click again to deselect.', 'Longpoint');
$dictionary['spinning_icon_label'] = __('Spinning Icons', 'Longpoint');
$dictionary['spinning_icon_description'] = __('Utilize this selection to get an icon to rotate.', 'Longpoint');

/**************************************
 * Section options
**************************************/
$rch_shortcodes['section'] = array(
	'title' => __('Section', 'Longpoint'),
	'icon' => 'arrows-h',
	'js' => 'default',
	'params' => array(		
		'type' => array(
			'type' => 'select',
			'label' => __('Section Style', 'Longpoint'),
			'desc' => __('Select the section style.', 'Longpoint'),
			'options' => array(
				'' => __('Default','Longpoint'),
				'feature1' => __('Feature 1','Longpoint'),
				'feature2' => __('Feature 2','Longpoint'),
				'feature3' => __('Feature 3','Longpoint'),				
			)
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);

/**************************************
 * Container options
**************************************/
$rch_shortcodes['container'] = array(
	'title' => __('Container', 'Longpoint'),
	'icon' => 'arrows-h',
	'js' => 'default',
	'params' => array(		
		// 'full_width' => array(			
			// 'type' => 'switch',
			// 'label' => __('Full Width', 'Longpoint'),
			// 'desc' => __('Full width layout.', 'Longpoint'),
			// 'on' => __('Enable', 'Longpoint'),
			// 'off' => __('Disable', 'Longpoint'),
			// 'default' => ''
		// ),
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);

/**************************************
 * row options
**************************************/
$rch_shortcodes['row'] = array(
	'title' => __('Row', 'Longpoint'),
	'icon' => 'columns',
	'js' => 'default',
	'params' => array(		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);


/**************************************
 * Column options
**************************************/
$rch_shortcodes['column'] = array(
	'title' => __('Column', 'Longpoint'),
	'icon' => 'columns',
	'js' => 'columns',
	'params' => array(
		'column' => array(
			'type' => 'select',
			'label' => __('Column Type', 'Longpoint'),
			'desc' => __('Select the width of the column', 'Longpoint'),
			'options' => array(
				'full_width' => __('Full Width','Longpoint'),
				'one_half' => __('One Half','Longpoint'),
				'one_third' => __('One Third','Longpoint'),
				'two_third' => __('Two Thirds','Longpoint'),
				'one_fourth' => __('One Fourth','Longpoint'),
				'three_fourth' => __('Three Fourth','Longpoint'),
				'one_sixth' => __('One Sixth','Longpoint'),
				'five_sixth' => __('Five Sixth','Longpoint'),
				'column1' => __('Column 1','Longpoint'),
				'column2' => __('Column 2','Longpoint'),
				'column3' => __('Column 3','Longpoint'),
				'column4' => __('Column 4','Longpoint'),
				'column5' => __('Column 5','Longpoint'),
				'column6' => __('Column 6','Longpoint'),
				'column7' => __('Column 7','Longpoint'),
				'column8' => __('Column 8','Longpoint'),
				'column9' => __('Column 9','Longpoint'),
				'column10' => __('Column 10','Longpoint'),
				'column11' => __('Column 11','Longpoint'),
				'column12' => __('Column 12','Longpoint')
			)
		),		
		'content' => array(			
			'type' => 'textarea',
			'label' => __('Column Content', 'Longpoint'),
			'desc' => __('Insert the column content', 'Longpoint'),
		),
		'align' => array(			
			'type' => 'select',
			'label' => __('Text Align', 'Longpoint'),
			'desc' => __('Select the text align.', 'Longpoint'),
			'options' => array(
				'' => __('Default','Longpoint'),
				'left' => __('Left','Longpoint'),
				'center' => __('Center','Longpoint'),
				'right' => __('Right','Longpoint')				
			)
		),
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);

/**************************************
 * Dividers & Lines options
**************************************/
$rch_shortcodes['divider'] = array(
	'title' => __('Dividers & Lines', 'Longpoint'),
	'icon' => 'ellipsis-h',
	'js' => 'divider',
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Divider Type', 'Longpoint'),
			'desc' => __('Select the type of the divier', 'Longpoint'),
			'options' => array(
				'divider' => __('Divider','Longpoint'),
				'horizontal_line' => __('Horizental Line','Longpoint'),
				'double_horizontal_line' => __('Double Horizental Line','Longpoint'),
				'divider_dotted' => __('Divider Dotted','Longpoint'),
				'double_divider_dotted' => __('Double Divider Dotted','Longpoint'),
				'divider_dashed' => __('Divider Dashed','Longpoint'),
				'double_divider_dashed' => __('Double Divider Dashed','Longpoint'),
				'divider_shadow' => __('Divider Shadow','Longpoint'),
				'divider_top' => __('Divider Top','Longpoint'),
				'divider_text' => __('Divider Text','Longpoint'),
				'double_divider_text' => __('Double Divider Text','Longpoint'),
				'br' => __('Break Line','Longpoint'),
				'gap' => __('Gap','Longpoint')
			)
		),	
		'icon' => array(
			'type' => 'fonticon',
			'fullwidth' => true,
			'label' => $dictionary['icon_label'],
			'desc' => $dictionary ['icon_description']			
		),
		'text' => array(			
			'type' => 'text',
			'label' => __('Text', 'Longpoint'),
			'desc' => __('Insert the divider text', 'Longpoint'),
		),
		'align' => array(			
			'type' => 'select',
			'label' => __('Position', 'Longpoint'),
			'desc' => __('Select the text position', 'Longpoint'),
			'options' => array(
				'' => __('Default','Longpoint'),
				'left' => __('Left','Longpoint'),
				'center' => __('Center','Longpoint'),
				'right' => __('Right','Longpoint')				
			)
		),
		'h' => array(			
			'type' => 'number',
			'min' => 0,
			'max' => 100,
			'default' => 0,
			'label' => __('Gap Height', 'Longpoint'),
			'desc' => __('Insert the gap height', 'Longpoint'),
		),
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);


/**************************************
 * Font icon options
**************************************/
$rch_shortcodes['fonticon'] = array(
	'title' => __('Icon', 'Longpoint'),
	'icon' => 'magic',
	'js' => 'icon',
	'params' => array(
		'icon' => array(
			'type' => 'fonticon',
			'fullwidth' => true,
			'label' => $dictionary['icon_label'],
			'desc' => $dictionary ['icon_description'],
			'required' => true
		),
		'size' => array(			
			'type' => 'select',
			'label' => __('Size', 'Longpoint'),
			'desc' => __('Select the icon size', 'Longpoint'),
			'options' => array(
				'' => __('Normal', 'Longpoint'),				
				'2x' => __('2X', 'Longpoint'),
				'3x' => __('3X', 'Longpoint'),
				'4x' => __('4X', 'Longpoint'),
				'5x' => __('5X', 'Longpoint')					
			)
		),
		'customsize' => array(			
			'type' => 'sliderui',
			'label' => __('Icon Custom Size', 'Longpoint'),
			'desc' => __('If above size is not in effect for you set the custom size in pixel of the selected icon.', 'Longpoint'),
			'min' => '0',
			'max' => '150',
			'default' => '0'			
		),		
		'spinning' => array(			
			'type' => 'switch',
			'label' => $dictionary['spinning_icon_label'],
			'desc' => $dictionary['spinning_icon_description'],
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'rotation' => array(			
			'type' => 'fontrotation',
			'label' => __('Rotated & Flipped', 'Longpoint'),
			'desc' => __('To arbitrarily rotate and flip icons, use this option.', 'Longpoint'),			
		),	
		'circle' => array(			
			'type' => 'switch',
			'label' => __('Circle container', 'Longpoint'),
			'desc' => __('If you enable this option, icon will be placed in a rounded box.', 'Longpoint'),
			'on' => __('On', 'Longpoint'),
			'off' => __('Off', 'Longpoint'),
			'default' => ''
		),
		'color' => array(			
			'type' => 'color',
			'label' => __('Icon Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'background' => array(			
			'type' => 'color',
			'label' => __('Background Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'bordercolor' => array(			
			'type' => 'color',
			'label' => __('Border Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),		
		'bordersize' => array(			
			'type' => 'sliderui',
			'label' => __('Border Size', 'Longpoint'),
			'desc' => __('Sets the border size in pixel for the selected icon.', 'Longpoint'),
			'min' => '0',
			'max' => '10',
			'default' => '0'			
		),	
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);

/**************************************
 * Qoute options
**************************************/
$rch_shortcodes['qoute'] = array(
	'title' => __('Qoute', 'Longpoint'),
	'icon' => 'quote-left',
	'js' => 'default',
	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Qoute Type', 'Longpoint'),
			'desc' => __('Select the type of the qoute.', 'Longpoint'),
			'options' => array(
				'' => __('Line','Longpoint'),
				'qoute' => __('Qoute','Longpoint')				
			)
		),		
		'content' => array(			
			'type' => 'textarea',
			'label' => __('Qoute Content', 'Longpoint'),
			'desc' => __('Insert the qoute content.', 'Longpoint'),
		),
		'author' => array(			
			'type' => 'text',
			'label' =>  __('Author', 'Longpoint'),
			'desc' => __('The name of the source.', 'Longpoint')
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Align', 'Longpoint'),
			'desc' => __('Select the qoute align.', 'Longpoint'),
			'options' => array(
				'' => __('Default','Longpoint'),
				'left' => __('Left','Longpoint'),
				'center' => __('Center','Longpoint'),
				'reverse' => __('Right','Longpoint')	
			)
		),			
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Dropcap options
**************************************/
$rch_shortcodes['dropcap'] = array(
	'title' => __('Dropcap', 'Longpoint'),
	'icon' => 'font',
	'js' => 'dropcap',
	'params' => array(
		'character' => array(			
			'type' => 'text',
			'label' => __('Dropcaps character', 'Longpoint'),
			'desc' => __('Insert the dropcap character.', 'Longpoint'),
		),
		'size' => array(			
			'type' => 'select',
			'label' => __('Size', 'Longpoint'),
			'desc' => __('Select the dropcap size', 'Longpoint'),
			'options' => array(
				'' => __('1X', 'Longpoint'),				
				'2x' => __('2X', 'Longpoint'),
				'3x' => __('3X', 'Longpoint'),
				'4x' => __('4X', 'Longpoint'),
				'5x' => __('5X', 'Longpoint')					
			)
		),		
		'circle' => array(			
			'type' => 'switch',
			'label' => __('Circle container', 'Longpoint'),
			'desc' => __('If you enable this option, dropcap will be placed in a rounded box.', 'Longpoint'),
			'on' => __('On', 'Longpoint'),
			'off' => __('Off', 'Longpoint'),
			'default' => ''
		),
		'color' => array(			
			'type' => 'color',
			'label' => __('Character Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'background' => array(			
			'type' => 'color',
			'label' => __('Background Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'bordercolor' => array(			
			'type' => 'color',
			'label' => __('Border Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'bordersize' => array(			
			'type' => 'number',
			'label' => __('Border Size', 'Longpoint'),
			'desc' => __('Sets the border size in pixel for the selected icon.', 'Longpoint'),
			'min' => 0,
			'max' => 10,			
			'default' => 0,			
		),
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * List options
**************************************/
$rch_shortcodes['list'] = array(
	'title' => __('List', 'Longpoint'),
	'icon' => 'list',
	'js' => 'list',
	'params' => array(
		'item' => array(
			'type' => 'textAddrowSortable',
			'fullwidth' => true,			
			'itemLabel' => __('Content', 'Longpoint'),
			'itemDesc' => __('List Item Content.', 'Longpoint'),
			'addrowTitle' => __('Add Item', 'Longpoint'),			
		),		
		'icon' => array(
			'type' => 'fonticon',
			'fullwidth' => true,
			'label' => $dictionary['icon_label'],
			'desc' => $dictionary ['icon_description'],			
		),
		'spinning' => array(			
			'type' => 'switch',
			'label' => $dictionary['spinning_icon_label'],
			'desc' => $dictionary['spinning_icon_description'],
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'rotation' => array(			
			'type' => 'fontrotation',
			'label' => __('Rotated & Flipped', 'Longpoint'),
			'desc' => __('To arbitrarily rotate and flip icons, use this option.', 'Longpoint'),			
		),	
		'circle' => array(			
			'type' => 'switch',
			'label' => __('Circle container', 'Longpoint'),
			'desc' => __('If you enable this option, icon will be placed in a rounded box.', 'Longpoint'),
			'on' => __('On', 'Longpoint'),
			'off' => __('Off', 'Longpoint'),
			'default' => ''
		),
		'color' => array(			
			'type' => 'color',
			'label' => __('Icon Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'background' => array(			
			'type' => 'color',
			'label' => __('Background Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'bordercolor' => array(			
			'type' => 'color',
			'label' => __('Border Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),		
		'bordersize' => array(			
			'type' => 'sliderui',
			'label' => __('Border Size', 'Longpoint'),
			'desc' => __('Sets the border size in pixel for the selected icon.', 'Longpoint'),
			'min' => '0',
			'max' => '10',
			'default' => '0'			
		),	
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * List Group options
**************************************/
$rch_shortcodes['listgroup'] = array(
	'title' => __('List Group', 'Longpoint'),
	'icon' => 'list',
	'js' => 'listgroup',
	'params' => array(
		'item' => array(
			'type' => 'textAddrowSortableWithTextarea',
			'fullwidth' => true,			
			'itemHeadingLabel' => __('Heading', 'Longpoint'),
			'itemHeadingDesc' => __('List Item Heading.', 'Longpoint'),
			'itemLabel' => __('Content', 'Longpoint'),
			'itemDesc' => __('List Item Content.', 'Longpoint'),
			'addrowTitle' => __('Add Item', 'Longpoint'),			
		),	
		'horizental' => array(			
			'type' => 'switch',
			'label' => __('Horizental', 'Longpoint'),
			'desc' => __('Show list group in horizontal mode.', 'Longpoint'),
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);



/**************************************
 * Tabs options
**************************************/
$rch_shortcodes['tabs'] = array(
	'title' => __('Tabs', 'Longpoint'),
	'icon' => 'list-alt',
	'js' => 'tabs',
	'params' => array(		
		'item' => array(
			'type' => 'tab',
			'fullwidth' => true,			
			'itemHeadingLabel' => __('Title', 'Longpoint'),
			'itemHeadingDesc' => __('Title of the tab.', 'Longpoint'),
			'itemLabel' => __('Content', 'Longpoint'),
			'itemDesc' => __('Add the tab Content.', 'Longpoint'),
			'itemDeviceLabel' => $dictionary['display_label'],
			'itemDeviceDesc' => $dictionary['display_description'],
			'addrowTitle' => __('Add Tab', 'Longpoint'),			
		),	
		'vertical' => array(			
			'type' => 'switch',
			'label' => __('Vertical', 'Longpoint'),
			'desc' => __('Show tabs in vertical mode.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => ''
		),
		'justified' => array(			
			'type' => 'switch',
			'label' => __('Justified', 'Longpoint'),
			'desc' => __('Make tabs or pills equal widths of their parent.', 'Longpoint'),
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'align' => array(			
			'type' => 'select',
			'label' => __('Tabs align', 'Longpoint'),
			'desc' => __('Select the tabs align.', 'Longpoint'),
			'options' => array(
				'' => __('Default', 'Longpoint'),
				'left' => __('Left', 'Longpoint'),				
				'right' => __('Right', 'Longpoint'),				
			)
		),
		'active' => array(			
			'type' => 'number',
			'label' => __('Active tab', 'Longpoint'),
			'desc' => __('Select which tab is open by default.', 'Longpoint'),
			'min' => 1,
			'max' => 100,			
			'default' => 1,			
		),
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);



/**************************************
 * Accordion options
**************************************/
$rch_shortcodes['accordion'] = array(
	'title' => __('Accordion', 'Longpoint'),
	'icon' => 'caret-square-o-right',
	'js' => 'accordion',
	'params' => array(		
		'item' => array(
			'type' => 'tab',
			'fullwidth' => true,			
			'itemHeadingLabel' => __('Title', 'Longpoint'),
			'itemHeadingDesc' => __('Title of the tab.', 'Longpoint'),
			'itemLabel' => __('Content', 'Longpoint'),
			'itemDesc' => __('Add the tab Content.', 'Longpoint'),
			'itemDeviceLabel' => $dictionary['display_label'],
			'itemDeviceDesc' => $dictionary['display_description'],
			'addrowTitle' => __('Add Tab', 'Longpoint'),			
		),	
		'toggle' => array(			
			'type' => 'switch',
			'label' => __('Toggle', 'Longpoint'),
			'desc' => __('Show accordion in toggle mode.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => ''
		),		
		'active' => array(			
			'type' => 'number',
			'label' => __('Active tab', 'Longpoint'),
			'desc' => __('Select which tab is open by default.', 'Longpoint'),
			'min' => 1,
			'max' => 100,			
			'default' => 1,			
		),
		'open_icon' => array(
			'type' => 'fonticon',
			'fullwidth' => true,
			'label' => __('Select accordion open icon', 'Longpoint'),
			'desc' => $dictionary ['icon_description'],			
		),
		'close_icon' => array(
			'type' => 'fonticon',
			'fullwidth' => true,
			'label' => __('Select accordion close icon', 'Longpoint'),
			'desc' => $dictionary ['icon_description'],			
		),
		'spinning' => array(			
			'type' => 'switch',
			'label' => $dictionary['spinning_icon_label'],
			'desc' => $dictionary['spinning_icon_description'],
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'rotation' => array(			
			'type' => 'fontrotation',
			'label' => __('Rotated & Flipped', 'Longpoint'),
			'desc' => __('To arbitrarily rotate and flip icons, use this option.', 'Longpoint'),			
		),	
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);



/**************************************
 * Button options
**************************************/
$rch_shortcodes['button'] = array(
	'title' => __('Button', 'Longpoint'),
	'icon' => 'rocket',
	'js' => 'button',
	'params' => array(
		'text' => array(			
			'type' => 'text',
			'label' => __('Button Text', 'Longpoint'),
			'desc' => __('Add the button\'s text.', 'Longpoint')
		),
		'link' => array(			
			'type' => 'text',
			'label' => __('Button URL', 'Longpoint'),
			'desc' => __('Add the button\'s url.', 'Longpoint')
		),
		'type' => array(			
			'type' => 'select',
			'label' => __('Style', 'Longpoint'),
			'desc' => __('Select the button style', 'Longpoint'),
			'options' => array(
				'' => __('Default', 'Longpoint'),				
				'outer' => __('Outer', 'Longpoint'),
				'primary' => __('Dark Blue', 'Longpoint'),
				'info' => __('Blue', 'Longpoint'),
				'success' => __('Green', 'Longpoint'),
				'warning' => __('Orange', 'Longpoint'),
				'danger' => __('Red', 'Longpoint'),							
			)
		),	
		'size' => array(			
			'type' => 'select',
			'label' => __('Size', 'Longpoint'),
			'desc' => __('Select the button size', 'Longpoint'),
			'options' => array(
				'' => __('Default', 'Longpoint'),				
				'lg' => __('Large', 'Longpoint'),
				'sm' => __('Medium', 'Longpoint'),				
				'xs' => __('Small', 'Longpoint')					
			)
		),			
		'icon' => array(
			'type' => 'fonticon',
			'fullwidth' => true,
			'label' => $dictionary['icon_label'],
			'desc' => $dictionary ['icon_description'],			
		),		
		'spinning' => array(			
			'type' => 'switch',
			'label' => $dictionary['spinning_icon_label'],
			'desc' => $dictionary['spinning_icon_description'],
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'rotation' => array(			
			'type' => 'fontrotation',
			'label' => __('Rotated & Flipped', 'Longpoint'),
			'desc' => __('To arbitrarily rotate and flip icons, use this option.', 'Longpoint'),			
		),			
		'color' => array(			
			'type' => 'color',
			'label' => __('Text Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'background' => array(			
			'type' => 'color',
			'label' => __('Background Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'bordercolor' => array(			
			'type' => 'color',
			'label' => __('Border Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'bordersize' => array(			
			'type' => 'number',
			'label' => __('Border Size', 'Longpoint'),
			'desc' => __('Sets the border size in pixel for the selected icon.', 'Longpoint'),
			'min' => 0,
			'max' => 10,			
			'default' => 1,			
		),
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Title options
**************************************/
$rch_shortcodes['title'] = array(
	'title' => __('Heading Title', 'Longpoint'),
	'icon' => 'h-square',
	'js' => 'title',
	'params' => array(
		'title' => array(			
			'type' => 'text',
			'label' => __('Heading Title', 'Longpoint'),
			'desc' => __('Add the heading\'s title.', 'Longpoint')
		),
		'second_title' => array(			
			'type' => 'text',
			'label' => __('Second Heading Title', 'Longpoint'),
			'desc' => __('Add the small heading\'s title.', 'Longpoint')
		),
		'type' => array(			
			'type' => 'select',
			'label' => __('Tag Name', 'Longpoint'),
			'desc' => __('Select the tag name.', 'Longpoint'),
			'options' => array(
				'h1' => __('H1', 'Longpoint'),	
				'h2' => __('H2', 'Longpoint'),				
				'h3' => __('H3', 'Longpoint'),	
				'h4' => __('H4', 'Longpoint'),				
				'h5' => __('H5', 'Longpoint'),	
				'h6' => __('H6', 'Longpoint'),				
			)
		),	
		'pattern' => array(			
			'type' => 'switch',
			'label' => __('Pattern', 'Longpoint'),
			'desc' => __('Utilize this option to set heading with pattern.', 'Longpoint'),
			'on' => __('On', 'Longpoint'),
			'off' => __('Off', 'Longpoint'),
			'default' => ''
		),
		'pattern_color' => array(			
			'type' => 'color',
			'label' => __('Pattern Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),		
		'color' => array(			
			'type' => 'color',
			'label' => __('Text Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'font_size' => array(			
			'type' => 'sliderui',
			'label' => __('Font Size', 'Longpoint'),
			'desc' => __('Sets the font size in pixel.', 'Longpoint'),
			'min' => '12',
			'max' => '50',
			'default' => '24',
		),
		'font_weight' => array(			
			'type' => 'select',
			'label' => __('Font Weight', 'Longpoint'),
			'desc' => __('Select the font weight', 'Longpoint'),
			'options' => array(
				'' => __('Default', 'Longpoint'),				
				'bold' => __('Bold', 'Longpoint'),
				'bolder' => __('Bolder', 'Longpoint'),				
				'normal' => __('Normal', 'Longpoint'),
				'lighter' => __('Lighter', 'Longpoint'),											
			)
		),	
		'align' => array(			
			'type' => 'select',
			'label' => __('Text Align', 'Longpoint'),
			'desc' => __('Select the text align', 'Longpoint'),
			'options' => array(
				'' => __('Default','Longpoint'),
				'left' => __('Left','Longpoint'),
				'center' => __('Center','Longpoint'),
				'right' => __('Right','Longpoint')				
			)
		),
		'icon' => array(
			'type' => 'fonticon',
			'fullwidth' => true,
			'label' => $dictionary['icon_label'],
			'desc' => $dictionary ['icon_description'],			
		),		
		'spinning' => array(			
			'type' => 'switch',
			'label' => $dictionary['spinning_icon_label'],
			'desc' => $dictionary['spinning_icon_description'],
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'rotation' => array(			
			'type' => 'fontrotation',
			'label' => __('Rotated & Flipped', 'Longpoint'),
			'desc' => __('To arbitrarily rotate and flip icons, use this option.', 'Longpoint'),			
		),					
				
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Highlight Text options
**************************************/
$rch_shortcodes['highlight'] = array(
	'title' => __('Highlight Text', 'Longpoint'),
	'icon' => 'edit',
	'js' => 'highlight',
	'params' => array(
		'text' => array(			
			'type' => 'text',
			'label' => __('Text', 'Longpoint'),
			'desc' => __('Add the highlight text.', 'Longpoint')
		),				
		'color' => array(			
			'type' => 'color',
			'label' => __('Text Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'background' => array(			
			'type' => 'color',
			'label' => __('Background Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),		
		
		'font_size' => array(			
			'type' => 'sliderui',
			'label' => __('Font Size', 'Longpoint'),
			'desc' => __('Sets the font size in pixel.', 'Longpoint'),
			'min' => '10',
			'max' => '30',
			'default' => '14',
		),
		'font_weight' => array(			
			'type' => 'select',
			'label' => __('Font Weight', 'Longpoint'),
			'desc' => __('Select the font weight', 'Longpoint'),
			'options' => array(
				'' => __('Default', 'Longpoint'),				
				'bold' => __('Bold', 'Longpoint'),
				'bolder' => __('Bolder', 'Longpoint'),				
				'normal' => __('Normal', 'Longpoint'),
				'lighter' => __('Lighter', 'Longpoint'),											
			)
		),			
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Notification options
**************************************/
$rch_shortcodes['notification'] = array(
	'title' => __('Notification', 'Longpoint'),
	'icon' => 'info',
	'js' => 'notification',
	'params' => array(
		'content' => array(			
			'type' => 'textarea',
			'label' => __('Text', 'Longpoint'),
			'desc' => __('Add the notification text.', 'Longpoint')
		),				
		'type' => array(			
			'type' => 'select',
			'label' => __('Notification Type', 'Longpoint'),
			'desc' => __('Select the notification type.', 'Longpoint'),
			'options' => array(
				'' => __('Default', 'Longpoint'),				
				'success' => __('Success', 'Longpoint'),
				'warning' => __('Warning', 'Longpoint'),				
				'info' => __('Information', 'Longpoint'),
				'danger' => __('Error', 'Longpoint'),											
			)
		),
		'hide_close_button' => array(			
			'type' => 'switch',
			'label' => __('Disable Closeable', 'Longpoint'),
			'desc' => __('Utilize this option to hide close button.', 'Longpoint'),
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'icon' => array(
			'type' => 'fonticon',
			'fullwidth' => true,
			'label' => $dictionary['icon_label'],
			'desc' => $dictionary ['icon_description'],			
		),		
		'spinning' => array(			
			'type' => 'switch',
			'label' => $dictionary['spinning_icon_label'],
			'desc' => $dictionary['spinning_icon_description'],
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'rotation' => array(			
			'type' => 'fontrotation',
			'label' => __('Rotated & Flipped', 'Longpoint'),
			'desc' => __('To arbitrarily rotate and flip icons, use this option.', 'Longpoint'),			
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Tooltip options
**************************************/
$rch_shortcodes['tooltip'] = array(
	'title' => __('Tooltip', 'Longpoint'),
	'icon' => 'comment',
	'js' => 'tooltip',
	'params' => array(
		'text' => array(			
			'type' => 'text',
			'label' => __('Text', 'Longpoint'),
			'desc' => __('Add the text.', 'Longpoint')
		),	
		'tooltip_content' => array(			
			'type' => 'textarea',
			'label' => __('Tooltip Text', 'Longpoint'),
			'desc' => __('Add the tooltip text.', 'Longpoint')
		),
		'position' => array(			
			'type' => 'select',
			'label' => __('Tooltip Position', 'Longpoint'),
			'desc' => __('Select the tooltip position.', 'Longpoint'),
			'options' => array(
				'' => __('Top', 'Longpoint'),				
				'right' => __('Right', 'Longpoint'),
				'left' => __('Left', 'Longpoint'),
				'bottom' => __('Bottom', 'Longpoint'),													
			)
		),	
		'popover' => array(			
			'type' => 'switch',
			'label' => __('Popover', 'Longpoint'),
			'desc' => __('Open tooltip on link click.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => ''
		),			
		'link' => array(			
			'type' => 'text',
			'label' => __('Text Link', 'Longpoint'),
			'desc' => __('You can optionally link the tooltip text to a webpage.', 'Longpoint')
		),			
		'title' => array(			
			'type' => 'text',
			'label' => __('Tooltip Title', 'Longpoint'),
			'desc' => __('Add the tooltip title.', 'Longpoint')
		),			
		'link_type' => array(			
			'type' => 'select',
			'label' => __('Link Type', 'Longpoint'),
			'desc' => __('Select the text link type.', 'Longpoint'),
			'options' => array(
				'' => __('Link', 'Longpoint'),				
				'button' => __('Button', 'Longpoint'),													
			)
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);

/**************************************
 * Progress Bar options
**************************************/
$rch_shortcodes['progress_bar'] = array(
	'title' => __('Progress bar', 'Longpoint'),
	'icon' => 'tasks',
	'js' => 'progressbar',
	'params' => array(
		'label' => array(			
			'type' => 'text',
			'label' => __('Progress Bar Text', 'Longpoint'),
			'desc' => __('Text will show up on progess bar.', 'Longpoint')
		),	
		'filled' => array(			
			'type' => 'sliderui',
			'label' => __('Filled Area Percentage', 'Longpoint'),
			'desc' => __('Sets the filled area in percentage.', 'Longpoint'),
			'min' => '0',
			'max' => '100',
			'default' => '54',
			'unit' => '%'
		),
		'filled_color' => array(			
			'type' => 'color',
			'label' => __('Filled Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'unfilled_color' => array(			
			'type' => 'color',
			'label' => __('Unfilled Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'striped' => array(			
			'type' => 'switch',
			'label' => __('Striped', 'Longpoint'),
			'desc' => __('Uses a gradient to create a striped effect. Not available in IE8.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => ''
		),	
		'active' => array(			
			'type' => 'switch',
			'label' => __('Active Striped Animation', 'Longpoint'),
			'desc' => __('Active this to animate the stripes right to left. Not available in IE9 and below.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => ''
		),	
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Content Box options
**************************************/
$rch_shortcodes['content_box'] = array(
	'title' => __('Content Box', 'Longpoint'),
	'icon' => 'dropbox',
	'js' => 'contentbox',
	'params' => array(
		'border_size' => array(			
			'type' => 'sliderui',
			'label' => __('Border Size', 'Longpoint'),
			'desc' => __('Sets the border size in pixel for the selected icon.', 'Longpoint'),
			'min' => '0',
			'max' => '20',
			'default' => '0'			
		),
		'border_color' => array(			
			'type' => 'color',
			'label' => __('Border Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'background_color' => array(			
			'type' => 'color',
			'label' => __('Background Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'background_image' => array(			
			'type' => 'media',
			'label' => __('Background Image', 'Longpoint'),
			'desc' => __('Set the background Image.', 'Longpoint')
		),
		'stretch_background' => array(			
			'type' => 'switch',
			'label' => __('Stretch Background', 'Longpoint'),
			'desc' => __('Stretch background image to fit the container.', 'Longpoint'),
			'on' => __('On', 'Longpoint'),
			'off' => __('OFF', 'Longpoint'),
			'default' => ''
		),
		'fixed_background' => array(			
			'type' => 'switch',
			'label' => __('Fixed Background', 'Longpoint'),
			'desc' => __('Keep background image fixed during scroll.', 'Longpoint'),
			'on' => __('On', 'Longpoint'),
			'off' => __('OFF', 'Longpoint'),
			'default' => ''
		),
		'fixed_background_speed' => array(			
			'type' => 'number',
			'label' => __('Background Speed', 'Longpoint'),
			'desc' => __('Set it If you want background to scroll at a different speed. ( Between 0.5 till 2 - 1 is normal speed )', 'Longpoint'),			
			'min' => '0.5',
			'max' => '2',
			'step' => '0.5',
			'default' => '0.5'	
		),	
		'background_pattern' => array(			
			'type' => 'tiles',
			'label' => __('Background Pattern', 'Longpoint'),
			'desc' => __('Select a background pattern.This option only works when background image field is empty.', 'Longpoint')
		),
		'padding_vertical' => array(			
			'type' => 'sliderui',
			'label' => __('Padding Top and Bottom', 'Longpoint'),
			'desc' => __('Sets the padding size in pixel.', 'Longpoint'),
			'min' => '0',
			'max' => '100',
			'default' => '10'			
		),
		'padding_horizental' => array(			
			'type' => 'sliderui',
			'label' => __('Padding Left and Right', 'Longpoint'),
			'desc' => __('Sets the padding size in pixel.', 'Longpoint'),
			'min' => '0',
			'max' => '100',
			'default' => '10'			
		),		
		'min_height' => array(			
			'type' => 'sliderui',
			'label' => __('Min Height', 'Longpoint'),
			'desc' => __('Sets the minimum height in pixel.', 'Longpoint'),
			'min' => '0',
			'max' => '700',
			'default' => '100'			
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Table options
**************************************/
$rch_shortcodes['table'] = array(
	'title' => __('Table', 'Longpoint'),
	'icon' => 'table',
	'js' => 'table',
	'params' => array(		
		'row' => array(			
			'type' => 'sliderui',
			'min' => 1,
			'max' => 15,
			'default' => 5,
			'label' => __('Row Numebr', 'Longpoint'),
			'desc' => __('Insert the row number.', 'Longpoint'),
			'unit' => ''
		),
		'column' => array(			
			'type' => 'sliderui',
			'min' => 1,
			'max' => 12,
			'default' => 4,
			'label' => __('Column Number', 'Longpoint'),
			'desc' => __('Insert the column number.', 'Longpoint'),
			'unit' => ''
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Table Style', 'Longpoint'),
			'desc' => __('Select the table style.', 'Longpoint'),
			'options' => array(
				'' => __('Style 1','Longpoint'),
				'style-2' => __('Style 2','Longpoint'),
				'style-3' => __('Style 3','Longpoint'),				
			)
		),				
		'align' => array(			
			'type' => 'select',
			'label' => __('Cell Align', 'Longpoint'),
			'desc' => __('Select the cell text align.', 'Longpoint'),
			'options' => array(
				'' => __('Default','Longpoint'),
				'left' => __('Left','Longpoint'),
				'center' => __('Center','Longpoint'),
				'right' => __('Right','Longpoint')				
			)
		),
		'hover' => array(			
			'type' => 'switch',
			'label' => __('Cell Hover Effect', 'Longpoint'),
			'desc' => __('Utilize this option to enable a hover state on table rows.', 'Longpoint'),
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => '1'
		),
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Vimeo options
**************************************/
$rch_shortcodes['vimeo'] = array(
	'title' => __('Vimeo', 'Longpoint'),
	'icon' => 'vimeo-square',
	'js' => 'vimeo',
	'params' => array(
		'id' => array(			
			'type' => 'text',
			'label' => __('Video ID', 'Longpoint'),
			'desc' => __('Insert video ID. <br />ex: Video ID for http://vimeo.com/88896418 is 88896418', 'Longpoint'),
			'required' => true
		),
		'width' => array(			
			'type' => 'sliderui',
			'label' => __('Width', 'Longpoint'),
			'desc' => __('Sets the width in pixel.', 'Longpoint'),
			'min' => '200',
			'max' => '1200',
			'default' => '640'			
		),	
		'height' => array(			
			'type' => 'sliderui',
			'label' => __('Height', 'Longpoint'),
			'desc' => __('Sets the height in pixel.', 'Longpoint'),
			'min' => '200',
			'max' => '1200',
			'default' => '480'			
		),	
		'autoplay' => array(			
			'type' => 'switch',
			'label' => __('Auto Play', 'Longpoint'),
			'desc' => __('Set to yes to make video autoplaying.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => ''
		),
		'ssl' => array(			
			'type' => 'switch',
			'label' => __('SSL Protocole', 'Longpoint'),
			'desc' => __('Set to yes to make url HTTPS.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => ''
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);



/**************************************
 * Youtube options
**************************************/
$rch_shortcodes['youtube'] = array(
	'title' => __('Youtube', 'Longpoint'),
	'icon' => 'youtube',
	'js' => 'youtube',
	'params' => array(
		'id' => array(			
			'type' => 'text',
			'label' => __('Video ID', 'Longpoint'),
			'desc' => __('Insert video ID. <br />ex: Video ID for https://www.youtube.com/watch?v=2AJJFNMWEkM is 2AJJFNMWEkM', 'Longpoint'),
			'required' => true
		),
		'width' => array(			
			'type' => 'sliderui',
			'label' => __('Width', 'Longpoint'),
			'desc' => __('Sets the width in pixel.', 'Longpoint'),
			'min' => '200',
			'max' => '1200',
			'default' => '640'			
		),	
		'height' => array(			
			'type' => 'sliderui',
			'label' => __('Height', 'Longpoint'),
			'desc' => __('Sets the height in pixel.', 'Longpoint'),
			'min' => '200',
			'max' => '1200',
			'default' => '480'			
		),	
		'autoplay' => array(			
			'type' => 'switch',
			'label' => __('Auto Play', 'Longpoint'),
			'desc' => __('Set to yes to make video autoplaying.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => ''
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);



/**************************************
 * Google Map options
**************************************/
$rch_shortcodes['googlemap'] = array(
	'title' => __('Google Map', 'Longpoint'),
	'icon' => 'map-marker',
	'js' => 'map',
	'params' => array(
		'latitude' => array(			
			'type' => 'text',
			'label' => __('Latitude', 'Longpoint'),
			'desc' => '',
			'required' => true
		),
		'longitude' => array(			
			'type' => 'text',
			'label' => __('Longitude', 'Longpoint'),
			'desc' => '',
			'required' => true
		),
		'type' => array(			
			'type' => 'select',
			'label' => __('Map Type', 'Longpoint'),
			'desc' => __('Select the map type.', 'Longpoint'),
			'options' => array(
				'' => __('Road Map','Longpoint'),
				'satellite' => __('Satellite','Longpoint'),
				'terrain' => __('Terrain','Longpoint'),
				'hybrid' => __('Hybrid','Longpoint')				
			)
		),
		'message' => array(			
			'type' => 'text',
			'label' => __('Message', 'Longpoint'),
			'desc' => ''			
		),
		'width_unit' => array(			
			'type' => 'switch',
			'label' => __('Width Unit', 'Longpoint'),
			'desc' => __('Set Width in Pixel or Percent.', 'Longpoint'),
			'on' => __('%', 'Longpoint'),
			'off' => __('px', 'Longpoint'),
			'default' => '1'
		),
		'width_in_percent' => array(			
			'type' => 'sliderui',
			'label' => __('Width', 'Longpoint'),
			'desc' => __('Sets the width in percent.', 'Longpoint'),
			'min' => '1',
			'max' => '100',
			'default' => '100',
			'unit' => '%'
		),			
		'width_in_pixel' => array(			
			'type' => 'sliderui',
			'label' => __('Width', 'Longpoint'),
			'desc' => __('Sets the width in pixel.', 'Longpoint'),
			'min' => '200',
			'max' => '1200',
			'default' => '640'	
		),	
		'height' => array(			
			'type' => 'sliderui',
			'label' => __('Height', 'Longpoint'),
			'desc' => __('Sets the height in pixel.', 'Longpoint'),
			'min' => '200',
			'max' => '1200',
			'default' => '480'			
		),	
		'zoom' => array(			
			'type' => 'sliderui',
			'label' => __('Zoom Level', 'Longpoint'),
			'desc' => __('Sets the zoom level.', 'Longpoint'),
			'min' => '1',
			'max' => '20',
			'default' => '14',
			'unit' => 'zoom'
		),			
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Image options
**************************************/
$rch_shortcodes['image'] = array(
	'title' => __('Image', 'Longpoint'),
	'icon' => 'picture-o',
	'js' => 'image',
	'params' => array(
		'src' => array(			
			'type' => 'media',
			'label' => __('Image', 'Longpoint'),
			'desc' => __('Upload an image to display in the frame.', 'Longpoint'),
			'default' => 'Image path...'
		),
		'width' => array(			
			'type' => 'sliderui',
			'label' => __('Width', 'Longpoint'),
			'desc' => __('Sets the width in pixel.', 'Longpoint'),
			'min' => '200',
			'max' => '1200',
			'default' => '640'			
		),	
		'height' => array(			
			'type' => 'sliderui',
			'label' => __('Height', 'Longpoint'),
			'desc' => __('Sets the height in pixel.', 'Longpoint'),
			'min' => '200',
			'max' => '1200',
			'default' => '480'			
		),
		'frame' => array(			
			'type' => 'select',
			'label' => __('Frame style type', 'Longpoint'),
			'desc' => __('Select the frame style type.', 'Longpoint'),
			'options' => array(
				'' => __('None','Longpoint'),
				'circle' => __('Circle','Longpoint'),
				'rounded' => __('Rounded','Longpoint'),
				'thumbnail' => __('Border','Longpoint'),
				'shadow' => __('Shadow','Longpoint'),
				'glow' => __('Glow','Longpoint')					
			)
		),
		'border_size' => array(			
			'type' => 'sliderui',
			'label' => __('Border Size', 'Longpoint'),
			'desc' => __('Sets the border size in pixel.', 'Longpoint'),
			'min' => '0',
			'max' => '20',
			'default' => '1'			
		),
		'border_color' => array(			
			'type' => 'color',
			'label' => __('Border Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),
		'align' => array(			
			'type' => 'select',
			'label' => __('Align', 'Longpoint'),
			'desc' => __('Select the image align.', 'Longpoint'),
			'options' => array(
				'' => __('Default','Longpoint'),
				'left' => __('Left','Longpoint'),
				'center' => __('Center','Longpoint'),
				'right' => __('Right','Longpoint')				
			)
		),
		'lightbox' => array(			
			'type' => 'switch',
			'label' => __('Lightbox', 'Longpoint'),
			'desc' => __('Show image in Lightbox.', 'Longpoint'),
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => ''
		),
		'alt' => array(			
			'type' => 'text',
			'label' => __('Image Alt Text', 'Longpoint'),
			'desc' => __('The alt attribute provides alternative information for the image.', 'Longpoint'),
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),					
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Testimonials options
**************************************/
$rch_shortcodes['testimonials'] = array(
	'title' => __('Testimonial', 'Longpoint'),
	'icon' => 'comments-o',
	'js' => 'testimonials',
	'params' => array(		
		'title' => array(			
			'type' => 'text',
			'label' => __('Title', 'Longpoint'),
			'desc' => __('Title of the testimonials.', 'Longpoint'),
		),
		'show_title' => array(			
			'type' => 'switch',
			'label' => __('Title', 'Longpoint'),
			'desc' => __('Display Testimonials Title.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => '1'
		),		
		'count' => array(			
			'type' => 'sliderui',
			'label' => __('Count', 'Longpoint'),
			'desc' => __('How many testimonial you would like to show?', 'Longpoint'),
			'min' => '1',
			'max' => '10',
			'default' => '5'			
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);


/**************************************
 * Text Block options
**************************************/
$rch_shortcodes['textblock'] = array(
	'title' => __('Text Block', 'Longpoint'),
	'icon' => 'pencil',
	'js' => 'textblock',
	'params' => array(
		'text' => array(			
			'type' => 'textarea',
			'label' => __('Text', 'Longpoint'),
			'desc' => __('Add the paragraph text.', 'Longpoint')
		),
		'align' => array(			
			'type' => 'select',
			'label' => __('Text Align', 'Longpoint'),
			'desc' => __('Select the text align.', 'Longpoint'),
			'options' => array(
				'' => __('Default','Longpoint'),
				'left' => __('Left','Longpoint'),
				'center' => __('Center','Longpoint'),
				'right' => __('Right','Longpoint')				
			)
		),
		'color' => array(			
			'type' => 'color',
			'label' => __('Text Color', 'Longpoint'),
			'desc' => __('Leave blank for default.', 'Longpoint')			
		),					
		'font_size' => array(			
			'type' => 'sliderui',
			'label' => __('Font Size', 'Longpoint'),
			'desc' => __('Sets the font size in pixel.', 'Longpoint'),
			'min' => '10',
			'max' => '30',
			'default' => '14',
		),
		'font_weight' => array(			
			'type' => 'select',
			'label' => __('Font Weight', 'Longpoint'),
			'desc' => __('Select the font weight', 'Longpoint'),
			'options' => array(
				'' => __('Default', 'Longpoint'),				
				'bold' => __('Bold', 'Longpoint'),
				'bolder' => __('Bolder', 'Longpoint'),				
				'normal' => __('Normal', 'Longpoint'),
				'lighter' => __('Lighter', 'Longpoint'),											
			)
		),			
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);

/**************************************
 * Team Members options
**************************************/
$rch_shortcodes['team'] = array(
	'title' => __('Team Members', 'Longpoint'),
	'icon' => 'group',
	'js' => 'team',
	'params' => array(			
		'count' => array(			
			'type' => 'sliderui',
			'label' => __('Count', 'Longpoint'),
			'desc' => __('How many member you would like to show?', 'Longpoint'),
			'min' => '1',
			'max' => '4',
			'default' => '3'			
		),	
		'limit' => array(			
			'type' => 'sliderui',
			'label' => __('Description Limit', 'Longpoint'),
			'desc' => __('How many description character you would like to display?', 'Longpoint'),
			'min' => '100',
			'max' => '500',
			'default' => '150'			
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);


/**************************************
 * Pricing Table options
**************************************/
$rch_shortcodes['pricing_table'] = array(
	'title' => __('Pricing Table', 'Longpoint'),
	'icon' => 'bookmark-o',
	'js' => 'pricing_table',
	'params' => array(
		'column' => array(			
			'type' => 'sliderui',
			'min' => 1,
			'max' => 4,
			'default' => 3,
			'label' => __('Column Count', 'Longpoint'),
			'desc' => __('Insert the column count.', 'Longpoint'),
			'unit' => ''
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)
	)	
);


/**************************************
 * Blog options
**************************************/
$rch_shortcodes['blog'] = array(
	'title' => __('Blog', 'Longpoint'),
	'icon' => 'th-large',
	'js' => 'blog',
	'params' => array(				
		'count' => array(			
			'type' => 'sliderui',
			'label' => __('Count', 'Longpoint'),
			'desc' => __('How many post you would like to show?', 'Longpoint'),
			'min' => '1',
			'max' => '30',
			'default' => '9'			
		),	
		'limit' => array(			
			'type' => 'sliderui',
			'label' => __('Description Limit', 'Longpoint'),
			'desc' => __('How many description character you would like to display?', 'Longpoint'),
			'min' => '100',
			'max' => '500',
			'default' => '150'			
		),		
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);



/**************************************
 * Contact Form options
**************************************/
$rch_shortcodes['contact'] = array(
	'title' => __('Contact', 'Longpoint'),
	'icon' => 'envelope-o',
	'js' => 'contact_form',
	'params' => array(		
		'title' => array(			
			'type' => 'text',
			'label' => __('Title', 'Longpoint'),
			'desc' => __('Title of the contact form.', 'Longpoint'),
		),
		'show_title' => array(			
			'type' => 'switch',
			'label' => __('Title', 'Longpoint'),
			'desc' => __('Display contact form title.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => '1'
		),				
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);




/**************************************
 * Portfolio options
**************************************/
$rch_shortcodes['portfolio'] = array(
	'title' => __('Portfolio', 'Longpoint'),
	'icon' => 'puzzle-piece',
	'js' => 'portfolio',
	'params' => array(				
		'show_filter' => array(			
			'type' => 'switch',
			'label' => __('Display Filter', 'Longpoint'),
			'desc' => __('Display Portfolio Filter.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => '1'
		),		
		'count' => array(			
			'type' => 'sliderui',
			'label' => __('Count', 'Longpoint'),
			'desc' => __('How many portfolio you would like to show?', 'Longpoint'),
			'min' => '1',
			'max' => '40',
			'default' => '20'			
		),			
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);

/**************************************
 * Gallery options
**************************************/
$rch_shortcodes['gallery'] = array(
	'title' => __('Gallery', 'Longpoint'),
	'icon' => 'camera-retro',
	'js' => 'gallery',
	'params' => array(	
		'title' => array(			
			'type' => 'text',
			'label' => __('Title', 'Longpoint'),
			'desc' => __('Title of the gallery.', 'Longpoint'),
		),
		'show_title' => array(			
			'type' => 'switch',
			'label' => __('Title', 'Longpoint'),
			'desc' => __('Display gallery title.', 'Longpoint'),
			'on' => __('Yes', 'Longpoint'),
			'off' => __('No', 'Longpoint'),
			'default' => '1'
		),	
		'slideshow' => array(			
			'type' => 'switch',
			'label' => __('Slideshow', 'Longpoint'),
			'desc' => __('Display lightbox slideshow.', 'Longpoint'),
			'on' => __('Enable', 'Longpoint'),
			'off' => __('Disable', 'Longpoint'),
			'default' => '0'
		),			
		'display' => array(			
			'type' => 'devices',
			'label' => $dictionary['display_label'],
			'desc' => $dictionary['display_description'],
		),
		'animation' => array(
			'type' => 'animation',
			'label' => $dictionary['animation_label'],
			'desc' => $dictionary ['animation_description'],			
		),			
		'class' => array(			
			'type' => 'text',
			'label' => $dictionary['extraclass_label'],
			'desc' => $dictionary['extraclass_description'],
		),
		'style' => array(			
			'type' => 'text',
			'label' => $dictionary['inlinestyle_label'],
			'desc' => $dictionary['inlinestyle_description'],
		)		
	)	
);
