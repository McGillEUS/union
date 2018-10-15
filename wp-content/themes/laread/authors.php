<?php /* Template Name: Authors */ 
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Evmet laread
 */
get_header(); ?>

<?php 

$allUsers = get_users('orderby=post_count&order=DESC');
$users = array();
// Remove subscribers from the list as they won't write any articles
foreach($allUsers as $currentUser)
{
	if(!in_array( 'subscriber', $currentUser->roles ))
	{
		$users[] = $currentUser;
	}
}
?>

<div class="container">

	<div class="head-author">
		<h1 class="author-h1"><?php the_title(); ?></h1>
		<p class="lead about-lead"><?php the_content(); ?></p>
	</div>

</div>
		
		<div class="post-fluid">
			<div class="container-fluid">
			<?php foreach ($users as $k => $user): ?>

				<article class="row laread-authors">
					<div class="author-item">
						<div class="author-picture">
							<?php 
								 echo get_avatar( $user->user_email, '270' ); 
							?>
						</div>
						<div class="author-subdetail">
							<h2><a href="<?php echo esc_url( get_author_posts_url( $user->ID ) ); ?>"><?php echo esc_html($user->display_name); ?></a></h2>
							<p class="info-small"><?php echo esc_html($user->jobs); ?>&nbsp;&nbsp;&nbsp;
								<span><i class="fa fa-map-marker"></i> <?php echo esc_html($user->adress); ?></span>
							</p>
							<div class="author-connection">
								<?php if ($user->twitter): ?>
									<a href="<?php echo esc_url($user->twitter); ?>"><i class="fa fa-twitter"></i></a>
								<?php endif ?>

								<?php if ($user->facebook): ?>
									<a href="<?php echo esc_url($user->facebook); ?>"><i class="fa fa-facebook"></i></a>	
								<?php endif ?>
								
								<?php if ($user->user_email): ?>
									<a href="mailto:<?php echo esc_url($user->user_email); ?>"><i class="fa fa-envelope"></i></a>	
								<?php endif ?>
								
							</div>
							<p class="author-bio"><?php echo esc_html($user->description); ?></p>
						</div>
					</div>
				</article>

			<?php endforeach ?>
				
				<div class="row become-author">
					<h5><?php echo esc_html__( 'Become an author', 'laread' ); ?></h5>
					<p><?php echo esc_html__( 'Vivamus nec mauris pulvinar leo dignissim sollicitudin eleifend eget velit. Mauris fermentum fringilla lorem, in rutrum massa.', 'laread' ); ?></p>
					<a href="mailto:<?php echo get_option( 'admin_email' ); ?>"><i class="fa fa-envelope"></i></a>
				</div>

			</div>
		</div>


<?php get_footer(); ?>