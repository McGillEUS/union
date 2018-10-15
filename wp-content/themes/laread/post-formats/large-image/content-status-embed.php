<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	$opts = TitanFramework::getInstance( 'laread' );
	$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() ); 
?>
<div id="post-<?php the_ID(); ?>"  class="container-fluid" <?php post_class(); ?>>
	<div class="container">
		<div class="row post-items">


				<?php if (has_post_thumbnail()): 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

					if ($image[0]):
					?> 
					<div class="post-item-banner">
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
					</div>
				<?php endif ?>
				<?php endif ?>


			<div class="col-md-2">
				<?php fn_laread_post_date(); ?>
			</div>
			<div class="col-md-10">
				
				<div class="post-item">
					<div class="post-item-paragraph">
						<div class="post-embed">
							<?php echo $embed_status; ?>
													<h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?> </a></h3>
							<p><?php the_excerpt(); ?> </p>
						</div>

					</div>
					
						<?php fn_laread_medium_sidebar_post_footer(); ?>
				</div>
						
				</div>
		</div>
	</div>
</div>