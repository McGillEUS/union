<?php /* Template Name: Masonry */ 
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
				<h1 class="head-text-highlight"><?php echo get_bloginfo('name'); ?></h1>
				<p id="filters" class="tags">
					<?php $categorys = get_categories(); ?>
					<?php if ($categorys): ?>
						<?php foreach ($categorys as $l => $v): ?>
							<a data-filter=".<?php echo $v->slug; ?>" href="#"><?php echo $v->name; ?></a>
						<?php endforeach ?>
					<?php endif ?>
					<a data-filter="*" href="#" class="unfilter hide">all</a>
				</p>
			</div>
		</div>
			
			
	<div class="container">
			<div class="row">
				<div class="masonry isotopeContainer">

							<?php 
					            $blog_args = array(
					                'post_type' => 'post'
					            );
					            // 'posts_per_page' => 5,

								$blog_query = new WP_Query($blog_args);
								
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
								
								// echo $post_format.$custom_format;
								get_template_part( 'post-formats/masonry/content', $post_format.$custom_format );

							// End the loop.
							endwhile; ?>
			
			<?php endif ?>

					</div>
				</div>
		</div>

		<div class="container" id="more-down">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<a href="#" class="more-down more-down-masonry"><i class="fa fa-long-arrow-down"></i></a>
				</div>
			</div>

		</div><!-- /.container -->


	
<?php 
if ( $page_template != 'page-banner1.php' and $page_template != 'page-banner2.php')
	{
		get_footer(); 
	}
?>
