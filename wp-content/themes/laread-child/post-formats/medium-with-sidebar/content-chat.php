<?php
/**
 * @package Evmet laread
 */
?>

<?php $opts = TitanFramework::getInstance( 'laread' );
	$laread_post_chat = trim ($opts->getOption( 'laread_post_chat', get_the_ID() ) );
	
	$laread_post_chat_info = $opts->getOption( 'laread_post_chat_info', get_the_ID() );
	$laread_post_chat_bg = $opts->getOption( 'laread_post_chat_bg', get_the_ID() );
	
	$laread_post_chats  = preg_split("/((\r?\n)|(\r\n?))/", $laread_post_chat); // line by line

 ?>


<div id="post-<?php the_ID(); ?>"  class="container-fluid post-default" <?php post_class(); ?>>
	<div class="container-medium">
		<div class="row post-items">
			<?php if ($laread_post_chats[0]): ?>

			<div class="post-item-banner">
				<?php if ($laread_post_chat_bg): ?>
				
				<style type="text/css">
				.in-chat ul li.me span:last-child:after { border-color: transparent <?php echo $laread_post_chat_bg; ?>; }
				.in-chat ul li.you span:last-child:after { border-color: transparent <?php echo $laread_post_chat_bg; ?>; }
				</style>	
				<?php endif ?>
				
				<div class="in-chat clearfix" style="<?php echo ($laread_post_chat_bg) ? 'background-color:'.$laread_post_chat_bg : ''; ?>">
								<ul>
								<?php 
							$count = 0;
							foreach( $laread_post_chats as $k=>$line): ?>
							   
							
							<li class="<?php echo (++$count%2 ? "me" : "you") ?>">
								<div class="chat-row">
									<span><?php  echo $line; ?></span>
								</div>
							</li>

							<?php endforeach;  ?>	
					</ul>
					<span class="last-send"><i class="fa fa-clock-o"></i> <?php echo $laread_post_chat_info; ?></span>
				</div>

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
						
						<?php the_excerpt(); ?>
						<!-- <a href="#" class="more">[...]</a> -->

					</div>

					<?php fn_laread_medium_sidebar_post_footer(); ?>

				</div>
			</div>
		</div>
	</div>
</div>