window.onload = function () {
    lax.setup() // init

    const updateLax = () => {
        lax.update(window.scrollY)
        window.requestAnimationFrame(updateLax)
    }

    window.requestAnimationFrame(updateLax)
}


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

$(document).on('click', '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  });
  
const navbar_scroll = new SmoothScroll('.nav-item a[href*="#"]', {
    speed: 900,
    offset: 50
});
const read_more_escroll = new SmoothScroll('.read-more-title a[href*="#"]', {
    speed: 900,
    offset: 50
});