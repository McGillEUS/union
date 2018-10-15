<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
	$author_name = $opts->getOption( 'laread_author_name', get_the_ID() );

?>
<?php $categorys = get_the_category(); ?>
<div  id="post-<?php the_ID(); ?>" class="col-md-4 masonry-row col-sm-6 <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">
		
		<?php if (has_post_thumbnail()):
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		?> 
			<a href="<?php echo esc_url(get_permalink()); ?>">
				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" class="img-responsive" alt="" />  
			</a>
		<?php endif ?>


		<div class="masonry-content">
			<span class="spot ellipsis-readmore"><?php the_content(); ?></span>
			<div class="links">
				<?php fn_laread_masonry_post_footer(); ?>		
			</div>
		</div>
	</div>