<?php
/**
 * @package Evmet laread
 */
?>
<?php 

	$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));
?>
<?php $categorys = get_the_category(); ?>
<div  id="post-<?php the_ID(); ?>" class="col-md-4 masonry-row col-sm-6 <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">

		<?php if (count($gallery)): ?>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php foreach ($gallery as $k => $v): ?>
								<div class="item <?php echo ($k==0) ? 'active' : ''; ?>">
								<img src="<?php echo $v; ?>" alt="" />
							</div>
							<?php endforeach ?>
						</div>
						<a class="masonry-left left" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						<a class="masonry-right right" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
					</div>

					<?php endif ?>

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
