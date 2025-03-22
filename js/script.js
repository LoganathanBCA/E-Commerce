$(document).ready(function () {
    /* validation */
    $("#register-form").validate({
        rules: {
            user_name: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            cpassword: {
                required: true,
                equalTo: '#password'
            },
            user_email: {
                required: true,
                email: true
            }
        },
        messages: {
            user_name: "Please enter a valid username (at least 3 characters)",
            password: {
                required: "Please provide a password",
                minlength: "Password must be at least 8 characters"
            },
            user_email: "Please enter a valid email address",
            cpassword: {
                required: "Please retype your password",
                equalTo: "Passwords do not match!"
            }
        },
        submitHandler: submitForm
    });

    /* form submit */
    function submitForm() {
        var data = $("#register-form").serialize();

        $.ajax({
            type: 'POST',
            url: '../register.php',
            data: data,
            dataType: 'json',  // Expect JSON response
            beforeSend: function () {
                $("#error").fadeOut();
                $("#btn-submit")
                    .prop("disabled", true)
                    .html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Sending...');
            },
            success: function (response) {
                $("#btn-submit").prop("disabled", false);
                
                if (response.status === "error") {
                    $("#error").fadeIn(1000, function () {
                        $("#error").html(`<div class="alert alert-danger"> 
                            <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ${response.message}
                        </div>`);
                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
                    });
                } else if (response.status === "success") {
                    $("#btn-submit").html('<img src="btn-ajax-loader.gif" /> &nbsp; Signing Up...');
                    setTimeout(function () {
                        $(".form-signin").fadeOut(500, function () {
                            $(".signin-form").load("success.php");
                        });
                    }, 2000);
                }
            },
            error: function () {
                $("#error").fadeIn(1000, function () {
                    $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Something went wrong, please try again.</div>');
                    $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
                    $("#btn-submit").prop("disabled", false);
                });
            }
        });

        return false;
    }
});
