<?php
/**
 * @package Evmet laread
 */
?>

<?php 

$opts = TitanFramework::getInstance( 'laread' );
$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() );
$categorys = get_the_category();  ?>
<?php if (has_post_thumbnail()): ?>
<div id="post-<?php the_ID(); ?>"  class="row post-medium <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug; ?><?php endforeach ?><?php endif ?>" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
				<div class="row">
				
				<?php if (has_post_thumbnail()): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
			<?php endif ?>

				 </div>
			</div>
			<div class="col-md-7">
				<?php if ($embed_status): ?>
					
				<?php $categorys = get_the_category(); ?>

				<div class="post-item">
					<div class="medium-post-box clearfix">
						<div class="post-item-paragraph">
							<?php echo $embed_status; ?>
						</div>
						
					</div>
				</div>

				<?php else: ?>
				<?php fn_laread_post_content_medium(); ?>
				<?php endif ?>
			</div>
		</div>
</div>
<?php endif ?>