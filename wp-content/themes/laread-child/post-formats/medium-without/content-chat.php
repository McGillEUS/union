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

	$categorys = get_the_category();
 ?>


<div id="post-<?php the_ID(); ?>"  class="row post-medium <?php if ($categorys): ?><?php foreach ($categorys as $l => $v): ?><?php echo $v->slug; ?><?php endforeach ?><?php endif ?>" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
				<?php if ($laread_post_chats[0]): ?>
						<div class="post-item-banner">
							<?php if ($laread_post_chat_bg): ?>
							
							<style type="text/css">
							.in-chat ul li.me span:last-child:after { border-color: transparent <?php echo $laread_post_chat_bg; ?>; }
							.in-chat ul li.you span:last-child:after { border-color: transparent <?php echo $laread_post_chat_bg; ?>; }
							</style>	
							<?php endif ?>
							
							<div class="in-chat medium-chat clearfix" style="<?php echo ($laread_post_chat_bg) ? 'background-color:'.$laread_post_chat_bg : ''; ?>">
											<ul>
											<?php 
										$count = 0;
										foreach( $laread_post_chats as $k=>$line): ?>
										   
										
										<li class="<?php echo (++$count%2 ? "me" : "you") ?>">
											<div class="chat-row">
												<span><?php  echo $line; ?></span>
											</div>
										</li>

										<?php

										if ($count > 2) break;
										 endforeach;  ?>	
								</ul>
								<span class="last-send"><i class="fa fa-clock-o"></i> <?php echo $laread_post_chat_info; ?></span>
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