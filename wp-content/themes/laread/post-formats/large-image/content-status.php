<?php
/**
 * @package Evmet laread
 */
?>
<div id="post-<?php the_ID(); ?>"  class="container-fluid" <?php post_class(); ?>>
	<div class="container">
		<div class="row post-items">
			<div class="col-md-2">
				<?php fn_laread_post_date(); ?>
			</div>
			<div class="col-md-10">
				<div class="post-item">

					<?php 
					$custome_style = '';
					$custome_class = 'no-bg-image';
					if (has_post_thumbnail())
						{
							 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
							 $custome_style = 'style="background-size:cover;background-image: url('.$image[0].'); background-position: center center;"';
							 $custome_class = '';
						}
					?>
					<div class="in-hashtags <?php echo $custome_class; ?>" <?php echo $custome_style; ?>>
						<div class="block-overlay">
							
							<div class="overlay-hashtags">
							<span class="hastag"><?php the_title(); ?></span>
							<span class="link-text"><?php the_content('',false); ?></span>
							<a href="<?php the_permalink(); ?>"><i class="fa fa-chevron-circle-right"></i><?php echo esc_html__('read more','laread'); ?></a>
							</div>

						</div>


					</div>

					<?php fn_laread_medium_sidebar_post_footer('no-border'); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>