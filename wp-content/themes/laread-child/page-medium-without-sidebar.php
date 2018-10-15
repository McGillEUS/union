<?php /* Template Name: Medium Without Sidebar */ 
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

$page_template = get_page_template_slug();
if ( $page_template != 'page-banner1.php' and $page_template != 'page-banner2.php')
	{
		get_header('home'); 
	}
?>
	
<div class="container">
    <!--<div class="top-bar">
	    <?php laread_pushbar_type(); ?>

	    <button type="button" class="navbar-toggle collapsed menu-collapse" data-toggle="collapse" data-target="#main-nav">
	        <span class="sr-only"><?php echo esc_html__('Toggle navigation','laread'); ?></span>
	        <i class="fa fa-plus"></i>
	    </button>

	    <a href="#" class="banner-search-close"><i class="fa fa-times"></i></a>
	    <a href="#" class="banner-search"><i class="fa fa-search"></i></a>
	    <!-- ALEX: link this to an info page, or replace with 1-2 separate top-of-page links -->
	    <!--a href="http://mcgilleus.ca/" class="info-button"><i class="fa fa-info"></i></a>

	    <form class="banner-search-form" method="get" action="<?php echo laread_HOME; ?>">
	      <input type="text" name="s" value="<?php echo get_search_query() ?>" placeholder="<?php echo esc_html__('Search','laread'); ?>">
	    </form>
    </div -->

	<div class="head-text">
		<h1 class="main-title"><?php echo get_bloginfo('name'); ?></h1>
		<p class="lead-text"><?php echo get_bloginfo('description'); ?></p>
		<p id="filters" class="tags">
			<?php $categorys = get_categories(); ?>
			<?php if ($categorys): ?>
				<?php foreach ($categorys as $l => $v): ?>
					<a data-filter=".<?php echo $v->slug; ?>" class="<?php echo $v->slug; ?>" href="#"><?php echo $v->name; ?></a>
				<?php endforeach ?>
			<?php endif ?>
			<a data-filter="*" href="#" class="unfilter hide">all</a>
		</p>
	</div>
</div>
			
			
<div class="container">
	<div class="row">
		<div class="post-mediums isotopeMain">
			<?php 
	            wp_reset_query();


				// Fix paged
				$paged = 1;
				if (get_query_var('paged') > 1) {
					$paged = get_query_var('paged');
				}
				if (get_query_var('page') > 1) {
					$paged = get_query_var('page');
				}
	            $blog_args = array(
	                'post_type' => 'post',
	                'paged' => $paged
	            );


				$blog_query = new WP_Query($blog_args);
				
				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $blog_query;

				$opts = TitanFramework::getInstance( 'laread' );
				$custom_format = '';

				if($blog_query->have_posts()) : while($blog_query->have_posts()) : $blog_query->the_post();			
			
				// Start the loop.
		
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				
				$post_format = get_post_format();
				$custom_format = '';

				// Custom format
				if ($post_format == 'status') {
					$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() );
					$custom_format = ($embed_status) ? '-embed' : '';

					// Hot Event
					$hot_event = '';
					$hot_event = $opts->getOption( 'laread_hot_event', get_the_ID() );
					if ($hot_event)
						$custom_format = ($hot_event) ? '-hot-event' : '';

					// Code
					$code = '';
					$code = $opts->getOption( 'laread_code_format', get_the_ID() );
					if ($code)
						$custom_format = ($code) ? '-code' : '';
					
				}
				// Event Format
				if ( empty($post_format) ) {
					
					$event_title = '';
					$event_title = $opts->getOption( 'laread_post_event_title', get_the_ID() );

					if (trim($event_title))
						$custom_format = 'event';

				}
						
						// echo $post_format.$custom_format;
						get_template_part( 'post-formats/medium-without/content', $post_format.$custom_format );

					// End the loop.
					endwhile; ?>
	
	<?php endif ?>

			</div>
		</div>
</div>

<!-- change to infinite scroll if possible -->
<div class="container" id="more-down">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<a href="#" class="more-down more-down-masonry"><i class="fa fa-long-arrow-down"></i></a>
		</div>
	</div>

</div><!-- /.container -->


<?php fn_laread_navlink_medium_out(); ?>

<?php 
// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query;
 ?>
	

<?php 
if ( $page_template != 'page-banner1.php' and $page_template != 'page-banner2.php')
	{
		get_footer(); 
	}
?>