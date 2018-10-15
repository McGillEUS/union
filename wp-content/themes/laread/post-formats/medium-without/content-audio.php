<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	$opts = TitanFramework::getInstance( 'laread' );
	$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() ); 
?>

<div id="post-<?php the_ID(); ?>"  class="row post-medium" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
			<?php if (!empty($embed_status)): ?>
				<div class="row">
					<div class="embed-responsive embed-responsive-4by3">
						<?php echo $embed_status; ?>
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