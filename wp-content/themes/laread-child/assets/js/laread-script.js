(function($) {
	"use strict";

	 (function(d, s, id) {  var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/tr_TR/sdk.js#xfbml=1&version=v2.3";  fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));


	document.addEventListener('DOMContentLoaded', function() {
		var i = prettyPrint();
	});

	if(navigator.userAgent.match(/Trident.*rv:11\./)) {
		$('body').addClass('ie11');
	}


	function mediumResize() {
		if (window.innerWidth > 768) {
			$(".post-medium .col-md-7").each(function(){

				var heightMost;
				//var heightCurrent	= $(this).outerHeight();
				var heightPrev	 	= $(this).prev('.col-md-5').outerHeight();

				//if(heightCurrent > heightPrev){
				//	heightMost = heightCurrent;
				//} else {
					heightMost = heightPrev;
				//}

				$(this).prev('.col-md-5').children('.row').css('height', heightMost);
				$(this).children('.post-item').css('height', heightMost);
			});
		}
	}

	$(window).load(function() {
		$(".page-loader div").delay(0).fadeOut("fast");
		$(".page-loader").delay(250).fadeOut("fast");

		mediumResize();
	});
	$(window).on('resize', function() {
		mediumResize();
	});
	$(document).ready(function(){


		// Widget Search Replace
		if ( $('.laread-right .search-form').length ) {
			$('.laread-right .search-form').each(function(index, el) {
				$(this).find('input.search-submit').replaceWith('<button type="submit" class="btn btn-link"><i class="fa fa-search"></i></button>');
				$(this).find('input.search-field').addClass('form-control');
			});
		}
		// evo - gallery
		var canvasHeight = $('.canvas').outerHeight();
		$('.navmenu').height(canvasHeight);

		// evo
		$(document).ready(function($) {
		    $('li.cat-item a').after('<i class="line"></i>');
		}); 
		
		$('.gallery-laread').find('a > img').each(function(index, el) {
			
			if ( !$(this).closest('a').attr("data-gallery-item")   )
			{
				$(this).closest('a').attr({
					'data-fluidbox': 'data-fluidbox'
				}).addClass('cboxElement');	
			}
			

		});
		
		$('a[data-fluidbox]').colorbox({
			width: '86%',
			height: '86%',
			close: '',
		});

		var $container = $('.masonry');
		$container.imagesLoaded(function() {
			$container.masonry({
				itemSelector: '.masonry-row'
			});
		});
		var i = prettyPrint();
		$('iframe').ready(function() {
			$container.masonry();
		});

		$('.fb-post').each(function( index ) {
			$(this).attr("data-width", $(this).parent().width());
		});

		window.fbAsyncInit = function() {
			FB.XFBML.parse(null, function() {
				$container.masonry();
				mediumResize();
			});
		};




		$container.on('click', '.open-comments', function(e) {
			var commentid = $(this).data('comments-id');
			$('#comments-' + commentid).toggleClass('is-expand');
			$container.masonry();
			e.preventDefault();
		});
		

		$('#month-year-tab').on('click', function(e){
			$('.tab-sub-content.in').collapse('hide');
			$('.article-type li').removeClass('active');
			$(this).parent('li').addClass('active');
		});

		$('#category-tab').on('click', function(e){
			$('.tab-sub-content.in').collapse('hide');
			$('.article-type li').removeClass('active');
			$(this).parent('li').addClass('active');
		});

		$('#author-tab').on('click', function(e){
			$('.tab-sub-content.in').collapse('hide');
			$('.article-type li').removeClass('active');
			$(this).parent('li').addClass('active');
		});

		$('#lastest-tab').on('click', function(e){
			$('.tab-sub-content.in').collapse('hide');
		});


		// Gallery Lazy Load
			var cHeight = 0;
			$('div[data-ride=carousel]').on('slide.bs.carousel', function (e) {
				var $activeItem = null;
				var $nextImage = null;

				$activeItem = $('.active.item', this);

				if (e.direction == 'left'){
					$nextImage = $activeItem.next('.item').find('img');
				} else {
					if ($activeItem.index() == 0){
						$nextImage = $('img:last', $activeItem.parent());
					} else {
						$nextImage = $activeItem.prev('.item').find('img');
					}
				}

				// prevents the slide decrease in height
				if (cHeight == 0) {
				   cHeight = $(this).height();
				   $activeItem.next('.item').height(cHeight);
				}

				// prevents the loaded image if it is already loaded
				var src = $nextImage.data('lazy-load-src');
				
				if (typeof src !== "undefined" && src != "") {
				   $nextImage.attr('src', src)
				   $nextImage.data('lazy-load-src', '');
				}
			});
		// END Gallery Lazy Load

		$(document).on('click', 'a[data-gallery-item]', function(e) {

			var gitem = $(this).data('gallery-item');
			var gid = '#' + gitem + ' a';
			var gcontainer = '#blueimp-' + gitem;
			blueimp.Gallery($(gid), {
				container: gcontainer,
				startSlideshow: true,
				onclose: function () {
					if(screenfull.isFullscreen){
						screenfull.exit();
					}
				},
			});
			e.preventDefault();
		});



		// Ajax Gallery Twice
		$(document).on('click','a.more-down-v3',function(e) { 
			e.preventDefault();


			// Footer Band
			$.get(laread.ajax_url + '?action=laread_ajax_callback&mode=' + 'get_gallery_mode_2_footer', { page_number: pageNum, offset: offset }, function(posts){

 				if($(posts).length) {

 					$('.post-fluid').after($(posts));
 				} 

 			})
			.fail(function (jqXHR) {
				
				// Log error
				console.log(jqXHR);
				
				return false;
			});


			var wrapper = $('.isotopeContainer'), 
 							pageNum = 1,
 							offset = wrapper.find(' > div').length;

 			$.get(laread.ajax_url + '?action=laread_ajax_callback&mode=' + 'get_gallery_mode_3', { page_number: pageNum, offset: offset }, function(posts){

 				if($(posts).length) {

 					console.log( wrapper );
 					wrapper.append($(posts));
					
					$isotoper.isotope( 'reloadItems' ).isotope();
					
					setTimeout(function () {
						console.log('Trigger galleryIsotoper v3');
						$('#filters .unfilter').trigger('click');

						initPopOver();
					}, 500);



 				} else {
 					$('#more-down-v3').remove();
 				}

 			})
			.fail(function (jqXHR) {
				
				// Log error
				console.log(jqXHR);
				
				return false;
			});
		});

		// Ajax Gallery Twice
		$(document).on('click','a.more-down-twice',function(e) { 
			e.preventDefault();


			// Footer Band
			$.get(laread.ajax_url + '?action=laread_ajax_callback&mode=' + 'get_gallery_mode_2_footer', { page_number: pageNum, offset: offset }, function(posts){

 				if($(posts).length) {

 					$('.post-fluid').after($(posts));
 				} 

 			})
			.fail(function (jqXHR) {
				
				// Log error
				console.log(jqXHR);
				
				return false;
			});


			var wrapper = $('.gallery-twice'), 
 							pageNum = 1,
 							offset = wrapper.find(' > div').length;

 			$.get(laread.ajax_url + '?action=laread_ajax_callback&mode=' + 'get_gallery_mode_2', { page_number: pageNum, offset: offset }, function(posts){

 				if($(posts).length) {

 					wrapper.append($(posts));
					
					$galleryIsotoper.isotope( 'reloadItems' ).isotope();
					
					setTimeout(function () {
						console.log('Trigger galleryIsotoper');
						$('#filters .unfilter').trigger('click');

						initPopOver();
					}, 500);



 				} else {
 					$('#more-down-twice').remove();
 				}

 			})
			.fail(function (jqXHR) {
				
				// Log error
				console.log(jqXHR);
				
				return false;
			});
		});

		// Ajax Gallery
		$(document).on('click','a.more-down-gallery',function(e) { 
			e.preventDefault();

			var wrapper = $('.isotopeGallery'), 
 							pageNum = 1,
 							offset = wrapper.find('> .gallery-item').length;

			console.log('Ajax Gallery = Start offset :' + offset);

 			$.get(laread.ajax_url + '?action=laread_ajax_callback&mode=' + 'get_gallery', { page_number: pageNum, offset: offset }, function(posts){

 				if($(posts).length) {

 					wrapper.append($(posts));
					
					$bigGalleryIsotoper.isotope( 'reloadItems' ).isotope();
					
					setTimeout(function () {
						console.log('Trigger bigGalleryIsotoper');
						$('#filters .unfilter').trigger('click');

						initPopOver();
					}, 500);



 				} else {
 					$('#more-down-gallery').remove();
 				}

 			})
			.fail(function (jqXHR) {
				
				// Log error
				console.log(jqXHR);
				
				return false;
			});
		});

		// Ajax Blog
		$(document).on('click','a.more-down-masonry',function(e) { 
			e.preventDefault();

			var wrapper = $('.isotopeContainer'), 
 							pageNum = 1,
 							offset = wrapper.find('> .masonry-row').length;

			console.log('Ajax Blog = Start');

 			$.get(laread.ajax_url + '?action=laread_ajax_callback&mode=' + 'get_posts', { page_number: pageNum, offset: offset }, function(posts){

 				if($(posts).length) {

 					wrapper.find('> .masonry-row').last().after($(posts));

 					$(".ellipsis-readmore").dotdotdot({
						after: "a.more"
					});
					
 					// $('#products').isotope( 'reloadItems' ).isotope( { sortBy: 'original-order' } );
 					$isotoper.isotope( 'reloadItems' ).isotope();

 					setTimeout(function () {
						console.log('Trigger Masonry');
						$('#filters .unfilter').trigger('click');

						FB.XFBML.parse();
					}, 500);




 					$('.more-down-masonry').blur();
 				} else {
 					$('#more-down').remove();
 				}

 			})
			.fail(function (jqXHR) {
				
				// Log error
				console.log(jqXHR);
				
				return false;
			});
		});
		$(document).on('click','a.quick-read',function(e) { 

			// e.preventDefault();
			var post_id = $( this ).data('postid');

			$.get(laread.ajax_url + '?action=laread_ajax_callback&mode=' + 'get_post_details', 'post_id='+post_id, function(post){


				$(".page-loader div").fadeIn("fast");
				$(".page-loader").fadeIn("fast");
				$('#quick-read').scrollTop(0);

				setTimeout( function() {
					$('#quick-read').show();
					
					$('#gr_title').html(post.post_title);

					$('#gr_content').html(post.post_content);
					
					$('.qr-info').html(post.qr_info);

					$('.qr-comment').attr('href',post.l_comment);

					$('#qr-like').html(post.l_like);

					$('#qr-prev').html(post.previous_post);

					$('#qr-next').html(post.next_post);

					// Post Link
					var popover_html = "<a data-social='facebook' href='"+post.post_link+"'><i class='fa fa-facebook'></i></a><a data-social='twitter' href='"+post.post_link+"'><i class='fa fa-twitter'></i></a>";
					
					if ( $( "#qr-share-popover" ).length )
						$("#qr-share-popover").attr('data-content',popover_html).data('bs.popover').setContent();

					$('body').addClass('no-scroll');

					$(".page-loader div").delay(250).fadeOut("slow");
					$(".page-loader").delay(250).fadeOut("slow");

					// $('.qr-content').find('a > img').each(function(index, el) {
					$('#gr_content').find('a > img').each(function(index, el) {
						console.log( "evrum" );
						if ( !$(this).closest('a').attr("data-gallery-item")   )
						{
							$(this).closest('a').attr({
							'data-fluidbox-qr': 'data-fluidbox-qr'
						}).addClass('cboxElement');	
						}
						

					});

						$(document).on('click', 'a[data-gallery-item]', function(e) {

							var gitem = $(this).data('gallery-item');
							var gid = '#' + gitem + ' a';
							var gcontainer = '#blueimp-' + gitem;
							blueimp.Gallery($(gid), {
								container: gcontainer,
								startSlideshow: true,
								onclose: function () {
									if(screenfull.isFullscreen){
										screenfull.exit();
									}
								},
							});
							e.preventDefault();
						});
					
					$('a[data-fluidbox-qr]').colorbox({
						height: '86%',
						width: '86%',
						close: '',
					});


					$(".carousel").swipe({
						swipeLeft:function(event, direction, distance, duration, fingerCount){
							$('.right').trigger('click');
						},
						swipeRight:function(event, direction, distance, duration, fingerCount) {
							$('.left').trigger('click');
						}
					});

					$("#quick-read").find(".item img").on('click', function() {
						if ($('.right.carousel-control').length > 0) {
							$('.right.carousel-control').trigger('click');
						} else if ($('.masonry-right').length > 0) {
							$('.masonry-right').trigger('click');
						}
					});

					$('.set-fullscreen').on('click', function(e){
						var target = $('html')[0];
						screenfull.toggle(target);
						$(this+' i').toggleClass('fa-compress', 'fa-expand');
						e.preventDefault();
					});
					
					// p unwrap
					$('#quick-read').find('.btn').unwrap();
					$('#quick-read').find('a.prev').unwrap();

					 
				}, 1 );
			
			
			}, 'json')
			.fail(function (jqXHR) {
				
				// Log error
				console.log(jqXHR);
				
				return false;
			});




			e.preventDefault();
		});

		$('.qr-close').on('click', function(e) {
			$('#quick-read').fadeOut('slow');
			$('body').removeClass('no-scroll');
			e.preventDefault();
		});

		$('.qr-search').on('click', function(e) {
			$('.qr-search-form').fadeIn('fast');
			$(this).fadeOut('fast', function() {
				$('.qr-search-close').fadeIn('slow');
				$('.qr-search-form input').focus();

			});
			e.preventDefault();
		});

		$('body.no-scroll').bind("touchmove", {}, function(event){
			event.preventDefault();
		});

		$('.qr-search-close').on('click', function(e) {
			$('.qr-search-form').fadeOut('fast');
			$(this).fadeOut('fast', function() {
				$('.qr-search').fadeIn('slow');
			});
			e.preventDefault();
		});

		$('.qr-change').on('click', function(e) {
			var qrClass = $('#quick-read').attr('class');
			var qrSwitch;

			var dark_logo = $('.qr-logo').data('qd');
			var light_logo = $('.qr-logo').data('ql');

			// evrim
			if (qrClass === 'qr-white-theme') {

				// change logo
				$('.qr-logo').css('background-image', 'url(' + dark_logo + ')');

				qrSwitch = 'qr-black-theme';
				
			} else {

				// change logo
				$('.qr-logo').css('background-image', 'url(' + light_logo + ')');
				qrSwitch = 'qr-white-theme';
			}

			$('#quick-read').removeClass(qrClass).addClass(qrSwitch);
			e.preventDefault();
		});



		$(document).on('click touchstart', '.canvas-overlay', function(){
			$('.remove-navbar').trigger('click');
		});

		$('.push-navbar').on('click', function(e) {

			var navmenuType = $('.push-navbar').data('navbar-type');
			var canvasHeight = $('.canvas').outerHeight();

			$('.navmenu').height(canvasHeight);

			if (navmenuType == 'default') {
				$('body').toggleClass('is-push-bar');
			} else if (navmenuType == 'full') {
				$('body').toggleClass('is-push-bar-full');
				$('.post-title-list > li > div').toggleClass('container');
				$('.push-navbar i').toggleClass('fa-bars');
				$('.push-navbar i').toggleClass('fa-times');
			}
			$('.navmenu').addClass('navmenu-' + navmenuType);
			$postTitleIsotoper.isotope();
			e.stopPropagation();
		});

		$('.remove-navbar').on('click', function() {
			$('body').removeClass('is-push-bar');
			$('body').removeClass('is-push-bar-full');
			$('.navmenu').removeClass('navmenu-default');
			$('.navmenu').removeClass('navmenu-full');
			$('.navmenu').height(0);
		});

		if (window.innerWidth > 1024){
			$('.post-medium-vertical .container-fluid, .large-image-v1:not(.article-intro) .container-fluid, .post-striped .post-fluid .container-fluid, .post-mediums > .post-medium').addClass("visible").viewportChecker({
				// classToAdd: 'visible animated fadeInUp',
				// ALEX EDIT removed the line above this one, added .visible class immediately instead of waiting for user to scroll down, removed .nopacity class
				// visible class: sets opacity = 1
				// nopacity class: sets opacity = 0
				// animated class: adds animation effects (see animate.css file)
				// fadeInUp class: makes post fade upward as you scroll down to it
				offset: 50
			});
		}
		// Evi
		initPopOver();

		$('.qr-share, .banner-share, .pis-share, .quotes-share').on('click', function(e) {
			e.preventDefault();
		});

		$(document).on('click', '.popover-content a', function(e){
			$('[data-toggle="popover"]').popover('hide');
			
			console.log($(this).attr('href'));

			if ($(this).attr('href')=='#' ) {
				alert('Burada link yok');
				return false;
			}

			var link = encodeURIComponent($(this).attr('href'));
			var social = $(this).data('social');


			if (social != 'facebook') {
				var redicrect = 'http://twitter.com/share?&url=' + link
			} else {
				var redicrect =  'http://www.facebook.com/sharer.php?u=' + link;
			}

			window.open(redicrect, social + '-share', 'width=550,height=255');

			// window.location = redicrect;

			e.preventDefault();

		});

		$('.banner-search').on('click', function(e) {
			console.log(screen.width);
			if(screen.width > 767){
				$('.navbar-collapse').fadeOut('fast');
			}
			$('.banner-search').fadeOut('fast', function() {
				$('.banner-search-form').fadeIn('fast');
				$('.banner-search-close').fadeIn('slow');
				$('.banner-search-form input').focus();
			});
			e.preventDefault();
		});

		$('.banner-search-close').on('click', function(e) {
			$('.banner-search-form').fadeOut('fast');
			$(this).fadeOut('fast', function() {
				$('.banner-search').fadeIn('slow');
				if(screen.width > 767){
					$('.navbar-collapse').fadeIn('slow');
				}
			});
			e.preventDefault();
		});

		window.scrollTo(window.pageXOffset,window.pageYOffset-1);
		
		$('.menu-collapse').on('click', function(){
			$('.navbar').toggleClass('navbar-open');
		});


			// Hide Header on on scroll down
			var didScroll;


			$(window).scroll(function(event){
			    didScroll = true;
			});

			setInterval(function() {
			    if (didScroll) {
			        hasScrolled();
			        didScroll = false;
			    }
			}, 500);


		$(".item img").on('click', function() {

			if ($('.right.carousel-control').length > 0) {
				$('.right.carousel-control').trigger('click');
			} else if ($('.masonry-right').length > 0) {
				$('.masonry-right').trigger('click');
			}
		});

		/*masonry isotope*/
		var $isotoper = $('.isotopeContainer').isotope({
			itemSelector: '.masonry-row'
		});
		var filterFns = {};

		$('#filters .unfilter').on('click', function(e){
			e.preventDefault();
			$(this).addClass('hide');
			$('#filters a').removeClass('selected');

			var filterValue = '*';
			filterValue = filterFns[filterValue] || filterValue;
			$isotoper.isotope({
				filter: filterValue
			});
			e.stopPropagation();
		});

		$('#filters').on('click', 'a', function(e) {
			var filterValue = $(this).attr('data-filter');
			$('#filters a').removeClass('selected');
			$(this).addClass('selected');
			$('#filters.unfilter').removeClass('hide');

			filterValue = filterFns[filterValue] || filterValue;
			$isotoper.isotope({
				filter: filterValue
			});
			e.preventDefault();
		});
		/*!masonry isotope*/

		/* ALEX EDIT */
		/*main page isotope*/
		var $isotopeMainPage = $('.isotopeMain').isotope({
			itemSelector: '.post-medium',
		});
		var filterFns = {};

		$('#filters .unfilter').on('click', function(e){
			e.preventDefault();
			$(this).addClass('hide');
			$('#filters a').removeClass('selected');

			var filterValue = '*';
			filterValue = filterFns[filterValue] || filterValue;
			$isotopeMainPage.isotope({
				filter: filterValue
			});
			e.stopPropagation();
		});

		$('#filters').on('click', 'a', function(e) {
			var filterValue = $(this).attr('data-filter');
			$('#filters a').removeClass('selected');
			$(this).addClass('selected');
			$('#filters.unfilter').removeClass('hide');

			filterValue = filterFns[filterValue] || filterValue;
			$isotopeMainPage.isotope({
				filter: filterValue
			});
			e.preventDefault();
		});

		/* add filtering effect for category links within page
		$('.in-page-filters').on('click,', 'a', function (e) {
			var filterValue = $(this).attr('data-filter');

			// don't know how to now focus on the #filters area above
			$('#filters a').removeClass('selected');
			$('#filters.filterValue').addClass('selected');  // need to select the tag with the same data-filter
			$('#filters.unfilter').removeClass('hide');

			filterValue = filterFns[filterValue] || filterValue;
			$isotopeMainPage.isotope({
				filter: filterValue
			});
			e.preventDefault();
		}); */

		/*!main page isotope*/
		/* END ALEX EDIT */

		/*big gallery isotope*/
		var $bigGalleryIsotoper = $('.isotopeGallery').isotope({
			itemSelector: '.gallery-item'
		});
		var filterFns = {};

		$('#filters .unfilter').on('click', function(e){
			e.preventDefault();

			$(this).addClass('hide');
			$('#filters a').removeClass('selected');

			var filterValue = '*';
			filterValue = filterFns[filterValue] || filterValue;
			$bigGalleryIsotoper.isotope({
				filter: filterValue
			});


			e.stopPropagation();
		});

		 // layout Isotope after each image loads
		 // Thanks tf/user/marcofama for feedback
		 $('.isotopeGallery').imagesLoaded().progress( function() {
		    $bigGalleryIsotoper.isotope('layout');
		 });  

		$('#filters').on('click', 'a', function(e) {
			var filterValue = $(this).attr('data-filter');
			$('#filters a').removeClass('selected');
			$(this).addClass('selected');
			$('#filters .unfilter').removeClass('hide');

			filterValue = filterFns[filterValue] || filterValue;
			$bigGalleryIsotoper.isotope({
				filter: filterValue
			});
			e.preventDefault();
		});
		/*!big gallery isotope*/

		var $galleryIsotoper = $('.gallery-twice').isotope({
			itemSelector: '.gallery-twice > div'
		});
		$galleryIsotoper.masonry();

		setTimeout(function () {
			// $('#filters .unfilter').trigger('click');
			$('button.remove-navbar').trigger('click');

		}, 500);

		var filterFns = {};

		$('#filters .unfilter').on('click', function(e){
			e.preventDefault();
			$(this).addClass('hide');
			$('#filters a').removeClass('selected');

			var filterValue = '*';
			filterValue = filterFns[filterValue] || filterValue;
			$galleryIsotoper.isotope({
				filter: filterValue
			});

			e.stopPropagation();
		});



		$('#filters').on('click', 'a', function(e) {
			var filterValue = $(this).attr('data-filter');
			filterValue = filterFns[filterValue] || filterValue;
			$galleryIsotoper.isotope({
				filter: filterValue
			});
			e.preventDefault();
		});

		var $postTitleIsotoper = $('.post-title-list').isotope({
			itemSelector: '.post-title-list li',
			position: 'relative',
			hiddenStyle: {
				opacity: 0
			},
			visibleStyle: {
				opacity: 1
			}
		});
		var filterFns = {};


		$('#post-titles .unfilter').on('click', function(e){
			e.preventDefault();
			$(this).addClass('hide');

			$('#post-titles a').removeClass('selected');
			$(this).addClass('selected');


			var filterValue = '*';
			filterValue = filterFns[filterValue] || filterValue;
			$postTitleIsotoper.isotope({
				filter: filterValue
			});


			e.stopPropagation();
		});

		$('#post-titles').on('click', 'a', function(e) {
			var filterValue	= $(this).attr('data-filter');

			$('#post-titles a').removeClass('selected');
			$(this).addClass('selected');
			$('#post-titles .unfilter').removeClass('hide');

			filterValue = filterFns[filterValue] || filterValue;
			$postTitleIsotoper.isotope({
				filter: filterValue
			});
			e.preventDefault();
		});

		$('.main-comment-form .comment-textarea').bind('focus', function() {
			$(this).addClass('on-focus');
			setTimeout(function() {
				$('.at-focus').slideDown('fast');
			}, 150);
		});

		// login and singup modal
		$( "#register-btn" ).on('click', function(){
			$('#register-content').fadeIn('fast');
			$('#login-content').fadeOut('fast');
			var email = $('#login-content #email').val();
			$('#register-content #email').val(email);
		});

		$( "#login-btn" ).on('click', function(){
			$('#login-content').fadeIn('fast');
			$('#register-content').fadeOut('fast');
			var email = $('#register-content #email').val();
			$('#login-content #email').val(email);
		});

		$('.newsletter-bar .form-control').on('focusin', function(){
			$(this).parent().addClass('focusin');
		});
		$('.newsletter-bar .form-control').on('focusout', function(){
			$(this).parent().removeClass('focusin');
		});

		$('.newsletter-bar .form-control').on('keyup', function() {
			var email = $(this).val();

			if(IsEmail(email)){
				$(this).parent().addClass('valid-text');
			} else {
				$(this).parent().removeClass('valid-text');
			}

			return false;
		});

		// for fullscreen
		$('.set-fullscreen').on('click', function(e){
			//var target = $(this).closest('.blueimp-gallery')[0];
			var target = $('html')[0];
			screenfull.toggle(target);
			$(this+' i').toggleClass('fa-compress', 'fa-expand');
			e.preventDefault();
		});

		// ellipsis
		$('.six-lines').ellipsis({ lines: 6 });
		$('.five-lines').ellipsis({ lines: 5 });
		$('.four-lines').ellipsis({ lines: 4 });
		$('.three-lines').ellipsis({ lines: 3 });
		$('.two-lines').ellipsis({ lines: 2 });


		$(".ellipsis-readmore").dotdotdot({
			after: "a.more"
		});


		$('.search-form .form-control').on('focusin', function(){
			$(this).parent().addClass('focusin');
		});
		$('.search-form .form-control').on('focusout', function(){
			$(this).parent().removeClass('focusin');
		});

		$('.newsletter-box').on('mouseover', function(){
			$(this).addClass('on-focus');
			$(this).children('input').attr('placeholder', 'Enter your email address');
		});

		$('.article-list .media-heading').on('hover',
			function(){
				$(this).parent().prev().addClass('hover');
			},

			function(){
				$(this).parent().prev().removeClass('hover');
			}
		);

		$('.play-icon').on('click', function(e){
			e.preventDefault();
			$(this).fadeOut('slow');
			$(this).closest('.gallery-large-item').children('.gallery-info').fadeOut('slow');
			$(this).prev().attr('src', $(this).prev().attr('src') + '&autoplay=1');
		});

		$('.post-like').on('click', function(e){
			e.preventDefault();
			$(this).addClass('active at-focus').delay(2118).queue(function(){
				$(this).removeClass('active').dequeue();
			});
		});

		$(".carousel").swipe({
			swipeLeft:function(event, direction, distance, duration, fingerCount){
				$('.right').trigger('click');
			},
			swipeRight:function(event, direction, distance, duration, fingerCount) {
				$('.left').trigger('click');
			}
		});

		$('.banner-icon.with-background').on('click', function(e){
			$(this).addClass('is-active');
			e.preventDefault();
		});

		// for demo
		var width = screen.width;
		var height = screen.height;
		// console.log(width +' x ' + height);

		$('.masonry-embed').parent().css('z-index', 2)
	});
})(jQuery);


var $ =jQuery.noConflict();
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = 0;
var navi = 0;
jQuery(document).ready(function($){

	
	 navbarHeight = $(":not(.is-push-bar) .navbar:not(.navbar-open)").outerHeight();
	 navi = $(":not(.is-push-bar) .navbar:not(.navbar-open)");
});



function initPopOver(){
	$('.qr-share, .banner-share, .pis-share, .quotes-share').popover({html: true});
}


function IsEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        navi.removeClass('nav-down').addClass('nav-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            navi.removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}