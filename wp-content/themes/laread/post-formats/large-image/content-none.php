<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Evmet laread
 */

get_header(); ?>

<section class="post-fluid">
			<div class="container-fluid">
				<div class="row laread-404">
					<div class="icon-box">
						<span class="icon-404"><i class="fa fa-unlink"></i></span>
					</div>
					<div class="info-404">
						<h2><?php _e( 'Nothing Found', 'laread' ); ?></h2>
						<p class="text-404">
							<?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'laread' ); ?>
						</p>

						<form  method="get" action="<?php echo laread_HOME; ?>">
							<div class="form-group archive-search">
								<input type="search" name="s" class="form-control" value="<?php echo get_search_query() ?>" placeholder="<?php echo esc_html__( 'Search', 'laread' ); ?>...">
								<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
							</div>
						</form>
						<a href="<?php echo laread_HOME; ?>" class="btn btn-golden"><?php echo esc_html__( 'HOME PAGE', 'laread' ); ?></a>
						<a href="javascript:javascript:history.go(-1)" class="btn btn-grey btn-outline"><?php echo esc_html__( 'PREVIOUS PAGE', 'laread' ); ?></a>
					</div>
				</div>
			</div>
		</section>

<?php get_footer(); ?>

