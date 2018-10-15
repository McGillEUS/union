<?php
/* Template Name: Archives */ 
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Evmet laread
 */

get_header(); ?>



<section class="post-fluid">
			<div class="container-fluid">
				<div class="row archive-banner">
					<h1 class="archive-h1"><?php the_title(); ?></h1>
					<div class="lead about-lead">
						<p class=""><?php the_content(); ?></p>
					</div>
					<form  method="get" action="<?php echo laread_HOME; ?>">
						<div class="form-group archive-search">
							<input type="search" name="s" class="form-control" placeholder="<?php echo esc_html__( 'In case youre lost, just search...', 'laread' ); ?>">
							<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</div>

				<div class="row author-article-list">
					<div class="article-list-box">
						<div class="article-type clearfix">
							<ul class="with-line">
								<li role="presentation" class="active">
									<a href="#lastest" id="lastest-tab" role="tab" data-toggle="tab" aria-controls="lastest" aria-expanded="true"><?php echo esc_html__( 'LATEST', 'laread' ); ?></a>
								</li>
								<li>
									<a data-toggle="collapse" data-parent="#accordion" href="#category-sub" aria-expanded="false" aria-controls="category-sub" id="category-tab"><?php echo esc_html__( 'CATEGORY', 'laread' ); ?></a>
								</li>
								<li>
									<a data-toggle="collapse" data-parent="#accordion" href="#author-sub" aria-expanded="false" aria-controls="author-sub" id="author-tab"><?php echo esc_html__( 'AUTHOR', 'laread' ); ?></a>
								</li>
								<li>
									<a data-toggle="collapse" data-parent="#accordion" href="#month-year-sub" aria-expanded="false" aria-controls="month-year-sub" id="month-year-tab"><?php echo esc_html__( 'MONTH/YEAR', 'laread' ); ?></a>
								</li>
							</ul>
						</div>

						<div id="category-sub" class="tab-sub-content collapse">
							<div class="row">
								<?php 
								 		$args = array (
							              'echo' => 0,
							              'show_count' => 1,
							              'title_li' => '',
							              'depth' => 1 ,
							              'orderby' => 'count' ,
							              'order' => 'DESC' 
							              ); 
								 		 $variable = wp_list_categories($args);
								 		 $variable = str_replace ( "(" , "<span> (", $variable );
    									$variable = str_replace ( ")" , ") </span>", $variable );
							    ?>
								<ul class="category-sub">
									<?php echo $variable;  ?>
								</ul>
							</div>
						</div>

						<div id="author-sub" class="tab-sub-content collapse">
							<div class="row">
								<ul class="author-sub">
									<?php $author = wp_list_authors(); ?> 
									<?php echo esc_html($author); ?>
								</ul>
							</div>
						</div>

						<div id="month-year-sub" class="tab-sub-content collapse">
							<div class="row">
								<div role="tabpanel">
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane in active" id="tab-2014">
											<ul class="category-sub category-archive clearfix">
											<?php $args = array(
														'type'            => 'monthly',
														'limit'           => '',
														'format'          => 'html', 
														'before'          => '',
														'after'           => '',
														'show_post_count' => false,
														'echo'            => 1,
														'order'           => 'DESC'
													);
													wp_get_archives( $args ); ?>

													<li><hr></li>
													<?php $args = array(
														'type'            => 'yearly',
														'limit'           => '',
														'format'          => 'html', 
														'before'          => '',
														'after'           => '',
														'show_post_count' => false,
														'echo'            => 1,
														'order'           => 'DESC'
													);
													wp_get_archives( $args ); ?>
											</ul>

											
										</div>
									</div>
									
								</div>
							</div>
						</div>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="lastest" aria-labelledBy="lastest-tab">
								
									<?php 

								$featured_args = array(
			                      'order' => 'DESC',
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
												<div class="article-info"><span class="visible-xs-inline"><?php echo esc_attr(get_the_date('F')); ?>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;</span><a href="#"><?php the_category('&#32;&#32;&#32;&#8226;&#32;&#32;&#32;');?></a><?php if ($comments_count->approved): ?>
												&#32;&#32;&#32;&#8226;&#32;&#32;&#32;<a href="<?php comments_link(); ?>"><?php echo $comments_count->approved; ?> <?php echo esc_html__( 'Comments', 'laread' ); ?></a>
												<?php endif ?></div>
											</div>
										</div>
									</li>

								<?php endwhile; else: ?>
									<li><p><?php echo esc_html__('No posts.','laread'); ?></p></li>
								<?php endif; ?>
									
								</ul>

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


<?php get_footer(); ?>
