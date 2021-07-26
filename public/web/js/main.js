(function($) {
    'use strict';
    var iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;

    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (
                isMobile.Android() ||
                isMobile.BlackBerry() ||
                isMobile.iOS() ||
                isMobile.Opera() ||
                isMobile.Windows()
            );
        },
    };

    function parallax() {
        $('.bg--parallax').each(function() {
            var el = $(this),
                xpos = '50%',
                windowHeight = $(window).height();
            if (isMobile.any()) {
                $(this).css('background-attachment', 'scroll');
            } else {
                $(window).scroll(function() {
                    var current = $(window).scrollTop(),
                        top = el.offset().top,
                        height = el.outerHeight();
                    if (
                        top + height < current ||
                        top > current + windowHeight
                    ) {
                        return;
                    }
                    el.css(
                        'backgroundPosition',
                        xpos + ' ' + Math.round((top - current) * 0.2) + 'px'
                    );
                });
            }
        });
    }

    function backgroundImage() {
        var databackground = $('[data-background]');
        databackground.each(function() {
            if ($(this).attr('data-background')) {
                var image_path = $(this).attr('data-background');
                $(this).css({
                    background: 'url(' + image_path + ')',
                });
            }
        });
    }

    function siteToggleAction() {
        var navSidebar = $('.navigation--sidebar'),
            filterSidebar = $('.ps-filter--sidebar');
        $('.menu-toggle-open').on('click', function(e) {
            e.preventDefault();
            $(this).toggleClass('active');
            navSidebar.toggleClass('active');
            $('.ps-site-overlay').toggleClass('active');
        });

        $('.ps-toggle--sidebar').on('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $(this).toggleClass('active');
            $(this)
                .siblings('a')
                .removeClass('active');
            $(url).toggleClass('active');
            $(url)
                .siblings('.ps-panel--sidebar')
                .removeClass('active');
            $('.ps-site-overlay').toggleClass('active');
        });

        $('#filter-sidebar').on('click', function(e) {
            e.preventDefault();
            filterSidebar.addClass('active');
            $('.ps-site-overlay').addClass('active');
        });

        $('.ps-filter--sidebar .ps-filter__header .ps-btn--close').on(
            'click',
            function(e) {
                e.preventDefault();
                filterSidebar.removeClass('active');
                $('.ps-site-overlay').removeClass('active');
            }
        );

        $('body').on('click', function(e) {
            if (
                $(e.target)
                    .siblings('.ps-panel--sidebar')
                    .hasClass('active')
            ) {
                $('.ps-panel--sidebar').removeClass('active');
                $('.ps-site-overlay').removeClass('active');
            }
        });
    }

    function subMenuToggle() {
        $('.menu--mobile .menu-item-has-children > .sub-toggle').on(
            'click',
            function(e) {
                e.preventDefault();
                var current = $(this).parent('.menu-item-has-children');
                $(this).toggleClass('active');
                current
                    .siblings()
                    .find('.sub-toggle')
                    .removeClass('active');
                current.children('.sub-menu').slideToggle(350);
                current
                    .siblings()
                    .find('.sub-menu')
                    .slideUp(350);
                if (current.hasClass('has-mega-menu')) {
                    current.children('.mega-menu').slideToggle(350);
                    current
                        .siblings('.has-mega-menu')
                        .find('.mega-menu')
                        .slideUp(350);
                }
            }
        );
        $('.menu--mobile .has-mega-menu .mega-menu__column .sub-toggle').on(
            'click',
            function(e) {
                e.preventDefault();
                var current = $(this).closest('.mega-menu__column');
                $(this).toggleClass('active');
                current
                    .siblings()
                    .find('.sub-toggle')
                    .removeClass('active');
                current.children('.mega-menu__list').slideToggle(350);
                current
                    .siblings()
                    .find('.mega-menu__list')
                    .slideUp(350);
            }
        );
        var listCategories = $('.ps-list--categories');
        if (listCategories.length > 0) {
            $('.ps-list--categories .menu-item-has-children > .sub-toggle').on(
                'click',
                function(e) {
                    e.preventDefault();
                    var current = $(this).parent('.menu-item-has-children');
                    $(this).toggleClass('active');
                    current
                        .siblings()
                        .find('.sub-toggle')
                        .removeClass('active');
                    current.children('.sub-menu').slideToggle(350);
                    current
                        .siblings()
                        .find('.sub-menu')
                        .slideUp(350);
                    if (current.hasClass('has-mega-menu')) {
                        current.children('.mega-menu').slideToggle(350);
                        current
                            .siblings('.has-mega-menu')
                            .find('.mega-menu')
                            .slideUp(350);
                    }
                }
            );
        }
    }

    function stickyHeader() {
        var header = $('.header'),
            scrollPosition = 0,
            checkpoint = 50;
        header.each(function() {
            if ($(this).data('sticky') === true) {
                var el = $(this);
                $(window).scroll(function() {
                    var currentPosition = $(this).scrollTop();
                    if (currentPosition > checkpoint) {
                        el.addClass('header--sticky');
                    } else {
                        el.removeClass('header--sticky');
                    }
                });
            }
        });

        var stickyCart = $('#cart-sticky');
        if (stickyCart.length > 0) {
            $(window).scroll(function() {
                var currentPosition = $(this).scrollTop();
                if (currentPosition > checkpoint) {
                    stickyCart.addClass('active');
                } else {
                    stickyCart.removeClass('active');
                }
            });
        }
    }

    function owlCarouselConfig() {
        var target = $('.owl-slider');
        if (target.length > 0) {
            target.each(function() {
                var el = $(this),
                    dataAuto = el.data('owl-auto'),
                    dataLoop = el.data('owl-loop'),
                    dataSpeed = el.data('owl-speed'),
                    dataGap = el.data('owl-gap'),
                    dataNav = el.data('owl-nav'),
                    dataDots = el.data('owl-dots'),
                    dataAnimateIn = el.data('owl-animate-in')
                        ? el.data('owl-animate-in')
                        : '',
                    dataAnimateOut = el.data('owl-animate-out')
                        ? el.data('owl-animate-out')
                        : '',
                    dataDefaultItem = el.data('owl-item'),
                    dataItemXS = el.data('owl-item-xs'),
                    dataItemSM = el.data('owl-item-sm'),
                    dataItemMD = el.data('owl-item-md'),
                    dataItemLG = el.data('owl-item-lg'),
                    dataItemXL = el.data('owl-item-xl'),
                    dataNavLeft = el.data('owl-nav-left')
                        ? el.data('owl-nav-left')
                        : "<i class='icon-chevron-left'></i>",
                    dataNavRight = el.data('owl-nav-right')
                        ? el.data('owl-nav-right')
                        : "<i class='icon-chevron-right'></i>",
                    duration = el.data('owl-duration'),
                    datamouseDrag =
                        el.data('owl-mousedrag') == 'on' ? true : false;
                if (
                    target.children('div, span, a, img, h1, h2, h3, h4, h5, h5')
                        .length >= 2
                ) {
                    el.addClass('owl-carousel').owlCarousel({
                        animateIn: dataAnimateIn,
                        animateOut: dataAnimateOut,
                        margin: dataGap,
                        autoplay: dataAuto,
                        autoplayTimeout: dataSpeed,
                        autoplayHoverPause: true,
                        loop: dataLoop,
                        nav: dataNav,
                        mouseDrag: datamouseDrag,
                        touchDrag: true,
                        autoplaySpeed: duration,
                        navSpeed: duration,
                        dotsSpeed: duration,
                        dragEndSpeed: duration,
                        navText: [dataNavLeft, dataNavRight],
                        dots: dataDots,
                        items: dataDefaultItem,
                        responsive: {
                            0: {
                                items: dataItemXS,
                            },
                            480: {
                                items: dataItemSM,
                            },
                            768: {
                                items: dataItemMD,
                            },
                            992: {
                                items: dataItemLG,
                            },
                            1200: {
                                items: dataItemXL,
                            },
                            1680: {
                                items: dataDefaultItem,
                            },
                        },
                    });
                }
            });
        }
    }

    function masonry($selector) {
        var masonry = $($selector);
        if (masonry.length > 0) {
            if (masonry.hasClass('filter')) {
                masonry.imagesLoaded(function() {
                    masonry.isotope({
                        columnWidth: '.grid-sizer',
                        itemSelector: '.grid-item',
                        isotope: {
                            columnWidth: '.grid-sizer',
                        },
                        filter: '*',
                    });
                });
                var filters = masonry
                    .closest('.masonry-root')
                    .find('.ps-masonry-filter > li > a');
                filters.on('click', function(e) {
                    e.preventDefault();
                    var selector = $(this).attr('href');
                    filters.find('a').removeClass('current');
                    $(this)
                        .parent('li')
                        .addClass('current');
                    $(this)
                        .parent('li')
                        .siblings('li')
                        .removeClass('current');
                    $(this)
                        .closest('.masonry-root')
                        .find('.ps-masonry')
                        .isotope({
                            itemSelector: '.grid-item',
                            isotope: {
                                columnWidth: '.grid-sizer',
                            },
                            filter: selector,
                        });
                    return false;
                });
            } else {
                masonry.imagesLoaded(function() {
                    masonry.masonry({
                        columnWidth: '.grid-sizer',
                        itemSelector: '.grid-item',
                    });
                });
            }
        }
    }

    function mapConfig() {
        var map = $('#contact-map');
        if (map.length > 0) {
            map.gmap3({
                address: map.data('address'),
                zoom: map.data('zoom'),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
            })
                .marker(function(map) {
                    return {
                        position: map.getCenter(),
                        icon: 'img/marker.png',
                    };
                })
                .infowindow({
                    content: map.data('address'),
                })
                .then(function(infowindow) {
                    var map = this.get(0);
                    var marker = this.get(1);
                    marker.addListener('click', function() {
                        infowindow.open(map, marker);
                    });
                });
        } else {
            return false;
        }
    }

    function slickConfig() {
        var product = $('.ps-product--detail');
        if (product.length > 0) {
            var primary = product.find('.ps-product__gallery'),
                second = product.find('.ps-product__variants'),
                vertical = product
                    .find('.ps-product__thumbnail')
                    .data('vertical');
            primary.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                asNavFor: '.ps-product__variants',
                fade: true,
                dots: false,
                infinite: false,
                arrows: primary.data('arrow'),
                prevArrow: "<a href='#'><i class='fa fa-angle-left'></i></a>",
                nextArrow: "<a href='#'><i class='fa fa-angle-right'></i></a>",
            });
            second.slick({
                slidesToShow: second.data('item'),
                slidesToScroll: 1,
                infinite: false,
                arrows: second.data('arrow'),
                focusOnSelect: true,
                prevArrow: "<a href='#'><i class='fa fa-angle-up'></i></a>",
                nextArrow: "<a href='#'><i class='fa fa-angle-down'></i></a>",
                asNavFor: '.ps-product__gallery',
                vertical: vertical,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            arrows: second.data('arrow'),
                            slidesToShow: 4,
                            vertical: false,
                            prevArrow:
                                "<a href='#'><i class='fa fa-angle-left'></i></a>",
                            nextArrow:
                                "<a href='#'><i class='fa fa-angle-right'></i></a>",
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: second.data('arrow'),
                            slidesToShow: 4,
                            vertical: false,
                            prevArrow:
                                "<a href='#'><i class='fa fa-angle-left'></i></a>",
                            nextArrow:
                                "<a href='#'><i class='fa fa-angle-right'></i></a>",
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 3,
                            vertical: false,
                            prevArrow:
                                "<a href='#'><i class='fa fa-angle-left'></i></a>",
                            nextArrow:
                                "<a href='#'><i class='fa fa-angle-right'></i></a>",
                        },
                    },
                ],
            });
        }
    }

    function tabs() {
        $('.ps-tab-list  li > a ').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $(this)
                .closest('li')
                .siblings('li')
                .removeClass('active');
            $(this)
                .closest('li')
                .addClass('active');
            $(target).addClass('active');
            $(target)
                .siblings('.ps-tab')
                .removeClass('active');
        });
        $('.ps-tab-list.owl-slider .owl-item a').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $(this)
                .closest('.owl-item')
                .siblings('.owl-item')
                .removeClass('active');
            $(this)
                .closest('.owl-item')
                .addClass('active');
            $(target).addClass('active');
            $(target)
                .siblings('.ps-tab')
                .removeClass('active');
        });
    }

    function rating() {
        $('select.ps-rating').each(function() {
            var readOnly;
            if ($(this).attr('data-read-only') == 'true') {
                readOnly = true;
            } else {
                readOnly = false;
            }
            $(this).barrating({
                theme: 'fontawesome-stars',
                readonly: readOnly,
                emptyValue: '0',
            });
        });
    }

    function productLightbox() {
        var product = $('.ps-product--detail');
        if (product.length > 0) {
            $('.ps-product__gallery').lightGallery({
                selector: '.item a',
                thumbnail: true,
                share: false,
                fullScreen: false,
                autoplay: false,
                autoplayControls: false,
                actualSize: false,
            });
            if (product.hasClass('ps-product--sticky')) {
                $('.ps-product__thumbnail').lightGallery({
                    selector: '.item a',
                    thumbnail: true,
                    share: false,
                    fullScreen: false,
                    autoplay: false,
                    autoplayControls: false,
                    actualSize: false,
                });
            }
        }
        $('.ps-gallery--image').lightGallery({
            selector: '.ps-gallery__item',
            thumbnail: true,
            share: false,
            fullScreen: false,
            autoplay: false,
            autoplayControls: false,
            actualSize: false,
        });
        $('.ps-video').lightGallery({
            thumbnail: false,
            share: false,
            fullScreen: false,
            autoplay: false,
            autoplayControls: false,
            actualSize: false,
        });
    }

    function backToTop() {
        var scrollPos = 0;
        var element = $('#back2top');
        $(window).scroll(function() {
            var scrollCur = $(window).scrollTop();
            if (scrollCur > scrollPos) {
                // scroll down
                if (scrollCur > 500) {
                    element.addClass('active');
                } else {
                    element.removeClass('active');
                }
            } else {
                // scroll up
                element.removeClass('active');
            }

            scrollPos = scrollCur;
        });

        element.on('click', function() {
            $('html, body').animate(
                {
                    scrollTop: '0px',
                },
                800
            );
        });
    }

    function modalInit() {
        var modal = $('.ps-modal');
        if (modal.length) {
            if (modal.hasClass('active')) {
                $('body').css('overflow-y', 'hidden');
            }
        }
        modal.find('.ps-modal__close, .ps-btn--close').on('click', function(e) {
            e.preventDefault();
            $(this)
                .closest('.ps-modal')
                .removeClass('active');
        });
        $('.ps-modal-link').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $(target).addClass('active');
            $('body').css('overflow-y', 'hidden');
        });
        $('.ps-modal').on('click', function(event) {
            if (!$(event.target).closest('.ps-modal__container').length) {
                modal.removeClass('active');
                $('body').css('overflow-y', 'auto');
            }
        });
    }

    function searchInit() {
        var searchbox = $('.ps-search');
        $('.ps-search-btn').on('click', function(e) {
            e.preventDefault();
            searchbox.addClass('active');
        });
        searchbox.find('.ps-btn--close').on('click', function(e) {
            e.preventDefault();
            searchbox.removeClass('active');
        });
    }

    function countDown() {
        var time = $('.ps-countdown');
        time.each(function() {
            var el = $(this),
                value = $(this).data('time');
            var countDownDate = new Date(value).getTime();
            var timeout = setInterval(function() {
                var now = new Date().getTime(),
                    distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24)),
                    hours = Math.floor(
                        (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
                    ),
                    minutes = Math.floor(
                        (distance % (1000 * 60 * 60)) / (1000 * 60)
                    ),
                    seconds = Math.floor((distance % (1000 * 60)) / 1000);
                el.find('.days').html(days);
                el.find('.hours').html(hours);
                el.find('.minutes').html(minutes);
                el.find('.seconds').html(seconds);
                if (distance < 0) {
                    clearInterval(timeout);
                    el.closest('.ps-section').hide();
                }
            }, 1000);
        });
    }

    function productFilterToggle() {
        $('.ps-filter__trigger').on('click', function(e) {
            e.preventDefault();
            var el = $(this);
            el.find('.ps-filter__icon').toggleClass('active');
            el.closest('.ps-filter')
                .find('.ps-filter__content')
                .slideToggle();
        });
        if ($('.ps-sidebar--home').length > 0) {
            $('.ps-sidebar--home > .ps-sidebar__header > a').on(
                'click',
                function(e) {
                    e.preventDefault();
                    $(this)
                        .closest('.ps-sidebar--home')
                        .children('.ps-sidebar__content')
                        .slideToggle();
                }
            );
        }
    }

    function mainSlider() {
        var homeBanner = $('.ps-carousel--animate');
        homeBanner.slick({
            autoplay: true,
            speed: 1000,
            lazyLoad: 'progressive',
            arrows: false,
            fade: true,
            dots: true,
            prevArrow: "<i class='slider-prev ba-back'></i>",
            nextArrow: "<i class='slider-next ba-next'></i>",
        });
    }

    function subscribePopup() {
        var subscribe = $('#subscribe'),
            time = subscribe.data('time');
        setTimeout(function() {
            if (subscribe.length > 0) {
                subscribe.addClass('active');
                $('body').css('overflow', 'hidden');
            }
        }, time);
        $('.ps-popup__close').on('click', function(e) {
            e.preventDefault();
            $(this)
                .closest('.ps-popup')
                .removeClass('active');
            $('body').css('overflow', 'auto');
        });
        $('#subscribe').on('click', function(event) {
            if (!$(event.target).closest('.ps-popup__content').length) {
                subscribe.removeClass('active');
                $('body').css('overflow-y', 'auto');
            }
        });
    }

    function stickySidebar() {
        var sticky = $('.ps-product--sticky'),
            stickySidebar,
            checkPoint = 992,
            windowWidth = $(window).innerWidth();
        if (sticky.length > 0) {
            stickySidebar = new StickySidebar(
                '.ps-product__sticky .ps-product__info',
                {
                    topSpacing: 20,
                    bottomSpacing: 20,
                    containerSelector: '.ps-product__sticky',
                }
            );
            if ($('.sticky-2').length > 0) {
                var stickySidebar2 = new StickySidebar(
                    '.ps-product__sticky .sticky-2',
                    {
                        topSpacing: 20,
                        bottomSpacing: 20,
                        containerSelector: '.ps-product__sticky',
                    }
                );
            }
            if (checkPoint > windowWidth) {
                stickySidebar.destroy();
                stickySidebar2.destroy();
            }
        } else {
            return false;
        }
    }

    function accordion() {
        var accordion = $('.ps-accordion');
        accordion.find('.ps-accordion__content').hide();
        $('.ps-accordion.active')
            .find('.ps-accordion__content')
            .show();
        accordion.find('.ps-accordion__header').on('click', function(e) {
            e.preventDefault();
            if (
                $(this)
                    .closest('.ps-accordion')
                    .hasClass('active')
            ) {
                $(this)
                    .closest('.ps-accordion')
                    .removeClass('active');
                $(this)
                    .closest('.ps-accordion')
                    .find('.ps-accordion__content')
                    .slideUp(350);
            } else {
                $(this)
                    .closest('.ps-accordion')
                    .addClass('active');
                $(this)
                    .closest('.ps-accordion')
                    .find('.ps-accordion__content')
                    .slideDown(350);
                $(this)
                    .closest('.ps-accordion')
                    .siblings('.ps-accordion')
                    .find('.ps-accordion__content')
                    .slideUp();
            }
            $(this)
                .closest('.ps-accordion')
                .siblings('.ps-accordion')
                .removeClass('active');
            $(this)
                .closest('.ps-accordion')
                .siblings('.ps-accordion')
                .find('.ps-accordion__content')
                .slideUp();
        });
    }

    function progressBar() {
        var progress = $('.ps-progress');
        progress.each(function(e) {
            var value = $(this).data('value');
            $(this)
                .find('span')
                .css({
                    width: value + '%',
                });
        });
    }

    function select2Cofig() {
        $('select.ps-select').select2({
            placeholder: $(this).data('placeholder'),
            minimumResultsForSearch: -1,
        });
    }

    function carouselNavigation() {
        var prevBtn = $('.ps-carousel__prev'),
            nextBtn = $('.ps-carousel__next');
        prevBtn.on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $(target).trigger('prev.owl.carousel', [1000]);
        });
        nextBtn.on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $(target).trigger('next.owl.carousel', [1000]);
        });
    }

    function filterSlider() {
        var nonLinearSlider = document.getElementById('nonlinear');
        if (typeof nonLinearSlider != 'undefined' && nonLinearSlider != null) {
            noUiSlider.create(nonLinearSlider, {
                connect: true,
                behaviour: 'tap',
                start: [0, 1000],
                range: {
                    min: 0,
                    '10%': 100,
                    '20%': 200,
                    '30%': 300,
                    '40%': 400,
                    '50%': 500,
                    '60%': 600,
                    '70%': 700,
                    '80%': 800,
                    '90%': 900,
                    max: 1000,
                },
            });
            var nodes = [
                document.querySelector('.ps-slider__min'),
                document.querySelector('.ps-slider__max'),
            ];
            nonLinearSlider.noUiSlider.on('update', function(values, handle) {
                nodes[handle].innerHTML = Math.round(values[handle]);
            });
        }
    }

    function handleLiveSearch() {
        $('body').on('click', function(e) {
            if (
                $(e.target).closest('.ps-form--search-header') ||
                e.target.className === '.ps-form--search-header'
            ) {
                $('.ps-panel--search-result').removeClass('active');
            }
        });
        $('#input-search').on('keypress', function() {
            $('.ps-panel--search-result').addClass('active');
        });
        $('#input-search-mobile').on('keypress', function() {
            $('#search_results_mobile').addClass('active');
        });
        $('#input-search-mobile2').on('keypress', function() {
            $('#search_results_mobile2').addClass('active');
        });
    }

    $(function() {
        backgroundImage();
        owlCarouselConfig();
        siteToggleAction();
        subMenuToggle();
        masonry('.ps-masonry');
        productFilterToggle();
        tabs();
        slickConfig();
        productLightbox();
        rating();
        backToTop();
        stickyHeader();
        mapConfig();
        modalInit();
        searchInit();
        countDown();
        mainSlider();
        parallax();
        stickySidebar();
        accordion();
        progressBar();
        select2Cofig();
        carouselNavigation();
        $('[data-toggle="tooltip"]').tooltip();
        filterSlider();
        handleLiveSearch();
        $('.ps-product--quickview .ps-product__images').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            dots: false,
            arrows: true,
            infinite: false,
            prevArrow: "<a href='#'><i class='fa fa-angle-left'></i></a>",
            nextArrow: "<a href='#'><i class='fa fa-angle-right'></i></a>",
        });
    });

    $('#product-quickview').on('shown.bs.modal', function(e) {
        $('.ps-product--quickview .ps-product__images').slick('setPosition');
    });
    
    $('.product-quickview').on('click', function (e) {
        var id = $(this).attr('data-productid');
        $.ajax({
            url: "/get-product-details-modal",
            type: "get",
            data: { id : id },
            success: function(data){
                $("#product_image_modal").attr('src',data.image);
                $("#products_name_modal").html('');
                $("#products_name_modal").text(data.products_name);
                $("#author_name").html('');
                $("#author_name").text(data.author_name);
                $("#products_specification_modal").html('');
                $("#products_specification_modal").html(data.specification).text();
                $("#products_price_modal").html('');
                $("#products_price_modal").text(data.products_price);
                $(".product_id_cart_modal").val('');
                $(".product_id_cart_modal").val(data.product_id);
                $("#product_id_cart_modal_rent").val('');
                $("#product_id_cart_modal_rent").val(data.product_id);
                $("#vendor_name_modal").html('');
                $("#vendor_name_modal").text(data.vendor_name);
                $("#count_review_modal").html('');
                $("#count_review_modal").text(data.count_review);
               
                //$("#product_id_buy_modal").attr('data-productid','');
                //$("#product_id_buy_modal").attr('data-productid',data.product_id);
            }
        });
    });
    
    $('.incQty').on('click', function (e) {
        var id = $(this).attr('data-productid');
        var price = $(this).attr('data-productprice');
        var qty = $('#changeQty'+id).val();
        $.ajax({
            url: "/incQty",
            type: "get",
            data: { products_id : id },
            success: function(data){
                if(data!=0){
                    $("#changeQty"+id).val(+qty+1);
                    $("#productTotal"+id).html('');
                    $("#productTotal"+id).append($("#changeQty"+id).val()*price);
                    $("#appendCart").html('');
                    $("#appendCart").append(data);
                    $.ajax({
                        url: "/get-total-price",
                        type: "get",
                        data: { products_id : id },
                        success: function(data){
                            $(".totalprice").html('');
                            $(".totalprice").append('<i class="fa fa-inr"></i>'+data.Subtotal);
                            $(".final_total").html('');
                            $(".final_total").append('<i class="fa fa-inr"></i>'+data.final_total);
                            $(".discount_total").html('');
                            $(".discount_total").append('<i class="fa fa-minus"></i> <i class="fa fa-inr"></i>'+data.discount_total);
                        }
                    });
                }
            }
        });
    });
    
    $('.decQty').on('click', function (e) {
        var id = $(this).attr('data-productid');
        var price = $(this).attr('data-productprice');
        var qty = $('#changeQty'+id).val();
        if(qty>0){
            $.ajax({
                url: "/decQty",
                type: "get",
                data: { products_id : id },
                success: function(data){
                    if(data!=0){
                        $("#changeQty"+id).val(+qty-1);
                        $("#productTotal"+id).html('');
                        $("#productTotal"+id).append($("#changeQty"+id).val()*price);
                        $("#appendCart").html('');
                        $("#appendCart").append(data);
                        $.ajax({
                            url: "/get-total-price",
                            type: "get",
                            data: { products_id : id },
                            success: function(data){
                                $(".totalprice").html('');
                                $(".totalprice").append('<i class="fa fa-inr"></i>'+data.Subtotal);
                                $(".final_total").html('');
                                $(".final_total").append('<i class="fa fa-inr"></i>'+data.final_total);
                                $(".discount_total").html('');
                                $(".discount_total").append('<i class="fa fa-minus"></i> <i class="fa fa-inr"></i>'+data.discount_total);
                            }
                        });
                    }
                }
            });
        }
    });
    
    $('#country').on('change', function (e) {
        var id = $(this).val();
        $.ajax({
            url: "/get-zones",
            type: "get",
            data: { id : id },
            success: function(data){
                $("#zone").html('');
                $("#zone").append(data);
            }
        });
    });
    
    $('#zone').on('change', function (e) {
        var id = $(this).val();
        var total = $('#Subtotal').val();
        var shipping = $('#shipping').val();
        $.ajax({
            url: "/get-tax",
            type: "get",
            data: { id : id, total : total, shipping : shipping },
            success: function(data){
                $("#tax_rate").html('');
                $("#tax_rate").text(data.tax);
                $("#tax_percent").html('');
                $("#tax_percent").text(data.tax_percent);
                $("#final_total").html('');
                $("#final_total").text(data.total);
            }
        });
    });
    
    $("form[id='submitNewsletter']").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
        },
        // Specify validation error messages
        messages: {
            email: "Please enter a valid email address"
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form, event) {
            event.preventDefault();
            var email = $('#email').val();
            var _token = $('#_token').val();
            $('#newsletterSubmitResponseFailed').addClass('d-none');
            $('#newsletterSubmitResponseSuccess').addClass('d-none');
            $.post('/newsletter', {email: email, _token: _token}, function (data) {
                if (data==1) {
                    $('#email').val('');
                    $('#newsletterSubmitResponseFailed').addClass('d-none');
                    $('#newsletterSubmitResponseSuccess').removeClass('d-none');
                }else if (data==0) {
                    $('#newsletterSubmitResponseSuccess').addClass('d-none');
                    $('#newsletterSubmitResponseFailed').removeClass('d-none');
                }
            });
        }
    });
    
    $('#cb01').on('click', function() {
        if($(this).prop('checked')==true){
            $('#different_shipping_address').removeClass('d-none');
            $('#shipping_company').prop('disabled', false);
            $('#shipping_country').prop('disabled', false);
            $('#shipping_zone').prop('disabled', false);
            $('#shipping_city').prop('disabled', false);
            $('#shipping_postcode').prop('disabled', false);
            $('#shipping_phone').prop('disabled', false);
            $('#shipping_address').prop('disabled', false);
        }else if($(this).prop('checked')==false){
            $('#different_shipping_address').addClass('d-none');
            $('#shipping_company').prop('disabled', true);
            $('#shipping_country').prop('disabled', true);
            $('#shipping_zone').prop('disabled', true);
            $('#shipping_city').prop('disabled', true);
            $('#shipping_postcode').prop('disabled', true);
            $('#shipping_phone').prop('disabled', true);
            $('#shipping_address').prop('disabled', true);
        }
    });
    
    $('.place_order_chk_pincode').on('click change keyup keydown keypress', function() {
        if($('#cb01').prop('checked')==true){
            var code = $('#shipping_postcode').val();
        }else{
            var code = $('#postcode').val();
        }
        if(code == ''){
            $('#place_order_success').addClass('d-none');
                $('#place_order_error').removeClass('d-none');
             $('#failedmsg').html('');
            $('#failedmsg').text('Please enter your pincode.');
        }else{
        $.get('/place_order_chk_pincode', {code: code}, function (data) {
            if (data==1) {
                $('#place_order_error').addClass('d-none');
                $('#place_order_success').removeClass('d-none');
                $('#place_order_chk_pincode').addClass('d-none');
                $('#place_order_at_pincode').removeClass('d-none');
            }else if (data==0) {
                $('#place_order_success').addClass('d-none');
                $('#place_order_error').removeClass('d-none');
                $('#failedmsg').html('');
                $('#failedmsg').text('Delivery is not available at this location.');
                $('#place_order_chk_pincode').removeClass('d-none');
                $('#place_order_at_pincode').addClass('d-none');
            }
        });
    }
    });
    
    $('.chk_availability').on('click', function() {
        var code = $('#chk_availability').val();
        $.get('/place_order_chk_pincode', {code: code}, function (data) {
            if (data==1) {
                $('#chk_availability_error').addClass('d-none');
                $('#chk_availability_success').removeClass('d-none');
                setTimeout(function () {
                    $("#chk_availability_success").addClass('d-none');
                }, 3000);
            }else if (data==0) {
                $('#chk_availability_success').addClass('d-none');
                $('#chk_availability_error').removeClass('d-none');
                 setTimeout(function () {
                    $("#chk_availability_error").addClass('d-none');
                }, 3000);
            }
        });
    });
    
    $('.filterProducts').on('click', function() {
	    // console.log('here on filterProducts click');
        $('.categoryid').removeClass('activeOption');
        $('.categoryid').css('color','');
        $(this).addClass('activeOption');
        var sortby = $('#sortby').val();
        var categoryid;
        if ($('.categoryid').length) {
            categoryid = $('.activeOption').attr("data-categoryid");
            $('.activeOption').css("color",'#fcb800');
        }
        var authorids = [];
        $('.authorids:checked').each(function(i){
            authorids[i] = $(this).val();
        });
        var ratings = [];
        $('.ratings:checked').each(function(i){
            ratings[i] = $(this).val();
        });
        $.get('/filterProducts', {categoryid: categoryid, authorids: authorids, ratings: ratings, sortby: sortby}, function (data) {
            $('.append_products').html('');
            $('.append_products').append(data);
        });
    });
    var min = $('.ps-slider__min').text();
    var max = $('.ps-slider__max').text();
    $('.ps-slider__min').on('DOMSubtreeModified',function(){
    	var url_string = window.location.href;
        var url = new URL(url_string);
        var searchText= url.searchParams.get("search");
        
        min = $(this).text();
        max = $('.ps-slider__max').text();
        
        
        var sortby = $('#sortby').val();
        var categoryid;
        if ($('.categoryid').length) {
            categoryid = $('.activeOption').attr("data-categoryid");
        }
        var authorids = [];
        $('.authorids:checked').each(function(i){
            authorids[i] = $(this).val();
        });
        var ratings = [];
        $('.ratings:checked').each(function(i){
            ratings[i] = $(this).val();
        });
        // console.log('here on ps-slider__min DOMSubtreeModified');

        $.get('/filterProducts', {categoryid: categoryid, authorids: authorids, ratings: ratings, sortby: sortby, min : min, max : max,price:1,searchText:searchText}, function (data) {
            $('.append_products').html('');
            $('.append_products').append(data);
            $('#input-search-mobile').val(searchText);
            $('#input-search').val(searchText);
            $()
        });
    });
    
    
    $('.ps-slider__max').on('DOMSubtreeModified',function(){
      var url_string = window.location.href;
      var url = new URL(url_string);
      var searchText= url.searchParams.get("search");
      max = $(this).text();
      min = $('.ps-slider__min').text();
      
      var sortby = $('#sortby').val();
        var categoryid;
        if ($('.categoryid').length) {
            categoryid = $('.activeOption').attr("data-categoryid");
        }
        var authorids = [];
        $('.authorids:checked').each(function(i){
            authorids[i] = $(this).val();
        });
        var ratings = [];
        $('.ratings:checked').each(function(i){
            ratings[i] = $(this).val();
        });
        console.log('here on ps-slider__max DOMSubtreeModified');
        $.get('/filterProducts', {categoryid: categoryid, authorids: authorids, ratings: ratings, sortby: sortby, min : min, max : max,price:1,searchText:searchText}, function (data) {
            $('.append_products').html('');
            $('.append_products').append(data);
            $('#input-search-mobile').val(searchText);
            $('#input-search').val(searchText);
        });
      
    });
    $('.filterProducts1').on('change', function() {
        var sortby = $('#sortby').val();
        var categoryid;
        if ($('.categoryid').length) {
            categoryid = $('.activeOption').attr("data-categoryid");
        }
        var authorids = [];
        $('.authorids:checked').each(function(i){
            authorids[i] = $(this).val();
        });
        var ratings = [];
        $('.ratings:checked').each(function(i){
            ratings[i] = $(this).val();
        });
        console.log('here on  filterProducts1 change');
        $.get('/filterProducts', {categoryid: categoryid, authorids: authorids, ratings: ratings, sortby: sortby}, function (data) {
            $('.append_products').html('');
            $('.append_products').append(data);
        });
    });
    
    $('.filterVendorProducts').on('change', function() {
        var vendorsortby = $('#vendorsortby').val();
        var vendorid = $(this).attr("data-vendorid");
        $.get('/filterVendorProducts', {vendorsortby: vendorsortby, vendorid: vendorid}, function (data) {
            $('.append_vendor_products').html('');
            $('.append_vendor_products').append(data);
        });
    });
    
    $('.search_by_author_name').on('click change keyup keydown keypress', function() {
        var authorName = $('#authorName').val();
        $.get('/search_by_author_name', {authorName: authorName}, function (data) {
            $('#append_authors').html('');
            $('#append_authors').append(data);
        });
    });

    //typeahead
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get('/autocomplete', { query: query }, function (data) {
                $('#search_results').html('');
                $('#search_results').append(data);
                $('#search_results_mobile').html('');
                $('#search_results_mobile').append(data);
                
                
                $('#search_results_mobile2').html('');
                $('#search_results_mobile2').append(data);
            });
        }
    });
    
    $(window).on('load', function() {
        $('body').addClass('loaded');
        subscribePopup();
    });
})(jQuery);