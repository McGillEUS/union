<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
	$hot_event = $opts->getOption( 'laread_hot_event', get_the_ID() ); 

?>
<?php $categorys = get_the_category(); ?>
<div  id="post-<?php the_ID(); ?>" class="col-md-4 masonry-row col-sm-6 <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">



	<div class="masonry-box">
		<div class="important-post">
			<span class="icon-bookmark">
				<i class="fa fa-star"></i>
			</span>
		</div>
		<?php if (has_post_thumbnail()): 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

				if ($image[0]):
				?> 
			
				<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
				
			<?php endif ?>
			<?php endif ?>

		<div class="medium-event">
			<p class="medium-event-date"><?php echo get_the_date('d'); ?></p>
			<p class="medium-event-text"><?php echo get_the_date('F'); ?></p>
		</div>
	</div>


	<div class="masonry-content">
		<span class="masonry-event"><?php echo $hot_event; ?></span>
		<div class="links">
			<?php fn_laread_masonry_post_footer(); ?>		
		</div>
	</div>
</div>
