$(document).ready(() => {
    var scroll_pos = 0
    $(document).scroll(() => {
        scroll_pos = $(this).scrollTop();
        if (scroll_pos > 100) {
            $("nav:first").addClass('bg-white')
        } else {
            $("nav:first").removeClass('bg-white')
        }
    });

});

const navbar_scroll = new SmoothScroll('.nav-item a[href*="#"]', {speed: 800});
const read_more_escroll = new SmoothScroll('.read-more-title a[href*="#"]', {speed: 800});