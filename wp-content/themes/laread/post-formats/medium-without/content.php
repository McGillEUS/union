<?php
/**
 * @package Evmet laread
 */
?>
<div id="post-<?php the_ID(); ?>"  class="row post-medium" <?php post_class(); ?>>
		<div class="row post-items">
			<div class="col-md-5">
				<?php fn_laread_post_date_medium(); ?>
			</div>
			<div class="col-md-7">
				<?php fn_laread_post_content_medium(); ?>
			</div>
		</div>
</div>