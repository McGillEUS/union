<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Evmet laread
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php fn_laread_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php

							$dbPost = get_post(get_the_ID());
							// print_r($deger);
						    if( strpos( $dbPost->post_content, '<!--more-->' ) ) {
						        the_content();
						    }
						    elseif( strpos( $dbPost->post_content, '//twitter.com' ) ) {
						    	 the_content();
						    }
						    elseif ( post_password_required() ) {
						    	 the_content();
						    }
						    else {
						        the_excerpt();
						    }
						?>
						<div class="pagelink"><?php wp_link_pages('pagelink=Page %'); ?></div>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php fn_laread_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
