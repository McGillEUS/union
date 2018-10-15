<?php 
	$categorys = get_the_terms( get_the_ID(), 'laread_gallery_category' ); 
	$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));

	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));
?>
	<div class="col-md-6 <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">
		<div class="gallery-line clearfix">
			<div class="col-md-6">
				<a data-gallery-item="laread-gallery-list-<?php the_ID(); ?>" href="#" class="banner-link">
					<?php if (has_post_thumbnail()): $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>
						<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
					<?php else: ?>
						<div class="number"><?php echo get_the_date('d'); ?></div>
					<?php endif ?>
				</a>
			</div>
			<div class="col-md-6 gi-item">
				<div class="gi-top clearfix">
					<a href="#"><?php echo $categorys[0]->name; ?></a>
				</div>
				<div class="gi-content">
					<h4><a data-gallery-item="laread-gallery-list-<?php the_ID(); ?>" href="#"><?php the_title(); ?></a></h4>
				</div>
				<div class="gi-bottom">
					<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a data-social='facebook' href='<?php echo $current_url; ?>'><i class='fa fa-facebook'></i></a><a data-social='twitter' href='<?php echo $current_url; ?>'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
					<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
				</div>
			</div>
		</div>
	</div>
