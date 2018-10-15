<?php 
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
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>
<section class="post-fluid">
			<div class="container-fluid">
				<div class="row laread-author-detail">
					<div class="author-picture">
						<?php 
							echo get_avatar( $curauth->user_email, '216' ); 
						?>
					</div>
					<div class="author-subdetail">
						<h2><?php echo esc_html($curauth->display_name); ?></h2>
						<p class="info-small"><?php echo esc_html($curauth->jobs); ?> </p>
						<p class="author-bio"><?php echo esc_html($curauth->description); ?></p>
						<p class="info-small">
							<span><i class="fa fa-map-marker"></i> <?php echo esc_html($curauth->adress); ?></span>
							<span><i class="fa fa-paper-plane"></i> <?php echo esc_html($curauth->publish_posts); ?> 
							<?php $post_ =  wp_count_posts(); echo esc_html($post_->publish); ?> <?php echo esc_html__( 'Posts', 'laread' ); ?></span>
							
							<?php if ($curauth->twitter): ?>
								<a href="<?php echo esc_url($curauth->twitter); ?>"><i class="fa fa-twitter"></i></a>	
							<?php endif ?>

							<?php if ($curauth->facebook): ?>
								<a href="<?php echo esc_url($curauth->facebook); ?>"><i class="fa fa-facebook"></i></a>	
							<?php endif ?>
							
						</p>
					</div>
				</div>

				<div class="row author-article-list">
					<div class="article-list-box">
						<div class="article-type clearfix" role="tablist">
							<ul>
								<li role="presentation" class="active">
									<a href="#lastest" id="lastest-tab" role="tab" data-toggle="tab" aria-controls="lastest" aria-expanded="true"><?php echo esc_html__('LATEST.','laread'); ?></a>
								</li>
								<li role="presentation">
									<a href="#popular" role="tab" id="popular-tab" data-toggle="tab" aria-controls="popular"><?php echo esc_html__('POPULAR.','laread'); ?></a>
								</li>
							</ul>
						</div>
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="lastest" aria-labelledBy="lastest-tab">
								<ul class="article-list">

								 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						      
						      		<?php $comments_count = wp_count_comments(get_the_ID()); ?>
						    		<li>
										<div class="media clearfix">
											<div class="media-right"><a href="<?php the_permalink() ?>" class="article-number hidden-xs"><?php echo esc_attr(get_the_date('d')); ?></a></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
												<p><?php the_excerpt(); ?></p>
												<div class="article-info"><span class="visible-xs-inline"><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?></span><a href="#"><?php the_category('&#32;&#32;&#32;&#8226;&#32;&#32;&#32;');?></a><?php if ($comments_count->approved): ?><a href="<?php comments_link(); ?>"><?php echo $comments_count->approved; ?> <?php echo esc_html__( 'Comments', 'laread' ); ?></a><?php endif ?>

									</div>
											</div>
										</div>
									</li>

						    <?php endwhile; else: ?>
						        <li><p><?php echo esc_html__('No posts by this author.','laread'); ?></p></li>

						    <?php endif; ?>

									
								</ul>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="popular" aria-labelledBy="popular-tab">

							<?php 

								$featured_args = array(
			                      'posts_per_page' => 5 ,
			                      'orderby' => 'comment_count',
			                      'order' => 'DESC',
			                      'ignore_sticky_posts' => 1,
			                      'author' => $curauth->ID
			                    );
			                  $featured_query = new WP_Query($featured_args);

                   			?>
								<ul class="article-list">
									<?php if($featured_query->have_posts()) : 
									while($featured_query->have_posts()) : $featured_query->the_post(); ?>
									<?php $comments_count = wp_count_comments(get_the_ID()); ?>
									<li>
										<div class="media clearfix">
											<div class="media-right"><a href="<?php the_permalink() ?>" class="article-number hidden-xs"><?php echo esc_attr(get_the_date('d')); ?></a></div>
											<div class="media-body">
												<h4 class="media-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
												<p><?php the_excerpt(); ?></p>
												<div class="article-info"><span class="visible-xs-inline"><?php echo esc_attr(get_the_date('d')); ?> <?php echo esc_attr(get_the_date('F')); ?></span><a href="#"><?php the_category('&#32;&#38;&#32;');?></a><?php if ($comments_count->approved): ?>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;<a href="<?php comments_link(); ?>"><?php echo $comments_count->approved; ?> <?php echo esc_html__( 'Comments', 'laread' ); ?></a>
												<?php endif ?></div>
											</div>
										</div>
									</li>

								<?php endwhile; else: ?>
									<li><p><?php echo esc_html__('No posts by this author.','laread'); ?></p></li>
								<?php endif; ?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


<?php get_footer(); ?>