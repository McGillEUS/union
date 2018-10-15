<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	$opts = TitanFramework::getInstance( 'laread' );
	$code = $opts->getOption( 'laread_code_format', get_the_ID() ); 
?>

<div id="post-<?php the_ID(); ?>"  class="container-fluid post-default">
	<div class="container-medium">
		<div class="row post-items in-code">

		<?php if ($code): ?><pre class="prettyprint lang-css"><?php echo $code; ?></pre><?php endif ?>

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
						<div class="pagelink"><?php wp_link_pages('pagelink=Page %'); ?></div>
					</div>

					<?php fn_laread_medium_sidebar_post_footer(); ?>

				</div>
			</div>

	</div>
</div>
</div>