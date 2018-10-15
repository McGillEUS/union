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

<div id="post-<?php the_ID(); ?>"  class="container-fluid" <?php post_class(); ?>>
	<div class="container">
		<div class="row post-items">

		<?php if ($laread_post_chats[0]): ?>

			<div class="post-item-banner">
				<?php if ($laread_post_chat_bg): ?>
				
				<style type="text/css">
				.in-chat ul li.me span:last-child:after { border-color: transparent <?php echo esc_attr($laread_post_chat_bg); ?>; }
				.in-chat ul li.you span:last-child:after { border-color: transparent <?php echo esc_attr($laread_post_chat_bg); ?>; }
				</style>	
				<?php endif ?>
				
				<div class="in-chat clearfix" style="<?php echo ($laread_post_chat_bg) ? 'background-color:'.esc_attr($laread_post_chat_bg) : ''; ?>">
								<ul>
								<?php 
							$count = 0;
							foreach( $laread_post_chats as $k=>$line): ?>
							   
							
							<li class="<?php echo (++$count%2 ? "me" : "you") ?>">
								<div class="chat-row">
									<span><?php  echo esc_attr($line); ?></span>
								</div>
							</li>

							<?php endforeach;  ?>	
					</ul>
					<span class="last-send"><i class="fa fa-clock-o"></i> <?php echo esc_attr($laread_post_chat_info); ?></span>
				</div>

			</div>
			<?php endif ?>
			<div class="col-md-2">
				<?php fn_laread_post_date(); ?>
			</div>
			<div class="col-md-10">
				<?php fn_laread_post_footer(); ?>
			</div>
		</div>
	</div>
</div>