<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
	$post_video = $opts->getOption( 'laread_embed_video', get_the_ID() );
	$categorys = get_the_category();
?>
<div id="post-<?php the_ID(); ?>"  class="row post-medium <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug; ?><?php endforeach ?><?php endif ?>" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
				<?php if ($post_video): ?>
					<div class="row">
							<div class="post-item-banner embed-responsive embed-responsive-16by9">
								<?php echo $post_video; ?>
							</div>
					</div>
				<?php else: ?>
					<?php fn_laread_post_date_medium(); ?>
				<?php endif ?>
			</div>

			<div class="col-md-7">
				<?php fn_laread_post_content_medium(); ?>
			</div>
		</div>
</div>