<?php
/**
 * @package Evmet laread
 */
?>
<div id="post-<?php the_ID(); ?>"  class="container-fluid" <?php post_class(); ?>>
	<div class="container">
		<div class="row post-items">
			<div class="post-item-banner">
					<?php if (has_post_thumbnail()): 
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
												?> 
												<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
											<?php endif ?>
			</div>
			<div class="col-md-2">
				<?php fn_laread_post_date(); ?>
			</div>
			<div class="col-md-10">
				<?php fn_laread_post_footer(); ?>
			</div>
		</div>
	</div>
</div>