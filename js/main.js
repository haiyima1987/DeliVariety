$(document).ready(function () {

    // task 1: show the menu overlay
    // variables for task 1
    var $bgMenu = $(".btnMenu");
    var $btnClose = $(".btnClose");
    var $overlay = $(".overlay");
    var $body = $("body");
    var $delayTimeMenu = 200;
    var $showTimeMenu = 500;

    // add event handlers
    $bgMenu.click(showMenu);
    $btnClose.click(closeMenu);

    // show menu
    function showMenu() {
        $overlay.delay($delayTimeMenu).slideDown($showTimeMenu);
        $body.addClass("noScroll");
    }

    // hide menu
    function closeMenu() {
        $overlay.delay($delayTimeMenu).slideUp($showTimeMenu);
        $body.removeClass("noScroll");
    }

    // task 2: run the carousel
    // variables for task 2
    var carouselInterval;
    var $pageIndex = 1;
    var $pauseTimeCarousel = 5000;
    var $slidingTimeCarousel = 1000;
    var $width = '100%';
    var $carousel = $(".carousel");
    var $slides = $carousel.find(".slide");

    // startSlider();

    // start the slider
    function startSlider() {
        carouselInterval = setInterval(flipPage, $pauseTimeCarousel);
    }

    // flip one page
    function flipPage() {
        $carousel.animate({'margin-left': '-=' + $width}, $slidingTimeCarousel, pageRenew);
    }

    // renew page number
    function pageRenew() {
        $pageIndex++;
        if ($pageIndex === $slides.length) {
            $carousel.css('margin-left', 0);
            $pageIndex = 1;
        }
    }

    // task 3: click buttons to control the carousel
    // variables for task 3
    var $prev = $("#prev");
    var $next = $("#next");
    var $start = $("#start");
    var $pause = $("#pause");
    var $sliding = false;
    var $delayTimeBtns = 100;
    var $showTimeBtns = 100;

    // add event handlers
    $start.add($pause).click(toggleVisibility);
    $start.on('click', startSlider);
    $pause.on('click', stopSlider);
    $prev.click(flipPageBack);
    $next.click(flipPage);

    // toggle start and stop button visibility
    function toggleVisibility() {
        $sliding = !$sliding;
        if ($sliding) {
            $pause.delay($delayTimeBtns).show($showTimeBtns);
            $start.delay($delayTimeBtns).hide();
        }
        else {
            $start.delay($delayTimeBtns).show($showTimeBtns);
            $pause.delay($delayTimeBtns).hide();
        }
    }

    // stop the slider
    function stopSlider() {
        clearInterval(carouselInterval);
    }

    // flip back one page for carousel buttons below
    function flipPageBack() {
        if ($pageIndex === 1) {
            $pageIndex = $slides.length;
            $lastPageMargin = -100 * ($slides.length - 1) + '%';
            $carousel.css('margin-left', $lastPageMargin);
        }
        $carousel.animate({'margin-left': '+=' + $width}, $slidingTimeCarousel, pageRenewBack);
    }

    // flip one page back
    function pageRenewBack() {
        $pageIndex--;
    }

    // task 4: click the dots to control the carousel
    // variables for task 4
    var $dots = $(".pageDot");

    // add event handlers
    $dots.on("click", slideToSpecificPage);

    // go to a specific page
    function slideToSpecificPage() {
        var $index = $dots.index($(this));
        var $marginLeft = -100 * $index + "%";
        $carousel.animate({'margin-left': $marginLeft}, $slidingTimeCarousel);
        $pageIndex = $index + 1;
    }

    // scroll back to top of page
    jQuery(document).ready(function() {
        var offset = 250;
        var duration = 300;
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > offset) {
                jQuery('.to-top').fadeIn(duration);
            } else {
                jQuery('.to-top').fadeOut(duration);
            }
        });
        jQuery('.to-top').click(function(event) {
            event.preventDefault();
            jQuery('html, body').animate({scrollTop: 0}, duration);
            return false;
        })
    });

    // hover over and select tables
    $(".tableImage").hover(function() {
        if ($(this).is(".selectedTable") === false){
            $(this).attr('src', 'img/table_selected.jpg');
        }
    }, function() {
        if ($(this).is(".selectedTable") === false) {
            $(this).attr('src', 'img/table.jpg');
        }
    });

    $(".tableImage").one("click", selectSeats);
    
    function selectSeats() {
        $(this).addClass("selectedTable");
        $(this).one("click", deselectSeats);
    }

    function deselectSeats() {
        $(this).removeClass("selectedTable");
        $(this).one("click", selectSeats);
})
