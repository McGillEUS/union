<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	$opts = TitanFramework::getInstance( 'laread' );
	$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() ); 
?>
<div id="post-<?php the_ID(); ?>"  class="container-fluid" <?php post_class(); ?>>
		<div class="container">
			<div class="row post-items">
				<?php if ($embed_status): ?>
				<div class="post-item-banner embed-responsive embed-responsive-16by9">
					<?php echo $embed_status; ?>
				</div>	
				<?php endif ?>
				<div class="col-md-2">
					<?php 
						fn_laread_post_date(); 
					?>
				</div>
				<div class="col-md-10">
					<?php 
						fn_laread_post_footer(); 
					?>
				</div>
			</div>
		</div>
	</div>