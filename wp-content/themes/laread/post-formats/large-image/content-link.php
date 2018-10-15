<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
	$post_link = $opts->getOption( 'laread_post_link', get_the_ID() );
	$laread_post_link_title = $opts->getOption( 'laread_post_link_title', get_the_ID() );

	$comments_count = wp_count_comments(get_the_ID());
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
					if (has_post_thumbnail())
						{
							 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
							 $custome_style = 'style="background-size:cover;background-image: url('.$image[0].'); background-position: center center;"';
						}
					?>

					<div class="in-link" <?php echo $custome_style; ?>>
						<div class="block-overlay">

										<div class="overlay-link">
											<i class="fa fa-link fa-rotate-90"></i>
											<?php if (empty($post_link)): ?>
															<?php the_content(); ?>
														<?php else: ?>
															<a href="<?php echo esc_url($post_link); ?>"><?php echo esc_url($post_link); ?></a>
											<span class="link-text"><a class="post-link" href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr($laread_post_link_title); ?></a></span>
														<?php endif ?>
										</div>
							
						</div>
					</div>
					
					<?php fn_laread_medium_sidebar_post_footer('no-border'); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>