var menuscroll,
		skroller;
(function ($, window, _) {
	'use strict';
    
	var $doc = $(document),
			win = $(window);
	
	var SITE = SITE || {};
	
	SITE = {
		init: function() {
			var self = this,
					obj;
			
			for (obj in self) {
				if ( self.hasOwnProperty(obj)) {
					var _method =  self[obj];
					if ( _method.selector !== undefined && _method.init !== undefined ) {
						if ( $(_method.selector).length > 0 ) {
							_method.init();
						}
					}
				}
			}
		},
		header: {
			selector: '.header',
			init: function() {
				var base = this,
					container = $(base.selector),
					h = container.outerHeight(),
					menu = container.find('#full-menu'),
					title = container.find('#page-title'),
					logo = container.find('.logoimg'),
					logoFixed = container.find('.logofixed'),
					social_btn = container.find('#social_header'),
					social_icons = social_btn.find('>div'),
					search_btn = container.find('#search_icon'),
					searchform = container.find('.searchform');
				
				/* Logo Change */
				var logoChange = new TimelineLite({ paused: true });
				
				/* Header Resize */
				var resizeHeader = _.debounce(function(){
					if (win.width() > 1024) {
						if (win.scrollTop() > 0) {
							$('.header_container').height(container.outerHeight());
							container.addClass('fixed');
							if ($('.single-post').length && win.scrollTop() < (h + 100)) {
								logoChange.timeScale(1).pause().reverse();
							} else if ($('.single-post').length) {
								logoChange.timeScale(1).pause().play();
							}
						} else {
							container.removeClass('fixed');
							$('.header_container').css('height','auto'); 
							if ($('.single-post').length) {
								logoChange.timeScale(1).pause().reverse();
							}
						}
					} else {
						logoChange.timeScale(1).pause().reverse();
						$('.header_container').css('height','auto'); 
					}
					
				}, 10);
				if (container.hasClass('style2')) {
					logoChange
						.add(TweenMax.to(menu, 0.25, {height:0, onStart: function() { menu.css('overflow', 'hidden'); title.css('display', 'none');}, onComplete: function() { title.css('display', 'inline-block'); menu.css('display', 'none'); }, onReverseComplete: function() { menu.css('overflow', 'visible'); title.css('display', 'none'); menu.css('display', 'inline-block');}}),"children")
						.add(TweenMax.from(title, 0.25, {autoAlpha:1}),"children");
				} else {
					logoChange
						.add(TweenMax.to(logo, 0.25, {autoAlpha:0, onComplete: function() { logo.css('display', 'none'); title.css('display', 'block'); resizeHeader(); },onReverseComplete: function() { logo.css('display', 'inline-block'); title.css('display', 'none'); resizeHeader(); } }))
						.add(TweenMax.to(menu, 0.25, {height:0, onStart: function() { menu.css('overflow', 'hidden'); }, onReverseComplete: function() { menu.css('overflow', 'visible');}}),"children")
						.add(TweenMax.from(title, 0.25, {autoAlpha:0}),"children")
						.add(TweenMax.from(logoFixed, 0.25, {autoAlpha:0}),"children");
				}
				
				win.scroll(resizeHeader).trigger('scroll');
				
				/* Search Animation */
				search_btn.on('click', function(e) {
					if (event.target.id === 'search_icon') {
						$('#quick_search').toggleClass('active');
					}
					e.stopImmediatePropagation();
					e.stopPropagation();
					return false;
				});
				/* Social Animation */
				TweenLite.set(social_icons, {'display': 'none'});
				social_btn.on('click', function(e) {
					var toggle = $(this).data('toggle'),
							r = $('.social-holder', container),
							w = r.width();
					
					if (toggle) {
						TweenMax.to(social_icons, 0.5, { autoAlpha:0, ease: Quart.easeOut, onComplete: function() { social_icons.hide(); } });
						$(this).removeData('toggle');
					} else {
						TweenMax.to(social_icons, 0.5, { autoAlpha:1, ease: Quart.easeOut, onStart: function() { searchform.hide(); social_icons.show(); } });
						$(this).data('toggle', 'on');
					}
				});
			}
		},
		responsiveNav: {
			selector: '#wrapper',
			init: function() {
				var base = this,
					container = $(base.selector),
					toggle = $('.mobile-toggle', '.header'),
					cc = $('.click-capture', '#content-container'),
					target = $('#mobile-menu'),
					parents = target.find('.thb-mobile-menu>li>a'),
					span = target.find('.thb-mobile-menu>li>span');
				
				toggle.on('click', function() {
					container.toggleClass('open-menu');
					return false;
				});
				
				cc.add(target.find('.close')).on('click', function() {
					container.removeClass('open-menu');
					parents.find('.sub-menu').hide();
					
					return false;
				});
				
				span.on('click', function(){
						var that = $(this),
								link = that.prev('a');
						
						parents.filter('.active').not(link).removeClass('active').parent('li').find('.sub-menu').slideUp();
						

						if (link.hasClass('active')) {
							link.removeClass('active').parent('li').find('.sub-menu').slideUp('200', function() {
								setTimeout(function () {
									window.menuscroll.refresh();
								}, 10);
							});
						} else {
							link.addClass('active').parent('li').find('.sub-menu').slideDown('200', function() {
								setTimeout(function () {
									window.menuscroll.refresh();
								}, 10);
							});
						}
						
						return false;
				});
				
			}
		},
		categoryMenu: {
			selector: '#full-menu',
			init: function() {
				var base = this,
					container = $(base.selector),
					children = container.find('.menu-item-has-children');
							 
				children.each(function() {
					var _this = $(this),
						menu = _this.find('>.sub-menu,>.thb_mega_menu_holder'),
						tabs = _this.find('.thb_mega_menu li'),
						contents = _this.find('.category-children>.row');
					
					tabs.first().addClass('active');	
					_this.hoverIntent(
						function() {
							TweenLite.to(menu, 0.5, {autoAlpha: 1, ease: Quart.easeOut, onStart: function() { menu.css('display', 'block'); }});
						},
						function() {
							TweenLite.to(menu, 0.5, {autoAlpha: 0, ease: Quart.easeOut, onComplete: function() { menu.css('display', 'none'); }});
						}
					);
					tabs.on('hover', function() {
						var _li = $(this),
							n = _li.index();
						tabs.removeClass('active');
						_li.addClass('active');
						contents.hide();
						contents.filter(':nth-child('+(n+1)+')').show();
					});
				});
				
				var resizeMegaMenu = _.debounce(function(){
					var parent = $('.header.style2').length ? $('.header_top') : container;
					children.find('.thb_mega_menu_holder').width(parent.outerWidth());
				}, 30);
				win.resize(resizeMegaMenu).trigger('resize');
			}
		},
		fullHeightContent: {
			selector: '.full-height-content',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				base.control(container);
				
				win.resize(_.debounce(function(){
					base.control(container);
				}, 50));
				
			},
			control: function(container) {
				var h = $('.header'),
						a = $('#wpadminbar'),
						ah = (a ? a.outerHeight() : 0);

				container.each(function() {
					var _this = $(this),
						height = win.height() - h.outerHeight() - ah;
						
					_this.css('min-height',height);
					
				});
			}
		},
		carousel: {
			selector: '.slick',
			init: function(el) {
				var base = this,
					container = el ? el : $(base.selector);
				
				container.each(function() {
					var that = $(this),
						columns = that.data('columns'),
						navigation = (that.data('navigation') === true ? true : false),
						autoplay = (that.data('autoplay') === false ? false : true),
						pagination = (that.data('pagination') === true ? true : false),
						center = (that.data('center') ? that.data('center') : false),
						infinite = (that.data('infinite') ? that.data('infinite') : true),
						vertical = (that.data('vertical') ? that.data('vertical') : false),
						asNavFor = that.data('asnavfor'),
						rtl = $('body').hasClass('rtl');
					
					var args = {
						dots: pagination,
						arrows: navigation,
						infinite: infinite,
						speed: 1000,
						centerMode: center,
						slidesToShow: columns,
						slidesToScroll: 1,
						rtl: rtl,
						autoplay: autoplay,
						centerPadding: '50px',
						autoplaySpeed: 4000,
						pauseOnHover: true,
						vertical: vertical,
						verticalSwiping: vertical,
						accessibility: false,
						focusOnSelect: true,
						prevArrow: '<button type="button" class="slick-nav slick-prev"><i class="fa fa-angle-left"></i></button>',
						nextArrow: '<button type="button" class="slick-nav slick-next"><i class="fa fa-angle-right"></i></button>',
						responsive: [
							{
								breakpoint: 1025,
								settings: {
									slidesToShow: (columns < 3 ? columns : 3),
									centerPadding: '40px'
								}
							},
							{
								breakpoint: 780,
								settings: {
									slidesToShow: (columns < 2 ? columns : 2),
									centerPadding: '30px'
								}
							},
							{
								breakpoint: 640,
								settings: {
									slidesToShow: 1,
									centerPadding: '15px'
								}
							}
						]
					};
					if (asNavFor && $(asNavFor).is(':visible')) {
						args.asNavFor = asNavFor;	
					}
					if (that.hasClass('product-images') || that.data('fade')) {
						args.fade = true;
					}
					if (vertical) {
						that.on('init', function() {
							$.fn.matchHeight._update();
						});
					}
					that.slick(args);
					
				});
			}
		},
		masonry: {
			selector: '.masonry',
			init: function() {
				var base = this,
				container = $(base.selector);
								
				container.each(function() {
					var that = $(this),
						el = that.children('.item'),
						org = [],
						page = 1;
					
					TweenLite.set(el, {opacity: 0, y:100});
					that.imagesLoaded(function() {
						that.isotope({
							itemSelector : '.item',
							transitionDuration : 0,
							masonry: {
								columnWidth: '.grid-sizer'
							}
						}).isotope( 'once', 'layoutComplete', function(i,l) {
							org = _.map(l, 'element');
						});
						that.isotope('layout');
						win.scroll(_.debounce(function(){
							if (that.is(':in-viewport')) {
								TweenMax.staggerTo(org, 1, { y: 0, opacity:1, ease: Quart.easeOut}, 0.25);
							}
						}, 50)).trigger('scroll');

					});
				});
			}
		},
		commentToggle: {
			selector: '#comment-button',
			init: function() {
				var base = this,
					container = $(base.selector),
					list = container.next('.commentlist_container');
				
				container.on('click', function() {
					if (container.hasClass('toggled')) {
						container.removeClass("toggled");
						list.slideUp(200, function() {
							$.fn.matchHeight._update();
						});
					} else {
						container.addClass("toggled");
						list.slideDown(200, function() {
							$.fn.matchHeight._update();
						});
					}
					return false;
				});
			},
			open: function() {
				var base = this,
					container = $(base.selector),
					list = container.next('.commentlist_container');
					
				container.addClass("toggled");
				list.slideDown(200);
			}
		},
		shareArticleDetail: {
			selector: '.share-article, .share-article-loop',
			init: function() {
				var base = this,
					container = $(base.selector),
					social = container.find('.social');
				
				social.data('pin-no-hover', true);
				social.on('click', function() {
					var left = (screen.width/2)-(640/2),
							top = (screen.height/2)-(440/2)-100;
					window.open($(this).attr('href'), 'mywin', 'left='+left+',top='+top+',width=640,height=440,toolbar=0');
					return false;
				});
				container.find('.comment').on('click', function() {
					var comments = $(this).parents('.post-detail-row').find('#comments');
					if (comments.length) {
							var ah = $('#wpadminbar').outerHeight(),
									pos = comments.offset().top - 100 - ah;
						
						TweenMax.to(window, win.height() / 500, {
							scrollTo:{y:pos}, 
							ease:Quart.easeOut, 
							onComplete: function() {
								SITE.commentToggle.open();
								SITE.fixedPosition.init();
							}	
						});
						return false;
					} else {
						window.location = $(this).attr('href');
						return false;	
					}
				});
			}
		},
		skrollr: {
			selector: 'body',
			init: function() {
				var main = $('div[role="main"]');
				
				if (main.find('.parallax_bg').length > 0) {
					main.waitForImages(function() {
						window.skroller = skrollr.init({
							forceHeight: false,
							easing: 'outCubic',
							mobileCheck: function() {
								return false;
							}
						});
					});
				}
			}
		},
		custom_scroll: {
			selector: '.custom_scroll',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.each(function() {
					var _this = $(this);
					
					var newScroll = new IScroll('#'+_this.attr('id'), {
						scrollbars: true,
						mouseWheel: true,
						click: true,
						interactiveScrollbars: true,
						shrinkScrollbars: 'scale',
						fadeScrollbars: true
					});
					if (_this.attr('id') === 'menu-scroll') {
						window.menuscroll = newScroll;	
					}
					_this.on('touchmove', function (e) { e.preventDefault(); });
				});		 
				
			}
		},
		magnificImage: {
			selector: '[rel="mfp"], [rel="magnific"], .wp-caption a',
			init: function() {
				var base = this,
						container = $(base.selector),
						stype;
				
				container.each(function() {
					if ($(this).hasClass('video')) {
						stype = 'iframe';
					} else {
						stype = 'image';
					}
					$(this).magnificPopup({
						type: stype,
						closeOnContentClick: true,
						fixedContentPos: true,
						closeBtnInside: false,
						closeMarkup: '<button title="%title%" class="mfp-close"><span>×</span> '+themeajax.l10n.close+'</button>',
						mainClass: 'mfp',
						removalDelay: 250,
						image: {
							verticalFit: true,
							titleSrc: function(item) {
								return item.el.attr('title');
							}
						}
					});
				});
	
			}
		},
		magnificInline: {
			selector: '[rel="inline"]',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.each(function() {
					var eclass = ($(this).data('class') ? $(this).data('class') : '');

					$(this).magnificPopup({
						type:'inline',
						midClick: true,
						mainClass: 'mfp ' + eclass,
						removalDelay: 250,
						alignTop: true,
						closeBtnInside: true,
						closeMarkup: '<button title="%title%" class="mfp-close"><span>×</span> '+themeajax.l10n.close+'</button>'
					});
				});
	
			}
		},
		magnificGallery: {
			selector: '[rel="gallery"]',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.each(function() {
					$(this).magnificPopup({
						delegate: 'a',
						type: 'image',
						closeOnContentClick: true,
						fixedContentPos: true,
						mainClass: 'mfp',
						removalDelay: 250,
						closeBtnInside: false,
						overflowY: 'scroll',
						closeMarkup: '<button title="%title%" class="mfp-close"><span>×</span> '+themeajax.l10n.close+'</button>',
						gallery: {
							enabled: true,
							navigateByImgClick: false,
							preload: [0,1] // Will preload 0 - before current, and 1 after the current image
						},
						image: {
							verticalFit: false,
							titleSrc: function(item) {
								return item.el.attr('title');
							}
						}
					});
				});
				
			}
		},
		lightboxGallery: {
			selector: '.gallery-link',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.each(function() {
					var _this = $(this),
						eclass = ($(this).data('class') ? $(this).data('class') : ''),
						items = [],
						target = $( _this.attr('href') );
						
					target.find('.post-gallery-content').each(function() {
						items.push({
							src: $(this) 
						});
					});
					
					_this.on('click', function() {
						$.magnificPopup.open({
							midClick: true,
							mainClass: 'mfp ' + eclass,
							alignTop: true,
							closeBtnInside: true,
							items: items,
							gallery: {
								enabled: true
							},
							closeMarkup: '<button title="%title%" class="mfp-close"></button>',
							callbacks: {
								open: function() {
									$(".lightbox-close").on('click',function(){
										$.magnificPopup.instance.close();
										return false;           
									});
									$(".arrow.prev").on('click',function(){
										$.magnificPopup.instance.prev();
										return false;           
									});
									
									$(".arrow.next").on('click',function(){
										$.magnificPopup.instance.next();
										return false;
									});
								},
								close: function() {
									$(".arrow.prev").off('click');
									
									$(".arrow.next").off('click');
								}
							}
						});
						return false;
					});
					
				});
	
			}
		},
		overlay: {
			selector: '.panr',
			init: function(el) {
				var base = this,
					container = $(base.selector),
					target = el ? el.find(base.selector) : container;

				target.each(function() {
					var _this = $(this),
							img = _this.find('img');
					
					img.panr({ moveTarget: _this, scaleDuration: 1, sensitivity: 20, scaleTo: 1.1, panDuration: 2 });
				});
			}
		},
		atvImg: {
			selector: '.atvImg',
			init: function() {
				var base = this,
						container = $(base.selector);

				atvImg();
			}
		},
		articleScroll: {
			selector: '#infinite-article',
			org_post_url: window.location.href,
			org_post_title: document.title,
			init: function() {
				var base = this,
						container = $(base.selector),
						on = container.data('infinite'),
						org = container.find('.post-detail:first-child'),
						id = org.data('id'),
						tempid = id,
						footer = $('#footer').outerHeight() + $('#subfooter').outerHeight();
					
				var scrollLocation = _.debounce(function(){
						base.location_change();
					}, 20);
					
				var scrollAjax = _.debounce(function(){
					if (win.scrollTop() >= ($doc.height() - win.height() - footer - 200)) {
						container.addClass('thb-loading');
		
						if (id === tempid) {
							$.ajax( themeajax.url, {
								method : 'POST',
								data : {
									action : 'thb_infinite_ajax',
									post_id : tempid
								},
								beforeSend: function() {
									id = null;
								},
								success : function(data) {
									var d = $.parseHTML(data),
											ads = $(d).find('.adsbygoogle');
									container.removeClass('thb-loading');
									
									if (d) {
										id = $(d).find('.post-detail').data('id');
										tempid = id;
										
										$(d).appendTo(container).hide().imagesLoaded(function() {
											$(d).show();
											SITE.carousel.init($(d).find('.slick'));
											SITE.equalHeights.init($(d).find('[data-equal]'));
											SITE.fixedPosition.init($(d).find('.fixed-me'));
											SITE.skrollr.init();
											SITE.shareArticleDetail.init();
											SITE.lightboxGallery.init();
											SITE.selectionShare.init();
											SITE.animation.init();
										});
										
										if (typeof window.addthis !== 'undefined') {
											addthis.toolbox();	
										}
										if (typeof window.atnt !== 'undefined') {
											window.atnt();
										}
										if (typeof window.adsbygoogle !== 'undefined' && ads.length) {
											ads.each(function() {
												(adsbygoogle = window.adsbygoogle || []).push({});
											});
										}
										if (typeof (FB) !== 'undefined') {
											FB.init({ status: true, cookie: true, xfbml: true });
										}
										$(document.body).trigger('thb_after_infinite_load');
									} else {
										id = null;	
									}
								}
							});
						}
					}
				}, 50);
				
				if (on === 'on') {
					win.scroll(scrollLocation);
					win.scroll(scrollAjax);
				} else {
					win.scroll(_.debounce(function(){
							base.borderWidth($('.post-detail-row').offset().top, $('.post-detail-row').outerHeight(true));
					}, 10));
				}
			},
			location_change: function() {
				var base = this,
						container = $(base.selector);
					
				var windowTop           = win.scrollTop(),
						windowBottom        = windowTop + win.height(),
						windowSize          = windowBottom - windowTop,
						setsInView          = [],
						pageChangeThreshold = 0.5,
						post_title,
						post_url;
					
				$('.post-detail-row').each( function() {
					var _row = $(this),
							post = _row.find('.post-detail'),
							id				= post.data( 'id' ),
							setTop			= _row.offset().top,
							setHeight		= _row.outerHeight(true),
							setBottom		= 0,
							tmp_post_url	= post.data('url'),
							tmp_post_title	= post.find('.post-title h1').text();
					
					// Determine position of bottom of set by adding its height to the scroll position of its top.
					setBottom = setTop + setHeight;
					
					if ( setTop < windowTop && setBottom > windowBottom ) { // top of set is above window, bottom is below
						setsInView.push({'id': id, 'top': setTop, 'bottom': setBottom, 'post_url': tmp_post_url, 'post_title': tmp_post_title, 'alength' : setHeight });
					}
					else if( setTop > windowTop && setTop < windowBottom ) { // top of set is between top (gt) and bottom (lt)
						setsInView.push({'id': id, 'top': setTop, 'bottom': setBottom, 'post_url': tmp_post_url, 'post_title': tmp_post_title, 'alength' : setHeight });
					}
					else if( setBottom > windowTop && setBottom < windowBottom ) { // bottom of set is between top (gt) and bottom (lt)
						setsInView.push({'id': id, 'top': setTop, 'bottom': setBottom, 'post_url': tmp_post_url, 'post_title': tmp_post_title, 'alength' : setHeight });
					}
				});
				
				// Parse number of sets found in view in an attempt to update the URL to match the set that comprises the majority of the window
				if ( 0 === setsInView.length ) {
					post_url = base.org_post_url;
					post_title = base.org_post_title;
				} else if ( 1 === setsInView.length ) {
					var setData = setsInView.pop();
					
					post_url = setData.post_url;
					post_title = setData.post_title;
					
					base.borderWidth(setData.top, setData.alength);
				} else {
					post_url = setsInView[0].post_url;
					post_title = setsInView[0].post_title;
					base.borderWidth(setsInView[0].top, setsInView[0].alength);
				}
				
				base.updateURL(post_url, post_title);
			},
			updateURL : function(post_url, post_title) {
				if( window.location.href !== post_url ) {
		
					if ( post_url !== '' ) {
						history.replaceState( null, null, post_url );
						document.title = post_title;
						$('#page-title').html(post_title);
					}
					this.updateGA(post_url);
				}
			},
			updateGA: function(post_url) {
				if( typeof _gaq !== 'undefined' ) {
					_gaq.push(['_trackPageview', post_url]);
				} else if ( typeof ga !== 'undefined' ) {
					var reg = /.+?\:\/\/.+?(\/.+?)(?:#|\?|$)/,
							pathname = reg.exec( post_url )[1];
							
					ga('send', 'pageview', pathname );
				}
				if ( typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined' ) {
					reinvigorate.ajax_track(post_url);
				}
				if ( typeof googletag !== 'undefined' ) {
					googletag.pubads().refresh();	
				}
			},
			borderWidth : function(top, setHeight) {
				var windowTop = win.scrollTop(),
						perc = (windowTop - top + ($('.header.fixed').outerHeight() + $('#wpadminbar').outerHeight())) / setHeight;

				$('.progress', '.header').css({ width: perc*100 + '%' });
			}
		},
		videoPlaylist: {
			selector: '.video_playlist',
			init: function() {
				var base = this,
				container = $(base.selector);
								
				container.each(function() {
					var _this = $(this),
							video_area = _this.find('.video-side'),
							links = _this.find('.video_play');
					
					links.on('click', function() {
						var _that = $(this),
								url = _that.data('video-url'),
								id = _that.data('post-id');
								
						if (_that.hasClass('video-active')) {
							return false;	
						}
						_this.find('.video_play').removeClass('video-active');
						_this.find('.video_play[data-video-url="'+url+'"]').addClass('video-active');
						video_area.addClass('thb-loading');
						
						$.post( themeajax.url, {
							action: 'thb-parse-embed',
							post_ID: id,
							shortcode : '[embed]'+url+'[/embed]'
						}, function(d){
							if (d.success) {
								video_area.html(d.data.body);
							}
							video_area.removeClass('thb-loading');
						});
						return false;
					});
				});
			}
		},
		postGridAjaxify: {
			selector: '.ajaxify-pagination',
			init: function() {
				var base = this,
						container = $(base.selector),
						_this = container;
				
				// Initialized
				_this.data('initialized', true);
				// Prepare our Variables
				var History = window.History,
						document = window.document;
			
				// Check to see if History.js is enabled for our Browser
				if ( !History.enabled ) { 
					return false; 
				}

				var contentNode = _this.get(0),
						/* Application Generic Variables */
						$body = $(document.body),
						rootUrl = History.getRootUrl();
		
				// Ensure Content
				if ( _this.length === 0 ) { _this = $body; }
		
				// HTML Helper
				var documentHtml = function(html){
					// Prepare
					// replaces doctype, html head body tags with div
					var result = String(html).replace(/<\!DOCTYPE[^>]*>/i, '')
												.replace(/<(html|head|body|title|script)([\s\>])/gi,'<div id="document-$1"$2')
												.replace(/<\/(html|head|body|title|script)\>/gi,'</div>');
					// Return
					return result;
				};
		
				// Ajaxify Helper
				$.fn.ajaxify = _.debounce(function(){
					// Prepare
					var $_this = $(this);
					
					// Ajaxify
					$_this.find('.page-numbers').on('click',function(e){

						// Prepare
						var $_this	= $(this),
								url = $_this.attr('href'),
								title = $_this.attr('title') || null;
		
						// Continue as normal for cmd clicks etc
						if ( e.which === 2 || e.metaKey ) { return true; }
		
						// Ajaxify this link
						History.pushState(null,title,url);
						e.preventDefault();
						return false;
					});
					// Chain
					return $_this;
				}, 50);
		
				// Ajaxify our Internal Links
				_this.ajaxify();
				
				// Hook into State Changes
				$(window).bind('statechange',function(){
					// Prepare Variables
					var State = History.getState(),
							url = State.url,
							relativeUrl = url.replace(rootUrl,''),
							a = $('#wpadminbar'),
							ah = (a ? a.outerHeight() : 0);
							
					// Start Fade Out
					// Animating to opacity to 0 still keeps the element's height intact
					// Which prevents that annoying pop bang issue when loading in new content
					// Let's add some cool animation here
		
					_this.addClass('thb-loading');
					jQuery('html, body').animate({
						scrollTop: _this.offset().top - ah - 30
					}, 800);
		
		
					// Ajax Request the Traditional Page
					$.ajax({
						url: url,
						success: function(data, textStatus, jqXHR){
							// Prepare
							var $data = $(documentHtml(data)),
									$dataBody = $data.find(base.selector),
									contentHtml = $dataBody.html() || $data.html();

							if ( !contentHtml ) {
								document.location.href = url;
								return false;
							}
							// Update the content
							_this.stop(true,true);
							_this.html(contentHtml)
									.ajaxify()
									.animate({'opacity': 1}, 500, 'linear', function() {
										_this.removeClass('thb-loading');
										SITE.equalHeights.init();
									}); 
							
							
							// Update the title
							document.title = $data.find('#document-title:first').text();			
		
							// Inform Google Analytics of the change
							if ( typeof window.pageTracker !== 'undefined' ) { 
								window.pageTracker._trackPageview(relativeUrl); 
							}
		
							// Inform ReInvigorate of a state change
							if ( typeof window.reinvigorate !== 'undefined' && typeof window.reinvigorate.ajax_track !== 'undefined' ) {
								reinvigorate.ajax_track(url);// ^ we use the full url here as that is what reinvigorate supports
							}
						},
						error: function(jqXHR, textStatus, errorThrown){
							document.location.href = url;
							return false;
						}
		
					}); // end ajax
		
				}); // end onStateChange
			}
		},
		selectionShare: {
			selector: '.thb-selectionSharer',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				$('.post-content *').thbSelectionSharer();
			}
		},
		writeFirst: {
			selector: '.write_first',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.on('click', function() {
					var pos = $('.woocommerce-tabs').offset().top - $('#wpadminbar').outerHeight() - $('.header_container').outerHeight();
					$('.reviews_tab a').trigger('click');
					TweenMax.to(window, win.height() / 500, {scrollTo:{y:pos}, ease:Quart.easeOut});
					return false;
				});
			}
		},
		contact: {
			selector: '.google_map',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.each(function() {
					var that = $(this),
						mapzoom = that.data('map-zoom'),
						maplat = that.data('map-center-lat'),
						maplong = that.data('map-center-long'),
						pinlatlong = that.data('latlong'),
						pinimage = that.data('pin-image'),
						style = that.data('map-style'),
						mapstyle,
						tw = that.width();
					
					switch(style) {
						case 0:
							break;
						case 1:
							mapstyle = [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","stylers":[{"visibility":"off"}]},{"featureType":"water","stylers":[{"color":"#5f94ff"},{"lightness":26},{"gamma":5.86}]},{},{"featureType":"road.highway","stylers":[{"weight":0.6},{"saturation":-85},{"lightness":61}]},{"featureType":"road"},{},{"featureType":"landscape","stylers":[{"hue":"#0066ff"},{"saturation":74},{"lightness":100}]}];
							break;
						case 2:
							mapstyle = [{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]}];
							break;
						case 3:
							mapstyle = [{"featureType":"poi","stylers":[{"visibility":"off"}]},{"stylers":[{"saturation":-70},{"lightness":37},{"gamma":1.15}]},{"elementType":"labels","stylers":[{"gamma":0.26},{"visibility":"off"}]},{"featureType":"road","stylers":[{"lightness":0},{"saturation":0},{"hue":"#ffffff"},{"gamma":0}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"lightness":50},{"saturation":0},{"hue":"#ffffff"}]},{"featureType":"administrative.province","stylers":[{"visibility":"on"},{"lightness":-50}]},{"featureType":"administrative.province","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"labels.text","stylers":[{"lightness":20}]}];
							break;
						case 4:
							mapstyle = [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}];
							break;
						case 5:
							mapstyle = [{"featureType":"landscape","stylers":[{"hue":"#F1FF00"},{"saturation":-27.4},{"lightness":9.4},{"gamma":1}]},{"featureType":"road.highway","stylers":[{"hue":"#0099FF"},{"saturation":-20},{"lightness":36.4},{"gamma":1}]},{"featureType":"road.arterial","stylers":[{"hue":"#00FF4F"},{"saturation":0},{"lightness":0},{"gamma":1}]},{"featureType":"road.local","stylers":[{"hue":"#FFB300"},{"saturation":-38},{"lightness":11.2},{"gamma":1}]},{"featureType":"water","stylers":[{"hue":"#00B6FF"},{"saturation":4.2},{"lightness":-63.4},{"gamma":1}]},{"featureType":"poi","stylers":[{"hue":"#9FFF00"},{"saturation":0},{"lightness":0},{"gamma":1}]}];
							break;
						case 6:
							mapstyle = [{"stylers":[{"hue":"#2c3e50"},{"saturation":250}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":50},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}];
							break;
						case 7:
							mapstyle = [{"stylers":[{"hue":"#16a085"},{"saturation":0}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"off"}]}];
							break;
						case 8:
							mapstyle = [{"featureType":"all","stylers":[{"hue":"#0000b0"},{"invert_lightness":"true"},{"saturation":-30}]}];
							break;
						case 9:
							mapstyle = [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}];
							break;
						case 10:
							mapstyle = [{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"simplified"},{"color":"#ff6a6a"},{"lightness":"0"}]},{"featureType":"road.highway","elementType":"labels.text","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ff6a6a"},{"lightness":"75"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"lightness":"75"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"transit.line","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.bus","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.rail","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"transit.station.rail","elementType":"labels.icon","stylers":[{"weight":"0.01"},{"hue":"#ff0028"},{"lightness":"0"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"on"},{"color":"#80e4d8"},{"lightness":"25"},{"saturation":"-23"}]}];
							break;
					}
					var centerlatLng = new google.maps.LatLng(maplat,maplong);
					
					var mapOptions = {
						center: centerlatLng,
						styles: mapstyle,
						zoom: mapzoom,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						scrollwheel: false,
						panControl: true,
						zoomControl: true,
						mapTypeControl: false,
						scaleControl: false,
						streetViewControl: false
					};
					
					var map = new google.maps.Map(that[0], mapOptions);
					
					google.maps.event.addListenerOnce(map, 'tilesloaded', function() {
						if(pinimage.length > 0) {
							var pinimageLoad = new Image();
							pinimageLoad.src = pinimage;
							
							$(pinimageLoad).load(function(){
								base.setMarkers(map, pinlatlong, pinimage);
							});
						}
						else {
							base.setMarkers(map, pinlatlong, pinimage);
						}
					});
				});
			},
			setMarkers: function(map, pinlatlong, pinimage) {
				var infoWindows = [];
				
				function showPin (i) {
					var latlong_array = pinlatlong[i].lat_long.split(','),
						marker = new google.maps.Marker({
							position: new google.maps.LatLng(latlong_array[0],latlong_array[1]),
							map: map,
							animation: google.maps.Animation.DROP,
							icon: pinimage,
							optimized: false
						}),
						contentString = '<div class="marker-info-win'+(pinlatlong[i].image ? ' with-image': '')+'">'+
						(pinlatlong[i].image ? '<img src="'+pinlatlong[i].image+'" class="image" />' : '')+
						'<div class="marker-inner-win">'+
						'<h1 class="marker-heading">'+pinlatlong[i].title+'</h1>'+
						'<p>'+pinlatlong[i].information+'</p>'+ 
						'</div></div>';
					
					// info windows 
					var infowindow = new InfoBox({
						alignBottom: true,
						content: contentString,
						disableAutoPan: false,
						maxWidth: 380,
						closeBoxMargin: "10px 10px 10px 10px",
						closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif",
						pixelOffset: new google.maps.Size(-190, -80),
						zIndex: null,
						infoBoxClearance: new google.maps.Size(1, 1)
					});
					infoWindows.push(infowindow);
					
					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							infoWindows[i].open(map, this);
						};
					})(marker, i));
				}
				
				for (var i = 0; i + 1 <= pinlatlong.length; i++) {  
					setTimeout(showPin, i * 250, i);
				}
			}
		},
		equalHeights: {
			selector: '[data-equal]',
			init: function() {
				var base = this,
						container = $(base.selector);
				container.each(function(){
					var that = $(this),
							children = that.data("equal"),
							row = that.data('row-detection') ? that.data('row-detection') : false;
					
					that.find(children).matchHeight({
						byRow: row,
						property: 'min-height'
					});	
					that.waitForImages(function() {
						$.fn.matchHeight._update();
					});
					$.fn.matchHeight._afterUpdate = function(event, groups) {
						$(document.body).trigger("sticky_kit:recalc");
					};
				});
			}
		},
		fixedPosition: {
			selector: '.fixed-me',
			init: function(el) {
				var base = this,
					container = el ? el : $(base.selector),
					a = $('#wpadminbar'),
					ah = (a ? a.outerHeight() : 0);
				
				container.each(function() {
					var _this = $(this),
							style2 = _this.hasClass('style2'),
							off = $('.single-post').length ? (100 + (style2 ? 50 : 0 )) : 140;
					
					_this.after('<div class="sticky-content-spacer"/>');
					_this.stick_in_parent({
						offset_top: off + ah,
						spacer: '.sticky-content-spacer'
					});
						
				});
				
				win.resize(_.debounce(function(){
					$(document.body).trigger("sticky_kit:recalc");
				}, 10));
				win.scroll(_.debounce(function(){
					$(document.body).trigger("sticky_kit:recalc");
				}, 50));
			}
		},
		animation: {
			selector: '.animation',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				base.control(container);
				
				win.scroll(function(){
					base.control(container);
				});
			},
			control: function(element) {
				var t = -1;


				element.filter(':in-viewport').each(function () {
					var that = $(this);
						t++;
					
					setTimeout(function () {
						that.addClass("animate");
					}, 200 * t);
					
				});
			}
		},
		newsletter: {
			selector: '.newsletter-form',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.submit(function() {	
					container.next('.result').load($('body').data('themeurl')+'/inc/subscribe_save.php', {email: container.find('.widget_subscribe').val()},
					function() {
						$(this).fadeIn(200).delay(3000).fadeOut(200);
					});
					return false;
				});
			}
		},
		toTop: {
			selector: '#scroll_totop',
			init: function() {
				var base = this,
					container = $(base.selector);
				
				container.on('click', function(){
					TweenMax.to(window, 1, {scrollTo:{y:0}, ease:Quart.easeOut});
					return false;
				});
				win.scroll(_.debounce(function(){
					base.control();
				}, 50));
			},
			control: function() {
				var base = this,
					container = $(base.selector);
					
				if (($doc.height() - (win.scrollTop() + win.height())) < 300) {
					TweenMax.to(container, 0.2, { autoAlpha:1, ease: Quart.easeOut });
				} else {
					TweenMax.to(container, 0.2, { autoAlpha:0, ease: Quart.easeOut });
				}
			}
		},
		quantity: {
			selector: '.quantity',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				// Quantity buttons
				$( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );
			
				$doc.on( 'click', '.plus, .minus', function() {
			
					// Get values
					var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
						currentVal	= parseFloat( $qty.val() ),
						max			= parseFloat( $qty.attr( 'max' ) ),
						min			= parseFloat( $qty.attr( 'min' ) ),
						step		= $qty.attr( 'step' );
			
					// Format values
					if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) { currentVal = 0; }
					if ( max === '' || max === 'NaN' ) { max = ''; }
					if ( min === '' || min === 'NaN' ) { min = 0; }
					if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) { step = 1; }
			
					// Change the value
					if ( $( this ).is( '.plus' ) ) {
			
						if ( max && ( max === currentVal || currentVal > max ) ) {
							$qty.val( max );
						} else {
							$qty.val( currentVal + parseFloat( step ) );
						}
			
					} else {
			
						if ( min && ( min === currentVal || currentVal < min ) ) {
							$qty.val( min );
						} else if ( currentVal > 0 ) {
							$qty.val( currentVal - parseFloat( step ) );
						}
			
					}
			
					// Trigger change event
					$qty.trigger( 'change' );
			
				});
			}	
		},
		updateCart: {
			selector: '#quick_cart',
			init: function() {
				var base = this,
					container = $(base.selector);
				$('body').bind('added_to_cart', SITE.updateCart.update_cart_dropdown);
			},
			update_cart_dropdown: function(event) {
				if ($('body').hasClass('woocommerce-cart')) {
					location.reload();	
				} else {
					$('#quick_cart').trigger('click');
				}
			}
		},
		shop: {
			selector: '.products .product',
			init: function() {
				var base = this,
						container = $(base.selector);
				
				container.each(function() {
					var that = $(this);
					
					that
					.find('.add_to_cart_button').on('click', function() {
						if ($(this).data('added-text') !== '') {
							$(this).text($(this).data('added-text'));
						}
						
					});
					
				}); // each
	
			}
		},
		variations: {
			selector: '.variations_form input[name=variation_id]',
			init: function() {
				var base = this,
					container = $(base.selector),
					org = $('.single-price.single_variation').html();
				
				container.on('change', function() {
					var that = $(this),
						val = that.val(),
						phtml,
						images = $('#product-images');

					setTimeout(function(){
						if (val) {
							phtml = that.parents('.variations_form').find('.single_variation span.price').html();
						} else {
							phtml = org;	
						}
						$('.price.single_variation').html(phtml);
					}, 100);
					
					if ($('.variations_form').length) {
						var variations = [],
								values;
						
						$('.variations_form').find('select').each(function(){
							variations.push(this.value);
						});
						values = variations.join(",");
						if ($('.variations_form').find('select').length) {
							var v = ($('.variations_form select option:selected').val()),
									i = images.find('figure[data-variation*="'+values+'"]').data('slick-index');

							if (v) {
								images.slick('slickGoTo', i);
							}
						}
					}
				});
			}
		},
		reviews: {
			selector: '#respond',
			init: function() {
				var base = this,
						container = $(base.selector);

				container.on( 'click', 'p.stars a', function(){
					var that = $(this);
					
					setTimeout(function(){ that.prevAll().addClass('active'); }, 10);
				});
			}
		},
		login_register: {
			selector: '#customer_login',
			init: function() {
				
				var create = $('#create-account'),
						login = $('#login-account');
				
				
				create.on('click', function() {
						TweenMax.fromTo($('.login-container'), 0.2, {opacity:1, display:'block', y: 0}, {opacity:0,display:'none', y: 50, onComplete: function() { 
								TweenMax.fromTo($('.register-container'), 0.2, {opacity:0, display:'none', y:50}, {opacity:1,display:'block', y: 0});
							}
						});
						return false;
				});
				
				login.on('click', function() {
						TweenMax.fromTo($('.register-container'), 0.2, {opacity:1, display:'block', y: 0}, {opacity:0,display:'none', y: 50,
							onComplete: function() { 
								TweenMax.fromTo($('.login-container'), 0.2, {opacity:0, display:'none', y: 50}, {opacity:1,display:'block', y: 0});
							}	
						});
						
						
						return false;
				});
			}
		},
		themeSwitcher: {
			selector: '#theme-switcher',
			init: function() {
				var base = this,
						container = $(base.selector),
						p = container.find('p'),
						div = container.find('div'),
						close = container.find('.close');
						
				var TL = new TimelineLite({ paused: true, onStart: function() { container.addClass('active'); }, onReverseComplete: function() { container.removeClass('active'); } });
						TL
							.add(TweenMax.to(container, 0.3, {width: 252, height: 534}), "start")
							.add(TweenMax.to(p, 0.3, {autoAlpha: 0, 
								// onStart: function() { div.css('display', 'none'); p.css('display', 'block');}, 
							}), "start")
							.add(TweenMax.to(div, 0.3, {autoAlpha: 1,
								onStart: function() { div.css('display', 'block'); p.css('display', 'none');},
								onReverseComplete: function() { div.css('display', 'none'); p.css('display', 'block'); }, 
							}));
							
				container.on('click', function(e) {
					var _this = $(this),
							toggle = _this.data('toggle');
					
					if (!toggle) {
						TL.timeScale(1).play();
						
						_this.data('toggle', 'on');
					} else {
						TL.timeScale(1.5).reverse();
						_this.removeData('toggle');
					}
				});
			}
		}
	};
	
	$doc.ready(function() {
		SITE.init();
	});

})(jQuery, this, _);