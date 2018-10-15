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

<div id="post-<?php the_ID(); ?>"  class="row post-medium" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
				<div class="row">
					<div class="medium-date">
						<div class="medium-date-day"><?php echo $day_event; ?></div>
						<div class="medium-date-month"><?php echo $other_date; ?></div>
					</div>
				</div>

			</div>
			<div class="col-md-7">
				<?php fn_laread_post_content_medium(); ?>
			</div>
		</div>
</div>



