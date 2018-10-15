<?php
/**
 * @package Evmet laread
 */
?>
<?php 

	$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));
	$gallery = array_filter($gallery);
?>

<div id="post-<?php the_ID(); ?>"  class="row post-medium lg-banner">
		<div class="row post-items">
			<div class="col-md-5">
					<?php if (count($gallery)): ?>
						<div class="row">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<?php foreach ($gallery as $k => $v): ?>
										<li data-target="#carousel-example-generic" data-slide-to="<?php echo $k+1; ?>" class="<?php echo ($k==0) ? 'active' : ''; ?>"></li>
									<?php endforeach ?>
								</ol>
								<div class="carousel-inner">
									<?php foreach ($gallery as $k => $v): ?>
										<div class="item <?php echo ($k==0) ? 'active' : ''; ?>">
										<img src="<?php echo $v; ?>" alt="" />
									</div>
									<?php endforeach ?>
								</div>
								<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
								<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
							</div>
						</div>
					<?php elseif(has_post_thumbnail()): ?>
						<div class="row">
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?> 
							<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
						</div>
					<?php else: ?>
						<?php fn_laread_post_date_medium(); ?>
					<?php endif ?>
			</div>
			<div class="col-md-7">
				<?php fn_laread_post_content_medium(); ?>
			</div>
		</div>
</div>