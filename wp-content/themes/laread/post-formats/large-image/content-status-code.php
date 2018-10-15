<?php
/**
 * @package Evmet laread
 */
?>
<?php 
	$opts = TitanFramework::getInstance( 'laread' );
	$code = $opts->getOption( 'laread_code_format', get_the_ID() ); 
?>

<div class="container-fluid">
	<div class="container">
		<div class="row post-items">
			<div class="post-item-banner">
			<?php if ($code): ?>
				
				<div class="in-code">
					<pre class="prettyprint lang-css"><?php echo $code; ?></pre>
				</div>
				<?php endif ?>
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