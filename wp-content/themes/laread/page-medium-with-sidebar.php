<?php /* Template Name: Medium With Sidebar */ 
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

$page_template = get_page_template_slug();
if ( $page_template != 'page-banner1.php' and $page_template != 'page-banner2.php')
	{
		get_header(); 
	}
 ?>

			<div class="container">
			<div class="head-text">
				<h1><?php echo get_bloginfo('name'); ?></h1>
				<p class="lead-text"><?php echo get_bloginfo('description'); ?></p>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post-fluid post-medium-vertical">

							<?php 
								wp_reset_query();


								// Fix paged
								$paged = 1;
								if (get_query_var('paged') > 1) {
									$paged = get_query_var('paged');
								}
								if (get_query_var('page') > 1) {
									$paged = get_query_var('page');
								}
					            $blog_args = array(
					                'post_type' => 'post',
					                'paged' => $paged
					            );

								$blog_query = new WP_Query($blog_args);

								// Pagination fix
								$temp_query = $wp_query;
								$wp_query   = NULL;
								$wp_query   = $blog_query;
								
								$opts = TitanFramework::getInstance( 'laread' );
								$custom_format = '';

								if($blog_query->have_posts()) : while($blog_query->have_posts()) : $blog_query->the_post();			
								// Start the loop.
						
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								
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
							<?php 

							endif ?>

							<?php fn_laread_navlink_medium(); ?>
					</div>


				</div>

				<aside class="col-md-4">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>


		
		<?php 
// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query;
 ?>

<?php 
if ( $page_template != 'page-banner1.php' and $page_template != 'page-banner2.php')
	{
		get_footer(); 
	}
?>