<?php /* Template Name: Contact v1 */ 
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Evmet laread
 */

$notify = '';
// Contact Mail
if (@$_POST['submitted']){

	$laread_name = esc_html(trim($_POST['laread_name']));
	$laread_surname = esc_html(trim($_POST['laread_surname']));
	$laread_subject = esc_html(trim($_POST['laread_subject']));
	$laread_email = esc_html(trim($_POST['laread_email']));
	$laread_message = esc_html(trim($_POST['laread_message']));

	$message = '';

	if ( 
		(empty($laread_name)) or 
		(empty($laread_surname)) or 
		(empty($laread_message)) or 
		(empty($laread_subject)) 
		
	   ) {
		
		$notify = '<div class="laalert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>'.esc_html__( 'Oh snap!', 'laread').'</strong> '.esc_html__( 'Please supply all information', 'laread').'
				</div>';
	}
	else {

		$message = $laread_name.' '.$laread_surname.'<br><br>';
		$message .= $laread_message;

		$to = get_option('admin_email');
		$subject = $laread_subject." from ".get_bloginfo('name');
		$headers = 'From: '. $laread_email . "\r\n" .
		    'Reply-To: ' . $laread_email . "\r\n";
		

		$sent = wp_mail($to, $subject, strip_tags($message), $headers);

		if (!$sent) {
			$notify =  '<div class="laalert alert-danger alert-dismissible fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>'.esc_html__( 'Oh snap!', 'laread').'</strong> '.esc_html__( 'Message was not sent. Try Again', 'laread').'
				</div>';
		} 
		else {
			$notify = '<div class="laalert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>'.esc_html__( 'Thanks!', 'laread').'</strong> '.esc_html__( 'Your message has been sent.', 'laread').'
					</div>';
		}

	}
	
}

get_header(); 

?>
		
		<?php 
			$opts = TitanFramework::getInstance( 'laread' );
			
			$laread_contact_adres = $opts->getOption( 'laread_contact_adres', get_queried_object_id() );
			$laread_contact_email = $opts->getOption( 'laread_contact_email', get_queried_object_id() );
			$laread_about_googlemaps = $opts->getOption( 'laread_about_googlemaps', get_queried_object_id() );
			$laread_contact_maps_title = $opts->getOption( 'laread_contact_maps_title', get_queried_object_id() );

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
		
		<section class="post-fluid">
			<div class="container-fluid">
				<div class="row laread-contact">
					<div class="contact-box">
						<span class="icon-contact"><i class="fa fa-paper-plane"></i></span>
					</div>
					<div class="contact-info">
						<h2><?php the_title(); ?></h2>
						<p class="text-contact"><i class="fa fa-map-marker"></i> <?php echo $laread_contact_adres; ?></p>
						<a href="mailto:<?php echo $laread_contact_email; ?>" class="text-contact"><i class="fa fa-envelope"></i><?php echo $laread_contact_email; ?></a>


						<div class="contact-form">

							 <form action="<?php the_permalink(); ?>" method="post">

							 <div class="alerts text-left"><?php echo $notify; ?></div>
								<input class="contact-input" name="laread_name" placeholder="<?php echo esc_html__( 'Name', 'laread') ?>" type="text" />
								<input class="contact-input" name="laread_surname" placeholder="<?php echo esc_html__( 'Surname', 'laread') ?>" type="text" />
								<input class="contact-input" name="laread_subject" placeholder="<?php echo esc_html__( 'Subject', 'laread') ?>" type="text" />
								<input class="contact-input" name="laread_email" placeholder="<?php echo esc_html__( 'Email', 'laread') ?>" type="text" />
								<textarea class="contact-textarea" name="laread_message" placeholder="<?php echo esc_html__( 'Message', 'laread') ?>"></textarea>
								
								<div class="clearfix">
									<div class="progress-button">
									<button type="submit" value="1" name="submitted" class="btn btn-grey btn-outline"><span><?php echo esc_html__( 'SEND', 'laread') ?></span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="embed-responsive embed-responsive-16by9 contact-map">
						<div id="map"></div>
					</div>
					<div class="laread-contact-touch">
						<h4><?php echo esc_html__( 'Get In Touch', 'laread') ?></h4>
						<p><?php echo esc_html__( 'If you dig the site, subscribe by RSS or email. Comments and emails are always appreciated. You can also contact me through one of my social media.', 'laread') ?></p>
						<ul class="about-social">
					<?php if ($tw_link): ?>
						<li><a href="<?php echo ($tw_link) ? esc_url($tw_link) : '#'; ?>" class="fa fa-twitter"></a>
					<?php endif ?></li>
					
					<?php if ($fb_link): ?>
						<li><a href="<?php echo ($fb_link) ? esc_url($fb_link) : '#'; ?>" class="fa fa-facebook"></a>
					<?php endif ?></li>

					<?php if ($pt_link): ?>
						<li><a href="<?php echo ($pt_link) ? esc_url($pt_link) : '#'; ?>" class="fa fa-pinterest"></a>
					<?php endif ?></li>

					<?php if ($social_instagram): ?>
						<li><a href="<?php echo ($social_instagram) ? esc_url($social_instagram) : '#'; ?>" class="fa fa-instagram"></a></li>
					<?php endif ?>


					<?php if ($social_linkedin_link): ?>
						<li><a href="<?php echo ($social_linkedin_link) ? esc_url($social_linkedin_link) : '#'; ?>" class="fa fa-linkedin"></a></li>
					<?php endif ?>

					<?php if ($social_dribbble_link): ?>
						<li><a href="<?php echo ($social_dribbble_link) ? esc_url($social_dribbble_link) : '#'; ?>" class="fa fa-dribbble"></a></li>
					<?php endif ?>

					<?php if ($social_vimeo_link): ?>
						<li><a href="<?php echo ($social_vimeo_link) ? esc_url($social_vimeo_link) : '#'; ?>" class="fa fa-vimeo"></a></li>
					<?php endif ?>

					<?php if ($social_soundcloud_link): ?>
						<li><a href="<?php echo ($social_soundcloud_link) ? esc_url($social_soundcloud_link) : '#'; ?>" class="fa fa-soundcloud"></a></li>
					<?php endif ?>

					<?php if ($social_github_link): ?>
						<li><a href="<?php echo ($social_github_link) ? esc_url($social_github_link) : '#'; ?>" class="fa fa-github"></a></li>
					<?php endif ?>

					<?php if ($social_flickr_link): ?>
						<li><a href="<?php echo ($social_flickr_link) ? esc_url($social_flickr_link) : '#'; ?>" class="fa fa-flickr"></a></li>
					<?php endif ?>

					<?php if ($social_youtube_link): ?>
						<li><a href="<?php echo ($social_youtube_link) ? esc_url($social_youtube_link) : '#'; ?>" class="fa fa-youtube"></a></li>
					<?php endif ?>

					<?php if ($social_500px_link): ?>
						<li><a href="<?php echo ($social_500px_link) ? esc_url($social_500px_link) : '#'; ?>" class="fa fa-500px"></a></li>
					<?php endif ?>

					<?php if ($social_slack_link): ?>
						<li><a href="<?php echo ($social_slack_link) ? esc_url($social_slack_link) : '#'; ?>" class="fa fa-slack"></a></li>
					<?php endif ?>

					<?php if ($social_vine_link): ?>
						<li><a href="<?php echo ($social_vine_link) ? esc_url($social_vine_link) : '#'; ?>" class="fa fa-vine"></a></li>
					<?php endif ?>

					<?php if ($social_spotify_link): ?>
						<li><a href="<?php echo ($social_spotify_link) ? esc_url($social_spotify_link) : '#'; ?>" class="fa fa-spotify"></a></li>
					<?php endif ?>

				</ul>
					</div>
				</div>
			</div>
		</section>
<?php
function laread_maps_script() {
	global $laread_about_googlemaps,$laread_contact_maps_title;

	list($lat,$lit) = explode(',',$laread_about_googlemaps);

	$opts = TitanFramework::getInstance( 'laread' );

	$image = $opts->getOption( 'laread_header_logo' );
	$logo = wp_get_attachment_image( $image );    
	
?>
<script type="text/javascript">
 	
 	var map;
	jQuery(document).ready(function(){

		function touchSupport(){
			try{
				document.createEvent("TouchEvent");
				return true;
			} catch(e) {
				return false;
			}
		}


		map = new GMaps({
		el: '#map',
		lat: <?php echo $lat; ?>,
		lng: <?php echo $lit; ?>,
		styles: [{featureType:'all',stylers:[{saturation:-100},{gamma:0.50}]}],
		zoomControl : false,
		panControl : false,
		scrollwheel:false,
		mapTypeControl:false,
		draggable: true, //(touchSupport() == false && screen.width > 768 ? true : false),
		streetViewControl : false,
		mapTypeControl: false,
		overviewMapControl: false,
		});

		map.addMarker({
			lat: <?php echo $lat; ?>,
			lng: <?php echo $lit; ?>,
			title: '<?php echo $laread_contact_maps_title; ?>',
			infoWindow: {
				content: '<div class="map-infowindow clearfix"><?php echo $logo; ?><p><?php echo $laread_contact_maps_title; ?></p></div>'
			}
		});
		google.maps.event.trigger(map.markers[0], 'click');
	});


</script>
<?php

}
add_action('wp_footer', 'laread_maps_script',120);

 get_footer(); ?>
