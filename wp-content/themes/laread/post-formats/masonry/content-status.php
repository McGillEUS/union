<?php
/**
 * @package Evmet laread
 */
?>
<?php $categorys = get_the_category(); ?>
<div  id="post-<?php the_ID(); ?>" class="col-md-4 masonry-row col-sm-6 <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">
		
		<div class="masonry-box">
		<?php if (has_post_thumbnail()):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		?> 
			<a href="<?php echo esc_url(get_permalink()); ?>">
			 <img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" class="img-responsive" />  
			</a>
		<?php endif ?>
			
			<a href="<?php echo esc_url(get_permalink()); ?>" class="medium-hastag"><?php the_title(); ?></a>
		</div>
		
		
		<div class="masonry-content">
			<span class="masonry-status"><?php echo strip_tags(get_the_excerpt()); ?></span>
			<div class="links">
				<?php fn_laread_masonry_post_footer(); ?>		
			</div>
		</div>
	</div>