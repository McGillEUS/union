<?php
/**
 * @package Evmet laread
 */
?>
<?php 

 	$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));
 	$gallery = array_filter($gallery);
?>
<div id="post-<?php the_ID(); ?>"  class="container-fluid" <?php post_class(); ?>>
	<div class="container">
		<div class="row post-items">
			<div class="post-item-banner lg-banner">
				<?php if (count($gallery)): ?>
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php foreach ($gallery as $k => $v): ?>
							<li data-target="#carousel-example-generic" data-slide-to="<?php echo $k+1; ?>" class="<?php echo ($k==0) ? 'active' : ''; ?>"></li>
						<?php endforeach ?>
					</ol>
					<div class="carousel-inner">
						<?php foreach ($gallery as $k => $v): ?>
							<div class="item <?php echo ($k==0) ? 'active' : ''; ?>">
							<img src="<?php echo esc_url($v); ?>" alt="" />
						</div>
						<?php endforeach ?>
					</div>
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
				</div>
				<?php elseif(has_post_thumbnail()): ?>
					<?php if (has_post_thumbnail()): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						?> 
						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
					<?php endif ?>
				<?php endif ?>
			</div>
			<div class="col-md-2">
				<?php fn_laread_post_date(); ?>
			</div>
			<div class="col-md-10">
				<?php fn_laread_post_footer(); ?>
			</div>
		</div>
	</div>
</div>


