<?php
/**
* @package Evmet laread
*/
?>
<?php 

$opts = TitanFramework::getInstance( 'laread' );

?>
<?php $categorys = get_the_category(); ?>
<div  id="post-<?php the_ID(); ?>" class="col-md-4 masonry-row col-sm-6 <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">
<?php if (has_post_thumbnail()): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

						if ($image[0]):
						?> 
					
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
						
					<?php endif ?>
					<?php endif ?>
					
		<div class="medium-code">
			<div class="code-spot">&lt;div&gt;</div>
			
		</div>
		<div class="masonry-content">
<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
<div class="spot ellipsis-readmore">
<?php echo strip_tags(get_the_excerpt()); ?>
<a href="<?php echo esc_url(get_permalink()); ?>" class="more">&#187;</a>
</div>
<div class="links">
<?php fn_laread_masonry_post_footer(); ?>		
</div>
</div>
</div>

