<?php
/**
 * @package Evmet laread
 */
?>
<?php $opts = TitanFramework::getInstance( 'laread' );
$hot_event = $opts->getOption( 'laread_hot_event', get_the_ID() ); ?>

<div id="post-<?php the_ID(); ?>"  class="row post-medium" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
				<div class="row">
				
				<?php if (has_post_thumbnail()): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
			<?php endif ?>

			<div class="medium-event">
				<p class="medium-event-date"><?php echo get_the_date('d'); ?></p>
				<p class="medium-event-text"><?php echo get_the_date('l'); ?> <br><?php echo get_the_date('F'); ?>/<?php echo get_the_date('Y'); ?></p>
			</div>

		


				 </div>
			</div>
			<div class="col-md-7">
				<div class="post-item">
					<div class="medium-post-box clearfix">
							<div class="medium-important-post">
								<span class="icon-bookmark">
									<i class="fa fa-star"></i>
								</span>
							</div>
						
						<div class="">
							<div class="pm-top-info noline clearfix">
								<?php fn_laread_post_social_footer(); ?>
							</div>
							<p class="hotnews"><?php echo $hot_event; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>