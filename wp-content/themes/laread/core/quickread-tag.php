<div id="quick-read" class="qr-white-theme">
	<div class="quick-read-head">
		<div class="container">
			
			 <?php
                         $titan = TitanFramework::getInstance( 'laread' );
                            $laread_qr_l_logo = $titan->getOption( 'laread_qr_l_logo' );
                            $laread_qr_d_logo = $titan->getOption( 'laread_qr_d_logo' );
                            
                            if ($laread_qr_l_logo) {
                                $laread_qr_l_logo = wp_get_attachment_image_src( $laread_qr_l_logo );
                                $laread_qr_l_logo = $laread_qr_l_logo[0];
                            } else {

                                 $laread_qr_l_logo = laread_URL.'/assets/img/logo-black-qr.png';
                            }

                            if ($laread_qr_d_logo) {
                                $laread_qr_d_logo = wp_get_attachment_image_src( $laread_qr_d_logo );
                                $laread_qr_d_logo = $laread_qr_d_logo[0];
                            } else {

                                 $laread_qr_d_logo = laread_URL.'/assets/img/logo-white-qr.png';
                            }

                ?>

			<a href="<?php echo get_home_url(); ?>" style="background-image: url(<?php echo $laread_qr_d_logo; ?>);" class="qr-logo" data-ql="<?php echo $laread_qr_d_logo; ?>" data-qd="<?php echo $laread_qr_l_logo; ?>"></a>

			<div class="qr-tops">
				<a href="#" class="qr-search-close"><i class="fa fa-times"></i></a>
				<a href="#" class="qr-search"><i class="fa fa-search"></i></a>
				<a href="#" class="qr-change"><i class="fa fa-adjust"></i></a>
				<a href="#" class="qr-close"><i class="fa fa-times"></i></a>
			</div>
			<form class="qr-search-form" method="get" action="<?php echo laread_HOME; ?>">
				<input type="text" name="s" placeholder="Search laread">
			</form>
		</div>
	</div>
	<div class="quick-dialog">
		<div class="quick-body">
			<div class="container">
				<div class="col-md-8 col-md-offset-2">
					<div class="qr-content post-item-paragraph">

						<article>
							<h2 id="gr_title"></h2>

							<div id="gr_content"></div>
						</article>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="quick-read-bottom">
		<p class="qr-info">By <a href="#">Daniele Zedda</a>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;18 February</p>
		<div class="qr-nav">
			
			<span id="qr-prev"> <a href="#" class="qr-prev">&#8592; PREV POST</a></span>

			<a href="#" class="qr-share" id="qr-share-popover" tabindex="0" role="button" data-toggle="popover" data-placement="top" data-trigger="focus" data-content=""><i class="fa fa-share-alt"></i></a>
			
			
			<a href="#" class="qr-comment"><i class="fa fa-comment"></i></a>
			<?php if( function_exists('zilla_likes') ):  ?>
				<span id="qr-like"><a href="#" class=""><i class="fa fa-heart"></i> 34</a></span>
			<?php else: ?>
				<span id="qr-like"></span>
			<?php endif; ?>
			

			 <span id="qr-next"><a href="#" class="qr-next">NEXT POST &#8594;</a></span>
		</div>
	</div>
	<div class="quick-read-bottom qr-bottom-2 hide">
		<div class="qr-nav">
			<a href="#" class="qr-prev">&#8592; PREV POST</a>
			<p class="qr-info">By <a href="#">Daniele Zedda</a>&#32;&#32;&#32;&#8226;&#32;&#32;&#32;18 February</p>
			<a href="#" class="qr-next">NEXT POST &#8594;</a>
			<a href="#" class="qr-like"><i class="fa fa-heart"></i> 34</a>
			<div class="qr-sharebox">
				<span>Share on</span>
				<a href='#' class="ql_social_link"><i class='fa fa-facebook'></i></a>
				<a href='#' class="ql_social_link"><i class='fa fa-twitter'></i></a>
			</div>
		</div>
	</div>
</div>