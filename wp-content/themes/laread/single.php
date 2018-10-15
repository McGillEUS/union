<?php
/**
 * The template for displaying all single posts.
 *
 * @package Evmet laread
 */

get_header(); ?>

<?php 
$opts = TitanFramework::getInstance( 'laread' );
$laread_single_page = $opts->getOption( 'laread_single_page_template' );

$post_template_dir = ($laread_single_page=='medium-without') ? 'post-formats/large-image/content' : 'post-formats/medium-with-sidebar/content';
?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php if ($laread_single_page != 'medium-without'): ?>

		<div class="container">
			<div class="row">

				<div class="container">
					<div class="head-text text-highlight">
							<h1><?php echo esc_html( get_bloginfo('name') ) ; ?></h1>
							<p class="lead-text"><?php echo esc_html ( get_bloginfo('description') ); ?></p>
					</div>
				</div>

				<div class="col-md-8">
					<div class="post-fluid post-medium-vertical">

					<?php else: ?>

						<div class="post-fluid">
							<div class="container-fluid">
								<div class="container">
									<div class="row post-items">

										<div class="container">
											<div class="head-text text-highlight">
												<h1><?php the_title(); ?></h1>
											</div>
										</div>

									<?php endif ?>


									<?php  get_template_part( $post_template_dir, 'single' ); ?>

									<?php if ($laread_single_page != 'medium-without'): ?>

									</div>
								</div>

								<aside class="col-md-4">
									<?php get_sidebar(); ?>
								</aside>	

							</div>

						</div>

					<?php else: ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>

<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
