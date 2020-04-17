window.onload = function () {
    lax.setup(); // init

    const updateLax = () => {
        lax.update(window.scrollY);
        window.requestAnimationFrame(updateLax);
    };

    window.requestAnimationFrame(updateLax);
};

$(document).ready(() => {
    if (
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
            navigator.userAgent
        )
    ) {
    } else {
        var scroll_pos = 0;
        var animation_begin_pos = 100;
        var animation_end_pos = $("#work-section").position().top;
        var beginning_color = new jQuery.Color("rgba(255,255,255,0)");
        var ending_color = new jQuery.Color("rgba(255,255,255,1)");

        $(document).scroll(() => {
            scroll_pos = $(this).scrollTop();
            if (
                scroll_pos >= animation_begin_pos &&
                scroll_pos <= animation_end_pos
            ) {
                var percentScrolled =
                    scroll_pos / (animation_end_pos - animation_begin_pos);
                var newAlpha =
                    beginning_color.alpha() +
                    (ending_color.alpha() - beginning_color.alpha()) *
                        percentScrolled;
                var newColor = new jQuery.Color([255, 255, 255, newAlpha]);

                $(".navbar").animate({ backgroundColor: newColor }, 0);
            } else if (scroll_pos > animation_end_pos) {
                $(".navbar").animate({ backgroundColor: ending_color }, 0);
            } else if (scroll_pos < animation_begin_pos) {
                $(".navbar").animate({ backgroundColor: beginning_color }, 0);
            } else {
            }
        });
    }

    $.ajax({
        type: "GET",
        url: "https://api.github.com/users/AbelHristodor/repos",
        success: (data) => {
            const tbody = $(".git-table tbody");
            tbody.empty();
            if (data) {
                const dataset = sort_by_language(data);
                dataset.forEach((repo) => {
                    tbody.append(
                        `
                            <tr>
                                <td>${repo.language}</td>
                                <td><a href="${repo.html_url}">${repo.name}</a></td>
                                <td>${repo.description}</td>
                            </tr>
                        `
                    );
                });
            }
        },
        error: (err) => {
            tbody.html("Errore nel caricamento delle repo");
            console.log(err);
        },
    });
});

$(document).on("click", '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});

const navbar_scroll = new SmoothScroll('.nav-item a[href*="#"]', {
    speed: 900,
    offset: 50,
});
const read_more_escroll = new SmoothScroll('.read-more-title a[href*="#"]', {
    speed: 900,
    offset: 50,
});


const sort_by_language = (dataset) => {
    return dataset.sort((a, b) => {
        var A = a.language, B = b.language;
        if (A < B) return 1;
        if (A > B) return -1;
        return 0;
    })
}