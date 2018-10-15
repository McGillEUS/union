<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
	$post_link = $opts->getOption( 'laread_post_link', get_the_ID() );
	$post_link_title = $opts->getOption( 'laread_post_link_title', get_the_ID() );
?>
<?php $categorys = get_the_category(); ?>
<div  id="post-<?php the_ID(); ?>" class="col-md-4 masonry-row col-sm-6 <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">

	<div class="masonry-box">
		
		<?php if (has_post_thumbnail()):  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );  ?>
			<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
		<?php endif ?>

		<div class="medium-link">
			<i class="fa fa-link"></i>
			<?php if ($post_link_title): ?>
				<p class="medium-link-text"><?php echo $post_link_title; ?></p>
			<?php else: ?>
				<p class="medium-link-text"></p>
			<?php endif ?>
			<a class="medium-link-url" href="<?php echo $post_link; ?>"><?php echo $post_link; ?></a>
		</div>
	</div>

	<div class="masonry-content">
		<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
		<div class="spot ellipsis-readmore"><?php the_excerpt(); ?> 
			<a href="<?php echo esc_url(get_permalink()); ?>" class="more">&#187;</a>
		</div>
		<div class="links">
			<?php fn_laread_masonry_post_footer(); ?>		
		</div>
	</div>
</div>