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
						<h2>Ooopps.!</h2>
						<p class="text-404">
							<?php  echo esc_attr__( 'That page cant be found. It looks like nothing was found at this location. Try the search below to find matching pages:', 'laread' ); ?>
						</p>

						<form  method="get" action="<?php echo laread_HOME; ?>">
							<div class="form-group archive-search">
								<input type="search" name="s" class="form-control" placeholder="<?php echo esc_attr__( 'Search', 'laread' ); ?>...">
								<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>
							</div>
						</form>
						<a href="<?php echo laread_HOME; ?>" class="btn btn-golden"><?php echo esc_attr__( 'HOME PAGE', 'laread' ); ?></a>
						<a href="javascript:javascript:history.go(-1)" class="btn btn-grey btn-outline"><?php echo esc_attr__( 'PREVIOUS PAGE', 'laread' ); ?></a>
					</div>
				</div>
			</div>
		</section>

<?php get_footer(); ?>
