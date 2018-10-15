<?php
/**
 * @package Evmet laread
 */
?>

		<?php 

			$post_format = get_post_format(); 
			$custom_format = '';

			$opts = TitanFramework::getInstance( 'laread' );

			$gallery = explode(',' , str_replace(',,' , ',' , get_post_meta(get_the_ID()  , 'buzz_media_gallery' , true)));
			$gallery = array_filter($gallery);
			// Custom format
			if ($post_format == 'status') {
				$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() );
				$custom_format = ($embed_status) ? '-embed' : '';

				// Hot Event
				$hot_event = '';
				$hot_event = $opts->getOption( 'laread_hot_event', get_the_ID() );
				if ($hot_event)
					$custom_format = ($hot_event) ? '-hot-event' : '';

				// Code
				$laread_code_format = '';
				$laread_code_format = $opts->getOption( 'laread_code_format', get_the_ID() );
				if ($laread_code_format)
					$custom_format = ($laread_code_format) ? '-code' : '';

			}

			// Event Format
				if ( empty($post_format) ) {
					
					$event_title = '';
					$event_title = $opts->getOption( 'laread_post_event_title', get_the_ID() );

					if (trim($event_title))
						$custom_format = 'event';

				}


			$embed_status = $opts->getOption( 'laread_embed_status', get_the_ID() ); 
			$post_video = $opts->getOption( 'laread_embed_video', get_the_ID() );


		?>

		<?php if ($custom_format == 'event'): ?>

			<?php 
			$laread_post_event_title = $opts->getOption( 'laread_post_event_title', get_the_ID() );
			$laread_post_event_adress = $opts->getOption( 'laread_post_event_adress', get_the_ID() );
			$laread_post_event_link = $opts->getOption( 'laread_post_event_link', get_the_ID() );
			$laread_post_event = $opts->getOption( 'laread_post_event', get_the_ID() );
			$laread_post_event_date = $opts->getOption( 'laread_post_event_date', get_the_ID() );

			$day_events = explode(' ', $laread_post_event_date);
			$day_event = $day_events[0];
			unset($day_events[0]);
			$other_date = implode(' ',$day_events);

			$laread_post_event  = preg_split("/((\r?\n)|(\r\n?))/", $laread_post_event); // line by line

			?>
				<?php if ($laread_post_event[0] && $laread_post_event_title): ?>

			<div class="post-item-banner in-event">
							<?php if (has_post_thumbnail()): 
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
												?> 
												<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
											<?php endif ?>
							<div class="block-overlay">
								<div class="event-box clearfix">
									<div class="event-date">
										<span class="date-day"><?php echo $day_event; ?></span>
										<span class="date-month"><?php echo $other_date; ?></span>
									</div>
									<div class="event-detail">
										<h5><?php echo $laread_post_event_title; ?></h5>
										<h6><?php echo $laread_post_event_adress; ?></h6>
										<span><?php echo __('Event','laread'); ?><i></i></span>
										
										<?php if ($laread_post_event[0]): ?>
										<ul>
										<?php foreach ($laread_post_event as $k => $v): list($fist_event, $last_event) = explode('&',trim($v)); ?>
											
											<li><span class="event-list-date"><?php echo $fist_event; ?></span><span class="event-list-detail"><?php echo $last_event; ?></span></li>

										<?php endforeach ?>
											
										</ul>

										<?php endif ?>

										<a target="_blank" href="<?php echo $laread_post_event_link; ?>" class="event-more"><?php echo __('GET DIRECTIONS','laread'); ?> &#8594;</a>
									</div>
								</div>
							</div>
						</div>
			<?php endif ?>
		<?php endif ?>


		<?php if ($post_format == 'chat'): ?>

			<?php 
			$laread_post_chat = trim ($opts->getOption( 'laread_post_chat', get_the_ID() ) );
			$laread_post_chat_info = $opts->getOption( 'laread_post_chat_info', get_the_ID() );
			$laread_post_chat_bg = $opts->getOption( 'laread_post_chat_bg', get_the_ID() );
			$laread_post_chats  = preg_split("/((\r?\n)|(\r\n?))/", $laread_post_chat); // line by line

			?>
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
		<?php endif ?>


		<?php if ($post_format == 'audio' && $embed_status): ?>
			<div class="post-item-banner embed-responsive embed-responsive-16by9">
					<?php echo $embed_status; ?>
				</div>
		<?php endif ?>
	

	

	<?php if ( $post_format.$custom_format == 'status-hot-event' && $hot_event): ?>
		<?php $categorys = get_the_category(); ?>
			<div class="in-hotnews">
										<?php if (has_post_thumbnail()): 
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

										if ($image[0]):
										?> 
									
										<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
										
									<?php endif ?>
									<?php endif ?>
									<div class="block-overlay">
										<div class="overlay-hotnews">
											<div class="important-post">
												<span class="icon-bookmark">
													<i class="fa fa-star"></i>
												</span>
											</div>
											<a class="hotnews-link" href="<?php the_permalink(); ?>">
												<i class="fa fa-bug"></i>
												<span class="hotnews-title"><?php echo $hot_event; ?></span>
												<span class="clearfix"></span>

												<?php if ($categorys): ?>
													<?php foreach ($categorys as $category): ?>	
														<span class="hotnews-category"><?php echo esc_html( $category->name ); ?></span>
													<?php endforeach ?>
												<?php endif ?>

												
											</a>
										</div>
									</div>
								</div>
		<?php endif ?>

		<?php if ( $post_format.$custom_format == 'status-code' && $laread_code_format): ?>
				<div class="post-item-banner">
			<?php if ($laread_code_format): ?>
				
				<div class="in-code">
					<pre class="prettyprint lang-css"><?php echo $laread_code_format; ?></pre>
				</div>
				<?php endif ?>
			</div>
		<?php endif ?>

		
		<?php if ($post_format == 'video' && $post_video): ?>
			<div class="post-item-banner embed-responsive embed-responsive-16by9">
				<?php echo $post_video; ?>
			</div>
		<?php endif ?>

		


		<?php if ($post_format == 'image'): ?>
			<?php if (has_post_thumbnail()): ?>
				<div class="post-item-banner">
					<?php if (has_post_thumbnail()): 
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
												?> 
												<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
											<?php endif ?>
				</div>
			<?php endif ?>
		<?php endif ?>

		<?php if ($post_format == 'gallery' && count($gallery)): ?>
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

					<?php endif ?>
			</div>
		<?php endif ?>
		


		<?php 
		$post_link = $opts->getOption( 'laread_post_link', get_the_ID() );
		$laread_post_link_title = $opts->getOption( 'laread_post_link_title', get_the_ID() );
		if ($post_format == 'link' && $post_link):  ?>
			<div class="in-link">
				<?php if (has_post_thumbnail()): 
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
												?> 
												<img src="<?php echo esc_url($image[0]); ?>" alt="<?php the_title(); ?>" /> 
											<?php endif ?>
				<div class="block-overlay">
					<div class="overlay-link">
						<i class="fa fa-link fa-rotate-90"></i>
						<a href="<?php echo $post_link; ?>"><?php echo $post_link; ?></a>
						<span class="link-text"><?php echo $laread_post_link_title; ?></span>
					</div>
				</div>
			</div>
		<?php endif ?>


		<?php if ($post_format == 'quote'): $author_name = $opts->getOption( 'laread_author_name', get_the_ID() ); ?>

			<?php 
			// Fetch post content
			$content = get_post_field( 'post_content', get_the_ID() );

			// Get content parts
			$content_parts = get_extended( $content );
			$custome_class = 'no-bg-image';
			// Output part before <!--more--> tag
			
 ?>
			<div class="in-quote">
						
						<?php if (has_post_thumbnail()): $custome_class = ''; ?> 
				 			<?php the_post_thumbnail(); ?> 
				 		<?php endif ?>

						<div class="block-overlay <?php echo $custome_class; ?>">
							<div class="overlay-quote">
								<span class="quote-icon">&#8220;</span>
								<a href="#" class="spot"><?php echo $content_parts['main']; ?></a>
								<span class="name">- <?php echo $author_name; ?></span>
							</div>
						</div>
					</div>
					
		<?php endif ?>

	

	<div class="col-md-2">

			<?php fn_laread_post_date(); ?>
	</div>


	<div class="col-md-10">

	<?php if ($post_format == 'aside'): ?>

			<?php 
			// Fetch post content
			$content = get_post_field( 'post_content', get_the_ID() );

			// Get content parts
			$content_parts = get_extended( $content );

 			?>
			<div class="post-item">
					<?php 
					$custome_style = '';
					$custome_class = 'no-bg-image';
					if (has_post_thumbnail())
						{
							 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
							 $custome_style = 'style="background-size:cover;background-image: url('.$image[0].'); background-position: center center;"';
							 $custome_class = '';
						}
					?>
					<div class="in-aside <?php echo $custome_class; ?>" <?php echo $custome_style; ?>>
						
						<div class="block-overlay">
							
							<div class="overlay-aside">
								<span class="aside">
									<?php echo $content_parts['main']; ?>
								</span>
							</div>

						</div>
					</div>
					
				</div>

		<?php endif ?>

		<?php if ($post_format == 'status' && !$hot_event && !$custom_format): ?>

			<?php 
			// Fetch post content
			$content = get_post_field( 'post_content', get_the_ID() );

			// Get content parts
			$content_parts = get_extended( $content );

 			?>
			<div class="post-item">

					<?php 
					$custome_style = '';
					$custome_class = 'no-bg-image';
					if (has_post_thumbnail())
						{
							 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
							 $custome_style = 'style="background-size:cover;background-image: url('.$image[0].'); background-position: center center;"';
							 $custome_class = '';
						}
					?>
					<div class="in-hashtags <?php echo $custome_class; ?>" <?php echo $custome_style; ?>>
						<div class="block-overlay">
							
							<div class="overlay-hashtags">
							<span class="hastag"><?php the_title(); ?></span>
							<span class="link-text"><?php echo $content_parts['main']; ?></span>
							</div>

						</div>
					</div>
					
				</div>
				
		<?php endif ?>


		<div class="post-item post-item-detail">

		<?php if ( $post_format.$custom_format == 'status-embed' && $embed_status): ?>
				<div class="post-embed-inline">
					<?php echo $embed_status; ?>
				</div>
		<?php endif ?>

			<div class="post-item-paragraph">
				<?php if (has_excerpt()): ?>
						<p><?php echo the_excerpt(); ?></p>	
					<?php endif ?>
					<?php the_content(); ?>

					<div class="pagelink"><?php wp_link_pages('pagelink=Page %'); ?></div>
			</div>
				<div class="post-item-info no-border clearfix">
					<p class="post-tags">
						<?php 
							$tags = wp_get_post_tags(get_the_ID()); 
						?>
						<?php foreach ($tags as $k => $v): ?>
						<a href="<?php echo get_tag_link($v->term_id); ?>"><?php echo $v->name; ?></a>	
						<?php endforeach ?>
					</p>
					<div class="post-item-social">
						
						<a href="#" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="top" data-content="<a data-social='facebook' href='<?php the_permalink(); ?>'><i class='fa fa-facebook'></i></a><a data-social='twitter'  href='<?php the_permalink(); ?>'><i class='fa fa-twitter'></i></a>" class="pis-share"><i class="fa fa-share-alt"></i></a>

						<?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
					</div>
				</div>

		</div>

			<div class="next-prev-post clearfix">

				<?php 
				fn_laread_post_nav(); ?>
			</div>
			<div class="author-box ">
			<?php $a_link =  esc_url( get_author_posts_url( get_the_author_meta("ID") ) ); 	
							  $author = get_the_author();  ?>
				<div class="author">
					<a class="author-photo" href="<?php echo $a_link; ?>">	
						<?php echo get_avatar( get_the_author_meta("user_email"), '70' ); ?>
					</a>
					<div class="author-body">
						
						<h4 class="author-name"><?php echo $author; ?></h4>
						<a href="<?php echo $a_link; ?>">view all post</a>
					</div>
					<div class="author-connection">
						<?php if (get_the_author_meta("twitter")): ?>
									<a href="<?php echo get_the_author_meta("twitter"); ?>"><i class="fa fa-twitter"></i></a>
								<?php endif ?>

						<?php if (get_the_author_meta("facebook")): ?>
							<a href="<?php echo get_the_author_meta("facebook"); ?>"><i class="fa fa-facebook"></i></a>	
						<?php endif ?>
						
						<?php if (get_the_author_meta("user_email")): ?>
							<a href="mailto:<?php echo get_the_author_meta("user_email"); ?>"><i class="fa fa-envelope"></i></a>	
						<?php endif ?>
					</div>
				</div>
			</div>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						 comments_template();
					endif;
				?>

	</div>