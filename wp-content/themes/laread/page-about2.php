<?php /* Template Name: About v2 */ 
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
get_header(); ?>
		
		<?php 
			$opts = TitanFramework::getInstance( 'laread' );
			$description = $opts->getOption( 'laread_about_desc', get_queried_object_id() );
			$laread_about_jobs = $opts->getOption( 'laread_about_jobs', get_queried_object_id() );
			$laread_about_adress = $opts->getOption( 'laread_about_adress', get_queried_object_id() );
			$laread_about_infobox = $opts->getOption( 'laread_about_infobox', get_queried_object_id() );
			$laread_about_social = $opts->getOption( 'laread_about_social', get_queried_object_id() );

			// Social Link
			$social_about_facebook_link = $opts->getOption( 'social_about_facebook_link', get_queried_object_id() );
			$social_about_twitter_link = $opts->getOption( 'social_about_twitter_link', get_queried_object_id() );
			$social_about_google_plus = $opts->getOption( 'social_about_google_plus', get_queried_object_id() );
			$social_about_behance_link = $opts->getOption( 'social_about_behance_link', get_queried_object_id() );
			$social_about_contact_mail = $opts->getOption( 'social_about_contact_mail', get_queried_object_id() );

		?>

		<div class="container">

			<div class="head-about">
				<h1 class="about-h1"><?php the_title(); ?></h1>
				<p class="basic-info"><?php echo $laread_about_jobs; ?> <span><i class="fa fa-map-marker"></i> <?php echo $laread_about_adress; ?></span></p>
			</div>

		</div>

		<section class="post-fluid">
			<div class="container-fluid">
				<div class="container">
					<div class="row laread-about">

						<?php if (has_post_thumbnail()): 	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						<div class="about-picture">
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
						</div>
						<?php endif ?>

						<ul class="about-social">
							<?php if ($social_about_facebook_link): ?>
								<li><a href="<?php echo esc_url($social_about_facebook_link); ?>"><i class="fa fa-facebook"></i></a></li>	
							<?php endif ?>

							<?php if ($social_about_twitter_link): ?>
								<li><a href="<?php echo esc_url($social_about_twitter_link); ?>"><i class="fa fa-twitter"></i></a></li>	
							<?php endif ?>
							
							<?php if ($social_about_google_plus): ?>
								<li><a href="<?php echo esc_url($social_about_google_plus); ?>"><i class="fa fa-google-plus"></i></a></li>	
							<?php endif ?>
							
							<?php if ($social_about_behance_link): ?>
								<li><a href="<?php echo esc_url($social_about_behance_link); ?>"><i class="fa fa-behance"></i></a></li>	
							<?php endif ?>
						</ul>

						<p><?php $more = 1; the_content(); ?></p>

						<?php if ($laread_about_infobox): ?>
							<?php echo $laread_about_infobox; ?>
						<?php endif ?>

						<h4><?php echo esc_html__( 'Get In Touch', 'laread' ); ?></h4>

						<p><?php echo $laread_about_social; ?></p>
						
						<?php if ($social_about_contact_mail): ?>
						<ul class="about-social">
							<li class="xl"><a href="mailto:<?php echo $social_about_contact_mail; ?>"><i class="fa fa-envelope"></i></a></li>
						</ul>
						<?php endif ?>

					</div>
				</div>
			</div>
		</section>

<?php get_footer(); ?>
