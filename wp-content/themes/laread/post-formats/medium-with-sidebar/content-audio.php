<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	$opts = TitanFramework::getInstance( 'laread' );
	$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() ); 
?>

<div id="post-<?php the_ID(); ?>"  class="container-fluid post-default" <?php post_class(); ?>>
	<div class="container-medium">
		<div class="row post-items">
		<?php if ($embed_status): ?>
			<div class="embed-responsive embed-responsive-4by3">
				<?php echo $embed_status; ?>
			</div>	
		<?php endif ?>
		
			<div class="col-md-12">
				<div class="post-item">
					<div class="post-item-paragraph">
						<?php $categorys = get_the_category(); ?>
						<div>
							<a href="#" class="quick-read qr-only-phone"><i class="fa fa-eye"></i></a>
							<?php if ($categorys): ?>
									<?php foreach ($categorys as $category): ?>
										<a  class="mute-text" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
											<?php echo esc_html( $category->name ); ?>
										</a>		
									<?php endforeach ?>
								<?php endif ?>
						</div>

						<h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
						
						<?php the_excerpt(); ?>
						<!-- <a href="#" class="more">[...]</a> -->

					</div>

					<?php fn_laread_medium_sidebar_post_footer(); ?>

				</div>
			</div>
		</div>
	</div>
</div>