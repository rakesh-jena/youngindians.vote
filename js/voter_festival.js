function castParallax() {

    var opThresh = 350;
    var opFactor = 750;

    window.addEventListener("scroll", function (event) {

        var top = this.pageYOffset;

        var layers = document.getElementsByClassName("parallax");
        var layer, speed, yPos;
        for (var i = 0; i < layers.length; i++) {
            layer = layers[i];
            speed = layer.getAttribute('data-speed');
            var yPos = -(top * speed / 100);
            layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');

        }
    });
}

function dispelParallax() {
    $("#nonparallax").css('display', 'block');
    $("#parallax").css('display', 'none');
}

function castSmoothScroll() {
    $.srSmoothscroll({
        step: 80,
        speed: 300,
        ease: 'linear'
    });
}

function startSite() {

    var platform = navigator.platform.toLowerCase();
    var userAgent = navigator.userAgent.toLowerCase();

    if (platform.indexOf('ipad') != -1 || platform.indexOf('iphone') != -1) {
        dispelParallax();
    }

    else if (platform.indexOf('win32') != -1 || platform.indexOf('linux') != -1) {
        castParallax();

    }

    else {
        castParallax();
    }
}
document.body.onload = startSite();

if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    // true for mobile device
    var isMobile = true;
} else {
    // false for not mobile device
    var isMobile = false;
}

function showPosition(position) {
    $.ajax({
        url: "function.php",
        type: "POST",
        data: {
            'fname': 'near-me',
            'lat': position.coords.latitude,
            'lng': position.coords.longitude
        },
        success: function (response) {
            if (JSON.parse(response).length > 0) {
                if (isMobile) {
                    $('.events .event-item-mobile').hide();
                    $.each(JSON.parse(response), function (key, item) {
                        $('.events .event-item-mobile[data-city="' + item['city'] + '"]').show();
                    });
                } else {
                    $('#not-found').empty().append('Events near you!');
                    $('.events .event-item').hide();
                    $.each(JSON.parse(response), function (key, item) {
                        $('.events .event-item[data-city="' + item['city'] + '"]').show();
                    });
                }
            } else {
                $('#not-found').empty().append('No Events Near You!');
                alert('No Events Near You!');
            }
        }
    });
}

// AJAX
$(document).ready(function () {
    if (isMobile) {
        $('.events .event-item-mobile:gt(4)').hide();
        $('.list-shown').empty().html($('.events .event-item-mobile:visible').length);
        $('.events-show-more').click(function () {
            $('.events .event-item-mobile:hidden').slice(0, 5).show();
            $('.list-shown').empty().html($('.events .event-item-mobile:visible').length);
            if ($('.events .event-item-mobile:visible').length === $('.events .event-item-mobile').length)
                $('.events-show-more').hide();
        });
    } else {
        $('.events .event-item:gt(4)').hide();
        $('.list-shown').empty().html($('.events .event-item:visible').length);
        $('.events-show-more').click(function () {
            $('.events .event-item:hidden').slice(0, 5).show();
            $('.list-shown').empty().html($('.events .event-item:visible').length);
            if ($('.events .event-item:visible').length === $('.events .event-item').length)
                $('.events-show-more').hide();
        });
    }

    //Calender Navs
    $('.cal-nav').click(function () {
        var show = $(this).attr('data-show');
        var hide = $(this).attr('data-hide');
        $('#' + show).fadeIn();
        $('#' + hide).fadeOut();
    });

    //Event Details
    $('#eventModal').on('show.bs.modal', function (e) {
        var triggerElement = $(e.relatedTarget);
        var id = $(triggerElement).attr('data-id');
        $.ajax({
            url: 'function.php',
            type: "POST",
            data: {
                'fname': 'event-detail',
                'id': id
            },
            success: function (res) {
                $('.event-detail-modal').empty().append(res);
            }
        });
    });

    //CountDown Timer
    // let clock;
    // var countDownDate = new Date("2024-05-01").getTime();
    // var now = new Date().getTime();
    // var diff = (countDownDate - now) / 1000;
    // clock = $('.clock').FlipClock(diff, {
    //     clockFace: 'DailyCounter',
    //     countdown: true,
    //     showSeconds: true
    // });

    if ($('#clock').length > 0) {
        var countDownDate = new Date("May 1, 2024 6:00:00").getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("clock").innerHTML = '<h2 class="anton"><span class="text-black">India\'s</span> General Election<br>' + days + "d " + hours + "h "
                + minutes + "m " + seconds + "s</h2>";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("clock").innerHTML = "";
            }
        }, 1000);
    }

    //Near Me
    $('#near-me').on('click', function () {
        var x = $('#not-found');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not turned on.";
        }
    });
    // $('#host-yif').submit(function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "function.php",
    //         data: $(this).serialize(),
    //         success: function (res) {
    //             $('#host-yif .modal-body').empty().append(`<p>
    //             Thank you for your submission! We will be in touch soon; don’t forget to check your inbox and spam
    //             for updates.
    //         </p>`);
    //         }
    //     })
    // });
    // $('#event-yif-form').submit(function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "function.php",
    //         data: $(this).serialize(),
    //         success: function () {
    //             // callback code here
    //         }
    //     })
    // })
});
