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
<?php $categorys = get_the_category(); ?>

<div id="post-<?php the_ID(); ?>"  class="row post-medium <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug; ?><?php endforeach ?><?php endif ?>" >
		<div class="row post-items">
			<div class="col-md-5">
					<?php if (has_post_thumbnail()): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						<div class="row">
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
						</div>
					<?php else: ?>
						<?php fn_laread_post_date_medium(); ?>
				<?php endif ?>
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
						
						<div class="medium-quote">
							<div class="medium-quote-icon">&#8220;</div>
							<span class="medium-quote-text"><?php the_excerpt(); ?></span>
							<p class="medium-quote-by">- <?php echo $author_name; ?></p>
						</div>
						
						<?php fn_laread_medium_post_footer(); ?>
					</div>
				</div>
			</div>
		</div>
</div>