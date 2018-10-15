<?php 
	$categorys = get_the_terms( get_the_ID(), 'laread_gallery_category' );  
	$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));

	global $wp;
	$current_url = home_url(add_query_arg(array(),$wp->request));
?>

<div class="gallery-large-item gallery-item  <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">
			<div class="gallery-banner">
			<?php if (count($gallery)): ?>
				<div id="carousel-example-generic<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner" role="listbox">
						<?php foreach ($gallery as $k => $v): ?>
						<div class="item <?php echo ($k==0) ? 'active' : ''; ?>">
							<img <?php if ($k==0): ?> src="<?php echo $v; ?>" <?php endif; ?> data-lazy-load-src="<?php echo $v; ?>" alt="<?php the_title(); ?> <?php echo $k+1; ?>">
						</div>
						<?php endforeach ?>
					</div>
					<a class="left carousel-control carousel-bottom" href="#carousel-example-generic<?php the_ID(); ?>" role="button" data-slide="prev">
						<span class="fa fa-angle-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control carousel-bottom" href="#carousel-example-generic<?php the_ID(); ?>" role="button" data-slide="next">
						<span class="fa fa-angle-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				<?php endif ?>
			</div>
			<div class="gallery-info">
				<span class="gallery-category"><?php echo $categorys[0]->name; ?></span>
				<span class="gallery-title"><?php the_title(); ?></span>
				<div class="post-item-social clearfix">
					<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a data-social='facebook' href='<?php echo $current_url; ?>'><i class='fa fa-facebook'></i></a><a data-social='twitter' href='<?php echo $current_url; ?>'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
					<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
				</div>
			</div>
		</div>