app.methods.content = (function() {

	var loadUrls = {};

	return {

		/**
			* Loadier for content
			* @param {string} src - URL needed to load
			* @param {string} type - type of response
			* @param {object} callback - callback function
		*/
		loadDefault: {
			src: "",
			data: {},
			type: "html",
			successCallback: function() {},
			errorCallback: function() {}
		},
		load: function(params) {

			var loadParams = $.extend(this.loadDefault, params);

			if(!loadParams.src) {
				app.log("app.content.load: no source", "warn")
				return false;
			}

			if(loadUrls[loadParams.src]) {
				app.log("URL " + loadParams.src + " already loading", "warn");
				return false;
			}

			loadUrls[loadParams.src] = $.ajax({

				type: loadParams.type,
				url: loadParams.src,
				data: loadParams.data,

				success: function(result) {

					loadParams.successCallback(result);

				},

				error: function() {

					loadParams.errorCallback();

				}

			});

		},

		initHomeSlider: function() {

			$(".fullsize-slider-list").owlCarousel({
				navigation: false,
				slideSpeed: 700,
				paginationSpeed: 700,
				singleItem: true,
				pagination: true,
				//autoPlay: 5000
			});

		},

		initHeadingSlider: function() {

			$(".page-heading-slider").owlCarousel({
				navigation: false,
				slideSpeed: 700,
				paginationSpeed: 700,
				singleItem: true,
				pagination: true,
				autoPlay: 5000
			});

		},

		initThumbSlider: function() {

			$(".thumb-slider-list-inner").owlCarousel({
				items: 4,
				itemsDesktop: [1300, 3],
				navigation: true,
				slideSpeed: 700,
				paginationSpeed: 700,
				pagination: false,
				autoPlay: 5000,
				navigationText: [
					'<span class="transition-icon transition-icon--arrows transition-icon--arrows--left transition-icon--arrows--horizontal larrow-gold-icon-before larrow-red-icon-after"></span>',
					'<span class="transition-icon transition-icon--arrows transition-icon--arrows--right transition-icon--arrows--horizontal rarrow-gold-icon-before rarrow-red-icon-after"></span>'
				],
				afterInit: function() {
					setArrowPos();
				},
				afterUpdate: function() {
					setArrowPos();
				}
			});

			function setArrowPos() {
				var $thumbSLiders = $(".thumb-slider-list-inner");
				
				$thumbSLiders.each(function() {
					var $arrows = $(".owl-prev, .owl-next", $thumbSLiders),
						$image = $(".thumb-slider-item-photo-holder:eq(0)", $thumbSLiders);

					$arrows.css("top", $image.outerHeight() / 2);

				});
			}

		},

		initEventSlider: function() {

			$(".event-page-slider").owlCarousel({
				navigation: false,
				slideSpeed: 700,
				paginationSpeed: 700,
				singleItem: true,
				pagination: true,
				autoPlay: 5000
			});

		},

		initBoard: function() {

			var $board = $(".board");

			$board.isotope({
				itemsSelector: ".board-item-holder",
				masonry: {
					columnWidth: ".grid-sizer",
					gutter: ".gutter-sizer"
				}
			});

		},

		initPageNavigation: function() {

			var $navs = $(".js-page-navigation");

			$navs.on("click", function() {
				var $nav = $(this),
					href = $nav.attr("href"),
					$dest = $("#" + href.slice(1));

				if(!$dest.length) {
					return false;
				}

				$("html, body").animate({
					scrollTop: $dest.position().top
				}, 500);

				return false;

			});

		},

		initMenu: function() {

			var $menu = $("#page-header"),
				$menuToggler = $("#page-header-toggler")
				menuScroll = true;

			$("html").on("click", function() {
				if($menu.hasClass("page-header--opened")) {
					$menu.removeClass("page-header--opened")
				}
			});

			$menu.on("mouseover", function() {
				$menu.addClass("page-header--opened");
			});

			$menu.on("click", function(e) {
				e.stopPropagation();
			});

			$menuToggler.on("click", function() {
				$menu.toggleClass("page-header--opened");

				return false;
			});

			if(!$menu.find(".page-header-menu-item--current").length) {
				$menu.addClass("page-header--opened");
				$(window).on("scroll", closeMenuOnScroll);
				function closeMenuOnScroll() {
					if(menuScroll) {
						$menu.removeClass("page-header--opened");
						menuScroll = false;
						$(window).off("scroll", closeMenuOnScroll)
					}
				}
			}

		},

		/**
			* Ajax pagination
		*/
		initAjaxPager: function() {
			var $ajaxPagerLink = $(".ajax-pager-link");

			if(!$ajaxPagerLink.length) {
				return false;
			}

			$.cors

			$(document).on("click", '.ajax-pager-link',function() {
				var $link = $(this);
				if($link.hasClass("ajax-pager-link--loading") || !$link.data("container")) {
					return false;
				}
				var $container = $("#" + $link.data("container"));
				if(!$container.length) {
					return false;
				}
				// Send ajax query
				
				$.ajax({
					beforeSend: function() {
						$link.addClass("ajax-pager-link--loading");
					},
					url: $link.attr("href"),
					type: "GET",
					success: function(html) {
						if($container.hasClass("has-masonry")) {
							$container.isotope("insert", $(html));
						} else {
							$container.append(html);
						}
						
						$link.removeClass("ajax-pager-link--loading");
						$link.remove();
						checkScrollPager();
					}
				});

				return false;

			});

			function checkScrollPager() {
				var $scrollPager = $(".ajax-pager--invisible");

				if(!$scrollPager.length) {					
					return false;
				}
				var scrollPagerTop = $scrollPager.position().top;

				$(window).on("scroll", function() {

					var $w = $(this);

					if(($w.scrollTop() + $(window).height()) > scrollPagerTop * 0.9) {
						$scrollPager.find(".ajax-pager-link").trigger("click");
						$scrollPager.remove();
						$(window).off("scroll");
					}

				});

			}

			checkScrollPager();

		},

		/**
			* Tour description panels
		*/
		initTour: function() {

			// Hide tour info
			$(".tour-info").on("click", ".tour-info-hide", function() {
				$(this).closest(".tour-info").removeClass("tour-info--active")
			});

			// Show tour info
			$(".tour-info").on("click", ".tour-info-show", function() {
				$(this).closest(".tour-info").addClass("tour-info--active")
			});

		},

		initKitchen: function() {

			function handleAddClick($btn, holderClass, countClass) {
				$btn.closest(holderClass).find(countClass).show();
				$btn.hide();
			}

			$("body").on("click", ".product-action-item--add", function() {
				handleAddClick($(this), ".product-action-item-holder", ".product-action-item--count");
				return false;
			});

			$(".menu-item-action-item--add").on("click", function() {
				handleAddClick($(this), ".menu-item-action-item-holder", ".menu-item-action-item--count");
				return false;
			});

			var $menuHolder = $("#menu"),
				$menuItems = $(".menu-item", $menuHolder);

			if(!$menuHolder.length) {
				return false;
			}

			$menuHolder.on("click", ".menu-item-action-item--open", function() {

				var $open = $(this),
					$item = $open.closest(".menu-item");

				$.ajax({
					url: $open.attr("href"),
					success: function(html) {
						$item.empty().addClass("menu-item--opened").height($item.height() * 2).append(html);
					}
				});

				return false;

			});

			function recalcSizes() {
				var index = 0,
					maxHeight = 0,
					lineItems = [],
					cols = $(window).width() > 1300 ? 4 : 3;

				(cols == 3) ? $menuHolder.addClass("menu--col3") : $menuHolder.removeClass("menu--col3");

				$menuItems.each(function() {
					var $item = $(this);
						
					$item.css("height", "auto");

					var itemHeight = $item.outerHeight();

					if(itemHeight > maxHeight) {
						maxHeight = itemHeight;
					}

					lineItems[index] = $item;

					index++;

					if(index == cols) {
						for(j = 0, jLen = lineItems.length; j < jLen; j++) {
							lineItems[j].css("height", maxHeight);
							(j == jLen - 1) ? lineItems[j].addClass("menu-item--noborder") : lineItems[j].removeClass("menu-item--noborder");
						}
						index = 0;
						maxHeight = 0;
						lineItems = [];
					}
					
				});
			}

			$(window).resize(function() {
				setTimeout(function() {
					recalcSizes();
				}, 50);
			});
			recalcSizes();

		},

		initCustomSocial: function() {

			$(".event-page-heading-social").socialLikes({
				counters: true
			});

		},

		/**
			* Fotorama initialization
		*/
		galleryInit: function() {

			var $fotorama = $(".event-page-album-fotorama");

			$fotorama.fotorama({

			}).on("fotorama:ready", function(e, fotorama) {
				var $prev = $(this).find(".fotorama__arr--prev"),
					$next = $(this).find(".fotorama__arr--next"),
					$stage = $(this).find(".fotorama__stage");

				$prev.append('<span class="transition-icon transition-icon--arrows transition-icon--arrows--left transition-icon--arrows--horizontal larrow-gold-icon-before larrow-red-icon-after"></span>');
				$next.append('<span class="transition-icon transition-icon--arrows transition-icon--arrows--right transition-icon--arrows--horizontal rarrow-gold-icon-before rarrow-red-icon-after"></span>');
				
				$stage.append('<div id="fotorama__social" class="fotorama__social" />');

				var YaShareInstance = new Ya.share({
					element: "fotorama__social",
					l10n: "ru",
					theme: "counter",
					elementStyle: {
						type: "button",
						quickServices: ["vkontakte", "facebook", "twitter"]
					}
				});
				YaShareInstance.updateShareLink(location.href, document.title);
			}).on("fotorama:show fotorama:ready", function(e, fotorama) {
				$("#fotorama-counter-current").text(fotorama.activeIndex + 1);
				$("#fotorama-counter-size").text(fotorama.size);
			});

		},

		initPrint: function() {

			$(".js-print").on("click", function() {
				window.print();
				return false;
			});

		},

		initGoogleMaps: function() {

			var $mapContainer = $("#google-map"),
				googleMap = null,
				googleMapMarker,
				lat = $mapContainer.data("latitude"),
				lng = $mapContainer.data("longitude"),
				zoom = $mapContainer.data("zoom"),
				marker = $mapContainer.data("marker");

			if(!$mapContainer.length) {
				return false;
			}

			var mapOptions = {
				center: new google.maps.LatLng(lat, lng),
				zoom: zoom,
				mapTypeControl: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scaleControl: true,
				streetViewControl: true,
				scrollwheel: false,
				styles: [
				    {
				        "featureType": "landscape",
				        "stylers": [
				            {
				                "saturation": -7
				            },
				            {
				                "gamma": 1.02
				            },
				            {
				                "hue": "#ffc300"
				            },
				            {
				                "lightness": -10
				            }
				        ]
				    },
				    {
				        "featureType": "road.highway",
				        "stylers": [
				            {
				                "hue": "#ffaa00"
				            },
				            {
				                "saturation": -45
				            },
				            {
				                "gamma": 1
				            },
				            {
				                "lightness": -4
				            }
				        ]
				    },
				    {
				        "featureType": "road.arterial",
				        "stylers": [
				            {
				                "hue": "#ffaa00"
				            },
				            {
				                "lightness": -10
				            },
				            {
				                "saturation": 64
				            },
				            {
				                "gamma": 0.9
				            }
				        ]
				    },
				    {
				        "featureType": "road.local",
				        "stylers": [
				            {
				                "lightness": -5
				            },
				            {
				                "hue": "#00f6ff"
				            },
				            {
				                "saturation": -40
				            },
				            {
				                "gamma": 0.75
				            }
				        ]
				    },
				    {
				        "featureType": "poi",
				        "stylers": [
				            {
				                "saturation": -30
				            },
				            {
				                "lightness": 11
				            },
				            {
				                "gamma": 0.5
				            },
				            {
				                "hue": "#ff8000"
				            }
				        ]
				    },
				    {
				        "featureType": "water",
				        "stylers": [
				            {
				                "hue": "#528c99"
				            },
				            {
				                "gamma": 1.25
				            },
				            {
				                "saturation": -22
				            },
				            {
				                "lightness": -31
				            }
				        ]
				    }
				]
			}

			googleMap = new google.maps.Map($mapContainer[0], mapOptions);

			googleMapMarker = new google.maps.Marker({
				position: new google.maps.LatLng(lat, lng),
				map: googleMap,
				icon: marker
			});

		},

		updateBasket: function() {

			console.log("Update basket")

		}

	}

});

/**
	* Forms methods
*/
app.methods.forms = (function() {

	return {

		/**
			* Adds HTML5 attributes for mobile devices
			* Looking for data-attribute 
		*/
		mobilizeForms: function() {

			var $forms = $(".custom-form"),
				$items = $("[data]", $forms);

			if(!$items.length) {
				return false;
			}

		},

		initSpinner: function() {

			var $spinners = $(".custom-form-item-spinner");

			$spinners.each(function() {

				var $spinner = $(this);

				$spinner.stepper({
					customClass: "custom-form-item-spinner-stepper " + ($spinner.data("class") ? $spinner.data("class") : "custom-btn custom-btn--light"),
					labels: {
						up: '+1',
						down: '-1'
					},
					min: $spinner.data("min"),
					max: $spinner.data("max"),
					step: 1
				}).on("change", function() {
					app.methods.content.updateBasket();
				});

			});		

		},

		ajaxForms: function() {

			$formLinks = $(".ajax-form");

			$formLinks.each(function() {

				var $link = $(this);

				$link.fancybox({
					type: "ajax",
					padding: 0,
					autoWidth: true,
					minWidth: 750,
					minHeight: 550,
					scrolling: "no",
					wrapCSS: "ajax-form-holder",
					tpl: {
						closeBtn: '<span class="ajax-form-holder-close custom-back-link custom-back-link--orange custom-back-link--uppercase"><span class="custom-back-link-name">' + ($link.data("close") ? $link.data("close") : 'Закрыть') + '</span></span>'
					},
					helpers: {
						overlay: {
							locked: false
						}
					}
				});

			});
			$(document)
				.on('submit', '.ajax-form-holder form', function(){
					$.fancybox.showLoading();
					$(this).ajaxSubmit({
						cache	: false,
						url		: $(this).attr('action'),
						data	: $(this).serializeArray(),
						success : function(data){
							$.fancybox({
								content : data,							
								type: "ajax",
								padding: 0,
								autoWidth: true,
								minWidth: 750,
								minHeight: 550,
								scrolling: "no",
								wrapCSS: "ajax-form-holder",
								tpl: {
									closeBtn: '<span class="ajax-form-holder-close custom-back-link custom-back-link--orange custom-back-link--uppercase"><span class="custom-back-link-name">Закрыть</span></span>'
								},
								helpers: {
									overlay: {
										locked: false
									}
								}
							});
						}
					});
					return false;
				})
				.on('submit', '.reviews-form-holder form', function(){
					$(this).ajaxSubmit({
						cache	: false,
						url		: $(this).attr('action'),
						data	: $(this).serializeArray(),
						success : function(data){
							$('.reviews-form-holder').html(data);
						}
					});
					return false;	
				});
		}

	}

});

/**
	* Add preloader
	* @param {object} dest - jQuery object
	* @param {string} class - HTML class for preloader`s holder
	* @param {boolean} showText - Shows standart text
	* @param {string} text - Custom preloader text
*/
app.methods.preloader = (function() {

	return {

		startDefault: {
			dest: {},
			className: "",
			showText: false,
			text: app.MESSAGES.RU.PRELOADER.LOADING,
			tmpl: '<span class="page-preloader" />',
			textTmpl: '<span class="page-preloader-text" />',
			holderClass: 'page-preloader-holder'
		},
		/**
			* Starts preloader
		*/
		start: function(params) {

			app.log("Preloader start", "time");

			var preloaderParams = $.extend(this.startDefault, params),
				preloader;

			if(!preloaderParams.dest.length || preloaderParams.dest.data("preloader")) {
				return false;
			}

			preloader = $(preloaderParams.tmpl);

			if(preloaderParams.showText && preloaderParams.text) {
				preloader.append($(preloaderParams.textTmpl).html(preloaderParams.text));
			}

			if(preloaderParams.className) {
				preloader.addClass(preloaderParams.className);
			}

			preloaderParams.dest
				.data({
					"preloader": preloader,
					"holderClass": preloaderParams.holderClass
				})
				.addClass(preloaderParams.holderClass)
				.append(preloader);

			app.log("Preloader start", "timeEnd");

		},

		stopDefault: {
			dest: {}
		},
		/**
			* Stops preloader
		*/
		stop: function(params) {
			
			app.log("Preloader stop", "time");

			var preloaderParams = $.extend(this.startDefault, params),
				preloader;

			if(!preloaderParams.dest.length || !preloaderParams.dest.data("preloader")) {
				return false;
			}

			preloader = preloaderParams.dest.data("preloader");

			if(!preloader.length) {
				return false;
			}

			preloaderParams.dest.removeClass(preloaderParams.dest.data("holderClass"));
			preloader.remove();
			preloaderParams.dest.data({
				"preloader": false,
				"holderClass": false
			});

			app.log("Preloader stop", "timeEnd");

		}

	}

});

// Methods initialization
app.init.methods();

app.methods.content.initCustomSocial();

app.methods.content.initHomeSlider();
app.methods.content.initHeadingSlider();
app.methods.content.initThumbSlider();
app.methods.content.initEventSlider();

app.methods.content.initPageNavigation();
app.methods.content.initBoard();
app.methods.content.initKitchen();

app.methods.content.galleryInit();

app.methods.content.initTour();

app.methods.content.initMenu();

app.methods.forms.mobilizeForms();
app.methods.forms.initSpinner();
app.methods.forms.ajaxForms();	

app.methods.content.initAjaxPager();

app.methods.content.initPrint();

google.maps.event.addDomListener(window, 'load', app.methods.content.initGoogleMaps);