<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
	$post_link = $opts->getOption( 'laread_post_link', get_the_ID() );
	$categorys = get_the_category();
?>

<div id="post-<?php the_ID(); ?>"  class="row post-medium <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug; ?><?php endforeach ?><?php endif ?>" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
				<?php if (!empty($post_link)): ?>
				<div class="row">
					<?php if (has_post_thumbnail()): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
							<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
					<?php endif; ?>
					<div class="medium-link">
						<i class="fa fa-link"></i>
						<p class="medium-link-text"><?php the_title(); ?></p>
						<a class="medium-link-url" href="<?php echo $post_link; ?>"><?php echo $post_link; ?></a>
					</div>
				</div>

				<?php else: ?>
						<?php fn_laread_post_date_medium(); ?>
				<?php endif ?>
			</div>

			<div class="col-md-7">
				<?php if (empty($post_link)): ?>
					<?php fn_laread_post_content_medium(true); ?>
				<?php else: ?>
					<?php fn_laread_post_content_medium(); ?>
				<?php endif ?>
			</div>
		</div>
</div>