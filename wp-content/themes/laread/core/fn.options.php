<?php
/**
 * Theme Option functions
 *
 * @package Evmet laread
 * @author Evmet
 *
 * COPYRIGHT (c) 2016 Evmet. All rights reserved.
 * This  is  commercial  software,  only  users  who have purchased a valid
 * license  and  accept  to the terms of the  License Agreement can install
 * and use this program.
 */

/**
 * Include required core framework 
 *
 * @access public
 * @return void
 */
require_once laread_PATH . '/core/lib/titan-framework/titan-framework-embedder.php';

/**
 * Plugin options (Hook Titan Framework)
 *
 * @return void
 */
 function laread_fixed_admin_bar() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }

/**
 * Plugin options (Hook Titan Framework)
 *
 * @return void
 */

function laread_santanize( $input ) {
	return $input;
}
		
function laread_create_options() {
	
	$opts = TitanFramework::getInstance( 'laread' );


		// Section General
		$section_general = $opts->createThemeCustomizerSection( array(
	    	'name' => esc_html__( 'General', 'laread' )
		));

		

		// Loading Box
		$section_general->createOption( array(
		    'name' => esc_html__( 'Loading Box', 'laread' ),
		    'id' => 'laread_is_loading_box',
		    'options' => array(
		        '1' => 'On',
		        '2' => 'Off'
		    ),
		    'type' => 'radio',
		    'desc' => esc_html__('if you want, loading','laread'),
		    'default' => '2',
		) );


		// Inline Page Template
		$section_general->createOption( array(
		    'name' => esc_html__( 'Inline Page Template', 'laread' ),
		    'id' => 'laread_inline_page_template',
		    'type' => 'select',
		    'desc' => esc_html__( 'for archive, categories', 'laread' ),
		    'options' => array(
		        'large-image-v1' => esc_html__('Large Image','laread'),
		        'medium-with-sidebar' => esc_html__('Medium With Sidebar','laread'),
		        'medium-without-sidebar' => esc_html__('Medium Without Sidebar','laread'),
		        'masonry' => esc_html__('Masonry','laread')
		    ),
		    'default' => 'large-image-v1',
		));


		// Single Page Template
		$section_general->createOption( array(
		    'name' => esc_html__( 'Single Page Template', 'laread' ),
		    'id' => 'laread_single_page_template',
		    'type' => 'select',
		    'desc' =>  esc_html__( 'for post detail ', 'laread' ),
		    'options' => array(
		        'medium-without' => esc_html__('Without Sidebar','laread'),
		        'medium-with-sidebar' => esc_html__('With Sidebar','laread')
		    ),
		    'default' => 'medium-without',
		));



		// Gallery Post Limit
		$section_general->createOption( array(
		    'name' => esc_html__( 'Gallery Post Limit', 'laread' ),
		    'id' => 'laread_gallery_post_limit',
		    'type' => 'text'
		));



		
		// Bg Color
		$section_general->createOption( array(
		    'name' => esc_html__( 'Background Color', 'laread' ),
		    'id' => 'laread_background_color',
		    'type' => 'color',
		    'default' => '#f3f3f3',
		    'css' => 'div.canvas { background: value }',
		));

		// Primary color
		$section_general->createOption( array(
		    'name' => esc_html__( 'Primary Color', 'laread' ),
		    'id' => 'laread_primary_color',
		    'type' => 'color',
		    'default' => '#545456',
		    'desc' => esc_html__('general text color','laread'),
		    'css' => '.post-item-paragraph p { color: value }',
		));

		// Primary Link color
		$section_general->createOption( array(
		    'name' => esc_html__( 'Link Color', 'laread' ),
		    'id' => 'laread_link_color',
		    'type' => 'color',
		    'default' => '#3d3d3f',
		    'desc' => esc_html__('h1, h2, h3 (title color)','laread'),
		    'css' => 'h1, h2, h3, h4, h5, h6 { color: value }',
		));

		// Link Hover Color
		$section_general->createOption( array(
		    'name' => esc_html__( 'Link Hover Color', 'laread' ),
		    'id' => 'laread_link_hover_color',
		    'type' => 'color',
		    'default' => '#a28671',
		    'desc' => esc_html__('h1, h2, h3 (title hover color)','laread'),
		    'css' => '.post-item-paragraph h2 a:hover, .post-item-paragraph h2 a:focus, .post-item-short .big-text a:hover, .post-item-paragraph h3 a:hover{ color: value }',
		));

		// Footer Script
		$section_general->createOption( array(
		    'name' => esc_html__( 'Footer Script', 'laread' ),
		    'id' => 'laread_footer_script',
		    'type' => 'textarea',
		    'desc' => esc_html__('for footer script.','laread'),
		));


		// Social Links [Title]
		$section_social_links = $opts->createThemeCustomizerSection( array(
		    'name' => esc_html__( 'Social Networks', 'laread' )
		));

			// Facebook Link
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Facebook', 'laread' ),
				'id' => 'social_facebook_link',
				'type' => 'text'
			));

			// Twitter
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Twitter', 'laread' ),
				'id' => 'social_twitter_link',
				'type' => 'text'
			));

			// Instagram
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Instagram', 'laread' ),
				'id' => 'social_instagram',
				'type' => 'text'
			));

			// Pinterest
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Pinterest', 'laread' ),
				'id' => 'social_pinterest_link',
				'type' => 'text'
			));

			//edin
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Linkedin', 'laread' ),
				'id' => 'social_linkedin_link',
				'type' => 'text'
			));

			// Dribbble
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Dribbble', 'laread' ),
				'id' => 'social_dribbble_link',
				'type' => 'text'
			));

			// Vimeo
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Vimeo', 'laread' ),
				'id' => 'social_vimeo_link',
				'type' => 'text'
			));

			// Soundcloud
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Soundcloud', 'laread' ),
				'id' => 'social_soundcloud_link',
				'type' => 'text'
			));

			// Github
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Github', 'laread' ),
				'id' => 'social_github_link',
				'type' => 'text'
			));

			// Flickr
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Flickr', 'laread' ),
				'id' => 'social_flickr_link',
				'type' => 'text'
			));

			// Youtube
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Youtube', 'laread' ),
				'id' => 'social_youtube_link',
				'type' => 'text'
			));

			// 500px
			$section_social_links->createOption( array(
				'name' => esc_html__( '500px', 'laread' ),
				'id' => 'social_500px_link',
				'type' => 'text'
			));

			// Slack
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Slack', 'laread' ),
				'id' => 'social_slack_link',
				'type' => 'text'
			));

			// Vine
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Vine', 'laread' ),
				'id' => 'social_vine_link',
				'type' => 'text'
			));

			// Spotify
			$section_social_links->createOption( array(
				'name' => esc_html__( 'Spotify', 'laread' ),
				'id' => 'social_spotify_link',
				'type' => 'text'
			));
			

		// Section Header
		$section_header = $opts->createThemeCustomizerSection( array(
	    	'name' => esc_html__( 'Header', 'laread' )
		));

			$section_header->createOption( array(
			    'name' => esc_html__( 'Logo', 'laread' ),
			    'id' => 'laread_header_logo',
			    'type' => 'upload',
			    'desc' => esc_html__( 'Upload your logo', 'laread' )
			));

			$section_header->createOption( array(
			    'name' => esc_html__( 'Logo Retina', 'laread' ),
			    'id' => 'laread_header_logo_retina',
			    'type' => 'upload',
			    'desc' => esc_html__( 'Upload your retina logo (@2x)', 'laread' )
			));


			// Header Bg Color
			$section_header->createOption( array(
			    'name' => esc_html__( 'Background Color', 'laread' ),
			    'id' => 'laread_header_background_color',
			    'type' => 'color',
			    'default' => '#3d3d3f',
			    'css' => '.navbar-laread { background: value }  .navbar-laread .nav>li:hover>a.dropdown-toggle:before{ border-top: 6px solid value !important;}',
			));

			//Link color
			$section_header->createOption( array(
			    'name' => esc_html__( 'Link Color', 'laread' ),
			    'id' => 'laread_header_link_color',
			    'type' => 'color',
			    'default' => '#fff',
			    'desc' => esc_html__('text color','laread' ),
			    'css' => '.navbar-laread .nav > li > a { color: value }',
			));

			// PushBar Template
				$section_header->createOption( array(
				    'name' => esc_html__( 'Pushbar Types', 'laread' ),
				    'id' => 'laread_pushbar_type',
				    'type' => 'select',
				    'desc' =>  esc_html__( 'Pushbar style type', 'laread' ),
				    'options' => array(
				        'default' => esc_html__('Default', 'laread' ),
				        'full' => esc_html__('Full With', 'laread' )
				    ),
				    'default' => 'default',
				));
		
			// Pushbar categories
			$section_header->createOption( array(
			    'name' => esc_html__( 'PushBar Categories', 'laread' ),
			    'id' => 'laread_pushbar_cats',
			    'type' => 'multicheck-categories'
			));

			//Pushbar post limit
			$section_header->createOption( array(
				'name' => esc_html__( 'Pushbar post limit', 'laread' ),
				'id' => 'laread_pushbar_post_limit',
				'type' => 'text',
				'desc' => esc_html__( 'Post limit', 'laread' )
			));


		// Section Footer
		$section_footer = $opts->createThemeCustomizerSection( array(
	    	'name' => esc_html__( 'Footer', 'laread' )
		));

			// Footer Logo
			$section_footer->createOption( array(
			    'name' => esc_html__( 'Footer Logo', 'laread' ),
			    'id' => 'laread_footer_logo',
			    'type' => 'upload',
			    'desc' => esc_html__( 'Upload your footer logo', 'laread' )
			));

			// Footer Logo
			$section_footer->createOption( array(
			    'name' => esc_html__( 'Footer Retina Logo', 'laread' ),
			    'id' => 'laread_footer_logo_retina',
			    'type' => 'upload',
			    'desc' => esc_html__( 'Upload your footer logo retina  (2x)', 'laread' )
			));


			//Footer Tagline
			$section_footer->createOption( array(
				'name' => esc_html__( 'Tagline', 'laread' ),
				'id' => 'laread_footer_tagline',
				'type' => 'text',
				'desc' => esc_html__( 'Footer tagline', 'laread' )
			));

			// Footer Bg Color
			$section_footer->createOption( array(
			    'name' => esc_html__( 'Background Color', 'laread' ),
			    'id' => 'laread_footer_background_color',
			    'type' => 'color',
			    'default' => '#3d3d3f',
			    'css' => '.footer { background: value }',
			));



		// Section QuickRead
		$section_quickread = $opts->createThemeCustomizerSection( array(
	    	'name' => esc_html__( 'Quick Read', 'laread' )
		));

			$section_quickread->createOption( array(
			    'name' => esc_html__( 'Light Logo', 'laread' ),
			    'id' => 'laread_qr_l_logo',
			    'type' => 'upload',
			    'desc' => esc_html__( 'Upload your light logo', 'laread' )
			));

			$section_quickread->createOption( array(
			    'name' => esc_html__( 'Dark Logo', 'laread' ),
			    'id' => 'laread_qr_d_logo',
			    'type' => 'upload',
			    'desc' => esc_html__( 'Upload your dark logo', 'laread' )
			));



		// MetaBox POST
		$metabox_post = $opts->createMetaBox( array(
			'name' =>  esc_html__( 'Post Format Options', 'laread' ),
			'post_type' => 'post',
		));

			// Embed Status
			$metabox_post->createOption( array(
				'name' => esc_html__( 'Embed Code', 'laread' ),
				'id' => 'laread_embed_status',
				'type' => 'textarea',
				'desc' => esc_html__( 'You can add here if you use facebook, soundcloud, twitter embed code', 'laread' )
			));

				// Embed Video
			$metabox_post->createOption( array(
				'name' => esc_html__( 'Embed Video', 'laread' ),
				'id' => 'laread_embed_video',
				'type' => 'textarea',
				'desc' => esc_html__( 'You can add here if you use youtube, vimeo embed code', 'laread' )
			));
			
			// Hot Event
			$metabox_post->createOption( array(
				'name' => esc_html__( 'Hot Event', 'laread' ),
				'id' => 'laread_hot_event',
				'type' => 'textarea',
				'desc' => esc_html__( 'You can add here hot event (You should select status post format)', 'laread' )
			));

			// Code Format
			$metabox_post->createOption( array(
				'name' => esc_html__( 'Code Format', 'laread' ),
				'id' => 'laread_code_format',
				'type' => 'textarea',
				'desc' => esc_html__( 'You can add here code (You should select status post format)', 'laread' )
			));

		

			// Quote Author Name
			$metabox_post->createOption( array(
				'name' => esc_html__( 'Author Name', 'laread' ),
				'id' => 'laread_author_name',
				'type' => 'text',
				'desc' => esc_html__( 'You can add here if you use quote', 'laread' )
			));

			// Post Link Name
			$metabox_post->createOption( array(
				'name' => esc_html__( 'Post Link Title', 'laread' ),
				'id' => 'laread_post_link_title',
				'type' => 'text',
				'desc' => esc_html__( 'You can add here if you use link', 'laread' )
			));

			// Post Link
			$metabox_post->createOption( array(
				'name' => esc_html__( 'Post Link', 'laread' ),
				'id' => 'laread_post_link',
				'type' => 'text',
				'desc' => esc_html__( 'You can add here if you use link', 'laread' )
			));

		// MetaBox POST CHAT
		$metabox_post_chat = $opts->createMetaBox( array(
			'name' =>  esc_html__( 'Chat Format Options', 'laread' ),
			'post_type' => 'post',
		));
			
			// Post Chat
			$metabox_post_chat->createOption( array(
				'name' => esc_html__( 'Chat Info', 'laread' ),
				'id' => 'laread_post_chat_info',
				'type' => 'text',
				'desc' => esc_html__( 'Chat info', 'laread' )
			));

			// Post Chat
			$metabox_post_chat->createOption( array(
				'name' => esc_html__( 'Chat Content', 'laread' ),
				'id' => 'laread_post_chat',
				'type' => 'textarea',
				'desc' => esc_html__( 'First line: A Second line: B', 'laread' )
			));

			// Post Chat Bg Color
			$metabox_post_chat->createOption( array(
				'name' => esc_html__( 'Chat Bg Color', 'laread' ),
				'id' => 'laread_post_chat_bg',
				'type' => 'color',
				'default' => '#C1F7D2',
				'css' => '.in-chat ul li.me span:last-child:after { border-color: transparent value; }',
				'desc' => esc_html__( 'Pick a color', 'laread' )
			));

		// MetaBox POST EVENT
		$metabox_post_event = $opts->createMetaBox( array(
			'name' =>  esc_html__( 'Event Format Options', 'laread' ),
			'post_type' => 'post',
		));

			// Event Title
			$metabox_post_event->createOption( array(
				'name' => esc_html__( 'Title', 'laread' ),
				'id' => 'laread_post_event_title',
				'type' => 'text',
				'desc' => esc_html__( 'Event Title', 'laread' )
			));

			// Event Title
			$metabox_post_event->createOption( array(
				'name' => esc_html__( 'Date', 'laread' ),
				'id' => 'laread_post_event_date',
				'type' => 'text',
				'desc' => esc_html__( 'for example: 21 July', 'laread' )
			));

			// Event Adress
			$metabox_post_event->createOption( array(
				'name' => esc_html__( 'Adress', 'laread' ),
				'id' => 'laread_post_event_adress',
				'type' => 'text',
				'desc' => esc_html__( 'Event Adress', 'laread' )
			));

			// Event Link
			$metabox_post_event->createOption( array(
				'name' => esc_html__( 'Link', 'laread' ),
				'id' => 'laread_post_event_link',
				'type' => 'text',
				'desc' => esc_html__( 'Event Link', 'laread' )
			));


			// Post Event
			$metabox_post_event->createOption( array(
				'name' => esc_html__( 'Event Content', 'laread' ),
				'id' => 'laread_post_event',
				'type' => 'textarea',
				'desc' => esc_html__( 'for example: 08:30 - 09:30  & Start with design project', 'laread' )
			));

			

	// MetaBox PAGE
		$metabox_page = $opts->createMetaBox( array(
			'name' =>  esc_html__( 'Banner Mode Page Options', 'laread' ),
			'post_type' => 'page',
		));
			// Page Template
			$metabox_page->createOption( array(
			    'name' => esc_html__( 'Page Template', 'laread' ),
			    'id' => 'laread_page_template_for_banner',
			    'type' => 'select',
			    'desc' => esc_html__( 'You can select template here if you use banner mode', 'laread' ),
			    'options' => array(
			        '0' => esc_html__( 'Select Page Template', 'laread' ),
			        'large-image-v1' => esc_html__( 'Large Image', 'laread' ),
			        'medium-with-sidebar' => esc_html__( 'Medium With Sidebar', 'laread' ),
			        'medium-without-sidebar' => esc_html__( 'Medium Without Sidebar', 'laread' ),
			        'masonry' => esc_html__( 'Masonry', 'laread' ),
			    ),
			    'default' => '0',
			) );

			// Post limit
			$metabox_page->createOption( array(
			    'name' => esc_html__( 'Banner Post Limit', 'laread' ),
			    'id' => 'laread_banner_post_limit',
			    'type' => 'number',
			    'desc' => esc_html__( 'How to display post?', 'laread' ),
			    'default' => '1',
			    'max' => '100',
			) );

			// Custom Logo
			$metabox_page->createOption( array(
			    'name' =>  esc_html__( 'Custom Logo For Header', 'laread' ),
			    'id' => 'laread_banner_logo',
			    'type' => 'upload',
			    'desc' => esc_html__( 'Upload your image', 'laread' )
			) );

			// Custom Logo Retina
			$metabox_page->createOption( array(
			    'name' =>  esc_html__( 'Custom Logo Retina For Header', 'laread' ),
			    'id' => 'laread_banner_logo_retina',
			    'type' => 'upload',
			    'desc' => esc_html__( 'Upload your image @2x', 'laread' )
			) );

			// Select Page for Banner Mode
			$metabox_page->createOption( array(
				'name' => esc_html__( 'Banner Mode Footer Pages', 'laread' ),
				'id' => 'laread_banner_mode_page',
				'type' => 'multicheck-pages',
				'desc' => esc_html__( 'Select Pages for Banner Mode Footer Link', 'laread' )
			) ); 

	// MetaBox Gallery
	$metabox_laread_gallery = $opts->createMetaBox( array(
			'name' => esc_html__( 'Display Options', 'laread' ),
			'post_type' => 'laread_gallery',
		));
			// Page Template
			$metabox_laread_gallery->createOption( array(
			    'name' => esc_html__( 'How to display', 'laread' ),
			    'id' => 'laread_gallery_display',
			    'type' => 'select',
			    'desc' => esc_html__( 'You can select gallery type', 'laread' ),
			    'options' => array(
			        'carousel' => esc_html__( 'Carousel v1', 'laread' ),
			        'carousel2' => esc_html__( 'Carousel v2', 'laread' ),
			        'gallery-light' => esc_html__( 'Gallery Light', 'laread' ),
			        'gallery-dark' =>esc_html__(  'Gallery Dark', 'laread' )
			    ),
			    'default' => 'gallery-light',
			) );
	
	// MetaBox About
	$metabox_page_about = $opts->createMetaBox( array(
		'name' =>  esc_html__( 'About Page Options', 'laread' ),
		'post_type' => 'page',
	));		
			
			// Jobs
			$metabox_page_about->createOption( array(
				'name' => esc_html__( 'Description', 'laread' ),
				'id' => 'laread_about_desc',
				'type' => 'text',
				'desc' => esc_html__( 'Ex: Welcome to my blog <small>for about v1 page</small>', 'laread' )
			));

			// Jobs
			$metabox_page_about->createOption( array(
				'name' => esc_html__( 'Jobs', 'laread' ),
				'id' => 'laread_about_jobs',
				'type' => 'text',
				'desc' => esc_html__( 'Ex: Traveler / Art Director', 'laread' )
			));

			// Adress
			$metabox_page_about->createOption( array(
				'name' => esc_html__( 'Adress', 'laread' ),
				'id' => 'laread_about_adress',
				'type' => 'text',
				'desc' => esc_html__( 'Ex: Popayan, Colombia', 'laread' )
			));

			// InfoBox
			$metabox_page_about->createOption( array(
				'name' => esc_html__( 'Infobox', 'laread' ),
				'id' => 'laread_about_infobox',
				'type' => 'code',
				'desc' => esc_html__( 'for Help http://laread.evmet.net/wp/documentation', 'laread' )
			));

			// InfoBox
			$metabox_page_about->createOption( array(
				'name' => esc_html__( 'About Social Text', 'laread' ),
				'id' => 'laread_about_social',
				'type' => 'textarea',
				'desc' => esc_html__( 'about contact', 'laread' )
			));

			// Social Links [Title]
			$metabox_page_about->createOption( array(
			    'name' => esc_html__( 'Social Networks', 'laread' ),
			    'type' => 'heading',
			));

				// Facebook Link
				$metabox_page_about->createOption( array(
					'name' => esc_html__( 'Facebook Link', 'laread' ),
					'id' => 'social_about_facebook_link',
					'type' => 'text',
					'desc' => esc_html__( 'Facebook Profile Link', 'laread' )
				));

				// Twitter Link
				$metabox_page_about->createOption( array(
					'name' => esc_html__( 'Twitter Link', 'laread' ),
					'id' => 'social_about_twitter_link',
					'type' => 'text',
					'desc' => esc_html__( 'Twitter Profile Link', 'laread' )
				));

				// Gp Link
				$metabox_page_about->createOption( array(
					'name' => esc_html__( 'Google Plus', 'laread' ),
					'id' => 'social_about_google_plus',
					'type' => 'text',
					'desc' => esc_html__( 'Google Plus Link', 'laread' )
				));

				// Behance Link
				$metabox_page_about->createOption( array(
					'name' => esc_html__( 'Behance Link', 'laread' ),
					'id' => 'social_about_behance_link',
					'type' => 'text',
					'desc' => esc_html__( 'Behance Profile Link', 'laread' )
				));

				// Contact Mail
				$metabox_page_about->createOption( array(
					'name' => esc_html__( 'Contact Mail', 'laread' ),
					'id' => 'social_about_contact_mail',
					'type' => 'text',
					'desc' => esc_html__( 'Your email', 'laread' )
				));

	// MetaBox Contact
	$metabox_page_contact = $opts->createMetaBox( array(
		'name' =>  esc_html__( 'Contact Page Options', 'laread' ),
		'post_type' => 'page',
	));		
			
			// Adress
			$metabox_page_contact->createOption( array(
				'name' => esc_html__( 'Adress', 'laread' ),
				'id' => 'laread_contact_adres',
				'type' => 'text',
				'desc' => esc_html__( 'Ex: 216 King Street, Toronto, Canada', 'laread' )
			));

			// Email
			$metabox_page_contact->createOption( array(
				'name' => esc_html__( 'Contact Email', 'laread' ),
				'id' => 'laread_contact_email',
				'type' => 'text',
				'desc' => esc_html__( 'hello@mail.com', 'laread' )
			));

			// Google Maps
			$metabox_page_contact->createOption( array(
				'name' => esc_html__( 'Google Maps lat,lng', 'laread' ),
				'id' => 'laread_about_googlemaps',
				'type' => 'text',
				'desc' => esc_html__( 'Ex: 40.1960517,29.0602351', 'laread' )
			));

			// Email
			$metabox_page_contact->createOption( array(
				'name' => esc_html__( 'Marker Title', 'laread' ),
				'id' => 'laread_contact_maps_title',
				'type' => 'text',
				'desc' => esc_html__( 'laread started at this point' , 'laread')
			));

			// Phone
			$metabox_page_contact->createOption( array(
				'name' => esc_html__( 'Phone', 'laread' ),
				'id' => 'laread_contact_phone',
				'type' => 'text',
				'desc' => esc_html__( 'Your phone' , 'laread')
			));
}

add_action( 'tf_create_options', 'laread_create_options' );

/**
 * Ajax Callback
 *
 * @return void
 */
function laread_ajax_callback() {

	$mode = esc_html( $_GET['mode'] );

	if ($mode == 'get_posts') {
		
	 $page_number = (isset($_GET['page_number'])) ? $_GET['page_number'] : 1;
     $offset = (isset($_GET['offset'])) ? $_GET['offset'] : 1;  

     	 $blog_args = array(
            'paged' =>  $page_number,
            'post_type' => 'post',
            'offset' => $offset,
            'post_status' => 'publish'
        );

		$blog_query = new WP_Query($blog_args);
		
		$opts = TitanFramework::getInstance( 'laread' );
		$custom_format = '';

		if($blog_query->have_posts()) : while($blog_query->have_posts()) : $blog_query->the_post();			
	
		
				$post_format = get_post_format();
								$custom_format = '';

								// Custom format
								if ($post_format == 'status') {
									$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() );
									$custom_format = ($embed_status) ? '-embed' : '';

									// Hot Event
									$hot_event = '';
									$hot_event = $opts->getOption( 'laread_hot_event', get_the_ID() );
									if ($hot_event)
										$custom_format = ($hot_event) ? '-hot-event' : '';

									// Code
									$code = '';
									$code = $opts->getOption( 'laread_code_format', get_the_ID() );
									if ($code)
										$custom_format = ($code) ? '-code' : '';
								}

				
				
				get_template_part( 'post-formats/masonry/content', $post_format.$custom_format );

			// End the loop.
			endwhile;
		endif;
      wp_reset_query();
      die();

     } elseif ($mode == 'get_gallery') {

     $page_number = (isset($_GET['page_number'])) ? $_GET['page_number'] : 1;

      $offset = (isset($_GET['offset'])) ? $_GET['offset'] : 1;  

     	 $blog_args = array(
            'paged' =>  $page_number,
            'post_type' => 'laread_gallery',
            'offset' => $offset,
            'post_status' => 'publish'
        );

     	$blog_query = new WP_Query($blog_args);		
		$opts = TitanFramework::getInstance( 'laread' );

     	 if($blog_query->have_posts()) : 
				
			while($blog_query->have_posts()) : $blog_query->the_post();

					$display_mode = $opts->getOption( 'laread_gallery_display', get_the_ID() );

					include laread_PATH.'/gallery-format/gallery1/'.$display_mode.'.php';
					
			endwhile;

		endif;


	} 

	elseif ($mode == 'get_gallery_mode_3') {

     $page_number = (isset($_GET['page_number'])) ? $_GET['page_number'] : 1;

      $offset = (isset($_GET['offset'])) ? $_GET['offset'] : 1;  

     	 $blog_args = array(
            'paged' =>  $page_number,
            'post_type' => 'laread_gallery',
            'offset' => $offset,
            'post_status' => 'publish'
        );

     	$blog_query = new WP_Query($blog_args);		
     	 if($blog_query->have_posts()) : 
				
			while($blog_query->have_posts()) : $blog_query->the_post();

					include laread_PATH.'/gallery-format/gallery3/box.php';
					
			endwhile;

		endif;


	}

	elseif ($mode == 'get_gallery_mode_2') {

     $page_number = (isset($_GET['page_number'])) ? $_GET['page_number'] : 1;

      $offset = (isset($_GET['offset'])) ? $_GET['offset'] : 1;  

     	 $blog_args = array(
            'paged' =>  $page_number,
            'post_type' => 'laread_gallery',
            'offset' => $offset,
            'post_status' => 'publish'
        );

     	$blog_query = new WP_Query($blog_args);		
		$opts = TitanFramework::getInstance( 'laread' );

     	 if($blog_query->have_posts()) : 
				
			while($blog_query->have_posts()) : $blog_query->the_post();

					$display_mode = $opts->getOption( 'laread_gallery_display', get_the_ID() );

					include laread_PATH.'/gallery-format/gallery2/'.$display_mode.'.php';
					
			endwhile;

		endif;


	}elseif ($mode == 'get_gallery_mode_2_footer') {

     $page_number = (isset($_GET['page_number'])) ? $_GET['page_number'] : 1;

      $offset = (isset($_GET['offset'])) ? $_GET['offset'] : 1;  

     	 $blog_args = array(
            'paged' =>  $page_number,
            'post_type' => 'laread_gallery',
            'offset' => $offset,
            'post_status' => 'publish'
        );

     	$blog_query = new WP_Query($blog_args);		
		$opts = TitanFramework::getInstance( 'laread' );

 	if($blog_query->have_posts()) :
			while($blog_query->have_posts()) : $blog_query->the_post();
			$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));
			$display_mode = $opts->getOption( 'laread_gallery_display', get_the_ID() );
			if (count($gallery)): ?>
					<div id="laread-gallery-list-<?php the_ID(); ?>" class="dnone">
						<?php foreach ($gallery as $k => $v): ?>
						<a href="<?php echo esc_url($v); ?>" title="<?php the_title(); ?> <?php echo $k+1; ?>" data-gallery>
							<img src="<?php echo esc_url($v); ?>" alt="<?php the_title(); ?>">
						</a>
						<?php endforeach ?>
					</div>

					<div id="blueimp-laread-gallery-list-<?php the_ID(); ?>" class="blueimp-gallery-controls blueimp-gallery blueimp-gallery-playing gallery-template-<?php echo ($display_mode=='gallery-light') ? 'white' : 'dark'; ?>	">
						<div class="slides"></div>
						<div class="gallery-detail-info">
							<div class="gallery-share">
								<span class="date"><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?></span>
								<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
								<a href="#" class="set-fullscreen"><i class="fa fa-expand"></i></a>
								<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
							</div>
						</div>
						<a class="prev"><i class="fa fa-angle-left"></i></a>
						<a class="next"><i class="fa fa-angle-right"></i></a>
						<a class="close">&#215;</a>
						<a class="play-pause"></a>
						<ol class="indicator"></ol>
					</div>
			<?php endif; endwhile;  endif;

	} else {

	
	// Response var
	$r = array();
	$post_id = $_GET['post_id'];
	try {
		
		if( function_exists('zilla_likes') ) 
			$zilla_likes = new ZillaLikes();
		// Handling the supported actions:
		global $post;
		$post = $r = get_post($post_id);
		setup_postdata( $post );

		$r->post_content =  wpautop( do_shortcode(get_post_field('post_content', $post_id)) );

		$a_link =  get_author_posts_url( $r->post_author );
		$author = esc_html(get_the_author_meta( 'display_name', $r->post_author )); 
		
		$l_author = '<a href="'.esc_url($a_link).'">'.$author.'</a>';
		$l_date = get_the_date('d',$post_id).' '.get_the_date('F',$post_id);
		$r->l_comment = esc_url(get_comments_link( $post_id ));
		$r->qr_info = 'By '.$l_author.'&#32;&#32;&#32;&#8226;&#32;&#32;&#32;'.$l_date;

		// Next Prev Post
		$next_post = get_next_post();
		$previous_post = get_previous_post();

		$r->next_post = '';
		$r->previous_post = '';

		$r->post_link = esc_url(get_permalink());

		if($next_post) { 
           $r->next_post =  '<a href="#" data-postid="'.$next_post->ID.'" class="quick-read  qr-next">'.esc_html__('NEXT POST &#8594;','laread').'</a>';
        }

       	if($previous_post) {
			$r->previous_post = '<a href="#" data-postid="'.$previous_post->ID.'" class="quick-read qr-prev">'.esc_html__( '&#8592; PREV POST' , 'laread').'</a>';
        } 


		if( function_exists('zilla_likes') ) 
			$r->l_like =  $zilla_likes->do_likes();
	
	} catch ( Exception $e ) {
		
		$r['error'] = $e->getMessage();
		
	}
	
    
	// Response output
	header( "Content-Type: application/json" );
	echo json_encode( $r );

	}
	exit;
	
}


function laread_twitter_get($limit = 1  , $twitter_id = '' , $enable_id,$account_info)
{     
    
    $consumer_key = $account_info['consumer_key'];
    $consumer_secret = $account_info['consumer_secret'];
    $access_token = $account_info['access_token'];
    $access_token_secret = $account_info['access_token_secret'];

    $settings = array(
        'oauth_access_token' => $access_token,
        'oauth_access_token_secret' => $access_token_secret,
        'consumer_key' => $consumer_key,
        'consumer_secret' => $consumer_secret
    );
    
    $twitterconn = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
    $latesttweets = $twitterconn->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitter_id."&count=".$limit);

    return $latesttweets;
    
    if($consumer_key != '' && $consumer_secret != '' && $access_token != '' && $access_token_secret != '')
    {

        foreach($latesttweets as $tweet ){
              echo '<div class="tweet"><p>';
             
              $output =  preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a class="custom" href="$1" target="_blank">$1</a>', $tweet->text);
              echo preg_replace('/(^|\s)@([a-z0-9_]+)/i',
                              '$1<a href="http://www.twitter.com/$2">@$2</a>',
                               $output);
              echo '</p></div>';
        }
   
    }
   
} 


// the_expert limit 
function laread_custom_excerpt_length( $length ) {
    return 95;
} 
add_filter( 'excerpt_length', 'laread_custom_excerpt_length', 999 );


// Author Facebook and Twitter Link
function laread_socila_url( $contactmethods ) {

// Add Twitter
$contactmethods['twitter'] =  esc_html__( 'Twitter', 'laread' );

//add Facebook
$contactmethods['facebook'] = esc_html__( 'Facebook', 'laread' );

//add Jobs
$contactmethods['jobs'] = esc_html__( 'Jobs', 'laread' );

//add Adress
$contactmethods['adress'] = esc_html__( 'Locale', 'laread' );

return $contactmethods;


}
add_filter('user_contactmethods','laread_socila_url',10,1);

/* -------------------------------------------------------------- 
      Comments
      -------------------------------------------------------------- */
 function laread_list_comments($comment , $args , $depth) 
      {

        $GLOBALS['comment'] = $comment;
        extract($args);

        ?>
				

            <!-- single comment --> 
            <div id="<?php echo get_comment_ID(); ?>" class="single-comment  <?php if($depth > 1) echo 'sub-comment'; ?>
            <?php echo implode(' ' , get_comment_class('Depth')); ?>" id="comment-id-<?php comment_ID(); ?>">
			
			<a id="comment-<?php echo get_comment_ID(); ?>"></a>
			<div class="comment-item">
				<a class="comment-photo" href="#">
					<?php echo get_avatar( $comment->comment_author_email, 48 ); ?>
				</a>

				<div class="comment-body">
				<?php 

				// comment link
				 if($comment->user_id > 0)
                  {
                      $a_link = esc_url (get_author_posts_url($comment->user_id) ); 
                      
                  }elseif(get_comment_author_url() != '')
                  {
                      $a_link = get_comment_author_url();
                  }
                  else{
                      $a_link = '#';
                  }
                  

                  ?>
					<h6 class="comment-heading"><?php echo $comment->comment_author; ?>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;
						<span class="comment-date"><?php 
                      echo  human_time_diff( get_comment_date('U'), current_time('timestamp') ) . ' ago'; ?></span>
					</h6>
					<p class="comment-text">
						 
                      <?php if($comment->comment_approved == 0) : ?>
                      <p><?php echo esc_html__('Your comment is awaiting moderation' , 'laread'); ?></p>
                      <?php else : ?>
                      <p><?php echo $comment->comment_content; ?></p>
                      <?php endif; ?>

                    
                
					</p>
					  <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text'=>'<i class="reply-icon"></i> '.esc_html__('reply','laread') ))); ?>
				</div>
			</div>

          <?php
      }


// fix comments reply button
add_filter('comment_reply_link', 'laread_replace_reply_link_class');


function laread_replace_reply_link_class($class){

    $class = str_replace("class='comment-reply-link", "class='comment-reply", $class);
    return $class;
}


add_filter( 'post_gallery', 'laread_post_gallery', 10, 2 );
function laread_post_gallery( $output, $attr) {
    global $post, $wp_locale;


     if (@array_key_exists('laread_gallery_type', $attr)) {

    	if ($attr['laread_gallery_type'] == 'none')  return $output;

    } 

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', "
        <style type='text/css'>
            #{$selector} {
                margin: auto;
            }
            #{$selector} .gallery-item {
                float: {$float};
                margin-top: 10px;
                text-align: center;
                width: {$itemwidth}%;           }
            #{$selector} img {
            }
            #{$selector} .gallery-caption {
                margin-left: 0;
            }
        </style>
        <div id='$selector' class='gallery gallery-laread galleryid-{$id}'>");

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

        $link = str_replace('<a href=', '<a data-gallery-item="laread-gallery-list-'.$instance.'" href=', $link);

        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class=''>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='gallery-caption'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br class="clearfix" />';
    }

    $output .= "
            <br class='clearfix' />
        </div>\n";


	if (count($attachments)):


	$l_template = ( isset($attr['laread_gallery_template']) ) ? 'dark'  : 'white';

	$output .= '<div id="laread-gallery-list-'.$instance.'" class="dnone">'."\n";
			foreach ($attachments as $k => $v):

			$image_url = wp_get_attachment_image($v->ID,'full');
			$image_url = wp_get_attachment_url($v->ID,'full');

			$caption = ($v->post_excerpt) ? $v->post_excerpt : $v->post_title;
			$output .= '<a href="'.$image_url.'" title="'.$caption.'" data-gallery>
				<img src="'.$image_url.'" alt="'.$v->post_title.'">
			</a>';
			endforeach;
		$output .= '</div>';

		$output .= '<div id="blueimp-laread-gallery-list-'.$instance.'" class="blueimp-gallery-controls blueimp-gallery blueimp-gallery-playing gallery-template-'.$l_template.'">
			<div class="slides"></div>
			<div class="gallery-detail-info">
				<h3 class="title"></h3>
				<div class="gallery-share">
					<a href="#" class="set-fullscreen"><i class="fa fa-expand"></i></a>
				</div>
			</div>
			<a class="prev"><i class="fa fa-angle-left"></i></a>
			<a class="next"><i class="fa fa-angle-right"></i></a>
			<a class="close">&#215;</a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
		</div>';


	 endif;

    return $output;
}

add_filter( 'post_gallery', 'laread_cr_post_gallery', 10, 2 );
function laread_cr_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    if (@array_key_exists('laread_gallery_type', $attr)) {

    	if ($attr['laread_gallery_type'] != 'carousel') return laread_post_gallery($output, $attr);

    } else {

       return $output;
    }

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'div',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'full',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    // <div class='carousel-title'>ISABEL'S HOME OFFICE</div>
    $output = apply_filters('gallery_style', "
			<div class='carusel-box lg-banner'>
			<div id='carousel-{$instance}' class='carousel galleryid-{$id} slide' data-ride='carousel'>
			<div class='carousel-inner' role='listbox'>
    		");

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $img_url = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image($id, array( 767, 432 ), false, false) : wp_get_attachment_image($id, array( 767, 432 ), false, false);

        $active = ($i==0) ? 'active' : '';
        $output .= "<{$itemtag} class='item {$active}'>";
        $output .= "$img_url";
        $output .= "</{$itemtag}>";
       	
       	$i++;
    }

     $output .="</div>\n"; // list box
    

    $i = 0;
    $output .="<ol class='carousel-indicators'>\n"; // carousel-indicators
    foreach ( $attachments as $id => $attachment ) {
       	
       	$active = ($i==0) ? 'active' : '';
       	$output .= '<li data-target="#carousel-'.$instance.'" data-slide-to="'.$i.'" class="'.$active.'"></li>';
       	$i++;

    }
   	
   	$output .="</ol>\n"; // carousel-indicators #end


   	$output .= '<a class="left carousel-control " href="#carousel-'.$instance.'" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
											<a class="right carousel-control " href="#carousel-'.$instance.'" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>';
    $output .= "
            <br class='clearfix' />
        	</div>\n
        </div>\n";

    return $output;
}


function laread_gallery_media_templates()
{
// define your backbone template;
  // the "tmpl-" prefix is required,
  // and your input field should have a data-setting attribute
  // matching the shortcode name
  ?>


    <script type="text/html" id="tmpl-laread-gallery-type">
    <label class="setting">
      <span><?php echo esc_html__('laread Gallery Type','laread'); ?></span>
      <select data-setting="laread_gallery_type">
        <option selected value="default"> <?php echo esc_html__('Default','laread'); ?> </option>
        <option  value="carousel"> <?php echo esc_html__('Carousel','laread'); ?> </option>
        <option  value="none"> <?php echo esc_html__('None','laread'); ?> </option>
      </select>
    </label>
  </script>
 
  <script type="text/html" id="tmpl-laread-gallery-template">
    <label class="setting">
      <span><?php echo esc_html__('Gallery Template','laread'); ?></span>
      <select data-setting="laread_gallery_template">
        <option selected value="white"> <?php echo esc_html__('White','laread'); ?> </option>
        <option  value="dark"> <?php echo esc_html__('Dark','laread'); ?> </option>
      </select>
    </label>
  </script>




  <script>

    jQuery(document).ready(function(){

      // add your shortcode attribute and its default value to the
      // gallery settings list; $.extend should work as well...
      _.extend(wp.media.gallery.defaults, {
        laread_gallery_type: 'default',
        laread_gallery_template: 'white'
      });

      // merge default gallery settings template with yours
      wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
        template: function(view){
          return wp.media.template('gallery-settings')(view)
          		+ wp.media.template('laread-gallery-type')(view)
          		+ wp.media.template('laread-gallery-template')(view);
        }
      });

    });

  </script>
  <?php
}
add_action('print_media_templates', 'laread_gallery_media_templates');