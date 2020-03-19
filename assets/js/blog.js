$(document).ready(() => {
    $('#submit_button').click((e) => {
        e.preventDefault();

        var fd = new FormData();

        const title = $('#title_input').val();
        const summary = $('#summary_input').val();
        const desc = $('#description_input').val();
        const image = $('#image_input')[0].files[0];

        fd.append('title', title);
        fd.append('summary', summary);
        fd.append('description', desc);
        fd.append('image', image);

        $.ajax({
            url: "../api/add_post.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,
            success: (data) => {
                if (data.success) {
                    $('#add_new_form').empty();
                    location.reload();
                }
            },
            error: (err) => {
                console.log(err);
                alert(':(')
            }
        })
    })
})