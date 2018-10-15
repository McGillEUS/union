<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Evmet laread
 */
?>

	<?php
	
		laread_footer();
	?>
</div>

	<?php 
		// include quick read feature html
	 	include laread_PATH.'/core/quickread-tag.php';
	 ?>

	<?php  

		wp_footer();

		// get the footer custom script
		laread_footer_script();
	?>

</body>
</html>
