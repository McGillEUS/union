<?php
/**
 * @package Evmet laread
 */
?>
<?php $categorys = get_the_category(); ?>
<div id="post-<?php the_ID(); ?>"  class="row post-medium <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug; ?><?php endforeach ?><?php endif ?>" >
		<div class="row post-items">
			<div class="col-md-5">
			
				<div class="row">
				 	<?php if (has_post_thumbnail()): ?> 
				 	<?php  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
				 	<?php else: ?>
				 		<?php fn_laread_post_date_medium(); ?>
				 	<?php endif ?>
				 </div>
			</div>
			<div class="col-md-7">

				<div class="post-item">
						<div class="medium-post-box clearfix">
							<div class="pm-top-info no-line clearfix">
								<div class="pull-left">
									<?php if ($categorys): ?>
										<?php foreach ($categorys as $category): ?>
											<a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
												<?php echo esc_html( $category->name ); ?>
											</a>		
										<?php endforeach ?>
									<?php endif ?>
								</div>
								<?php fn_laread_post_social('bottom'); ?>
							</div>
							<div class="medium-aside">
								<?php the_excerpt(); ?>
							</div>

							<?php fn_laread_medium_post_footer(); ?>
						</div>
					</div>
			</div>
		</div>
</div>