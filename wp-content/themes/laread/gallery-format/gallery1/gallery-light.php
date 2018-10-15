<?php 
	$categorys = get_the_terms( get_the_ID(), 'laread_gallery_category' ); 
	$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));

	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));

?>
<div class="gallery-large-item gallery-item <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">
	<div class="gallery-banner">
		<a data-gallery-item="laread-gallery-list-<?php the_ID(); ?>" href="#">
				<?php if (has_post_thumbnail()): 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
					?> 
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
				<?php endif ?>
		</a>
	</div>
	<div class="gallery-info">
		<span class="gallery-category"><?php echo $categorys[0]->name; ?></span>
		<span class="gallery-title"><?php the_title(); ?> <br> <small></small></span>
		<div class="post-item-social clearfix">
			<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a data-social='facebook' href='<?php echo $current_url; ?>'><i class='fa fa-facebook'></i></a><a data-social='twitter' href='<?php echo $current_url; ?>'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
			<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
		</div>
	</div>
</div>

<?php if (count($gallery)): ?>
<!-- gallery 1 -->
		<div id="laread-gallery-list-<?php the_ID(); ?>" class="dnone">
			<?php foreach ($gallery as $k => $v): ?>
			<a href="<?php echo $v; ?>" title="<?php the_title(); ?> <?php echo $k+1; ?>" data-gallery>
				<img src="" alt="<?php the_title(); ?>">
			</a>
			<?php endforeach ?>
		</div>

		<div id="blueimp-laread-gallery-list-<?php the_ID(); ?>" class="blueimp-gallery-controls blueimp-gallery blueimp-gallery-playing gallery-template-white">
			<div class="slides"></div>
			<div class="gallery-detail-info">
				<div class="gallery-share">
					<span class="date"><?php echo get_the_date('d'); ?> <?php echo get_the_date('F'); ?></span>
					<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a data-social='facebook' href='<?php echo $current_url; ?>'><i class='fa fa-facebook'></i></a><a data-social='twitter' href='<?php echo $current_url; ?>'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
					<a href="#" class="set-fullscreen"><i class="fa fa-expand"></i></a>
					<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
				</div>
			</div>
			<a class="prev"><i class="fa fa-angle-left"></i></a>
			<a class="next"><i class="fa fa-angle-right"></i></a>
			<a class="close">&#215;</a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
		</div>
		<!--! gallery 1 -->

<?php endif ?>