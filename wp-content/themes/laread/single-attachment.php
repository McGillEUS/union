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


									<h1><?php the_title(); ?></h1>

									<div class="entry-attachment">
										<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
											<p class="attachment"><a href="<?php echo esc_url(wp_get_attachment_url($post->id)); ?>" title="<?php the_title(); ?>" rel="attachment"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  class="attachment-medium" alt="<?php $post->post_excerpt; ?>" /></a>
											</p>
										<?php else : ?>
											<a href="<?php echo esc_url(wp_get_attachment_url($post->ID)) ?>" title="<?php echo esc_attr( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo basename($post->guid) ?></a>
										<?php endif; ?>
									</div>



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

