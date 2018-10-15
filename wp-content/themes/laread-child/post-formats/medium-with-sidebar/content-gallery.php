<?php
/**
 * @package Evmet laread
 */
?>
<?php 

	$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));
	$gallery = array_filter($gallery);
?>
<div id="post-<?php the_ID(); ?>"  class="container-fluid post-default" <?php post_class(); ?>>
	<div class="container-medium">
		<div class="row post-items">
			<div class="post-item-banner lg-banner">
				<?php if (count($gallery)): ?>
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php foreach ($gallery as $k => $v): ?>
								<li data-target="#carousel-example-generic" data-slide-to="<?php echo $k+1; ?>" class="<?php echo ($k==0) ? 'active' : ''; ?>"></li>
							<?php endforeach ?>
						</ol>
						<div class="carousel-inner">
							<?php foreach ($gallery as $k => $v): ?>
								<div class="item <?php echo ($k==0) ? 'active' : ''; ?>">
								<img src="<?php echo $v; ?>" alt="" />
							</div>
							<?php endforeach ?>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
					</div>

					<?php elseif(has_post_thumbnail()): ?>
					<?php if (has_post_thumbnail()): 
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
						?> 
						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
					<?php endif ?>
				<?php endif ?>
			</div>
			<div class="col-md-12">
				<div class="post-item">
					<div class="post-item-paragraph">
						<?php $categorys = get_the_category(); ?>
						<div>
							<a href="#" class="quick-read qr-only-phone"><i class="fa fa-eye"></i></a>
							<?php if ($categorys): ?>
									<?php foreach ($categorys as $category): ?>
										<a  class="mute-text" href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>">
											<?php echo esc_html( $category->name ); ?>
										</a>		
									<?php endforeach ?>
								<?php endif ?>
						</div>

						<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
						
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

					</div>

					<?php fn_laread_medium_sidebar_post_footer(); ?>

				</div>
			</div>
		</div>
	</div>
</div>
