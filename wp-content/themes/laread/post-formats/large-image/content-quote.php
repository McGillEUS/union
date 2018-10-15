<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
	$author_name = $opts->getOption( 'laread_author_name', get_the_ID() );
	
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
					$custome_class = 'no-bg-image';
					if (has_post_thumbnail())
						{
							 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
							 $custome_style = 'style="background-size:cover;background-image: url('.$image[0].'); background-position: center center;"';
							 $custome_class = '';
						}
					?>

					<div class="in-quote <?php echo $custome_class; ?>" <?php echo $custome_style; ?>>
						<div class="block-overlay">
							<div class="overlay-quote">
								<span class="quote-icon">&#8220;</span>
								<a href="<?php echo esc_url(get_permalink()); ?>" class="spot"><?php the_excerpt(); ?></a>
								<span class="name">- <?php echo esc_html($author_name); ?></span>
							</div>
						</div>
					</div>
					
					<?php fn_laread_medium_sidebar_post_footer('no-border'); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>