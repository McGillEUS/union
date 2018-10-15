<?php
/**
 * @package Evmet laread
 */
?>
<div id="post-<?php the_ID(); ?>"  class="row post-medium" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
				<div class="row mcodetype">
					<?php if (has_post_thumbnail()): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
			<?php endif ?>

					<div class="medium-code">
						<div class="code-spot">.class</div>
					</div>
				</div>
			</div>

			<div class="col-md-7">
				<?php fn_laread_post_content_medium(); ?>
			</div>
		</div>
</div>