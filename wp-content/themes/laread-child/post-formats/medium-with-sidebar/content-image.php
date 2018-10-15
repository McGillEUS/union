<?php
/**
 * @package Evmet laread
 */
?>
<div id="post-<?php the_ID(); ?>"  class="container-fluid post-default">
	<div class="container-medium">
		<div class="row post-items">
			<?php if (has_post_thumbnail()): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
				<div class="post-item-banner">
					<img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /> 
				</div>
			<?php endif ?>
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

						<h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
						
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

					</div>

					<?php fn_laread_medium_sidebar_post_footer(); ?>

				</div>
			</div>
		</div>
	</div>
</div>