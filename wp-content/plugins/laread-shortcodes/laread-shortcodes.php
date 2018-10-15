<?php
/**
* Plugin Name: LaRead Shortcodes
* Plugin URI: http://themeforest.net/user/evmet
* Description: LaRead - shortcode plugin
* Version: 1.0
* Author: Evmet
* Author URI: http://evmet.net/
*/
//////////////////////////////////////////////////////////////////
// laread_review
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_changelog', 'shortcode_laread_changelog');
		function shortcode_laread_changelog($atts, $content = null) {
			
			$atts = shortcode_atts(
				array(
					'name' => '',
					'other_title_link' => '',
					'other_title' => '',
					'title' => ''
				), $atts);
					
				$text = strip_tags(do_shortcode($content));

				$lines = preg_split( '/\r\n|\r|\n/', $text );

				 $texta = '';
				foreach ($lines as $c) {
					if (trim($c))
					$texta .= '<span>'.$c.'</span>';
				}
				return '<div class="changelog">
											<span class="changelog-header">
												<span class="name">'.$atts['name'].'</span>
												<a href="'.$atts['other_title_link'].'" class="fullcl">'.$atts['other_title'].' »</a>
											</span>
											<span class="changelog-title">'.$atts['title'].'</span>
											<pre class="changelog-body">
												' .$texta. '
											</pre>
										</div>';
				
	}

//////////////////////////////////////////////////////////////////
// laread_review
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_review', 'shortcode_laread_review');
		function shortcode_laread_review($atts, $content = null) {
			
			$atts = shortcode_atts(
				array(
					'name' => '',
					'date' => '',
					'stars' => 1,
				), $atts);
				
				$stars = '';

				for ($i=0; $i < $atts['stars']; $i++) { 
					
					$stars .= '<i class="fa fa-star"></i>';
				}

				return '<div class="review">
											<span class="review-header">
												<span class="name">'.$atts['name'].'</span>
												<span class="stars">
													'.$stars.'
												</span>
												<span class="date">'.$atts['date'].'</span>
											</span>
											<span class="review-body">
												<p></p>
												' .do_shortcode($content). '
												<p></p>
											</span>
										</div>';
				
	}
//////////////////////////////////////////////////////////////////
// Twitter shortcode
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_twitter', 'shortcode_laread_twitter');
		function shortcode_laread_twitter($atts, $content = null) {
			

				wp_enqueue_script( 'twitter-widget', 'http://platform.twitter.com/widgets.js' );

				return '<div class="twitter-embed">
										' .do_shortcode($content). '
									</div>';
				
		}
//////////////////////////////////////////////////////////////////
// Facebook shortcode
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_facebook', 'shortcode_laread_facebook');
		function shortcode_laread_facebook($atts, $content = null) {
			

				

				return '<div class="twitter-embed">
							' .do_shortcode($content). '
						</div>';
				
		}


//////////////////////////////////////////////////////////////////
// Video Box shortcode
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_iframe', 'shortcode_laread_iframe');
		function shortcode_laread_iframe($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'desc' => ''
				), $atts);

				return '<div class="embed-responsive embed-responsive-16by9">
										' .do_shortcode($content). '
										<span>' . $atts['desc'] . '</span>
									</div>';
				
		}

//////////////////////////////////////////////////////////////////
// Promote Box shortcode
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_promotebox', 'shortcode_laread_promotebox');
		function shortcode_laread_promotebox($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'title' => '',
					'type' => 'promote-box',
					'button_color' =>'btn-golden',
					'button_name' =>'',
					'button_link' =>'',
				), $atts);
				
				$button = '';
				if ($atts['button_name']) {
					$button = '<a href="'.$atts['button_link'].'" class="btn '.$atts['button_color'].' ">'.$atts['button_name'].'</a>';
				}

				switch ($atts['type']) {
					case 'promote-box':
						
						return '<div class="promote-box"><h4>' . $atts['title'] . '</h4>'.$button.'<span>' .do_shortcode($content). '</span></div>';
					break;
					
					case 'promote-box-center':
						
						return '<div class="promote-box-center"><h4>' . $atts['title'] . '</h4><span>' .do_shortcode($content). '</span>'.$button.'</div>';

					break;

					case 'promote-cologreen':
						
						return '<div class="promote-cologreen"><h4>' .do_shortcode($content). '</h4>'.$button.'</div>';

					break;

				}
				
				
		}


//////////////////////////////////////////////////////////////////
// Notification Box shortcode
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_notification', 'shortcode_laread_notification');
		function shortcode_laread_notification($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'type' => 'success'
				), $atts);
				
				return '<div class="laalert alert-' . $atts['type'] . ' alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' .do_shortcode($content). '</div>';
				
		}

//////////////////////////////////////////////////////////////////
// Button shortcode
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_button', 'shortcode_laread_button');
		function shortcode_laread_button($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'type' => '',
					'link' => '#',
					'target' => '',
					'color' => '',
				), $atts);
				
				return '<a href="' . $atts['link'] . '" target="' . $atts['target'] . '"  class="btn ' . $atts['type'] . ' '. $atts['color'] . '">' .do_shortcode($content). '</a>';
		}

//////////////////////////////////////////////////////////////////
// Add Accordion shortcode
//////////////////////////////////////////////////////////////////	
	
add_shortcode( 'laread_accordion', 'laread_accordion' );
function laread_accordion( $atts, $content ){
	
	$GLOBALS['tab_count'] = 0;

	$unify = uniqid();

		$atts = shortcode_atts(
			array(
				'type' => 'with-outline'
			), $atts);

	do_shortcode( $content );

	if( is_array( $GLOBALS['panels'] ) ){
		$counter=1;
		$panes[] = '';

		
		foreach( $GLOBALS['panels'] as $k=>$tab ){

			$acitive_class = ($k==0) ? 'collapse in' : 'collapse';
			

			$panes[] = '
				<div class="panel">
					<div class="panel-heading" role="tab" id="content-'.$unify.'-'.$counter.'">
						<h4 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion-'.$unify.'" href="#collapseOne-'.$counter.'" aria-expanded="true" aria-controls="collapseOne-'.$counter.'"><i class="fa"></i>'.$tab['title'].'</a>
						</h4>
					</div>
					<div id="collapseOne-'.$counter.'" class="panel-collapse '.$acitive_class.'" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">'.$tab['content'].'</div>
					</div>
				</div>';

			$counter++;
		}
		$panes[] = '';
		$return = "".'<!-- the laread accordion -->
		<div class="panel-group lapanel" id="accordion-'.$unify.'" role="tablist" aria-multiselectable="true">
			'.implode( "\n", $panes ).''."\n 
		</div>";
	}
	return $return;
}

add_shortcode( 'panel', 'jqtools_panel' );
function jqtools_panel( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Panel %d'
	), $atts));

	$GLOBALS['panel_count'] = isset($GLOBALS['panel_count']) ? $GLOBALS['panel_count'] : 1;
	$x = $GLOBALS['panel_count'];
	$GLOBALS['panels'][$x] = array( 'title' => sprintf( $title, $GLOBALS['panel_count'] ), 'content' =>  $content );

	$GLOBALS['panel_count']++;
}

//////////////////////////////////////////////////////////////////
// laread_preformat
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_preformat', 'shortcode_laread_preformat');
		function shortcode_laread_preformat($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'number' => 1
				), $atts);

				return '<p class="preformat">' .do_shortcode($content). '</p>';
		}

//////////////////////////////////////////////////////////////////
// striking
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_striking', 'shortcode_laread_striking');
		function shortcode_laread_striking($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'number' => 1
				), $atts);
			
				$html = '';

				$html .= '<i class="roman">' . $atts['number'] . '.</i>';
				$html .= '<h3 class="text-center">' .do_shortcode($content). '</h3>';
				$html .= '<i class="divider-line"></i>';
				return $html;
		}

//////////////////////////////////////////////////////////////////
// Quates
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_quote', 'shortcode_laread_quote');
		function shortcode_laread_quote($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'name' => '',
					'info' => '',
					'stars' => 1,
				), $atts);
				
				$stars = '';

				for ($i=0; $i < $atts['stars']; $i++) { 
					
					$stars .= '<i class="fa fa-star"></i>';
				}

				return '<div class="clearfix"></div> <div class="quote-inline">
							<i>“</i>
							<span class="center-quote">
								' .do_shortcode($content). '
								<span class="quote-name">— ' . $atts['name'] . '</span>
								<span class="stars">
								'.$stars.'
								</span>
								<span class="quote-info">' . $atts['info'] . '</span>
							</span>
						</div><div class="clearfix"></div>';
		}

//////////////////////////////////////////////////////////////////
// First letter
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_first_letter', 'shortcode_laread_first_letter');
		function shortcode_laread_first_letter($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'color' => '',
				), $atts);
				
				return '<p class="first-letter">' .do_shortcode($content). '</p>';
		}

//////////////////////////////////////////////////////////////////
// Label shortcode
//////////////////////////////////////////////////////////////////
	add_shortcode('laread_label', 'shortcode_laread_label');
		function shortcode_laread_label($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'color' => '',
				), $atts);
				
				return '<span class="label-' . $atts['color'] . '">' .do_shortcode($content). '</span>';
		}

		
	//////////////////////////////////////////////////////////////////
	// Background shortcode
	//////////////////////////////////////////////////////////////////
	add_shortcode('background', 'shortcode_background');
		function shortcode_background($atts, $content = null) {
			$atts = shortcode_atts(
				array(
					'heading' => ''
				), $atts);

				return '<span></div><!-- close .container -->
				<div class="clearfix"></div>
				<div class="content-highlight">
					<div class="container"><h3>' . $atts['heading'] . '</h3>' .do_shortcode($content). '</div>
				</div><!-- close .content-highlight -->
				<div class="container"></span>';
		}

	



	//////////////////////////////////////////////////////////////////
	// Divider shortcode
	//////////////////////////////////////////////////////////////////

	add_shortcode('divider', 'shortcode_divider');
		function shortcode_divider($atts, $html = null) {

			$atts = shortcode_atts(
				array(
					'type' => 'zigzag'
				), $atts);

			if ($atts['type'] == 'triagle') {
				$html .= '<div class="divider-triagle"><span><i></i></span></div>';
			} else {
				$html .='<div class="divider-zigzag"></div>';	
			}
			
			
			return $html;
		}

	
	

	
	
//////////////////////////////////////////////////////////////////
// Add Tabs shortcode
//////////////////////////////////////////////////////////////////	
	
add_shortcode( 'tabgroup', 'jqtools_tab_group' );
function jqtools_tab_group( $atts, $content ){
	$GLOBALS['tab_count'] = 0;

		$atts = shortcode_atts(
			array(
				'type' => 'with-outline'
			), $atts);

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
		$counter=1;
		$panes[] = '';

		$unify = uniqid();
		foreach( $GLOBALS['tabs'] as $k=>$tab ){

			$acitive_class = ($k==0) ? 'active' : '';
			if($counter == 1) {
				$tabs[] = '<li role="presentation" class="'.$acitive_class.'">
				<a href="#content-'.$unify.'-'.$counter.'" id="tab'.$counter.'" role="tab" data-toggle="tab" aria-controls="about" aria-expanded="true">'.$tab['title'].'</a>
				</li>';
			} else {
				$tabs[] = '<li role="presentation" class="'.$acitive_class.'">
				<a href="#content-'.$unify.'-'.$counter.'" id="tab'.$counter.'" role="tab" data-toggle="tab" aria-controls="about" aria-expanded="true">'.$tab['title'].'</a>
				</li>';
			}

			if($counter == 1) {
				$panes[] = '
				<div role="tabpanel" class="tab-pane fade in '.$acitive_class.'" id="content-'.$unify.'-'.$counter.'" aria-labelledBy="about-tab">
				<p>'.$tab['content'].'</p></div>';
			} else {
				$panes[] = '
				<div role="tabpanel" class="tab-pane fade in '.$acitive_class.'" id="content-'.$unify.'-'.$counter.'" aria-labelledBy="about-tab">
				<p>'.$tab['content'].'</p></div>';
			}
			$counter++;
		}
		$panes[] = '';
		$return = "".'<!-- the tabs -->
		<div class="latabs-box '.$atts['type'].'">
		<ul class="latabs clearfix" role="tablist">'.implode( "\n", $tabs ).'</ul>'."\n".'<!-- tab "panes" -->
		<div class="tab-content"> '.implode( "\n", $panes ).''."\n </div> </div>";
	}
	return $return;
}

add_shortcode( 'tab', 'jqtools_tab' );
function jqtools_tab( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Tab %d'
	), $atts));

	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

	$GLOBALS['tab_count']++;
}
	
//////////////////////////////////////////////////////////////////
// Add buttons to tinyMCE
//////////////////////////////////////////////////////////////////
add_action('init', 'add_button');


function add_button() {
        // if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages')){
        //  return;
        // }



        if ( get_user_option('rich_editing') == 'true' ) {
            
        

            add_filter('mce_external_plugins', 'add_plugin');  
			    add_filter('mce_buttons_3', 'register_button');
       }
    }

 

function register_button($buttons) {  
   array_push($buttons, "laread_label", "laread_first_letter", "laread_quote", "laread_striking", "laread_preformat",
   	"laread_promotebox", "laread_notification", "laread_accordion", "tabs", "laread_button", "laread_changelog",
   	"laread_review", "laread_iframe", "laread_twitter","laread_facebook", "toggle",  "divider");  
   return $buttons;  
}  

function add_plugin($plugin_array) {  

	    
   $plugin_array['divider'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_label'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_first_letter'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_quote'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_striking'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_preformat'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_accordion'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_button'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_notification'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_promotebox'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_iframe'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_twitter'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_facebook'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_review'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['laread_changelog'] = get_template_directory_uri().'/tinymce/customcodes.js';
   $plugin_array['tabs'] = get_template_directory_uri().'/tinymce/customcodes.js';
   
   return $plugin_array;  
}  