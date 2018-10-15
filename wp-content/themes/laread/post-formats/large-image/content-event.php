<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	
	$opts = TitanFramework::getInstance( 'laread' );
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

<div class="container-fluid">
				<div class="container">
					<div class="row post-items">
					<?php 
					$custome_style = '';
					if (has_post_thumbnail())
						{
							 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
							 $custome_style = 'style="background-size:cover;background-image: url('.$image[0].'); background-position: center center;"';
						}
					?>
						<div class="post-item-banner in-event" <?php echo $custome_style; ?>>
							<div class="block-overlay">
								<div class="event-box clearfix">
									<div class="event-date">
										<span class="date-day"><?php echo esc_attr($day_event); ?></span>
										<span class="date-month"><?php echo esc_attr($other_date); ?></span>
									</div>
									<div class="event-detail">
										<h5><?php echo esc_attr($laread_post_event_title); ?></h5>
										<h6><?php echo esc_attr($laread_post_event_adress); ?></h6>
										<span><?php echo esc_html__('Event','laread'); ?><i></i></span>
										
										<?php if ($laread_post_event[0]): ?>
										<ul>
										<?php foreach ($laread_post_event as $k => $v): list($fist_event, $last_event) = explode('&',trim($v)); ?>
											
											<li><span class="event-list-date"><?php echo esc_attr($fist_event); ?></span><span class="event-list-detail"><?php echo esc_attr($last_event); ?></span></li>

										<?php endforeach ?>
											
										</ul>

										<?php endif ?>

										<a target="_blank" href="<?php echo esc_url($laread_post_event_link); ?>" class="event-more"><?php echo esc_html__('GET DIRECTIONS','laread'); ?> &#8594;</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<?php fn_laread_post_date(); ?>
						</div>
						<div class="col-md-10">
							<?php fn_laread_post_footer(); ?>
						</div>
					</div>
				</div>
			</div>