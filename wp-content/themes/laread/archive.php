<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Evmet laread
 */

get_header(); ?>

<?php 
	$opts = TitanFramework::getInstance( 'laread' );
	$laread_inline_page_template = $opts->getOption( 'laread_inline_page_template' );
?>

	<?php if ($laread_inline_page_template == 'large-image-v1'): ?>
		
		<div class="container">
			<div class="head-text">
				<h1><?php echo esc_html(the_archive_title()); ?></h1>
				<p class="lead-text"><?php echo esc_html(the_archive_description()); ?></p>
			</div>
		</div>

		<?php if ( have_posts() ) : ?>
		<div class="post-fluid large-image-v1">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php 
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
								// Event Format
									if ( empty($post_format) ) {
										
										$event_title = '';
										$event_title = $opts->getOption( 'laread_post_event_title', get_the_ID() );

										if (trim($event_title))
											$custom_format = 'event';

									}
								
				
					get_template_part( 'post-formats/large-image/content', $post_format.$custom_format );
				?>

			<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'post-formats/large-image/content', 'none' ); ?>

			<?php endif; ?>
		</div>

	<?php endif ?>
	

	<?php if ($laread_inline_page_template == 'masonry'): ?>

		<div class="container">
			<div class="head-text">
				<h1><?php echo esc_html(the_archive_title()); ?></h1>
				<p class="lead-text"><?php echo esc_html(the_archive_description()); ?></p>
			</div>
		</div>

			<div class="container">
			<div class="row">
				<div class="masonry isotopeContainer">

							<?php 
								if(have_posts()) : 
									while ( have_posts() ) : the_post(); 
							
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
								// Event Format
									if ( empty($post_format) ) {
										
										$event_title = '';
										$event_title = $opts->getOption( 'laread_post_event_title', get_the_ID() );

										if (trim($event_title))
											$custom_format = 'event';

									}
								
								
								get_template_part( 'post-formats/masonry/content', $post_format.$custom_format );

							// End the loop.
							endwhile; 
							?>
			
							<?php else : ?>

								<?php get_template_part( 'post-formats/masonry/content', 'none' ); ?>

							<?php endif ?>

					</div>
				</div>
		</div>

	<?php endif ?>


	<?php if ($laread_inline_page_template == 'medium-with-sidebar'): ?>

		<div class="container">
			<div class="head-text">
				<h1><?php echo esc_html(the_archive_title()); ?></h1>
				<p class="lead-text"><?php echo esc_html(the_archive_description()); ?></p>
			</div>
		</div>

			<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-fluid post-medium-vertical">

							<?php 

								if(have_posts()) : 
									while( have_posts()) : the_post();			
							
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
								// Event Format
									if ( empty($post_format) ) {
										
										$event_title = '';
										$event_title = $opts->getOption( 'laread_post_event_title', get_the_ID() );

										if (trim($event_title))
											$custom_format = 'event';

									}
								
								
								// $post_format = '';
								get_template_part( 'post-formats/medium-with-sidebar/content', $post_format.$custom_format );

							// End the loop.
							endwhile; ?>
			
							<?php else : ?>

								<?php get_template_part( 'post-formats/medium-with-sidebar/content', 'none' ); ?>

							<?php endif ?>
					</div>
				</div>

				<aside class="col-md-4">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>

	<?php endif ?>



	<?php if ($laread_inline_page_template == 'medium-without-sidebar'): ?>

		<div class="container">
			<div class="head-text">
				<h1><?php echo esc_html(the_archive_title()); ?></h1>
				<p class="lead-text"><?php echo esc_html(the_archive_description()); ?></p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post-mediums">

							<?php 

								if(have_posts()) : while(have_posts()) : the_post();			
															
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
								// Event Format
									if ( empty($post_format) ) {
										
										$event_title = '';
										$event_title = $opts->getOption( 'laread_post_event_title', get_the_ID() );

										if (trim($event_title))
											$custom_format = 'event';

									}
								
								
								get_template_part( 'post-formats/medium-without/content', $post_format.$custom_format );

							// End the loop.
							endwhile; ?>

							<?php else : ?>

								<?php get_template_part( 'post-formats/medium-without/content', 'none' ); ?>

							<?php endif ?>

					</div>
				</div>
			</div>
		</div>

		<?php fn_laread_navlink_medium_out(); ?>

	<?php endif ?>


		


<?php get_footer(); ?>
