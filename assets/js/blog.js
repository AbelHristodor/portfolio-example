$(document).ready(() => {
    $('#modal-error').hide();

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
                switch (data.success) {
                    case true:
                        $('#add_new_form').empty();
                        location.reload();
                        break;
                    case 1:
                        $('#modal-error').html("Le dimensioni dell'immagine non può superare 2MB").show();
                        break;
                    case 2:
                        $('#modal-error').html("Le dimensioni dell'immagine non può superare 2MB").show();
                        break;
                    case 4:
                        $('#modal-error').html("Errore nel caricamento dell'immagine").show();
                        break;
                    default:
                        $('#modal-error').show();
                }
                
            },
            error: (err) => {
                console.log(err);
                alert(':(')
            }
        })
    })
})
