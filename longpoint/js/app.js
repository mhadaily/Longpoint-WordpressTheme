//jQuery.noConflict();
(function($) {
  "use strict";
 /* ------------------------------------------
 Animation
--------------------------------------------- */
$('.accordions').collapse({
      toggle: false
    });
    $('.toggles').collapse({
      toggle: true
    });
    $('*[data-toggle="tooltip"]').tooltip();
    $('*[data-toggle="popover"]').popover();
    $('*[data-type="rch-table"]').each(function(){
        $(this).find('table').attr('class', $(this).attr('class'));
        $(this).attr('class', 'rch-table');
    });
    $('a[data-animation]').hover(function(){
        var classname = $(this).attr('data-animation') + ' animated';
        $(this).toggleClass(classname);
    });

 /* ------------------------------------------
Menu Scroll
--------------------------------------------- */

 $('.menu-item a[href*=#]').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
    && location.hostname == this.hostname) {
      var $target = $(this.hash);
      $target = $target.length && $target
      || $('[name=' + this.hash.slice(1) +']');
      if ($target.length) {
        var targetOffset = $target.offset().top - 50;
        $('html,body')
        .animate({scrollTop: targetOffset}, 1000);
       return false;
      }
    }
  });

var sections = $('section');
var navigation_links = $('.menu-item > a');
$('ul.nav > li:first-child').removeClass('active');
sections.waypoint({
    handler: function(direction) {      
      // handler code
        var active_section;
        active_section = $(this);
        if (direction === "up") 
            active_section = active_section.prev();

        var active_link = $('.menu-item > a[href*="#' + active_section.attr("id") + '"]');          
        navigation_links.removeClass("active");
        active_link.addClass("active");
    },
    offset: 55,
});

  /* ------------------------------------------
 Header Sticky
--------------------------------------------- */

    if($('body').attr('data-sticky') == 1) {
        $(".navbar").sticky({topSpacing:0});
    }
/* ------------------------------------------
prettyPhoto
--------------------------------------------- */
 $("a[rel^='prettyPhoto']").prettyPhoto({
            show_title: false, 
            theme: 'facebook', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
            social_tools: false 
        });    
/* ------------------------------------------
Go to top 
--------------------------------------------- */
	
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" lin
		$back_to_top = $('a#toTop, a.to-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('btn-is-visible') : $back_to_top.removeClass('btn-is-visible btn-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('btn-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
 

/* ------------------------------------------
Elastic Slider
--------------------------------------------- */
        function sniffer() {
            var menuHeight = $(".menu").height();
            var navbarHeight = 0;

            if($('.navbar').is(':visible')) {
                var navheight = navbarHeight;
            }else{
                var navheight = menuHeight;
            }

            var windowHeight=$(window).height();
            var windowwidth=$(window).outerWidth(true);
            var imgHeight= windowHeight - navheight;
            //console.log(imgHeight);
            $('#rch-elastic-slider .carousel-inner .item').outerWidth(windowwidth);
            $('#rch-elastic-slider .carousel-inner .item').height(imgHeight);

            function imgsize() {
                var W = $(window).width(),
                    H = $(window).height();

                $('#rch-elastic-slider .carousel-inner .item').height(H).width(W);
            }
            $(window).bind('resize', function() { imgsize(); });

        }
        sniffer();


      /*  $(window).bind("load resize slid.bs.carousel", function() {
            var imageHeight = $(".lp.active .holder").height();
            $("#latest .controllers").height( imageHeight );
        });
		*/
/* ------------------------------------------
Parallax
--------------------------------------------- */
	//$.stellar({horizontalScrolling: false,});
    $(window).stellar({
                responsive:true,
                scrollProperty: 'scroll',
                parallaxElements: false,
                horizontalScrolling: false,
                horizontalOffset: 0,
                verticalOffset: 0
            });

/* ==============================================
SmoothScroll (for Mouse Wheel) v1.2.1 
=============================================== */
    var defaultOptions = {
        frameRate: 150,
        animationTime: 1200,
        stepSize: 120,
        pulseAlgorithm: !0,
        pulseScale: 8,
        pulseNormalize: 1,
        accelerationDelta: 20,
        accelerationMax: 1
    }, options = defaultOptions,
        direction = {
            x: 0,
            y: 0
        }, root = 0 <= document.compatMode.indexOf("CSS") || !document.body ? document.documentElement : document.body,
        que = [],
        pending = !1,
        lastScroll = +new Date;

    function scrollArray(a, b, c, d) {
        d || (d = 1E3);
        directionCheck(b, c);
        if (1 != options.accelerationMax) {
            var e = +new Date - lastScroll;
            e < options.accelerationDelta && (e = (1 + 30 / e) / 2, 1 < e && (e = Math.min(e, options.accelerationMax), b *= e, c *= e));
            lastScroll = +new Date
        }
        que.push({
            x: b,
            y: c,
            lastX: 0 > b ? 0.99 : -0.99,
            lastY: 0 > c ? 0.99 : -0.99,
            start: +new Date
        });
        if (!pending) {
            var q = a === document.body,
                p = function(e) {
                    e = +new Date;
                    for (var h = 0, k = 0, l = 0; l < que.length; l++) {
                        var f = que[l],
                            m = e - f.start,
                            n = m >= options.animationTime,
                            g = n ? 1 : m / options.animationTime;
                        options.pulseAlgorithm && (g = pulse(g));
                        m = f.x * g - f.lastX >> 0;
                        g = f.y * g - f.lastY >> 0;
                        h += m;
                        k += g;
                        f.lastX += m;
                        f.lastY += g;
                        n && (que.splice(l, 1), l--)
                    }
                    q ? window.scrollBy(h, k) : (h && (a.scrollLeft += h), k && (a.scrollTop += k));
                    b || c || (que = []);
                    que.length ? requestFrame(p, a, d / options.frameRate + 1) : pending = !1
                };
            requestFrame(p, a, 0);
            pending = !0
        }
    }

    function wheel(a) {
        var b = overflowingAncestor(a.target);
        if (!b || a.defaultPrevented) return !0;
        var c = a.wheelDeltaX || 0,
            d = a.wheelDeltaY || 0;
        c || d || (d = a.wheelDelta || 0);
        1.2 < Math.abs(c) && (c *= options.stepSize / 120);
        1.2 < Math.abs(d) && (d *= options.stepSize / 120);
        scrollArray(b, -c, -d);
        a.preventDefault()
    }
    var cache = {};
    setInterval(function() {
        cache = {}
    }, 1E4);
    var uniqueID = function() {
        var a = 0;
        return function(b) {
            return b.uniqueID || (b.uniqueID = a++)
        }
    }();

    function setCache(a, b) {
        for (var c = a.length; c--;) cache[uniqueID(a[c])] = b;
        return b
    }

    function overflowingAncestor(a) {
        var b = [],
            c = root.scrollHeight;
        do {
            var d = cache[uniqueID(a)];
            if (d) return setCache(b, d);
            b.push(a);
            if (c === a.scrollHeight) {
                if (root.clientHeight + 10 < c) return setCache(b, document.body)
            } else if (a.clientHeight + 10 < a.scrollHeight && (overflow = getComputedStyle(a, "").getPropertyValue("overflow-y"), "scroll" === overflow || "auto" === overflow)) return setCache(b, a)
        } while (a = a.parentNode)
    }

    function directionCheck(a, b) {
        a = 0 < a ? 1 : -1;
        b = 0 < b ? 1 : -1;
        if (direction.x !== a || direction.y !== b) direction.x = a, direction.y = b, que = [], lastScroll = 0
    }
    var requestFrame = function() {
        return window.requestAnimationFrame || window.webkitRequestAnimationFrame || function(a, b, c) {
            window.setTimeout(a, c || 1E3 / 60)
        }
    }();

    function pulse_(a) {
        var b;
        a *= options.pulseScale;
        1 > a ? b = a - (1 - Math.exp(-a)) : (b = Math.exp(-1), a = 1 - Math.exp(-(a - 1)), b += a * (1 - b));
        return b * options.pulseNormalize
    }

    function pulse(a) {
        if (1 <= a) return 1;
        if (0 >= a) return 0;
        1 == options.pulseNormalize && (options.pulseNormalize /= pulse_(1));
        return pulse_(a)
    }
    window.addEventListener("mousewheel", wheel, !1);


})(jQuery);