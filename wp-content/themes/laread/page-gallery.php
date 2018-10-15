<?php /* Template Name: Gallery v1 */ 
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
			<div class="row galleries-large isotopeGallery">

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

					include 'gallery-format/gallery1/'.$display_mode.'.php';
					
					endwhile; ?>

			<?php endif ?>
					
			</div>
		</div>

		<div class="container" id="more-down-gallery">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<a href="#" class="more-down more-down-gallery"><i class="fa fa-long-arrow-down"></i></a>
				</div>
			</div>

		</div><!-- /.container -->


<?php get_footer(); ?>
