<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', 'thb_custom_theme_options', 1 );

/**
 * Theme Mode demo code of all the available option types.
 *
 * @return    void
 *
 * @access    private
 * @since     2.0
 */
function thb_custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'sections'        => array(
      array(
        'title'       => 'General',
        'id'          => 'general'
      ),
      array(
        'title'       => 'Header Settings',
        'id'          => 'header'
      ),
      array(
        'title'       => 'Footer Settings',
        'id'          => 'footer'
      ),
      array(
        'title'       => 'Category Settings',
        'id'          => 'category'
      ),
      array(
        'title'       => 'Customization',
        'id'          => 'customization'
      ),
      array(
        'title'       => 'Advertising',
        'id'          => 'advertising'
      ),
      array(
        'title'       => 'Google Map Settings',
        'id'          => 'contact'
      ),
      array(
        'title'       => 'Misc',
        'id'          => 'misc'
      ),
      array(
        'title'       => 'Demo Content',
        'id'          => 'import'
      )
    ),
    'settings'        => array(
    	array(
    	  'id'          => 'general_tab0',
    	  'label'       => 'General',
    	  'type'        => 'tab',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Widget Styles',
    	  'id'          => 'widget_style',
    	  'type'        => 'radio',
    	  'desc'        => 'Changes the widget Style',
    	  'choices'     => array(
    	  	array(
    	  	  'label'       => 'Style 1',
    	  	  'value'       => 'style1'
    	  	),
    	    array(
    	      'label'       => 'Style 2',
    	      'value'       => 'style2'
    	    ),
    	    array(
    	      'label'       => 'Style 3',
    	      'value'       => 'style3'
    	    )
    	  ),
    	  'std'         => 'style1',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Display Mobile Menu Icon on Desktops?',
    	  'id'          => 'mobile_menu_icon',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable mobile menu icon on desktop screens',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Display Full Menu?',
    	  'id'          => 'full_menu',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can hide the full navigation menu if needed',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Scroll to Top Arrow',
    	  'id'          => 'scroll_totop',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable scroll to top arrow from here',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Use Relative Dates?',
    	  'id'          => 'relative_dates',
    	  'type'        => 'on_off',
    	  'desc'        => 'This will display dates as "1 day ago", etc.',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Blog Featured Post',
    	  'id'          => 'blog_featured',
    	  'type'        => 'text',
    	  'desc'        => 'If you would like to feature a blog post above all post inside blog, enter its ID here.',
    	  'section'     => 'general'
    	),
    	array(
    	  'id'          => 'general_tab1',
    	  'label'       => 'Articles',
    	  'type'        => 'tab',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Display Reading Indicator?',
    	  'id'          => 'reading_indicator',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable the reading progress indicator here',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Full Width Posts',
    	  'id'          => 'article_fullwidth',
    	  'type'        => 'on_off',
    	  'desc'        => 'This will display articles in full width, the sidebars will be removed',
    	  'std'         => 'off',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Related Posts',
    	  'id'          => 'related_posts',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable related posts on article pages',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Number of Related Posts',
    	  'id'          => 'related_count',
    	  'type'        => 'text',
    	  'desc'        => 'Number of related posts to show, default is 6.',
    	  'section'     => 'general',
    	  'condition'   => 'related_posts:is(on)'
    	),
    	array(
    	  'label'       => 'Infinite loading on Article Pages',
    	  'id'          => 'infinite_load',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable infinite scrolling on article pages',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Fixed Sidebars',
    	  'id'          => 'article_fixed_sidebar',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable fixed sidebars on article pages',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Author Information',
    	  'id'          => 'article_author',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable author information on article pages',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Dropcap',
    	  'id'          => 'article_dropcap',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable the large dropcap at the start of article pages using this setting',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'id'          => 'general_tab2',
    	  'label'       => 'Social Sharing',
    	  'type'        => 'tab',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Sharing Cache',
    	  'id'          => 'sharing_cache',
    	  'type'        => 'radio',
    	  'desc'        => 'Amount of time before the new counts are fetched.',
    	  'choices'     => array(
    	  	array(
    	  	  'label'       => '1 Hour',
    	  	  'value'       => '1h'
    	  	),
    	    array(
    	      'label'       => '1 Day',
    	      'value'       => '1'
    	    ),
    	    array(
    	      'label'       => '7 Days',
    	      'value'       => '7'
    	    ),
    	    array(
    	      'label'       => '30 Days',
    	      'value'       => '30'
    	    )
    	  ),
    	  'std'         => '1',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Sharing buttons',
    	  'id'          => 'sharing_buttons',
    	  'type'        => 'checkbox',
    	  'desc'        => 'You can choose which social networks to display. Please fill out your Twitter username from Misc -> Twitter oAuth',
    	  'choices'     => array(
    	    array(
    	      'label'       => 'Facebook',
    	      'value'       => 'facebook'
    	    ),
    	    array(
    	      'label'       => 'Twitter',
    	      'value'       => 'twitter'
    	    ),
    	    array(
    	      'label'       => 'Google Plus',
    	      'value'       => 'google-plus'
    	    ),
    	    array(
    	      'label'       => 'Pinterest',
    	      'value'       => 'pinterest'
    	    ),
    	    array(
    	      'label'       => 'Linkedin',
    	      'value'       => 'linkedin'
    	    )
    	  ),
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Hide Shares Text If Shares Are 0 ?',
    	  'id'          => 'hide_zero_shares',
    	  'type'        => 'on_off',
    	  'desc'        => 'When enabled, you wont see share counts or texts for 0 shares.',
    	  'std'         => 'off',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Disable OG: Tags',
    	  'id'          => 'general_disable_og_tags',
    	  'type'        => 'on_off',
    	  'desc'        => 'If you want, you can disable the theme added Facebook OG tags if you are using a plugin like Yoast SEO or similar.',
    	  'std'         => 'off',
    	  'section'     => 'general'
    	),
    	array(
    	  'id'          => 'general_tab3',
    	  'label'       => 'Selection Sharing',
    	  'type'        => 'tab',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Selection Sharing',
    	  'id'          => 'selection_sharing',
    	  'type'        => 'on_off',
    	  'desc'        => 'You can disable selection sharing on pages & posts',
    	  'std'         => 'on',
    	  'section'     => 'general'
    	),
    	array(
    	  'label'       => 'Facebook APP ID',
    	  'id'          => 'selection_sharing_appid',
    	  'type'        => 'text',
    	  'desc'        => 'Facebook Application ID, more info <a href="https://help.yahoo.com/kb/yahoo-merchant-solutions/facebook-application-sln18861.html" target="_blank">here</a>',
    	  'section'     => 'general',
    	  'condition'   => 'selection_sharing:is(on)'
    	),
    	array(
    	  'label'       => 'Selection Sharing buttons',
    	  'id'          => 'selection_sharing_buttons',
    	  'type'        => 'checkbox',
    	  'desc'        => 'You can choose which options to display. ',
    	  'choices'     => array(
    	    array(
    	      'label'       => 'Facebook',
    	      'value'       => 'facebook'
    	    ),
    	    array(
    	      'label'       => 'Twitter',
    	      'value'       => 'twitter'
    	    ),
    	    array(
    	      'label'       => 'Email',
    	      'value'       => 'email'
    	    )
    	  ),
    	  'section'     => 'general',
    	  'condition'   => 'selection_sharing:is(on)'
    	),
      array(
        'id'          => 'header_tab3',
        'label'       => 'Menu Settings',
        'type'        => 'tab',
        'section'     => 'general'
      ),
      array(
        'label'       => 'Mobile Menu Footer',
        'id'          => 'menu_footer',
        'type'        => 'textarea',
        'desc'        => 'This content appears at the bottom of the menu. You can use your shortcodes here.',
        'rows'        => '4',
        'section'     => 'general'
      ),
      array(
        'id'          => 'header_tab1',
        'label'       => 'Header Settings',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Header Height',
        'id'          => 'header_height',
        'type'        => 'measurement',
        'desc'        => 'You can modify the header height from here',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Fixed Header Height',
        'id'          => 'header_height_fixed',
        'type'        => 'measurement',
        'desc'        => 'You can modify the fixed header height from here',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Mobile Header Height',
        'id'          => 'header_height_mobile',
        'type'        => 'measurement',
        'desc'        => 'You can modify the mobile header height from here',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Header Style',
        'id'          => 'header_style',
        'type'        => 'radio',
        'desc'        => 'Which header style would you like to use?',
        'choices'     => array(
      		array(
      			'label'       => 'Style 1 (Center Logo)',
      			'value'       => 'style1'
      		),
      		array(
      			'label'       => 'Style 2 (Left Logo)',
      			'value'       => 'style2'
      		)
        ),
        'std'         => 'style1',
        'section'	  => 'header'
      ),
      array(
        'label'       => 'Header Menu Color',
        'id'          => 'header_menu_color',
        'type'        => 'radio',
        'desc'        => 'You can choose your menu color here. This changes link color behaviour, so if you set a dark background for the menu, you can select light here.',
        'choices'     => array(
          array(
            'label'       => 'Light',
            'value'       => 'light'
          ),
          array(
            'label'       => 'Dark',
            'value'       => 'dark'
          )
        ),
        'std'         => 'dark',
        'section'     => 'header',
        'condition'   => 'header_style:not(style3)'
      ),
      
      array(
        'label'       => 'Header Social Style',
        'id'          => 'header_socialstyle',
        'type'        => 'radio',
        'desc'        => 'Which header social style would you like to use?',
        'choices'     => array(
      		array(
      			'label'       => 'Style 1 - Collapsed using @ icon',
      			'value'       => 'style1'
      		),
      		array(
      			'label'       => 'Style 2 - Shows icons by default',
      			'value'       => 'style2'
      		)
        ),
        'std'         => 'style1',
        'section'	  => 'header'
      ),
      array(
        'id'          => 'header_tab2',
        'label'       => 'Logo Settings',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Mobile Logo Height',
        'id'          => 'logo_height_mobile',
        'type'        => 'measurement',
        'desc'        => 'You can modify the logo height for mobile screens from here. This is maximum height, so your logo may get smaller depending on spacing inside header',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Logo Height',
        'id'          => 'logo_height',
        'type'        => 'measurement',
        'desc'        => 'You can modify the logo height from here. This is maximum height, so your logo may get smaller depending on spacing inside header',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Logo Upload',
        'id'          => 'logo',
        'type'        => 'upload',
        'desc'        => 'You can upload your own logo here. Since this theme is retina-ready, <strong>please upload a double the size you set above.</strong>',
        'section'     => 'header'
      ),
      array(
        'id'          => 'header_tab3',
        'label'       => 'Social Icons in Header',
        'type'        => 'tab',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Facebook Link',
        'id'          => 'fb_link_header',
        'type'        => 'text',
        'desc'        => 'Facebook profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Pinterest Link',
        'id'          => 'pinterest_link_header',
        'type'        => 'text',
        'desc'        => 'Pinterest profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Twitter Link',
        'id'          => 'twitter_link_header',
        'type'        => 'text',
        'desc'        => 'Twitter profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Google Plus Link',
        'id'          => 'googleplus_link_header',
        'type'        => 'text',
        'desc'        => 'Google Plus profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Linkedin Link',
        'id'          => 'linkedin_link_header',
        'type'        => 'text',
        'desc'        => 'Linkedin profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Instagram Link',
        'id'          => 'instragram_link_header',
        'type'        => 'text',
        'desc'        => 'Instagram profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Xing Link',
        'id'          => 'xing_link_header',
        'type'        => 'text',
        'desc'        => 'Xing profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Tumblr Link',
        'id'          => 'tumblr_link_header',
        'type'        => 'text',
        'desc'        => 'Tumblr profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Vkontakte Link',
        'id'          => 'vk_link_header',
        'type'        => 'text',
        'desc'        => 'Vkontakte profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'SoundCloud Link',
        'id'          => 'soundcloud_link_header',
        'type'        => 'text',
        'desc'        => 'SoundCloud profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Dribbble Link',
        'id'          => 'dribbble_link_header',
        'type'        => 'text',
        'desc'        => 'Dribbbble profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'YouTube Link',
        'id'          => 'youtube_link_header',
        'type'        => 'text',
        'desc'        => 'Youtube profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Spotify Link',
        'id'          => 'spotify_link_header',
        'type'        => 'text',
        'desc'        => 'Spotify profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'Behance Link',
        'id'          => 'behance_link_header',
        'type'        => 'text',
        'desc'        => 'Behance profile/page link',
        'section'     => 'header'
      ),
      array(
        'label'       => 'DeviantArt Link',
        'id'          => 'deviantart_link_header',
        'type'        => 'text',
        'desc'        => 'DeviantArt profile/page link',
        'section'     => 'header'
      ),
      array(
        'id'          => 'footer_tab0',
        'label'       => 'Footer Settings',
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Display Footer',
        'id'          => 'footer',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display the Footer?',
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Columns',
        'id'          => 'footer_columns',
        'type'        => 'radio-image',
        'desc'        => 'You can change the layout of footer columns here',
        'std'         => 'threecolumns',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer in Grid',
        'id'          => 'footer_grid',
        'type'        => 'on_off',
        'desc'        => 'If Off is selected, the footer contents will be full width.',
        'std'         => 'on',
        'section'     => 'footer'
      ),
      
      array(
        'id'          => 'footer_tab1',
        'label'       => 'Sub-Footer Settings',
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Display Sub-Footer',
        'id'          => 'subfooter',
        'type'        => 'on_off',
        'desc'        => 'Would you like to display the Sub Footer?',
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Sub-Footer Content',
        'id'          => 'subfooter_content',
        'type'        => 'radio',
        'desc'        => 'What type of content would you like to use for subfooter?',
        'choices'     => array(
          array(
            'label'       => 'Social Icons',
            'value'       => 'footer-icons'
          ),
          array(
            'label'       => 'Text',
            'value'       => 'footer-text'
          ),
          array(
            'label'       => 'Menu',
            'value'       => 'footer-menu'
          )
        ),
        'std'         => 'footer-text',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Menu',
        'id'          => 'subfooter_menu',
        'type'        => 'menu_select',
        'desc'        => '',
        'section'     => 'footer',
        'condition'   => 'subfooter_content:is(footer-menu)'
      ),
      array(
        'label'       => 'Footer Text Content',
        'id'          => 'subfooter_text',
        'type'        => 'text',
        'desc'        => 'Enter your desired text for footer',
        'section'     => 'footer',
        'condition'   => 'subfooter_content:is(footer-text)'
      ),
      array(
        'id'          => 'footer_tab2',
        'label'       => 'Social Icons in Sub Footer',
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'id'          => 'subfooter_socialtext',
        'label'       => 'About Social Icons',
        'desc'        => 'These icons will be used on the SubFooter if you select it from the previous tab',
        'type'        => 'textblock',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Facebook Link',
        'id'          => 'fb_link',
        'type'        => 'text',
        'desc'        => 'Facebook profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Pinterest Link',
        'id'          => 'pinterest_link',
        'type'        => 'text',
        'desc'        => 'Pinterest profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Twitter Link',
        'id'          => 'twitter_link',
        'type'        => 'text',
        'desc'        => 'Twitter profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Google Plus Link',
        'id'          => 'googleplus_link',
        'type'        => 'text',
        'desc'        => 'Google Plus profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Linkedin Link',
        'id'          => 'linkedin_link',
        'type'        => 'text',
        'desc'        => 'Linkedin profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Instagram Link',
        'id'          => 'instragram_link',
        'type'        => 'text',
        'desc'        => 'Instagram profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Xing Link',
        'id'          => 'xing_link',
        'type'        => 'text',
        'desc'        => 'Xing profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Tumblr Link',
        'id'          => 'tumblr_link',
        'type'        => 'text',
        'desc'        => 'Tumblr profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Vkontakte Link',
        'id'          => 'vk_link',
        'type'        => 'text',
        'desc'        => 'Vkontakte profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'SoundCloud Link',
        'id'          => 'soundcloud_link',
        'type'        => 'text',
        'desc'        => 'SoundCloud profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Dribbble Link',
        'id'          => 'dribbble_link',
        'type'        => 'text',
        'desc'        => 'Dribbbble profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'YouTube Link',
        'id'          => 'youtube_link',
        'type'        => 'text',
        'desc'        => 'Youtube profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Spotify Link',
        'id'          => 'spotify_link',
        'type'        => 'text',
        'desc'        => 'Spotify profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Behance Link',
        'id'          => 'behance_link',
        'type'        => 'text',
        'desc'        => 'Behance profile/page link',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'DeviantArt Link',
        'id'          => 'deviantart_link',
        'type'        => 'text',
        'desc'        => 'DeviantArt profile/page link',
        'section'     => 'footer'
      ),
      array(
        'id'          => 'footer_tab3',
        'label'       => 'Footer Widget Settings',
        'type'        => 'tab',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Widget Borders',
        'id'          => 'footer_widget_borders',
        'type'        => 'on_off',
        'desc'        => 'You can toggle footer widget borders here',
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Footer Widget Padding',
        'id'          => 'footer_widget_padding',
        'type'        => 'spacing',
        'desc'        => 'You can modify the footer widget padding here',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Vertical-Center Align Widget Content?',
        'id'          => 'footer_center_align',
        'type'        => 'on_off',
        'desc'        => 'You can set widget alignmen here',
        'std'         => 'on',
        'section'     => 'footer'
      ),
      array(
        'label'       => 'Widget text alignment',
        'id'          => 'footer_widget_text_align',
        'type'        => 'radio',
        'desc'        => 'You can set widget text alignment here',
        'choices'     => array(
          array(
            'label'       => 'Center',
            'value'       => 'center-align-text'
          ),
          array(
            'label'       => 'Left',
            'value'       => 'left-align-text'
          )
        ),
        'std'         => 'center-align-text',
        'section'     => 'footer'
      ),
      array(
        'id'          => 'misc_tab0',
        'label'       => 'General',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Extra CSS',
        'id'          => 'extra_css',
        'type'        => 'css',
        'desc'        => 'Any CSS that you would like to add to the them.e',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab1',
        'label'       => '404 Page',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => '404 Page Image',
        'id'          => '404_bg',
        'type'        => 'upload',
        'desc'        => 'Upload image for 404 page',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab',
        'label'       => 'Facebook OAuth',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Facebook Page ID',
        'id'          => 'facebook_page_id',
        'type'        => 'text',
        'desc'        => 'Facebook Page ID, you can use <a href="http://findmyfbid.com/" target="_blank">this page</a> to find your id',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Facebook Username',
        'id'          => 'facebook_page_username',
        'type'        => 'text',
        'desc'        => 'Your Facebook page username',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Facebook App ID',
        'id'          => 'facebook_app_id',
        'type'        => 'text',
        'desc'        => 'Facebook Application ID, available <a href="https://developers.facebook.com/apps/" target="_blank">here</a>',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Facebook App Secret',
        'id'          => 'facebook_app_secret',
        'type'        => 'text',
        'desc'        => 'Facebook Application Secret, available <a href="https://developers.facebook.com/apps/" target="_blank">here</a>',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab2',
        'label'       => 'Twitter OAuth',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'twitter_text',
        'label'       => 'About the Twitter Settings',
        'desc'        => 'You should fill out these settings if you want to use the Twitter related widgets or Visual Composer Elements',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Twitter Username',
        'id'          => 'twitter_bar_username',
        'type'        => 'text',
        'desc'        => 'Your Twitter Username',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Consumer Key',
        'id'          => 'twitter_bar_consumerkey',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Consumer Secret',
        'id'          => 'twitter_bar_consumersecret',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Access Token',
        'id'          => 'twitter_bar_accesstoken',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Access Token Secret',
        'id'          => 'twitter_bar_accesstokensecret',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://dev.twitter.com/apps">this link</a> in a new tab, sign in with your account, click on Create a new application and create your own keys in case you dont have already',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab3',
        'label'       => 'Instagram OAuth',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'instagram_text',
        'label'       => 'About the Instagram Settings',
        'desc'        => 'You should fill out these settings if you want to use the Instagram related VC elements or widgets',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Instagram ID',
        'id'          => 'instagram_id',
        'type'        => 'text',
        'desc'        => 'Your Instagram ID, you can find your ID from here: <a href="http://www.otzberg.net/iguserid/">http://www.otzberg.net/iguserid/</a>',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Instagram Username',
        'id'          => 'instagram_username',
        'type'        => 'text',
        'desc'        => 'Your Instagram Username',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Access Token',
        'id'          => 'instagram_accesstoken',
        'type'        => 'text',
        'desc'        => 'Visit <a href="http://instagr.am/developer/register/">this link</a> in a new tab, sign in with your Instagram account, click on Create a new application and create your own keys in case you dont have already. After that, you can get your Access Token using <a href="http://labs.themeinity.com/plugins/tools/instagram/">http://labs.themeinity.com/plugins/tools/instagram/</a>',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab4',
        'label'       => 'Google+ OAuth',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'gp_text',
        'label'       => 'About the Google+ Settings',
        'desc'        => 'You should fill out these settings if you want to use the Google+ related VC elements or widgets',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Google+ Username',
        'id'          => 'gp_username',
        'type'        => 'text',
        'desc'        => 'Your Google+ Username with leading <strong>+</strong>,',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Google+ API Key',
        'id'          => 'gp_apikey',
        'type'        => 'text',
        'desc'        => 'Visit <a href="https://console.developers.google.com/project">https://console.developers.google.com/project</a> using your Google account, click on the Create Project button and fill the form to create a project. ',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'misc_tab5',
        'label'       => 'Create Additional Sidebars',
        'type'        => 'tab',
        'section'     => 'misc'
      ),
      array(
        'id'          => 'sidebars_text',
        'label'       => 'About the sidebars',
        'desc'        => 'All sidebars that you create here will appear both in the Widgets Page(Appearance > Widgets), from where you will have to configure them, and in the pages, where you will be able to choose a sidebar for each page',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'misc'
      ),
      array(
        'label'       => 'Create Sidebars',
        'id'          => 'sidebars',
        'type'        => 'list-item',
        'desc'        => 'Please choose a unique title for each sidebar!',
        'section'     => 'misc',
        'settings'    => array(
          array(
            'label'       => 'ID',
            'id'          => 'id',
            'type'        => 'text',
            'desc'        => 'Please write a lowercase id, with <strong>no spaces</strong>'
          )
        )
      ),
      array(
        'label'       => 'Select Your Demo',
        'id'          => 'demo-select',
        'type'        => 'radio-image',
        'desc'        => '',
        'std'         => 'voux',
        'section'     => 'import'
      ),
      array(
        'id'          => 'demo_import',
        'label'       => 'About Importing Demo Content',
        'desc'        => '
        <div id="thb-import-messages"></div>
        <p style="text-align:center;"><a class="button button-primary button-hero" id="import-demo-content" href="#">Import Demo Content</a><br /><br />
        <small>Please press only once, and wait till you get the success message above.<br />If you \'re having trouble with import, please see: <a href="https://fuelthemes.ticksy.com/article/2706/">What To Do If Demo Content Import Fails</a></p>',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'import'
      ),
      array(
        'id'          => 'category_tab0',
        'label'       => 'Category Colors',
        'type'        => 'tab',
        'section'     => 'category'
      ),
      array(
        'id'          => 'category_categorycolors',
        'label'       => 'About Category Colors',
        'desc'        => 'These colors are used for category link colors',
        'type'        => 'textblock',
        'section'     => 'category'
      ),
      array(
        'label'       => 'Parent Category Colors',
        'id'          => 'category_colors',
        'type'        => 'category_colorpicker',
        'desc'        => 'Category Colors',
        'section'     => 'category'
      ),
      array(
        'id'          => 'category_tab1',
        'label'       => 'Category Headers',
        'type'        => 'tab',
        'section'     => 'category'
      ),
      array(
        'id'          => 'category_categoryheaders',
        'label'       => 'About Category Headers',
        'desc'        => 'These settings are used for headers on category pages. Child categories will use their parent category header settings',
        'type'        => 'textblock',
        'section'     => 'category'
      ),
      array(
        'label'       => 'Parent Category Headers',
        'id'          => 'category_headers',
        'type'        => 'category_header',
        'desc'        => 'Category Header Colors',
        'section'     => 'category'
      ),
      array(
        'id'          => 'customization_tab1',
        'label'       => 'Colors',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Accent Color',
        'id'          => 'accent_color',
        'type'        => 'colorpicker',
        'desc'        => 'Change the accent color used throughout the theme',
        'section'     => 'customization',
        'std'		  => ''
      ),
      array(
        'label'       => 'Mobile Menu Icon Color',
        'id'          => 'mobileicon_color',
        'type'        => 'colorpicker',
        'desc'        => 'Change the icon color for the mobile icon',
        'section'     => 'customization',
        'std'		  => ''
      ),
      array(
        'label'       => 'Search & Social Icon Colors',
        'id'          => 'headericon_color',
        'type'        => 'colorpicker',
        'desc'        => 'Change the icon colors for the social and the search on the header',
        'section'     => 'customization',
        'std'		  => ''
      ),
      array(
        'label'       => 'Main Menu Top Level Link Colors',
        'id'          => 'menu_link_color',
        'type'        => 'link_color',
        'desc'        => 'This changes link colors on the full menu',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Widget Title Color',
        'id'          => 'widgettitle_color',
        'type'        => 'colorpicker',
        'desc'        => 'Change the title color for the widgets',
        'section'     => 'customization',
        'std'		  => ''
      ),
      array(
        'id'          => 'customization_tab2',
        'label'       => 'Typography',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Font Subsets',
        'id'          => 'font_subsets',
        'type'        => 'radio',
        'desc'        => 'You can add additional character subset specific to your language.',
        'choices'     => array(
        	array(
        	  'label'       => 'No Subset',
        	  'value'       => 'no-subset'
        	),
          array(
            'label'       => 'Greek',
            'value'       => 'greek'
          ),
          array(
            'label'       => 'Cyrillic',
            'value'       => 'cyrillic'
          ),
          array(
            'label'       => 'Vietnamese',
            'value'       => 'vietnamese'
          )
        ),
        'std'         => 'no-subset',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Title Typography',
        'id'          => 'title_type',
        'type'        => 'typography',
        'desc'        => 'Font Settings for the titles',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Body Text Typography',
        'id'          => 'body_type',
        'type'        => 'typography',
        'desc'        => 'Font Settings for general body font',
        'section'     => 'customization'
      ),
	  	array(
        'label'       => 'Main Menu Typography',
        'id'          => 'menu_type',
        'type'        => 'typography',
        'desc'        => 'Font Settings for the main menu, only affects the top level elements',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Widget Title Typography',
        'id'          => 'widget_title_type',
        'type'        => 'typography',
        'desc'        => 'Font Settings for the widget titles',
        'section'     => 'customization'
      ),
      array(
        'id'          => 'customization_tab3',
        'label'       => 'Backgrounds',
        'type'        => 'tab',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Header Background',
        'id'          => 'header_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the menu.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Menu Background',
        'id'          => 'menu_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the menu.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Mega Menu / Sub Menu Background',
        'id'          => 'megamenu_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the mega menu and the submenus.',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Footer Background',
        'id'          => 'footer_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the footer',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Sub - Footer Background',
        'id'          => 'subfooter_bg',
        'type'        => 'background',
        'desc'        => 'Background settings for the sub-footer',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Widget Title Background',
        'id'          => 'widgettitle_bg',
        'type'        => 'colorpicker',
        'desc'        => 'Background color for the widget title',
        'section'     => 'customization'
      ),
      array(
        'label'       => 'Post End',
        'id'          => 'adv_postend',
        'type'        => 'textarea',
        'desc'        => 'This content appears at the bottom of the articles.',
        'rows'        => '4',
        'section'     => 'advertising'
      ),
      array(
        'label'       => 'Post End for Ajax loaded articles',
        'id'          => 'adv_postend_ajax',
        'type'        => 'textarea',
        'desc'        => 'This content appears at the bottom of the articles of ajax loaded articles.',
        'rows'        => '4',
        'section'     => 'advertising'
      ),
      array(
        'label'       => 'Gallery Header',
        'id'          => 'adv_gallery_header',
        'type'        => 'textarea',
        'desc'        => 'This content appears at the top of the galleries',
        'rows'        => '4',
        'section'     => 'advertising'
      ),
      array(
        'id'          => 'contact_text',
        'label'       => 'About Google Map Settings',
        'desc'        => 'These settings will be used for the map added by the Google Map Visual Composer element.',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'contact'
      ),
      array(
        'label'       => 'Google Maps API Key',
        'id'          => 'map_api_key',
        'type'        => 'text',
        'desc'        => 'Please enter the Google Maps Api Key. <small>You need to create a browser API key. For more information, please visit: <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">https://developers.google.com/maps/documentation/javascript/get-api-key</a></small>',
        'section'     => 'contact'
      ),
  		array(
  		  'label'       => 'Map Style',
  		  'id'          => 'contact_map_style',
  		  'type'        => 'radio',
  		  'desc'        => 'You can select different color settings for the map here',
  		  'choices'     => array(
  		    array(
  		      'label'       => 'No Style',
  		      'value'       => '0'
  		    ),
  		    array(
  		      'label'       => 'Paper',
  		      'value'       => '1'
  		    ),
  		    array(
  		      'label'       => 'Light Monochrome',
  		      'value'       => '2'
  		    ),
  		    array(
  		      'label'       => 'Subtle',
  		      'value'       => '3'
  		    ),
  		    array(
  		      'label'       => 'Cool Grey',
  		      'value'       => '4'
  		    ),
  		    array(
  		      'label'       => 'Bentley',
  		      'value'       => '5'
  		    ),
  		    array(
  		      'label'       => 'Icy Blue',
  		      'value'       => '6'
  		    ),
  		    array(
  		      'label'       => 'Turquoise Water',
  		      'value'       => '7'
  		    ),
  		    array(
		        'label'       => 'Blue',
		        'value'       => '8'
		      ),
		    array(
		        'label'       => 'Shades of Grey',
		        'value'       => '9'
		      ),
		    array(
		        'label'       => 'Girly (Default)',
		        'value'       => '10'
		      ),
  		    
  		  ),
  		  'std'         => '10',
  		  'section'     => 'contact'
  		),
		  array(
		  	'label'       => 'Map Zoom Amount',
		    'id'          => 'contact_zoom',
		    'desc'        => 'Value should be between 1-18, 1 being the entire earth and 18 being right at street level.',
		    'std'         => '17',
		    'type'        => 'numeric-slider',
		    'section'     => 'contact',
		    'min_max_step'=> '1,18,1'
		  ),
		  array(
		    'label'       => 'Map Pin Image',
		    'id'          => 'map_pin_image',
		    'type'        => 'upload',
		    'desc'        => 'If you would like to use your own pin, you can upload it here',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Map Center Latitude',
		    'id'          => 'map_center_lat',
		    'type'        => 'text',
		    'desc'        => 'Please enter the latitude for the maps center point. <small>You can get lat-long coordinates using <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Latlong.net</a></small>',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Map Center Longtitude',
		    'id'          => 'map_center_long',
		    'type'        => 'text',
		    'desc'        => 'Please enter the longitude for the maps center point.',
		    'section'     => 'contact'
		  ),
		  array(
		    'label'       => 'Google Map Pin Locations',
		    'id'          => 'map_locations',
		    'type'        => 'list-item',
		    'desc'        => 'Coordinates to shop on the map',
		    'settings'    => array(
		      array(
		        'label'       => 'Coordinates',
		        'id'          => 'lat_long',
		        'type'        => 'text',
		        'desc'        => 'Coordinates of this location separated by comma. <small>You can get lat-long coordinates using <a href="http://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Latlong.net</a></small>',
		        'rows'        => '1'
		      ),
		      array(
		        'label'       => 'Location Image',
		        'id'          => 'image',
		        'type'        => 'upload',
		        'desc'        => 'You can upload your own location image here. Suggested image size is 110x115'
		      ),
		      array(
		        'label'       => 'Information',
		        'id'          => 'information',
		        'type'        => 'textarea',
		        'desc'        => 'This content appears below the title of the tooltip',
		        'rows'        => '2',
		      ),
		    ),
		    'section'     => 'contact'
		  )
    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
}
/**
 * Category Colorpicker option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_category_colorpicker' ) ) {
  
  function ot_type_category_colorpicker( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    $args = array(
    	'type'                     => 'post',
    	'child_of'                 => 0,
    	'parent'                   => '',
    	'orderby'                  => 'name',
    	'order'                    => 'ASC',
    	'hide_empty'               => 0,
    	'hierarchical'             => 0,
    	'exclude'                  => '',
    	'include'                  => '',
    	'number'                   => '',
    	'taxonomy'                 => 'category',
    	'pad_counts'               => false 
    
    );
    global $sitepress;
    
    if ($sitepress) {
    	remove_filter('terms_clauses', array($sitepress, 'terms_clauses'));
    }
    $categories = get_terms( 'category', array( 'hide_empty'    => false, ) );
    
    foreach ($categories as $category) {
    	$field_id = 'category_colors-'.$category->term_id.'';
    	$field_name = 'option_tree[category_colors]['.$category->term_id.']';
    	
    	/* format setting outer wrapper */
	    echo '<div class="format-setting type-colorpicker has-desc format-settings">';
	      
	      /* description */
	      echo '<div class="description">Category color for <strong>' . $category->name . '</strong></div>';
	      
	      /* format setting inner wrapper */
	      echo '<div class="format-setting-inner">'; 
	        
	        /* build colorpicker */  
	        echo '<div class="option-tree-ui-colorpicker-input-wrap">';
	          
	          /* colorpicker JS */      
	          echo '<script>jQuery(document).ready(function($) { OT_UI.bind_colorpicker("' . esc_attr( $field_id ) . '"); });</script>';
	          
	          /* set the default color */
	          $std = $field_std ? 'data-default-color="' . $field_std . '"' : '';
	          
	          /* input */
	          echo '<input type="text" name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( isset($field_value[$category->term_id]) ? $field_value[$category->term_id] : '' ) . '" class="hide-color-picker ' . esc_attr( $field_class ) . '" ' . $std . ' />';
	        
	        echo '</div>';
	      
	      echo '</div>';
	
	    echo '</div>';
    }
    
    
  }
  
}
/**
 * Category Header option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_category_header' ) ) {
  
  function ot_type_category_header( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    $args = array(
    	'type'                     => 'post',
    	'child_of'                 => 0,
    	'parent'                   => '',
    	'orderby'                  => 'name',
    	'order'                    => 'ASC',
    	'hide_empty'               => 0,
    	'hierarchical'             => 0,
    	'exclude'                  => '',
    	'include'                  => '',
    	'number'                   => '',
    	'taxonomy'                 => 'category',
    	'pad_counts'               => false 
    
    );
    global $sitepress;
    
    if ($sitepress) {
    	remove_filter('terms_clauses', array($sitepress, 'terms_clauses'));
    }
    $categories = get_terms( 'category', array( 'hide_empty'    => false, ) );

    foreach ($categories as $category) {
	    	$field_id = 'category_header-'.$category->term_id;
	    	$field_id_color = 'category_header-'.$category->term_id.'-color';
	    	$field_name_bg = 'option_tree[category_headers]['.$category->term_id.'][bg]';
	    	$field_name_color = 'option_tree[category_headers]['.$category->term_id.'][color]';
	    	
	    	$background = isset( $field_value[$category->term_id]['bg'] ) ? $field_value[$category->term_id]['bg'] : '';
	    	$color = isset( $field_value[$category->term_id]['color'] ) ? $field_value[$category->term_id]['color'] : '';
				
				/* format setting outer wrapper */
		    echo '<div class="format-setting type-colorpicker has-desc format-settings">';
		      
		      /* description */
		      echo '<div class="description">Category Title Color for <strong>' . $category->name . '</strong></div>';
		      
		      /* format setting inner wrapper */
		      echo '<div class="format-setting-inner">'; 
		        
		        /* build colorpicker */  
		        echo '<div class="option-tree-ui-colorpicker-input-wrap">';
		          
		          /* colorpicker JS */      
		          echo '<script>jQuery(document).ready(function($) { OT_UI.bind_colorpicker("' . esc_attr( $field_id_color ) . '"); });</script>';
		          
		          /* set the default color */
		          $std = $field_std ? 'data-default-color="' . $field_std . '"' : '';
		          
		          /* input */
		          echo '<input type="text" name="' . esc_attr( $field_name_color ) . '" id="' . esc_attr( $field_id_color ) . '" value="' . esc_attr( $color ) . '" class="hide-color-picker ' . esc_attr( $field_class ) . '" ' . $std . ' />';
		        
		        echo '</div>';
		      
		      echo '</div>';
		
		    echo '</div>';
				    
	    	/* If an attachment ID is stored here fetch its URL and replace the value */
	    	if ( $background && wp_attachment_is_image( $background ) ) {
	    	
	    	  $attachment_data = wp_get_attachment_image_src( $background, 'original' );
	    	  
	    	  /* check for attachment data */
	    	  if ( $attachment_data ) {
	    	  
	    	    $field_src = $attachment_data[0];
	    	    
	    	  }
	    	  
	    	}
	    	
	    	/* format setting outer wrapper */
	    	echo '<div class="format-setting-wrap"><div class="format-setting type-upload ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
	    	  
	    	  /* description */
	    	  echo $has_desc ? '<div class="description">Category header for <strong>' . $category->name . '</strong></div>' : '';
	    	  
	    	  /* format setting inner wrapper */
	    	  echo '<div class="format-setting-inner">';
	    	  
	    	    /* build upload */
	    	    echo '<div class="option-tree-ui-upload-parent">';
	    	     
	    	     	
	    	     	
	    	      /* input */
	    	      echo '<input type="text" name="' . esc_attr( $field_name_bg ) . '" id="' . esc_attr( $field_id ) . '" value="' . esc_attr( $background ) . '" class="widefat option-tree-ui-upload-input ' . esc_attr( $field_class ) . '" />';
	    	      
	    	      /* add media button */
	    	      echo '<a href="javascript:void(0);" class="ot_upload_media option-tree-ui-button button button-primary light" rel="' . $post_id . '" title="' . __( 'Add Media', 'option-tree' ) . '"><span class="icon ot-icon-plus-circle"></span>' . __( 'Add Media', 'option-tree' ) . '</a>';
	    	    
	    	    echo '</div>';
	    	    
	    	    /* media */
	    	    if ( $background ) {
	    	        
	    	      echo '<div class="option-tree-ui-media-wrap" id="' . esc_attr( $field_id ) . '_media">';
	    	        
	    	        /* replace image src */
	    	        if ( isset( $field_src ) )
	    	          $field_value = $field_src;
	    	          
	    	        if ( preg_match( '/\.(?:jpe?g|png|gif|ico)$/i', $background ) )
	    	          echo '<div class="option-tree-ui-image-wrap"><img src="' . esc_url( $background ) . '" alt="" /></div>';
	    	        
	    	        echo '<a href="javascript:(void);" class="option-tree-ui-remove-media option-tree-ui-button button button-secondary light" title="' . __( 'Remove Media', 'option-tree' ) . '"><span class="icon ot-icon-minus-circle"></span>' . __( 'Remove Media', 'option-tree' ) . '</a>';
	    	        
	    	      echo '</div>';
	    	      
	    	    }
	    	    
	    	  echo '</div>';
	    	
	    	echo '</div></div>';
    }
    
    
  }
  
}

/**
 * Menu Select option type.
 *
 * See @ot_display_by_type to see the full list of available arguments.
 *
 * @param     array     An array of arguments.
 * @return    string
 *
 * @access    public
 * @since     2.0
 */
if ( ! function_exists( 'ot_type_menu_select' ) ) {
  
  function ot_type_menu_select( $args = array() ) {
    
    /* turns arguments array into variables */
    extract( $args );
    
    /* verify a description */
    $has_desc = $field_desc ? true : false;
    
    /* format setting outer wrapper */
    echo '<div class="format-setting type-category-select ' . ( $has_desc ? 'has-desc' : 'no-desc' ) . '">';
      
      /* description */
      echo $has_desc ? '<div class="description">' . htmlspecialchars_decode( $field_desc ) . '</div>' : '';
      
      /* format setting inner wrapper */
      echo '<div class="format-setting-inner">';
      
        /* build category */
        echo '<select name="' . esc_attr( $field_name ) . '" id="' . esc_attr( $field_id ) . '" class="option-tree-ui-select ' . $field_class . '">';
        
        /* get category array */
        $menus = get_terms( 'nav_menu');
        
        /* has cats */
        if ( ! empty( $menus ) ) {
          echo '<option value="">-- ' . __( 'Choose One', 'option-tree' ) . ' --</option>';
          foreach ( $menus as $menu ) {
            echo '<option value="' . esc_attr( $menu->slug ) . '"' . selected( $field_value, $menu->slug, false ) . '>' . esc_attr( $menu->name ) . '</option>';
          }
        } else {
          echo '<option value="">' . __( 'No Menus Found', 'option-tree' ) . '</option>';
        }
        
        echo '</select>';
      
      echo '</div>';
    
    echo '</div>';
    
  }
  
}