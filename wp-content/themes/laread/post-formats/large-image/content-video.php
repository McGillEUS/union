<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
	$post_video = $opts->getOption( 'laread_embed_video', get_the_ID() );

	$comments_count = wp_count_comments(get_the_ID());
?>
<div id="post-<?php the_ID(); ?>"  class="container-fluid" <?php post_class(); ?>>
	<div class="container">
		<div class="row post-items">
		<?php if ($post_video): ?>
			<div class="post-item-banner embed-responsive embed-responsive-16by9">
				<?php echo $post_video; ?>
			</div>
		<?php endif ?>
			
			<div class="post-item-banner">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="col-md-2">
				<?php fn_laread_post_date(); ?>
			</div>
			<div class="col-md-10">
				<?php fn_laread_post_footer(); ?>
			</div>
		</div>
	</div>
</div>