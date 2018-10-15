<?php /* Template Name: Banner Mode v2 */ 
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

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php laread_favicon(); ?>
<?php laread_twitter_card(); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php laread_loading_box(); ?>
<?php laread_pushbar(); ?>

    

    <div class="canvas intro-effect-push" id="container">
        <div class="canvas-overlay"></div>
        <header>
            <nav class="navbar navbar-fixed-top navbar-laread-transparent">
                <div class="container">
                    <div class="navbar-header">
                        <?php laread_pagebanner_site_logo(); ?>
                    </div>
                    
                    <?php laread_pushbar_type(); ?>
                  
                    <button type="button" class="navbar-toggle collapsed menu-collapse" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only"><?php echo esc_html__('Toggle navigation','laread'); ?></span>
                        <i class="fa fa-plus"></i>
                    </button>

                     <a href="#" class="banner-search-close"><i class="fa fa-times"></i></a>
                    <a href="#" class="banner-search"><i class="fa fa-search"></i></a>

					<form class="banner-search-form" method="get" action="<?php echo laread_HOME; ?>">
						<input type="text" name="s" placeholder="<?php echo esc_html__('Search','laread'); ?>">
					</form>

                    <div class="collapse navbar-collapse" id="main-nav">
	                  <?php if ( has_nav_menu( 'primary' ) ): ?>
	                    <?php 
	                        wp_nav_menu(array(
	                          'theme_location' => 'primary',
	                          'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>',
	                          'container' => false,
	                          'walker' => new laread_Nav_Walker
	                         )); 
	                    ?>
	                  <?php endif; ?>
                	</div>

                </div>
            </nav>
        </header>
		
		<?php
			// Get Post
             $titan = TitanFramework::getInstance( 'laread' );
			$post_limit = $titan->getOption( 'laread_banner_post_limit', get_queried_object_id() );
			$post_limit = empty($post_limit) ? 5 : $post_limit;
			 $blog_args=array(
		      'tag' => 'banner',
		      'showposts'=>$post_limit,
		      'post_type' => 'post'
		    );
			 
			$blog_query = new WP_Query($blog_args); ?>

        <div id="fullpage">

			<div class="banner-mod" id="section0">

				<?php if($blog_query->have_posts()) : ?>
				<div id="carousel-captions" class="carousel slide bnr-nav" data-ride="carousel" data-interval="100000000">
					<ol class="carousel-indicators hide">
						<?php $s=0;  while($blog_query->have_posts()) : $blog_query->the_post(); $s++;	 ?>
							<li data-target="#carousel-example-captions" data-slide-to="<?php echo $s; ?>" class="<?php echo ($s==1) ? 'active': ''; ?>"></li>
						<?php endwhile; ?>
					</ol>
					<div class="carousel-inner" role="listbox">

						<?php $s=0; while($blog_query->have_posts()) : $blog_query->the_post();	$s++; ?>
						
						<?php $image = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>
						<div class="item <?php echo ($s==1) ? 'active': ''; ?>">

							
							
							<div class="item-cover" style="background-image: url('<?php echo $image; ?>');">
								
                                <?php if ($image): ?>
									<img class="image-cover" src="<?php echo $image; ?>" alt="">	
								<?php endif ?>
								
                                <div class="carousel-caption carousel-caption-3">
									<span class="article-info"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?> <?php echo esc_attr(get_the_date('Y')); ?></a>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">By <?php the_author_meta('first_name'); ?> <?php  the_author_meta('last_name'); ?></a></span>
									<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>

                                <div class="photo-overlay-dark"></div>
							</div>

						</div>

						<?php endwhile; ?>

					</div>
					<a class="left carousel-control bnr-nav" href="#carousel-captions" role="button" data-slide="prev"><i class="fa fa-long-arrow-left"></i></a>
					<a class="right carousel-control bnr-nav" href="#carousel-captions" role="button" data-slide="next"><i class="fa fa-long-arrow-right"></i></a>
					<a href="#" class="caption-more">MORE <i class="fa fa-chevron-circle-down"></i></a>
				</div>
				
				<?php endif; wp_reset_query(); ?>
					
					<div class="article-intro">
						<?php 

							$page_id     = get_queried_object_id();
                        	 $laread_page_template_for_banner = $titan->getOption( 'laread_page_template_for_banner', $page_id );
                         ?>
						<?php 
							if (!empty($laread_page_template_for_banner)) {
								include laread_PATH . '/page-'. $laread_page_template_for_banner.'.php';
							}
							
						?>
					</div>

				 <?php
                        laread_footer();
                    ?>

			</div>

		</div>

		  <?php laread_pagebanner_footer(); ?>

	</div>

	<?php 
        // include quick read feature html
        include laread_PATH . '/core/quickread-tag.php';
    ?>
	<?php wp_footer(); ?>
</body>
</html>
