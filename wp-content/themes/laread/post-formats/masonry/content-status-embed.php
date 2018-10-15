<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	$opts = TitanFramework::getInstance( 'laread' );
	$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() ); 
?>
<?php $categorys = get_the_category(); ?>
<div  id="post-<?php the_ID(); ?>" class="col-md-4 masonry-row col-sm-6 <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug,' '; ?><?php endforeach ?><?php endif ?>">
	



	<?php if ($embed_status): ?>
	<div class="embed-responsive embed-responsive-4by3 masonry_pbpercen50">
		<?php echo $embed_status; ?>
	</div>
	<?php endif ?>
	

	<div class="masonry-content">
		<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
		<div class="spot ellipsis-readmore">
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
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="more">&#187;</a>
		</div>
		<div class="links">
			<?php fn_laread_masonry_post_footer(); ?>		
		</div>
	</div>
</div>