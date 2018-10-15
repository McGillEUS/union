<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Evmet laread
 */

if ( ! function_exists( 'laread_pushbar_type' ) ) :
/**
 * laread twitter card
 */
function laread_pushbar_type() {
	
	$titan = TitanFramework::getInstance( 'laread' );
	$laread_pushbar_type = $titan->getOption( 'laread_pushbar_type' );

	?>
	<div class="get-post-titles">
	    <button type="button" class="navbar-toggle push-navbar" data-navbar-type="<?php echo ($laread_pushbar_type) ? $laread_pushbar_type : 'default'; ?>">
	        <i class="fa fa-bars"></i>
	    </button>
	</div>
	<?php

}

endif;

if ( ! function_exists( 'laread_twitter_card' ) ) :
/**
 * laread twitter card
 */
function laread_twitter_card() {
	global $post;
 	if(is_single() || is_page()):
    $twitter_url    = get_permalink();
    $twitter_title  = get_the_title();
    $twitter_desc   = get_the_excerpt();
    $twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    $twitter_thumb  = $twitter_thumbs[0];
    $twitter_name   = str_replace('@', '', get_the_author_meta('twitter'));
    ?>
    <meta name="twitter:card" value="summary" />
    <meta name="twitter:url" value="<?php echo $twitter_url; ?>" />
    <meta name="twitter:title" value="<?php echo $twitter_title; ?>" />
    <meta name="twitter:description" value="<?php echo $twitter_desc; ?>" />
    <meta name="twitter:image" value="<?php echo $twitter_thumb; ?>" />
<?php endif;  

}

endif;

if ( ! function_exists( 'laread_favicon' ) ) :
/**
 * laread favicon
 */
function laread_favicon() {

if (get_site_icon_url()): ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_site_icon_url()); ?>" />
	<link rel="icon" href="<?php echo esc_url(get_site_icon_url(32)); ?>" sizes="32x32" />
	<link rel="icon" href="<?php echo esc_url(get_site_icon_url(192)); ?>" sizes="192x192" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo esc_url(get_site_icon_url(180)); ?>">
	<meta name="msapplication-TileImage" content="<?php echo esc_url(get_site_icon_url(270)); ?>">
<?php else: ?>
    <link rel="icon" href="<?php echo laread_URL ?>/assets/img/favicon.ico">
<?php endif;
}

endif;



if ( ! function_exists( 'laread_pagebanner_footer' ) ) :
/**
 * laread favicon
 */
function laread_pagebanner_footer() {

	$opts = TitanFramework::getInstance( 'laread' );
	$fb_link = $opts->getOption( 'social_facebook_link' );
	$tw_link = $opts->getOption( 'social_twitter_link' );
	$pt_link = $opts->getOption( 'social_pinterest_link' );
	$social_instagram = $opts->getOption( 'social_instagram' );
	$social_linkedin_link = $opts->getOption( 'social_linkedin_link' );
	$social_dribbble_link = $opts->getOption( 'social_dribbble_link' );
	$social_vimeo_link = $opts->getOption( 'social_vimeo_link' );
	$social_soundcloud_link = $opts->getOption( 'social_soundcloud_link' );
	$social_github_link = $opts->getOption( 'social_github_link' );
	$social_flickr_link = $opts->getOption( 'social_flickr_link' );
	$social_youtube_link = $opts->getOption( 'social_youtube_link' );
	$social_500px_link = $opts->getOption( 'social_500px_link' );
	$social_slack_link = $opts->getOption( 'social_slack_link' );
	$social_vine_link = $opts->getOption( 'social_vine_link' );
	$social_spotify_link = $opts->getOption( 'social_spotify_link' );
	$laread_banner_mode_page =  $opts->getOption( 'laread_banner_mode_page', get_queried_object_id() );
	?>
	<div class="banner-bottom bbottom-3">
			<div class="pull-left">
				<p>&#169; <?php echo date("Y"); ?> <?php echo get_bloginfo('name'); ?>.</p>
				<?php if (count($laread_banner_mode_page)): $s=0; ?>
				<div class="banner-links">
					<?php foreach ($laread_banner_mode_page as $k => $v): $s++; ?>
						<a href="<?php echo get_page_link($v); ?>"><?php $page = $post_7 = get_post( $v ); echo $page->post_title; ?></a>
						<?php if (count($laread_banner_mode_page) > $s): ?>
							&#32;&#32;&#32;&#8226;&#32;&#32;&#32;
						<?php endif ?>
					<?php endforeach ?>
				</div>	
				<?php endif ?>
				
			</div>
			<div class="pull-right">
				<div class="banner-sharebox">
					<span><?php echo esc_html__('Be Social','laread'); ?></span>
					<?php if ($tw_link): ?>
						<a href="<?php echo ($tw_link) ? esc_url($tw_link) : '#'; ?>" class="fa fa-twitter"></a>
					<?php endif ?>
					
					<?php if ($fb_link): ?>
						<a href="<?php echo ($fb_link) ? esc_url($fb_link) : '#'; ?>" class="fa fa-facebook"></a>
					<?php endif ?>

					<?php if ($pt_link): ?>
						<a href="<?php echo ($pt_link) ? esc_url($pt_link) : '#'; ?>" class="fa fa-pinterest"></a>
					<?php endif ?>

					<?php if ($social_instagram): ?>
						<a href="<?php echo ($social_instagram) ? esc_url($social_instagram) : '#'; ?>" class="fa fa-instagram"></a>
					<?php endif ?>


					<?php if ($social_linkedin_link): ?>
						<a href="<?php echo ($social_linkedin_link) ? esc_url($social_linkedin_link) : '#'; ?>" class="fa fa-linkedin"></a>
					<?php endif ?>

					<?php if ($social_dribbble_link): ?>
						<a href="<?php echo ($social_dribbble_link) ? esc_url($social_dribbble_link) : '#'; ?>" class="fa fa-dribbble"></a>
					<?php endif ?>

					<?php if ($social_vimeo_link): ?>
						<a href="<?php echo ($social_vimeo_link) ? esc_url($social_vimeo_link) : '#'; ?>" class="fa fa-vimeo"></a>
					<?php endif ?>

					<?php if ($social_soundcloud_link): ?>
						<a href="<?php echo ($social_soundcloud_link) ? esc_url($social_soundcloud_link) : '#'; ?>" class="fa fa-soundcloud"></a>
					<?php endif ?>

					<?php if ($social_github_link): ?>
						<a href="<?php echo ($social_github_link) ? esc_url($social_github_link) : '#'; ?>" class="fa fa-github"></a>
					<?php endif ?>

					<?php if ($social_flickr_link): ?>
						<a href="<?php echo ($social_flickr_link) ? esc_url($social_flickr_link) : '#'; ?>" class="fa fa-flickr"></a>
					<?php endif ?>

					<?php if ($social_youtube_link): ?>
						<a href="<?php echo ($social_youtube_link) ? esc_url($social_youtube_link) : '#'; ?>" class="fa fa-youtube"></a>
					<?php endif ?>

					<?php if ($social_500px_link): ?>
						<a href="<?php echo ($social_500px_link) ? esc_url($social_500px_link) : '#'; ?>" class="fa fa-500px"></a>
					<?php endif ?>

					<?php if ($social_slack_link): ?>
						<a href="<?php echo ($social_slack_link) ? esc_url($social_slack_link) : '#'; ?>" class="fa fa-slack"></a>
					<?php endif ?>

					<?php if ($social_vine_link): ?>
						<a href="<?php echo ($social_vine_link) ? esc_url($social_vine_link) : '#'; ?>" class="fa fa-vine"></a>
					<?php endif ?>

					<?php if ($social_spotify_link): ?>
						<a href="<?php echo ($social_spotify_link) ? esc_url($social_spotify_link) : '#'; ?>" class="fa fa-spotify"></a>
					<?php endif ?>
				</div>
			</div>
		</div>
		<?php
}

endif;

if ( ! function_exists( 'laread_pagebanner_site_logo' ) ) :
/**
 * laread loading box option
 */
function laread_pagebanner_site_logo() {

	$titan = TitanFramework::getInstance( 'laread' );
	?>

	<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
    <?php
            $laread_banner_logo = $titan->getOption( 'laread_banner_logo', get_queried_object_id() );
            $image = $titan->getOption( 'laread_header_logo' );
            if ($laread_banner_logo) {
            	$logo_X = wp_get_attachment_image_src( $laread_banner_logo );    
                $logo = $logo_X[0];
                echo '<img src="'.$logo.'"  alt="">';
            }
            else {
                if ($image) {
                    $logo = wp_get_attachment_image_src( $image ); 
                    $logo = $logo_X[0];
                	echo '<img src="'.$logo.'"  alt="">';   
                   
                } else {

                     echo '<img height="64" src="'.laread_URL.'/assets/img/logo-light.png"  alt="">';
                }
            }
            
    ?>
    </a>

    <?php
        $image_retina = $titan->getOption( 'laread_banner_logo_retina' ,  get_queried_object_id());
        if ($image_retina) {
            $logo_retina = wp_get_attachment_image_src( $image_retina, 'full' );    
            $logo_retina = $logo_retina[0];
        } else {
             $logo_retina = laread_URL.'/assets/img/logo-light@2x.png';
        } 
    ?>
     <a class="navbar-brand retina" style="background: url('<?php echo $logo_retina; ?>') no-repeat center center;" href="<?php echo get_home_url(); ?>">
        <?php
	        $image = $titan->getOption( 'laread_banner_logo_retina',  get_queried_object_id() );
	        if ($image) {
	            $logo = wp_get_attachment_image( $image );    
	            echo $logo;
	        } else {

	             echo '<img height="64" src="'.laread_URL.'/assets/img/logo-light@2x.png"  alt="">';
	        }  
        ?>
    </a>
     <?php              
}

endif;


if ( ! function_exists( 'laread_site_logo' ) ) :
/**
 * laread loading box option
 */
function laread_site_logo() {

	$titan = TitanFramework::getInstance( 'laread' );
	?>

	<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
	    <?php
            $image = $titan->getOption( 'laread_header_logo' );
            if ($image) {
                $logo = wp_get_attachment_image( $image );    
                echo $logo;
            } else {
                 echo '<img height="64" src="'.laread_URL.'/assets/img/logo-light.png"  alt="">';
            }  
	    ?>
	    </a>
	<?php

	 // Retina Logo
	    $image_retina = $titan->getOption( 'laread_header_logo_retina' );
	    if ($image_retina) {
	        $logo_retina = wp_get_attachment_image_src( $image_retina, 'full' );    
	        $logo_retina = $logo_retina[0];
	    } else {

	         $logo_retina = laread_URL.'/assets/img/logo-light@2x.png';
	    }

	    ?>
	    <a class="navbar-brand retina" style="background: url('<?php echo $logo_retina; ?>') no-repeat center center;" href="<?php echo get_home_url(); ?>">
        <?php
	        $image = $titan->getOption( 'laread_header_logo_retina' );
	        if ($image) {
	            $logo = wp_get_attachment_image( $image );    
	            echo $logo;
	        } else {

	             echo '<img height="64" src="'.laread_URL.'/assets/img/logo-light@2x.png"  alt="">';
	        }
        ?>
        </a>
     <?php              
}

endif;

if ( ! function_exists( 'laread_loading_box' ) ) :
/**
 * laread loading box option
 */
function laread_loading_box() {

	$titan = TitanFramework::getInstance( 'laread' );
    $is_loading_box = $titan->getOption( 'laread_is_loading_box' );

    if ($is_loading_box == '1'):
     ?>
   <div class="page-loader">
        <div class="loader-in">Loading</div>
        <div class="loader-out">Loading</div>
    </div>
    <?php endif; 
}

endif;

if ( ! function_exists( 'laread_pushbar' ) ) :
/**
 * print pushbar
 */
function laread_pushbar() {
	
	$titan = TitanFramework::getInstance( 'laread' );

	?>
	<aside class="navmenu">
        <div class="post-titles">
            <div class="tag-title">
                <div class="container">
                    <p class="tags" id="post-titles">
                    <?php 
                        wp_reset_query(); 
                        $pushbar_cat_ids = $titan->getOption( 'laread_pushbar_cats' );
                        $pushbar_post_limit = $titan->getOption( 'laread_pushbar_post_limit' );
                        $pushbar_post_limit = ($pushbar_post_limit > 0) ? $pushbar_post_limit : 8;
                        
                        if ( empty($pushbar_cat_ids) ) {
                        	$last_categories = get_terms( 'category', 'orderby=count&number=3&order=DESC' );
                        	if ($last_categories){
                        		$pushbar_cat_ids = array();
                        		foreach ($last_categories as $k => $v) {
                        			$pushbar_cat_ids[] = $v->term_id;
                        		}
                        	}
                        	
                        }
                    ?>
                        <?php if ($pushbar_cat_ids): ?>
                            <?php foreach ($pushbar_cat_ids as $k => $v): ?>
                                <a data-filter=".pt-cat-<?php echo $v; ?>" href="#"><?php echo esc_html(get_cat_name( $v )); ?></a>        
                            <?php endforeach ?>
                            <a data-filter="*" href="#" class="unfilter hide"><?php echo esc_html__( 'all', 'laread' ); ?></a>
                        <?php else: ?>
                            <!-- Please select category. -->
                        <?php endif ?>
                        
                    </p>
                </div>
            </div>
            <button type="button" class="remove-navbar"><i class="fa fa-times"></i></button>

            <?php if ($pushbar_cat_ids): ?>
            <ul class="post-title-list clearfix">
                <?php foreach ($pushbar_cat_ids as $k => $v): ?>
                    <?php 
                        // $args = array(
                        //   'numberposts' => $pushbar_post_limit,
                        //   'category' => $v
                        // ); 
                        // $push_posts = get_posts( $args );

                         $blog_args=array(
					      'showposts'=>$pushbar_post_limit,
					      'post_type' => 'post',
					      'cat' => $v
					    );
						 
						$blog_query = new WP_Query($blog_args); 

                    ?>
                    <?php if($blog_query->have_posts()) : ?>
                    	<?php $s=0;  while($blog_query->have_posts()) : $blog_query->the_post(); $s++;	
                        // foreach ($push_posts as $post): setup_postdata( $post ); 

                        $comments_count = wp_count_comments(get_the_ID());
                        // Event Format
                        $custom_format ='';
                        if ( empty($post_format) ) {
                            
                            $event_title = '';
                            $event_title = $titan->getOption( 'laread_post_event_title', get_the_ID() );

                            if (trim($event_title))
                                $custom_format = 'event';

        }
         ?>
                            <li class="pt-cat-<?php echo $v; ?>">
                                <div>
                                    <h5>
                                        <i class="fa <?php laread_pushbar_link( get_post_format() , $custom_format ); ?> "></i>
                                        <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
                                    </h5>
                                    <div class="post-subinfo">
                                        <span><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?></span>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;
                                        <span><?php echo $comments_count->approved; ?> <?php echo esc_html__('Comments','laread'); ?></span>
                                    </div>
                                </div>
                            </li>
                       <?php endwhile; ?>
                    <?php endif ?>

                <?php endforeach ?> 
            </ul>
            <?php endif ?>
            <?php wp_reset_query(); ?>
        </div>
    </aside>
	<?php

}
endif;



if ( ! function_exists( 'laread_footer_script' ) ) :
/**
 * print footer script
 */
function laread_footer_script() {
	
	$laread_options = TitanFramework::getInstance( 'laread' );
	$laread_footer_script = $laread_options->getOption( 'laread_footer_script' );
	if ($laread_footer_script) echo $laread_footer_script; 

}
endif;

if ( ! function_exists( 'laread_footer' ) ) :
/**
 *  Get laread footer
 */
function laread_footer() {
	
	$opts = TitanFramework::getInstance( 'laread' );
	$fb_link = $opts->getOption( 'social_facebook_link' );
	$tw_link = $opts->getOption( 'social_twitter_link' );
	$pt_link = $opts->getOption( 'social_pinterest_link' );
	$social_instagram = $opts->getOption( 'social_instagram' );
	$social_linkedin_link = $opts->getOption( 'social_linkedin_link' );
	$social_dribbble_link = $opts->getOption( 'social_dribbble_link' );
	$social_vimeo_link = $opts->getOption( 'social_vimeo_link' );
	$social_soundcloud_link = $opts->getOption( 'social_soundcloud_link' );
	$social_github_link = $opts->getOption( 'social_github_link' );
	$social_flickr_link = $opts->getOption( 'social_flickr_link' );
	$social_youtube_link = $opts->getOption( 'social_youtube_link' );
	$social_500px_link = $opts->getOption( 'social_500px_link' );
	$social_slack_link = $opts->getOption( 'social_slack_link' );
	$social_vine_link = $opts->getOption( 'social_vine_link' );
	$social_spotify_link = $opts->getOption( 'social_spotify_link' );

	?>
	<footer class="container-fluid footer">
			<div class="container text-center">
				<div class="footer-logo">
				 <?php
                        $titan = TitanFramework::getInstance( 'laread' );
                        
                        $footer_tagline = $titan->getOption( 'laread_footer_tagline' );

                        $image = $titan->getOption( 'laread_footer_logo' );
                        if ($image) {
                            $logo = wp_get_attachment_image( $image );    
                            echo $logo;
                        } else {

                             echo '<img src="'.laread_URL.'/assets/img/logo-black.png"  alt="">';
                        }
                        
                ?>
				</div>
				
				 <?php                        

                        $image_retina = $titan->getOption( 'laread_footer_logo_retina' );
                        if ($image_retina) {
                            $logo_retina = wp_get_attachment_image_src( $image_retina );    
                            $logo_retina = $logo_retina[0];
                        } else {

                            $logo_retina = laread_URL.'/assets/img/logo-black@2x.png';
                        }
                        
                ?>
				<div class="footer-logo retina" style="background: url('<?php echo $logo_retina; ?>') no-repeat center center;">
					<img src="<?php echo $logo_retina; ?>"  alt="">
				</div>

				

				<p class="laread-motto"><?php echo ($footer_tagline) ? $footer_tagline : __('Designed for Read.', 'laread'); ?></p>
				<div class="laread-social">
					<?php if ($tw_link): ?>
						<a href="<?php echo ($tw_link) ? $tw_link : '#'; ?>" class="fa fa-twitter"></a>
					<?php endif ?>
					
					<?php if ($fb_link): ?>
						<a href="<?php echo ($fb_link) ? $fb_link : '#'; ?>" class="fa fa-facebook"></a>
					<?php endif ?>

					<?php if ($pt_link): ?>
						<a href="<?php echo ($pt_link) ? $pt_link : '#'; ?>" class="fa fa-pinterest"></a>
					<?php endif ?>

					<?php if ($social_instagram): ?>
						<a href="<?php echo ($social_instagram) ? $social_instagram : '#'; ?>" class="fa fa-instagram"></a>
					<?php endif ?>


					<?php if ($social_linkedin_link): ?>
						<a href="<?php echo ($social_linkedin_link) ? $social_linkedin_link : '#'; ?>" class="fa fa-linkedin"></a>
					<?php endif ?>

					<?php if ($social_dribbble_link): ?>
						<a href="<?php echo ($social_dribbble_link) ? $social_dribbble_link : '#'; ?>" class="fa fa-dribbble"></a>
					<?php endif ?>

					<?php if ($social_vimeo_link): ?>
						<a href="<?php echo ($social_vimeo_link) ? $social_vimeo_link : '#'; ?>" class="fa fa-vimeo"></a>
					<?php endif ?>

					<?php if ($social_soundcloud_link): ?>
						<a href="<?php echo ($social_soundcloud_link) ? $social_soundcloud_link : '#'; ?>" class="fa fa-soundcloud"></a>
					<?php endif ?>

					<?php if ($social_github_link): ?>
						<a href="<?php echo ($social_github_link) ? $social_github_link : '#'; ?>" class="fa fa-github"></a>
					<?php endif ?>

					<?php if ($social_flickr_link): ?>
						<a href="<?php echo ($social_flickr_link) ? $social_flickr_link : '#'; ?>" class="fa fa-flickr"></a>
					<?php endif ?>

					<?php if ($social_youtube_link): ?>
						<a href="<?php echo ($social_youtube_link) ? $social_youtube_link : '#'; ?>" class="fa fa-youtube"></a>
					<?php endif ?>

					<?php if ($social_500px_link): ?>
						<a href="<?php echo ($social_500px_link) ? $social_500px_link : '#'; ?>" class="fa fa-500px"></a>
					<?php endif ?>

					<?php if ($social_slack_link): ?>
						<a href="<?php echo ($social_slack_link) ? $social_slack_link : '#'; ?>" class="fa fa-slack"></a>
					<?php endif ?>

					<?php if ($social_vine_link): ?>
						<a href="<?php echo ($social_vine_link) ? $social_vine_link : '#'; ?>" class="fa fa-vine"></a>
					<?php endif ?>

					<?php if ($social_spotify_link): ?>
						<a href="<?php echo ($social_spotify_link) ? $social_spotify_link : '#'; ?>" class="fa fa-spotify"></a>
					<?php endif ?>

				</div>
			</div>
		</footer>
	
	<?php
}
endif;


if ( ! function_exists( 'laread_pushbar_link' ) ) :
/**
 *  Get pushbar icon
 */
function laread_pushbar_link( $type='' ,$custom_post_format='' ) {
	
	$r = '';

	if (empty($type)) {
		$type = $custom_post_format;
	}
	switch ($type) {
		
		case 'link':
		$r = 'fa-link';
		break;

		case 'chat':
		$r = 'fa-comment';
		break;

		case 'image':
		$r = 'fa-picture-o';
		break;

		case 'video':
		$r = 'fa-play';
		break;

		case 'audio':
		$r = 'fa-music';
		break;

		case 'quote':
		$r = 'fa-quote-left';
		break;

		case 'status':
		$r = 'fa-comments';
		break;

		case 'aside':
		$r = 'fa-sticky-note';
		break;

		case 'event':
		$r = 'fa-clock-o';
		break;

		case 'code':
		$r = 'fa-code';
		break;
		
		default:
		$r = 'fa-thumb-tack';
		break;
	}

	echo $r;
}
endif;


if ( ! function_exists( 'fn_laread_navlink_medium_out' ) ) :
/**
 * Display Large Medium
 */
function fn_laread_navlink_medium_out() {
	
	?>


	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 
				$next = '<span class="post-nav post-newer">'.__('&#8592; NEWER','laread').'</span>';
				$prev = '<span class="post-nav post-older">'.__('OLDER &#8594;','laread').'</span>';
				
				posts_nav_link( ' ', $next, $prev); 
				?>
			</div>
		</div>
	</div>

	
	<?php
}
endif;

if ( ! function_exists( 'fn_laread_navlink_medium' ) ) :
/**
 * Display Large Medium
 */
function fn_laread_navlink_medium() {
	
	?>

	<div class="row">
		<div class="col-md-12">
			<?php 
			$next = '<span class="post-nav post-newer">'.__('&#8592; NEWER','laread').'</span>';
			$prev = '<span class="post-nav post-older">'.__('OLDER &#8594;','laread').'</span>';
			
			posts_nav_link( ' ', $next, $prev); 
			?>
		</div>
	</div>

	
	<?php
}
endif;


if ( ! function_exists( 'fn_laread_navlink_large' ) ) :
/**
 * Display Large Nav
 */
function fn_laread_navlink_large() {
	
	?>


	<div class="row default-post-nav">
		<div class="container">
			<div class="col-md-10 col-md-offset-2 ">
				<?php 
				$next = '<span class="post-nav post-newer">'.__('&#8592; NEWER','laread').'</span>';
				$prev = '<span class="post-nav post-older">'.__('OLDER &#8594;','laread').'</span>';
				
				posts_nav_link( ' ', $next, $prev); 
				?>
			</div>
		</div>
	</div>
	<?php
}
endif;



// Masonry Page

if ( ! function_exists( 'fn_laread_masonry_post_footer' ) ) :
/**
 * Display posts date for medium
 */
function fn_laread_masonry_post_footer() {
	
	?>
	<?php $categorys = get_the_category(); ?>
	<div class="icons">
		<a href="#" class="quick-read" data-postid="<?php the_ID(); ?>"><i class="fa fa-eye"></i></a>
		<!-- <a href="#"><i class="fa fa-heart"></i> 16</a> -->
		<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
	</div>

	<span><a class="no-margin" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_date('d'); ?> <?php echo get_the_date('F'); ?></a></span>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;
	
	<?php if ($categorys): ?>
		<a  class="mute-text" href="<?php echo esc_url( get_category_link( $categorys[0]->term_id ) ); ?>">
			#<?php echo esc_html( $categorys[0]->name ); ?>
		</a>							
	<?php endif ?>

	<?php
}
endif;


// Medium Page With Sidebar

if ( ! function_exists( 'fn_laread_medium_sidebar_post_footer' ) ) :
/**
 * Display posts date for medium
 */
function fn_laread_medium_sidebar_post_footer($class='') {

	?>
	<div class="post-item-info <?php echo $class; ?> clearfix">
		<div class="pull-left">
			<span><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?></a></span>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
		</div>
		<!-- <div class="pull-right"> -->
		<?php fn_laread_post_social(); ?>
		<!-- </div> -->
	</div>

	<?php
}
endif;



// Medium Page Wihout Sidebar

if ( ! function_exists( 'fn_laread_medium_post_footer' ) ) :
/**
 * Display posts date for medium
 */
function fn_laread_medium_post_footer() {

	?>

	<div class="pm-bottom-info clearfix">
		<div class="pull-left">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?> <?php echo esc_attr(get_the_date('Y')); ?></a>
			&#32;&#32;&#32;&#8226;&#32;&#32;&#32;By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
			<?php the_author_meta('first_name'); ?><?php  the_author_meta('last_name'); ?></a>
			<!-- <a href="#">#strategy</a> -->
		</div>
	</div>
	<?php
}
endif;

if ( ! function_exists( 'fn_laread_post_content_medium' ) ) :
/**
 * Display posts date for medium
 */
function fn_laread_post_content_medium( $print_content = false) {

	?>
	<?php $categorys = get_the_category(); ?>
	<div class="post-item">
		<div class="medium-post-box clearfix">
			<div class="pm-top-info clearfix">
				<div class="pull-left">
					<?php if ($categorys): ?>
						<?php foreach ($categorys as $category): ?>
							<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
								<?php echo esc_html( $category->name ); ?>
							</a>		
						<?php endforeach ?>
					<?php endif ?>
				</div>
				<?php 
				fn_laread_post_social_footer(); ?>
			</div>
			<div class="post-item-paragraph">
				<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
				<div class="ellipsis-readmore">
					<?php
					
						if ( $print_content ){

							the_content();

						} else {


								$dbPost = get_post(get_the_ID());
								// print_r($deger);
								if( strpos( $dbPost->post_content, '<!--more-->' ) ) {
								    the_content();
								}
								elseif( strpos( $dbPost->post_content, '//twitter.com' ) ) {
									 the_content();
								}
								elseif ( post_password_required() ) {
									 the_content();
								}
								else {
								    the_excerpt();
								}

						}
					?>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="more"></a>
					<div class="pagelink"><?php wp_link_pages('pagelink=Page %'); ?></div>
					
				</div>
			</div>

			<div class="pm-bottom-info clearfix">
				<div class="pull-left">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?> <?php echo get_the_date('Y'); ?></a>
		&#32;&#32;&#32;&#8226;&#32;&#32;&#32;By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
				</div>
			</div>
			
		</div>
	</div>


	<?php
}
endif;


if ( ! function_exists( 'fn_laread_post_social_footer' ) ) :
/**
 * Display posts date for medium
 */
function fn_laread_post_social_footer() {

	?>

	<div class="post-item-social">
		<a href="#" class="quick-read" data-postid="<?php the_ID(); ?>"><i class="fa fa-eye"></i></a>
		<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="<a data-social='facebook' href='<?php the_permalink(); ?>' ><i class='fa fa-facebook'></i></a><a data-social='twitter' href='<?php the_permalink(); ?>'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
		<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
		
	</div>

	<?php
}
endif;



if ( ! function_exists( 'fn_laread_post_social' ) ) :
/**
 * Display posts date for medium
 */
function fn_laread_post_social($placement="top") {

	?>

	<div class="post-item-social">
		<a href="#" class="quick-read" data-postid="<?php the_ID(); ?>"><i class="fa fa-eye"></i></a>
		<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="<?php echo $placement; ?>" data-content="<a data-social='facebook' href='<?php the_permalink(); ?>' ><i class='fa fa-facebook'></i></a><a data-social='twitter' href='<?php the_permalink(); ?>'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
		<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
	</div>

	<?php
}
endif;

if ( ! function_exists( 'fn_laread_post_date_medium' ) ) :
/**
 * Display posts date for medium
 */
function fn_laread_post_date_medium() {

	?>
	<div class="row">
		<?php if (has_post_thumbnail()): $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
			<div class="post-item-banner">
				<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
			</div>
		<?php else: ?>
			<div class="medium-date">
				<div class="medium-date-day"><?php echo esc_html(get_the_date('d')); ?></div>
				<div class="medium-date-month"><?php echo esc_html(get_the_date('F')); ?></div>
			</div>
		<?php endif ?>
	</div>

	<?php
}
endif;


if ( ! function_exists( 'fn_laread_post_date' ) ) :
/**
 * Display posts footer
 */
function fn_laread_post_date() {

	?>
	<div class="post-item-short">
		<span class="big-text">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_date('d')); ?></a></span>
			<span class="small-text">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_the_date('F')); ?> <?php echo esc_html(get_the_date('Y')); ?></a>
			</span>
		</div>

		<?php
	}
	endif;

	if ( ! function_exists( 'fn_laread_post_footer' ) ) :
/**
 * Display posts footer
 */
function fn_laread_post_footer() {

	$comments_count = wp_count_comments(get_the_ID());
	?>

	<div class="post-item">
		<div class="post-item-paragraph">
			<h2>
				<a href="#" class="quick-read" data-postid="<?php the_ID(); ?>"><i class="fa fa-eye"></i></a>
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
			</h2>
			<?php

				$dbPost = get_post(get_the_ID());
				// print_r($deger);
			    if( strpos( $dbPost->post_content, '<!--more-->' ) ) {
			        the_content();
			    }
			    elseif( strpos( $dbPost->post_content, '//twitter.com' ) ) {
			    	 the_content();
			    }
			    elseif ( post_password_required() ) {
			    	 the_content();
			    }
			    else {
			        the_excerpt();
			    }
			?>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="more"></a>
			<div class="pagelink"><?php wp_link_pages('pagelink=Page %'); ?></div>
			<!-- </p> -->
		</div>
		<div class="post-item-info clearfix">
			
			<div class="pull-left">
				By <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a>
				<?php if ($comments_count->approved): ?>
			&#32;&#32;&#32;&#8226;&#32;&#32;&#32;<a href="<?php comments_link(); ?>"><?php echo $comments_count->approved; ?> <?php _e( 'Comments', 'laread' ); ?></a>
				<?php endif ?>
			</div>
			<?php fn_laread_post_social(); ?>
		</div>
	</div>

	<?php
}
endif;


if ( ! function_exists( 'fn_laread_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function fn_laread_paging_nav() {

	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	// Use "Easy WP Page Navigation" plugin
	if( function_exists( 'easy_wp_pagenavigation' ) ) {
		echo easy_wp_pagenavigation();
	}
}
endif;

if ( ! function_exists( 'fn_laread_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function fn_laread_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>

	<div class="post-direction">
		
		<span class="post-prev">
			<?php previous_post_link( '%link', __( '<span class="post-way"><i class="fa fa-angle-left"></i>'.__('prev post','laread').'</span><span class="title">%title</span>', 'Previous post link', 'laread' ) ); ?>	
		</span>
	</div>
	

	<div class="post-direction">

		<span class="post-next">
			<?php next_post_link( '%link', __( '<span class="post-way"> '.__('next post','laread').' <i class="fa fa-angle-right"></i></span><span class="title">&nbsp;%title</span>', 'next link', 'laread' ) ); ?>
		</span>

	</div>
	<?php
}
endif;

if ( ! function_exists( 'fn_laread_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function fn_laread_posted_on( $show_time = true, $show_byline = false ) {
	$html = '';

	if( $show_time ) {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s <span>%3$s</span></time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s <span>%3$s</span></time><time class="updated" datetime="%4$s">%5$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_html( get_the_time() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
			);


			$html .= '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>';

		}

		if( $show_byline ) {
			$html .= sprintf(
				esc_html__( 'by %s post author', 'laread' ),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
				);
		}

		echo $html;

	}
	endif;

	if ( ! function_exists( 'fn_laread_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function fn_laread_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'laread' ) );
		if ( $categories_list && fn_laread_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'laread' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'laread' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'laread' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'laread' ), __( '1 Comment', 'laread' ), __( '% Comments', 'laread' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'laread' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'laread' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'laread' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'laread' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'laread' ), get_the_date( 'Y', esc_html__( 'yearly archives date format', 'laread' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'laread' ), get_the_date('F Y', esc_html__(  'monthly archives date format', 'laread' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'laread' ), get_the_date( 'F j, Y',esc_html__(  'daily archives date format', 'laread' ) ) );
	} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
		$title = esc_html__('Asides post format archive title', 'laread' );
	} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
		$title = esc_html__( 'Galleries post format archive title', 'laread' );
	} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
		$title = esc_html__( 'Images post format archive title', 'laread' );
	} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
		$title = esc_html__( 'Videos post format archive title', 'laread' );
	} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
		$title = esc_html__( 'Quotes post format archive title', 'laread' );
	} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
		$title = esc_html__( 'Links post format archive title', 'laread' );
	} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
		$title = esc_html__( 'Statuses post format archive title', 'laread' );
	} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
		$title = esc_html__( 'Audio post format archive title', 'laread' );
	} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
		$title = esc_html__( 'Chats post format archive title', 'laread' );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'laread' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'laread' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'laread' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function fn_laread_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'fn_laread_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
			) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'fn_laread_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so fn_laread_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so fn_laread_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in fn_laread_categorized_blog.
 */
function fn_laread_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'fn_laread_categories' );
}
add_action( 'edit_category', 'fn_laread_category_transient_flusher' );
add_action( 'save_post',     'fn_laread_category_transient_flusher' );

class laread_Nav_Walker extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class=\"dropdown-menu\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		$item_html = '';
		parent::start_el($item_html, $item, $depth, $args);

		if ( $item->is_dropdown && $depth === 0 ) {
			$item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
			$item_html = str_replace( '</a>', '</a>', $item_html );
		}

		$output .= $item_html;
	}

	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		if ( $element->current )
			$element->classes[] = 'active';

		$element->is_dropdown = !empty( $children_elements[$element->ID] );

		if ( $element->is_dropdown ) {
			if ( $depth === 0 ) {
				$element->classes[] = 'dropdown';
			} elseif ( $depth === 1 ) {
                // Extra level of dropdown menu, 
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
				$element->classes[] = 'dropdown-submenu';
			}
		}

		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}
