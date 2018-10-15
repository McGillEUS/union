<?php /* Template Name: Gallery v2 */ 
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Evmet laread
 */
get_header(); ?>
		
			

		<div class="container">
			<div class="head-gallery">
				<h1 class="gallery-h1"><?php the_title(); ?></h1>
				<?php $categorys = get_categories(array( 'taxonomy'=>'laread_gallery_category' )); ?>
				<?php if (isset($categorys) && !@$categorys['errors']): ?>
				<p id="filters" class="tags">
				<?php foreach ($categorys as $l => $v): ?>
					<a data-filter=".<?php echo $v->slug; ?>" href="#"><?php echo esc_html($v->name); ?></a>
					<?php endforeach ?>
					<a data-filter="*" href="#" class="unfilter hide">all</a>
				</p>
				<?php endif ?>
			</div>
		</div>
		

		<div class="post-fluid">
			<div class="container">
				<div class="row gallery-twice">

					<?php 

						$opts = TitanFramework::getInstance( 'laread' );
						$laread_gallery_post_limit = $opts->getOption( 'laread_gallery_post_limit' );
						$laread_gallery_post_limit = ($laread_gallery_post_limit) ? $laread_gallery_post_limit : 10;

			            $blog_args = array(
			                'post_type' => 'laread_gallery',
			                'posts_per_page' => $laread_gallery_post_limit
			            );

						$blog_query = new WP_Query($blog_args);
					

						if($blog_query->have_posts()) : 
						
							while($blog_query->have_posts()) : $blog_query->the_post();

							$display_mode = $opts->getOption( 'laread_gallery_display', get_the_ID() );

							include 'gallery-format/gallery2/'.$display_mode.'.php';
							
							endwhile; ?>

					<?php endif ?>
					
				</div>
			</div>

			<div class="container" id="more-down-twice">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<a href="#" class="more-down more-down-twice"><i class="fa fa-long-arrow-down"></i></a>
				</div>
			</div>

		</div><!-- /.container -->


		</div>



<?php 
if($blog_query->have_posts()) :
while($blog_query->have_posts()) : $blog_query->the_post();
$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));
$display_mode = $opts->getOption( 'laread_gallery_display', get_the_ID() );
if (count($gallery)): ?>
<!-- gallery 1 -->
		<div id="laread-gallery-list-<?php the_ID(); ?>" class="dnone">
			<?php foreach ($gallery as $k => $v): ?>
			<a href="<?php echo esc_url($v); ?>" title="<?php the_title(); ?> <?php echo $k+1; ?>" data-gallery>
				<img src="" alt="<?php the_title(); ?>">
			</a>
			<?php endforeach ?>
		</div>

		<div id="blueimp-laread-gallery-list-<?php the_ID(); ?>" class="blueimp-gallery-controls blueimp-gallery blueimp-gallery-playing gallery-template-<?php echo ($display_mode=='gallery-light') ? 'white' : 'dark'; ?>	">
			<div class="slides"></div>
			<div class="gallery-detail-info">
				<div class="gallery-share">
					<span class="date"><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?></span>
					<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a href='#'><i class='fa fa-facebook'></i></a><a href='#'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>
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

<?php endif; endwhile;  endif; ?>


<?php get_footer(); ?>
