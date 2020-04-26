$('form').submit((e) => {
    e.preventDefault();

    const email = $('#emailInput').val();
    const pass1 = $('#passwordInput').val();
    const pass2 = $('#password2Input').val();
    const first_name = $('#firstNameInput').val();
    const last_name = $('#lastNameInput').val();

    console.log(email + " " + pass1 + " " + pass2)

    if (pass1 == pass2) {
        $.ajax({
            url: "/api/register.php",
            type: "POST",
            data: {
                first_name,
                last_name,
                email,
                password: pass1
            },
            success: (data) => {
                console.log(data);
                $(this).empty();
                if (data.success) {
                    location.href = "/pages/blog.php?logged_in=true";
                } else {
                    location.href = "/";
                }
                
            },
            error: (err) => {
                console.log("err: " + err);
            }
        })
    }
})