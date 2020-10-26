<?php
// Shortcodes 
$shortcodes = THB_THEME_ROOT_ABS.'/vc_templates/';
$files = glob($shortcodes.'/thb_?*.php');
foreach ($files as $filename) {
	require get_template_directory().'/vc_templates/'.basename($filename);
}

/* Visual Composer Mappings */

// Adding animation to columns
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Fixed Content",
	"param_name" => "fixed",
	"value" => array(
		"" => "true"
	),
	"description" => "If you enable this, this column will be fixed. You must also enable 'Equal Height Columns' inside parent row settings."
));
vc_add_param("vc_column", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Animation",
	"admin_label" => true,
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"Left" => "animation right-to-left",
		"Right" => "animation left-to-right",
		"Top" => "animation bottom-to-top",
		"Bottom" => "animation top-to-bottom",
		"Scale" => "animation scale",
		"Fade" => "animation fade-in"
	),
	"description" => ""
));
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Full Height Column",
	"param_name" => "full_height",
	"value" => array(
		"" => "true"
	),
	"description" => "If enabled, this will cause this column to always fill the height of the window."
));
vc_add_param("vc_column", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Parallax Background",
	"param_name" => "enable_parallax",
	"value" => array(
		"" => "false"
	)
));
vc_add_param("vc_column", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Parallax Background Speed",
	"param_name" => "parallax_speed",
	"value" => "0.5",
	"dependency" => array(
		"element" => "enable_parallax",
		"not_empty" => true
	),
	"description" => "A value between 0 and 1 is recommended"
));
vc_add_param("vc_column_inner", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Animation",
	"admin_label" => true,
	"param_name" => "animation",
	"value" => array(
		"None" => "",
		"Left" => "animation right-to-left",
		"Right" => "animation left-to-right",
		"Top" => "animation bottom-to-top",
		"Bottom" => "animation top-to-bottom",
		"Scale" => "animation scale",
		"Fade" => "animation fade-in"
	),
	"description" => ""
));

// VC_ROW
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Disable Column Padding",
	"param_name" => "column_padding",
	"value" => array(
		"" => "false"
	),
	"description" => "You can have columns without spaces using this option"
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Full Width",
	"param_name" => "full_width_row",
	"value" => array(
		"" => "true"
	),
	"description" => "If you enable this, this row fill the full-screen in large screens"
));
vc_add_param("vc_row", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Equal-height Columns",
	"param_name" => "equal_height",
	"value" => array(
		"" => "true"
	),
	"description" => "You can have columns with same height using this option"
));

vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Disable Column Padding",
	"param_name" => "column_padding",
	"value" => array(
		"" => "false"
	),
	"description" => "You can have columns without spaces using this option"
));
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Enable Max Width",
	"param_name" => "max_width",
	"value" => array(
		"" => "true"
	),
	"description" => "If you enable this, this row will not fill the container."
));
vc_add_param("vc_row_inner", array(
	"type" => "checkbox",
	"class" => "",
	"heading" => "Equal-height Columns",
	"param_name" => "equal_height",
	"value" => array(
		"" => "true"
	),
	"description" => "You can have columns with same height using this option"
));

// Add / Remove parameters
vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "content_placement" );
vc_remove_param( "vc_row", "parallax" );
vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_param( "vc_row", "video_bg_parallax" );
vc_remove_param( "vc_row", "parallax_image" );
vc_remove_param( "vc_toggle", "color" );
vc_remove_param( "vc_toggle", "style" );
vc_remove_param( "vc_toggle", "size" );

// Posts
vc_map( array(
	"name" => __("Author List", 'thevoux'),
	"base" => "thb_authorgrid",
	"icon" => "thb_vc_ico_authorgrid",
	"class" => "thb_vc_sc_authorgrid",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => "Columns",
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	'Six Columns' => "6",
	      	'Four Columns' => "4",
	      	'Three Columns' => "3",
	      	'Two Columns' => "2"
	      ),
	      "description" => "Select the layout of the authors."
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Author IDs",
	    "param_name" => "author_ids",
	    "description" => "Enter the Author IDs you would like to display seperated by comma"
	  )
	),
	"description" => "Display your blog authors in a grid"
) );

// Banner shortcode
vc_map( array(
	"name" => __("Banner", 'thevoux'),
	"base" => "thb_banner",
	"icon" => "thb_vc_ico_banner",
	"class" => "thb_vc_sc_banner",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Select Background Image",
			"param_name" => "banner_bg",
			"description" => ""
		),
		array(
		  "type" => "textfield",
		  "heading" => "Banner Height",
		  "param_name" => "banner_height",
		  "description" => "Enter height of the banner in px."
		),
		
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Banner Effect",
			"param_name" => "type",
			"value" => array(
				"Lily" => "effect-lily",
				"Sadie" => "effect-sadie",
				"Honey" => "effect-honey",
				"layla" => "effect-layla",
				"Marley" => "effect-marley",
				"Ruby" => "effect-ruby",
				"Roxy" => "effect-roxy",
				"Bubba" => "effect-bubba",
				"Romeo" => "effect-romeo",
				"Dexter" => "effect-dexter",
				"Sarah" => "effect-sarah",
				"Chico" => "effect-chico",
				"Milo" => "effect-milo"
			),
			"description" => "Different effects you can use"
		),

		array(
		  "type" => "textfield",
		  "heading" => "Title",
		  "param_name" => "title",
		  "admin_label" => true,
		),
		array(
		  "type" => "textfield",
		  "heading" => "Sub Title",
		  "param_name" => "subtitle"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Link",
		  "param_name" => "overlay_link"
		)
	),
	"description" => "Display different banner styles"
) );

// Border Shortcode
vc_map( array(
	"name" => "Border Container",
	"base" => "thb_border",
	"icon" => "thb_vc_ico_border",
	"class" => "thb_vc_sc_border",
	"category" => "by Fuel Themes",
	"show_settings_on_create" => true,
	"as_parent" => array('except' => 'thb_border'),
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2"
		    ),
		    "description" => "This changes the style of the background"
		),
	),
	"description" => "Stylish Border Container that you can place elements in"
) );
class WPBakeryShortCode_Thb_Border extends WPBakeryShortCodesContainer { }

// Button shortcode
vc_map( array(
	"name" => __("Button", 'thevoux'),
	"base" => "thb_button",
	"icon" => "thb_vc_ico_button",
	"class" => "thb_vc_sc_button",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Caption",
			"admin_label" => true,
			"param_name" => "caption",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Link URL",
			"param_name" => "link",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Icon",
			"param_name" => "icon",
			"value" => thb_getIconArray(),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Open link in",
			"param_name" => "target_blank",
			"value" => array(
				"Same window" => "",
				"New window" => "true"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Size",
			"param_name" => "size",
			"value" => array(
				"Mini button" => "mini",
				"Small button" => "small",
				"Medium button" => "medium",
				"Large button" => "large"
			),
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		)
	),
	"description" => "Add an animated button"
) );

// Google Map
vc_map( array(
	"name" => __("Contact Map", 'thevoux'),
	"base" => "thb_contactmap",
	"icon" => "thb_vc_ico_contactmap",
	"class" => "thb_vc_sc_contactmap",
	"category" => "by Fuel Themes",
	"show_settings_on_create" => true,
	"params" => array(
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Full Height Map",
			"param_name" => "full_height",
			"admin_label" => true,
			"value" => array(
				"" => "true"
			),
			"description" => "If enabled, this will cause this map to always fill the height of the window.",
		),
		array(
		  "type" => "textfield",
		  "heading" => "Map Height",
		  "param_name" => "height",
		  "admin_label" => true,
		  "description" => "Enter height of the map in px. The map will use settings inside Appearance -> Theme Options <small>If Full Height is selected, this height value is omitted</small>"
		)
	),
	"description" => "Insert your Contact Map"
) );
// Content box shortcode
vc_map( array(
	"name" => __("Content Box", 'thevoux'),
	"base" => "thb_contentbox",
	"icon" => "thb_vc_ico_contentbox",
	"class" => "thb_vc_sc_contentbox",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Top Image",
			"param_name" => "image",
			"description" => "The image to show at the top."
		),
		array(
		  "type" => "vc_link",
		  "heading" => "Link Content Box?",
		  "param_name" => "link",
		  "description" => "Enter url if you want this content box to have link."
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Heading",
			"param_name" => "heading",
			"value" => "",
			"admin_label" => true,
			"description" => ""
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Heading Color",
			"param_name" => "heading_color",
			"value" => "",
			"description" => "You can change the heading color from here"
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => "Content",
			"param_name" => "content",
			"value" => "",
			"description" => ""
		),
		array(
		  "type"              => "colorpicker",
		  "holder"            => "div",
		  "class"             => "",
		  "heading"           => "Content Color",
		  "param_name"        => "content_color",
		  "description"       => "",
		  "admin_label" => false,
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		)
	),
	"description" => "Content boxes with images"
) );

// Divider Shortcode
vc_map( array(
	"name" => __("Dividers", 'thevoux'),
	"base" => "thb_dividers",
	"icon" => "thb_vc_ico_dividers",
	"class" => "thb_vc_sc_dividers",
	"category" => "by Fuel Themes",
	"show_settings_on_create" => true,
	"params" => array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2",
		    	'Style 3' => "style3",
		    	'Style 4' => "style4",
		    	'Style 5' => "style5",
		    	'Style 6' => "style6",
		    	'Style 7' => "style7",
		    	'Style 8' => "style8",
		    	'Style 9' => "style9",
		    	'Style 10' => "style10",
		    	'Style 11' => "style11",
		    	'Style 12' => "style12",
		    	'Style 13' => "style13",
		    	'Style 14' => "style14"
		    ),
		    "description" => "This changes the style of the dividers"
		),
	),
	"description" => "Divide your content with different divider styles."
) );

// Gap shortcode
vc_map( array(
	"name" => __("Gap", 'thevoux'),
	"base" => "thb_gap",
	"icon" => "thb_vc_ico_gap",
	"class" => "thb_vc_sc_gap",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
		  "type" => "textfield",
		  "heading" => "Gap Height",
		  "param_name" => "height",
		  "admin_label" => true,
		  "description" => "Enter height of the gap in px."
		)
	),
	"description" => "Add a gap to seperate elements"
) );

// Icon List shortcode
vc_map( array(
	"name" => __("Icon List", 'thevoux'),
	"base" => "thb_iconlist",
	"icon" => "thb_vc_ico_iconlist",
	"class" => "thb_vc_sc_iconlist",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			'type' => 'iconpicker',
			'heading' => __( 'Icon', 'js_composer' ),
			'param_name' => 'icon',
			'value' => 'fa fa-adjust', // default value to backend editor admin_label
			'settings' => array(
				'emptyIcon' => false, // default true, display an "EMPTY" icon?
				'iconsPerPage' => 4000, // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
			),
			'description' => __( 'Select icon from library.', 'js_composer' ),
		),
		array(
			"type" => "colorpicker",
			"class" => "",
			"heading" => "Icon color",
			"param_name" => "color",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		),
		array(
			"type" => "exploded_textarea",
			"class" => "",
			"heading" => "List Items",
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => "Every new line will be treated as a list item"
		)
	),
	"description" => "Add lists with icons"
) );

// 3D Image shortcode
vc_map( array(
	"name" => "3D Hover Image",
	"base" => "thb_threedimage",
	"icon" => "thb_vc_ico_threedimage",
	"class" => "thb_vc_sc_threedimage",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Select Image",
			"param_name" => "image",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Full Width?",
			"param_name" => "full_width",
			"value" => array(
				"" => "true"
			),
			"description" => "If selected, the image will always fill its container"
		),
		array(
		  "type" => "dropdown",
		  "heading" => "Image alignment",
		  "param_name" => "alignment",
		  "value" => array("Align left" => "left", "Align right" => "right", "Align center" => "center"),
		  "description" => "Select image alignment."
		),
		array(
		  "type" => "vc_link",
		  "heading" => "Image link",
		  "param_name" => "img_link",
		  "description" => "Set Image Link here",
		  "admin_label" => true,
		)
	),
	"description" => "Add a 3D animated image"
) );

// Image shortcode
vc_map( array(
	"name" => "Image",
	"base" => "thb_image",
	"icon" => "thb_vc_ico_image",
	"class" => "thb_vc_sc_image",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "attach_image", //attach_images
			"class" => "",
			"heading" => "Select Image",
			"param_name" => "image",
			"description" => ""
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Full Width?",
			"param_name" => "full_width",
			"value" => array(
				"" => "true"
			),
			"description" => "If selected, the image will always fill its container"
		),
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Animation",
			"param_name" => "animation",
			"value" => array(
				"None" => "",
				"Left" => "animation right-to-left",
				"Right" => "animation left-to-right",
				"Top" => "animation bottom-to-top",
				"Bottom" => "animation top-to-bottom",
				"Scale" => "animation scale",
				"Fade" => "animation fade-in"
			),
			"description" => ""
		),
		array(
		  "type" => "textfield",
		  "heading" => "Image size",
		  "param_name" => "img_size",
		  "description" => "Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size."
		),
		array(
		  "type" => "dropdown",
		  "heading" => "Image alignment",
		  "param_name" => "alignment",
		  "value" => array("Align left" => "left", "Align right" => "right", "Align center" => "center"),
		  "description" => "Select image alignment."
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Link to Full-Width Image?",
			"param_name" => "lightbox",
			"value" => array(
				"" => "true"
			)
		),
		array(
		  "type" => "vc_link",
		  "heading" => "Image link",
		  "param_name" => "img_link",
		  "description" => "Enter url if you want this image to have link.",
		  "dependency" => Array('element' => "lightbox", 'is_empty' => true)
		)
	),
	"description" => "Add an animated image"
) );

// Instagram
vc_map( array(
	"name" => __("Instagram", 'thevoux'),
	"base" => "thb_instagram",
	"icon" => "thb_vc_ico_instagram",
	"class" => "thb_vc_sc_instagram",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  
	  array(
	      "type" => "textfield",
	      "heading" => "Username",
	      "param_name" => "username",
	      "admin_label" => true,
	      "description" => "Instagram Username"
	  ),
	  array(
	      "type" => "textfield",
	      "heading" => "Number of Photos",
	      "param_name" => "number",
	      "description" => "Number of Instagram Photos to retrieve"
	  ),
		array(
			"type" => "dropdown",
			"heading" => "Columns",
			"param_name" => "columns",
			"value" => array(
				'Six Columns' => "6",
				'Five Columns' => "5",
				'Four Columns' => "4",
				'Three Columns' => "3",
				'Two Columns' => "2"
			)
		),
		array(
		    "type" => "checkbox",
		    "heading" => "Link Photos to Instagram?",
		    "param_name" => "link",
		    "value" => array(
				"" => "true"
			),
		    "description" => "Do you want to link the Instagram photos to instagram.com website?"
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Disable Column Padding",
			"param_name" => "column_padding",
			"value" => array(
				"" => "false"
			),
			"description" => "You can have columns without spaces using this option"	
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Low Column Padding",
			"param_name" => "low_padding",
			"value" => array(
				"" => "false"
			),
			"description" => "You can have columns with smaller spacing. <small>Does not work together with 'Disable Column Padding'</small>"	
		)
	),
	"description" => "Add Instagram Photos"
) );

// Notification shortcode
vc_map( array(
	"name" => __("Notification", 'thevoux'),
	"base" => "thb_notification",
	"icon" => "thb_vc_ico_notification",
	"class" => "thb_vc_sc_notification",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "dropdown",
			"class" => "",
			"heading" => "Type",
			"param_name" => "type",
			"value" => array(
				"Information" => "information",
				"Success" => "success",
				"Warning" => "warning",
				"Error" => "error"
			),
			"description" => ""
		),
		array(
			"type" => "textarea",
			"class" => "",
			"heading" => "Content",
			"admin_label" => true,
			"param_name" => "content",
			"value" => "",
			"description" => ""
		)
	),
	"description" => "Display Notifications"
) );

// Posts
vc_map( array(
	"name" => __("Posts Grid", 'thevoux'),
	"base" => "thb_postgrid",
	"icon" => "thb_vc_ico_postgrid",
	"class" => "thb_vc_sc_postgrid",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => "Style",
	      "param_name" => "style",
	      "admin_label" => true,
	      "value" => array(
	      	'Style 1' => "style1",
	      	'Style 2' => "style2",
	      	'Style 3' => "style3",
	      	'Style 4 (Style 1 with share icons)' => "style4"
	      ),
	      "description" => "This changes the style of the posts"
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Add Title?",
	  	"param_name" => "add_title",
	  	"value" => array(
	  		"" => "true"
	  	),
	  	"description" => "If enabled, this will allow you to add a title above the posts"
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => "Title Style",
	      "param_name" => "title_style",
	      "admin_label" => true,
	      "value" => array(
	      	'Style 1' => "style1",
	      	'Style 2' => "style2",
	      	'Style 3' => "style3"
	      ),
	      "description" => "This changes the style of the category titles",
	      "dependency" => Array('element' => "add_title", 'value' => array('true'))
	  ),
	  array(
	    "type" => "textfield",
	    "class" => "",
	    "heading" => "Title",
	    "param_name" => "title",
	    "description" => "Add your own title here",
	    "dependency" => Array('element' => "add_title", 'value' => array('true'))
	  ),
	  array(
	      "type" => "dropdown",
	      "heading" => "Columns",
	      "param_name" => "columns",
	      "admin_label" => true,
	      "value" => array(
	      	'Six Columns' => "6",
	      	'Four Columns' => "4",
	      	'Three Columns' => "3",
	      	'Two Columns' => "2"
	      ),
	      "description" => "Select the layout of the posts.",
	      "dependency" => Array('element' => "style", 'value' => array('style1', 'style4'))
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => "Post Source",
	  	"param_name" => "source",
	  	"value" => array(
	  		'Most Recent' => "most-recent",
	  		'By Category' => "by-category",
	  		'By Post ID' => "by-id",
	  		'By Tag' => "by-tag",
	  		'By Share Count' => "by-share",
	  		'By Author' => "by-author",
	  		),
	  	"admin_label" => true,
	  	"description" => "Select the source of the posts you'd like to show."
	  ),
	  array(
	    "type" => "checkbox",
	    "heading" => "Post Categories",
	    "param_name" => "cat",
	    "value" => thb_blogCategories(),
	    "description" => "Which categories would you like to show?",
	    "dependency" => Array('element' => "source", 'value' => array('by-category'))
	  ),
	  array(
	    "type" => "textfield",
	    "class" => "",
	    "heading" => "Number of posts",
	    "param_name" => "item_count",
	    "value" => "4",
	    "description" => "The number of posts to show.",
	    "dependency" => Array('element' => "source", 'value' => array('by-category', 'by-tag', 'by-share', 'by-author', 'most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Excluded Tag IDs",
	    "param_name" => "excluded_tag_ids",
	    "description" => "Enter the tag ids you would like to exclude from the most recent posts separated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Excluded Category IDs",
	    "param_name" => "excluded_cat_ids",
	    "description" => "Enter the category ids you would like to exclude from the most recent posts separated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Post IDs",
	    "param_name" => "post_ids",
	    "description" => "Enter the post IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-id'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Tag slugs",
	    "param_name" => "tag_slugs",
	    "description" => "Enter the tag slugs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-tag'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Author IDs",
	    "param_name" => "author_ids",
	    "description" => "Enter the Author IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-author'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Featured Posts (Enlarged Post Image)",
	    "param_name" => "featured_index",
	    "description" => "Enter the number for which posts to show as Featured (For ex, entering 1,3,5 will make those posts appear larger, these are not post IDs, just the number in which they appear)",
	    "dependency" => Array('element' => "style", 'value' => array('style2'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Offset",
	    "param_name" => "offset",
	    "description" => "You can offset your post with the number of posts entered in this setting",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent', 'by-category', 'by-tag', 'by-author'))
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Ajax Pagination",
	  	"param_name" => "pagination",
	  	"value" => array(
	  		"" => "true"
	  	),
	  	"description" => "If enabled, this will show pagination underneath. <small>Offset setting does not work</small>",
	  	"dependency" => Array('element' => "source", 'value' => array('most-recent'))
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Disable Post Excrepts",
	  	"param_name" => "disable_excerpts",
	  	"value" => array(
	  		"" => "true"
	  	),
	  	"description" => "You can hide the post excerpts here",
	  	"dependency" => Array('element' => "style", 'value' => array('style1'))
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Disable Post Meta",
	  	"param_name" => "disable_postmeta",
	  	"value" => array(
	  		"" => "true"
	  	),
	  	"description" => "You can hide the post meta here",
	  	"dependency" => Array('element' => "style", 'value' => array('style1'))
	  )
	),
	"description" => "Display your posts in different grid layouts."
) );

// Posts Carousel
vc_map( array(
	"name" => __("Posts Carousel", 'thevoux'),
	"base" => "thb_postcarousel",
	"icon" => "thb_vc_ico_postcarousel",
	"class" => "thb_vc_sc_postcarousel",
	"category" => "by Fuel Themes",
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2",
		    	'Style 3' => "style3",
		    	'Style 4' => "style4"
		    ),
		    "description" => "This changes the style of the posts"
		),
		array(
			"type" => "dropdown",
			"heading" => "Columns",
			"param_name" => "columns",
			"value" => array(
				'Six Columns' => "6",
				'Five Columns' => "5",
				'Four Columns' => "4",
				'Three Columns' => "3",
				'Two Columns' => "2",
				'One Columns' => "1"
			),
			"description" => "Select the layout."
		),
		array(
			"type" => "dropdown",
			"heading" => "Post Source",
			"param_name" => "source",
			"value" => array(
				'Most Recent' => "most-recent",
				'By Category' => "by-category",
				'By Post ID' => "by-id",
				'By Tag' => "by-tag",
				'By Share Count' => "by-share",
				'By Author' => "by-author",
				),
			"admin_label" => true,
			"description" => "Select the source of the posts you'd like to show."
		),
		array(
		  "type" => "checkbox",
		  "heading" => "Post Categories",
		  "param_name" => "cat",
		  "value" => thb_blogCategories(),
		  "description" => "Which categories would you like to show?",
		  "dependency" => Array('element' => "source", 'value' => array('by-category'))
		),
		array(
		  "type" => "textfield",
		  "class" => "",
		  "heading" => "Number of posts",
		  "param_name" => "item_count",
		  "value" => "4",
		  "description" => "The number of posts to show.",
		  "dependency" => Array('element' => "source", 'value' => array('by-category', 'by-tag', 'by-share', 'by-author', 'most-recent'))
		),
		array(
		  "type" => "textfield",
		  "heading" => "Excluded Tag IDs",
		  "param_name" => "excluded_tag_ids",
		  "description" => "Enter the tag ids you would like to exclude from the most recent posts separated by comma",
		  "dependency" => Array('element' => "source", 'value' => array('most-recent'))
		),
		array(
		  "type" => "textfield",
		  "heading" => "Excluded Category IDs",
		  "param_name" => "excluded_cat_ids",
		  "description" => "Enter the category ids you would like to exclude from the most recent posts separated by comma",
		  "dependency" => Array('element' => "source", 'value' => array('most-recent'))
		),
		array(
		  "type" => "textfield",
		  "heading" => "Post IDs",
		  "param_name" => "post_ids",
		  "description" => "Enter the post IDs you would like to display seperated by comma",
		  "dependency" => Array('element' => "source", 'value' => array('by-id'))
		),
		array(
		  "type" => "textfield",
		  "heading" => "Tag slugs",
		  "param_name" => "tag_slugs",
		  "description" => "Enter the tag slugs you would like to display seperated by comma",
		  "dependency" => Array('element' => "source", 'value' => array('by-tag'))
		),
		array(
		  "type" => "textfield",
		  "heading" => "Author IDs",
		  "param_name" => "author_ids",
		  "description" => "Enter the Author IDs you would like to display seperated by comma",
		  "dependency" => Array('element' => "source", 'value' => array('by-author'))
		),
		array(
		  "type" => "textfield",
		  "heading" => "Offset",
		  "param_name" => "offset",
		  "description" => "You can offset your post with the number of posts entered in this setting",
		  "dependency" => Array('element' => "source", 'value' => array('most-recent', 'by-category', 'by-tag', 'by-author'))
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Pagination",
			"param_name" => "pagination",
			"value" => array(
				"" => "true"
			),
			"description" => "If enabled, this will show pagination circles underneath",
		),
		array(
			"type" => "checkbox",
			"class" => "",
			"heading" => "Navigation Arrows",
			"param_name" => "navigation",
			"value" => array(
				"" => "true"
			),
			"description" => "If enabled, this will show navigation arrows on the side",
		)
	),
	"description" => "Display Posts from your blog in a Carousel"
) );

// Posts Category
vc_map( array(
	"name" => __("Posts Category", 'thevoux'),
	"base" => "thb_postcategory",
	"icon" => "thb_vc_ico_postcategory",
	"class" => "thb_vc_sc_postcategory",
	"category" => "by Fuel Themes",
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => "Style",
		    "param_name" => "style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2",
		    	'Style 3' => "style3",
		    	'Style 3 (alternate)' => "style3-alt",
		    	'Style 4' => "style4",
		    	'Style 5' => "style5"
		    ),
		    "description" => "This changes the style of the posts"
		),
		array(
		    "type" => "dropdown",
		    "heading" => "Title Style",
		    "param_name" => "title_style",
		    "admin_label" => true,
		    "value" => array(
		    	'Style 1' => "style1",
		    	'Style 2' => "style2",
		    	'Style 3' => "style3"
		    ),
		    "description" => "This changes the style of the category titles"
		),
		array(
		  "type" => "dropdown",
		  "heading" => "Post Categories",
		  "param_name" => "cat",
		  "value" => thb_blogCategories(),
		  "description" => "Which category would you like to show?"
		),
		array(
		  "type" => "textfield",
		  "heading" => "Offset",
		  "param_name" => "offset",
		  "description" => "You can offset your post with the number of posts entered in this setting"
		)
	),
	"description" => "Display a Category with posts"
) );

// Post Masonry
vc_map( array(
	"name" => __("Posts Masonry", 'thevoux'),
	"base" => "thb_postmasonry",
	"icon" => "thb_vc_ico_postmasonry",
	"class" => "thb_vc_sc_postmasonry",
	"category" => "by Fuel Themes",
	"params"	=> array(
		array(
		    "type" => "dropdown",
		    "heading" => "Columns",
		    "param_name" => "columns",
		    "admin_label" => true,
		    "value" => array(
		    	'Four Columns' => "4",
		    	'Three Columns' => "3",
		    	'Two Columns' => "2"
		    ),
		    "description" => "Select the layout of the masonry."
		),
	  array(
	  	"type" => "dropdown",
	  	"heading" => "Post Source",
	  	"param_name" => "source",
	  	"value" => array(
	  		'Most Recent' => "most-recent",
	  		'By Category' => "by-category",
	  		'By Post ID' => "by-id",
	  		'By Tag' => "by-tag",
	  		'By Share Count' => "by-share",
	  		'By Author' => "by-author",
	  		),
	  	"admin_label" => true,
	  	"description" => "Select the source of the posts you'd like to show."
	  ),
	  array(
	    "type" => "checkbox",
	    "heading" => "Post Categories",
	    "param_name" => "cat",
	    "value" => thb_blogCategories(),
	    "description" => "Which categories would you like to show?",
	    "dependency" => Array('element' => "source", 'value' => array('by-category'))
	  ),
	  array(
	    "type" => "textfield",
	    "class" => "",
	    "heading" => "Number of posts",
	    "param_name" => "item_count",
	    "value" => "3",
	    "description" => "The number of posts to show.",
	    "dependency" => Array('element' => "source", 'value' => array('by-category', 'by-tag', 'by-share', 'by-author', 'most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Excluded Tag IDs",
	    "param_name" => "excluded_tag_ids",
	    "description" => "Enter the tag ids you would like to exclude from the most recent posts separated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Excluded Category IDs",
	    "param_name" => "excluded_cat_ids",
	    "description" => "Enter the category ids you would like to exclude from the most recent posts separated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Post IDs",
	    "param_name" => "post_ids",
	    "description" => "Enter the post IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-id'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Tag slugs",
	    "param_name" => "tag_slugs",
	    "description" => "Enter the tag slugs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-tag'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Author IDs",
	    "param_name" => "author_ids",
	    "description" => "Enter the Author IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-author'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Offset",
	    "param_name" => "offset",
	    "description" => "You can offset your post with the number of posts entered in this setting",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent', 'by-category', 'by-tag', 'by-author'))
	  )
	),
	"description" => "Show your posts in a masonry grid"
) );

// Posts Slider
vc_map( array(
	"name" => __("Posts Slider", 'thevoux'),
	"base" => "thb_postslider",
	"icon" => "thb_vc_ico_postslider",
	"class" => "thb_vc_sc_postslider",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	      "type" => "dropdown",
	      "heading" => "Type",
	      "param_name" => "style",
	      "value" => array(
	      	'Style 1' => "featured-style1",
	      	'Style 1 (more-space)' => "featured-style5",
	      	'Style 2' => "featured-style2",
	      	'Style 3' => "featured-style3",
	      	'Style 4' => "featured-style8",
	      	),
	      "admin_label" => true,
	      "description" => "Select the slider style."
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Width",
	    "param_name" => "width",
	    "description" => "Enter the width of the images. The slider will fill the width of the container, so make sure you size the columns accordingly."
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Height",
	    "param_name" => "height",
	    "description" => "Enter the height of the images."
	  ),
	  array(
	  	"type" => "dropdown",
	  	"heading" => "Post Source",
	  	"param_name" => "source",
	  	"value" => array(
	  		'Most Recent' => "most-recent",
	  		'By Category' => "by-category",
	  		'By Post ID' => "by-id",
	  		'By Tag' => "by-tag",
	  		'By Share Count' => "by-share",
	  		'By Author' => "by-author",
	  		),
	  	"admin_label" => true,
	  	"description" => "Select the source of the posts you'd like to show."
	  ),
	  array(
	    "type" => "checkbox",
	    "heading" => "Post Categories",
	    "param_name" => "cat",
	    "value" => thb_blogCategories(),
	    "description" => "Which categories would you like to show?",
	    "dependency" => Array('element' => "source", 'value' => array('by-category'))
	  ),
	  array(
	    "type" => "textfield",
	    "class" => "",
	    "heading" => "Number of posts",
	    "param_name" => "item_count",
	    "value" => "4",
	    "description" => "The number of posts to show.",
	    "dependency" => Array('element' => "source", 'value' => array('by-category', 'by-tag', 'by-share', 'by-author', 'most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Excluded Tag IDs",
	    "param_name" => "excluded_tag_ids",
	    "description" => "Enter the tag ids you would like to exclude from the most recent posts separated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Excluded Category IDs",
	    "param_name" => "excluded_cat_ids",
	    "description" => "Enter the category ids you would like to exclude from the most recent posts separated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Post IDs",
	    "param_name" => "post_ids",
	    "description" => "Enter the post IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-id'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Tag slugs",
	    "param_name" => "tag_slugs",
	    "description" => "Enter the tag slugs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-tag'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Author IDs",
	    "param_name" => "author_ids",
	    "description" => "Enter the Author IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-author'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Offset",
	    "param_name" => "offset",
	    "description" => "You can offset your post with the number of posts entered in this setting",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent', 'by-category', 'by-tag', 'by-author'))
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Pagination",
	  	"param_name" => "pagination",
	  	"value" => array(
	  		"" => "true"
	  	),
	  	"description" => "If enabled, this will show pagination circles underneath",
	  ),
	  array(
	  	"type" => "checkbox",
	  	"class" => "",
	  	"heading" => "Navigation Arrows",
	  	"param_name" => "navigation",
	  	"value" => array(
	  		"" => "true"
	  	),
	  	"description" => "If enabled, this will show navigation arrows on the side",
	  )
	),
	"description" => "Display Posts from your blog in a Slider"
) );

// Subscription shortcode
vc_map( array(
	"name" => __("Subscription Form", 'thevoux'),
	"base" => "thb_subscribe",
	"icon" => "thb_vc_ico_subscribe",
	"class" => "thb_vc_sc_subscribe",
	"category" => "by Fuel Themes",
	"params" => array(
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Title",
			"admin_label" => true,
			"param_name" => "title",
			"value" => "",
			"description" => ""
		),
		array(
			"type" => "textfield",
			"class" => "",
			"heading" => "Description",
			"param_name" => "description",
			"value" => "",
			"description" => 'You can find the collected emails <a href="'.THB_THEME_ROOT.'/inc/subscribers.csv" target="_blank">here</a>'
		)
	),
	"description" => "Add a subscription form"
) );
// Video Playlist
vc_map( array(
	"name" => esc_html__("Video Playlist", 'goodlife'),
	"base" => "thb_videos",
	"icon" => "thb_vc_ico_videos",
	"class" => "thb_vc_sc_videos",
	"category" => "by Fuel Themes",
	"params"	=> array(
	  array(
	  	"type" => "dropdown",
	  	"heading" => "Post Source",
	  	"param_name" => "source",
	  	"value" => array(
	  		'Most Recent' => "most-recent",
	  		'By Category' => "by-category",
	  		'By Tag' => "by-tag",
	  		'By Author' => "by-author",
	  	),
	  	"std" => "most-recent",
	  	"admin_label" => true,
	  	"description" => "Select the source of the posts you'd like to show."
	  ),
	  array(
	    "type" => "checkbox",
	    "heading" => "Post Categories",
	    "param_name" => "cat",
	    "value" => thb_blogCategories(),
	    "description" => "Which categories would you like to show?",
	    "dependency" => Array('element' => "source", 'value' => array('by-category'))
	  ),
	  array(
	    "type" => "textfield",
	    "class" => "",
	    "heading" => "Number of posts",
	    "param_name" => "item_count",
	    "value" => "4",
	    "description" => "The number of posts to show."
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Tag slugs",
	    "param_name" => "tag_slugs",
	    "description" => "Enter the tag slugs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-tag'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Author IDs",
	    "param_name" => "author_ids",
	    "description" => "Enter the Author IDs you would like to display seperated by comma",
	    "dependency" => Array('element' => "source", 'value' => array('by-author'))
	  ),
	  array(
	    "type" => "textfield",
	    "heading" => "Offset",
	    "param_name" => "offset",
	    "description" => "You can offset your post with the number of posts entered in this setting",
	    "dependency" => Array('element' => "source", 'value' => array('most-recent', 'by-category', 'by-tag', 'by-author'))
	  ),
	),
	"description" => "Display your videos in a playlist"
) );