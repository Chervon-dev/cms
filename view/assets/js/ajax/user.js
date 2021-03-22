const showAuthError = (error, object, message) => {
    if (!error.length) {
        object.after('<p class="error_auth">' + message + '</p>');
    } else {
        error.text(message);
    }
};

const showUpdateError = (error, object, message) => {
    if (!error.length) {
        object.after('<p class="error_profileUpdate">' + message + '</p>');
    } else {
        error.text(message);
    }
};

const user = {
    ajaxMethod: 'POST',

    add: function () {
        const formData = new FormData();

        var name = $('#name');
        var email = $('#email');
        var password = $("#password");
        var confirm_password = $("#confirm-password");
        var checkbox = $("#gridCheck");

        var nameError = $('#name + .error_auth');
        var emailError = $('#email + .error_auth');
        var passwordError = $('#password + .error_auth');
        var confirm_passwordError = $('#confirm-password + .error_auth');

        formData.append('name', name.val());
        formData.append('email', email.val());
        formData.append('password', password.val());
        formData.append('confirm_password', confirm_password.val());
        formData.append('agree_with_the_site_rules', checkbox.val());

        if (checkbox.is(':checked')) {
            formData.append('agree_with_the_site_rules', 'checked');
        } else {
            formData.append('agree_with_the_site_rules', 'unchecked');
        }

        $.ajax({
            url: '/auth/signup/run',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

                if (result.includes('"empty_name"')) {
                    showAuthError(nameError, name, 'Name field cannot be empty');
                } else {
                    nameError.remove();
                }

                if (result.includes('"empty_email"')) {
                    showAuthError(emailError, email, 'Email field cannot be empty');

                } else if (result.includes('"isset_email"')) {
                    showAuthError(emailError, email, 'This email is already registered');

                } else if (result.includes('"wrong_email"')) {
                    showAuthError(emailError, email, 'Invalid email type');

                } else {
                    emailError.remove();
                }

                if (result.includes('"empty_password"')) {
                    showAuthError(passwordError, password, 'The password field cannot be empty');
                } else {
                    passwordError.remove();
                }

                if (result.includes('"empty_confirm_password"')) {
                    showAuthError(confirm_passwordError, confirm_password, 'Confirm password field cannot be empty');

                } else if (result.includes('"passwords_mismatch"')) {
                    showAuthError(confirm_passwordError, confirm_password, 'Password mismatch');

                } else {
                    confirm_passwordError.remove();
                }

                if (result.includes('"site-rules_unchecked"')) {
                    $('.form-check-label').css({'color': 'red'});
                } else {
                    $('.form-check-label').css({'color': 'black'});
                }

                if (result === '"You have successfully registered!"') {
                    setTimeout(() => {
                        window.location.href = "/";
                    }, 1000);
                }
            }
        });
    },

    login: function () {
        const formData = new FormData();

        var email = $('#email');
        var password = $("#password");

        var emailError = $('#email + .error_auth');
        var passwordError = $('#password + .error_auth');

        formData.append('email', email.val());
        formData.append('password', password.val());

        $.ajax({
            url: '/auth/login/run',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

                if (result.includes('"empty_email"')) {
                    showAuthError(emailError, email, 'Email field cannot be empty');

                } else if (result.includes('"wrong_email"')) {
                    showAuthError(emailError, email, 'Invalid email type');

                } else if (result.includes('"not-isset_email"')) {
                    showAuthError(emailError, email, 'This email is not already registered');

                } else {
                    emailError.remove();
                }

                if (result.includes('"empty_password"')) {
                    showAuthError(passwordError, password, 'The password field cannot be empty');

                } else if (result.includes('"wrong_password"')) {
                    showAuthError(passwordError, password, 'Invalid password');

                } else {
                    passwordError.remove();
                }

                if (result === '"You are successfully login!"') {
                    setTimeout(() => {
                        window.location.href = "/";
                    }, 1000);
                }
            }
        });
    },

    updateData: function () {
        const formData = new FormData();

        var userId = $('#userId');
        var name = $('#name');
        var email = $('#userEmail');
        var password = $("#password");
        var about = $("#about");
        var alertSuccess = $("#alert-update");

        var nameError = $('#name + .error_profileUpdate');
        var emailError = $('#userEmail + .error_profileUpdate');

        formData.append('userId', userId.val());
        formData.append('name', name.val());
        formData.append('email', email.val());
        formData.append('password', password.val());
        formData.append('about', about.val());

        $.ajax({
            url: '/profile/update/data',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

                if (result.includes('"empty_name"')) {
                    showUpdateError(nameError, name, 'Name field cannot be empty');
                } else {
                    nameError.remove();
                }

                if (result.includes('"empty_email"')) {
                    showUpdateError(emailError, email, 'Email field cannot be empty');

                } else if (result.includes('"email_isset"')) {
                    showUpdateError(emailError, email, 'This email is already registered');

                } else if (result.includes('"wrong_email"')) {
                    showUpdateError(emailError, email, 'Invalid email type');

                } else {
                    emailError.remove();
                }

                if (result === '"You have successfully updated!"') {
                    $("#updateUser").attr('disabled', true);
                    password.val('');
                    alertSuccess.text('You have successfully updated!');
                    alertSuccess.removeClass('alert-exit');
                    alertSuccess.addClass('alert-active');

                    setTimeout(() => {
                        alertSuccess.removeClass('alert-active');
                        alertSuccess.addClass('alert-exit');
                        $("#updateUser").attr('disabled', false);
                    }, 5000);
                }
            }
        });
    },

    updateAvatar: function () {
        const formData = new FormData();

        var userId = $('#userId');
        var avatar = $("#img_avatar");
        var alert = $("#alert-update");

        formData.append('userId', userId.val());
        formData.append('avatar', avatar.prop('files')[0]);

        $.ajax({
            url: '/profile/update/avatar',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

                if (result.includes('"error_upload"')) {

                    alert.addClass('alert-danger');
                    alert.removeClass('alert-exit');
                    alert.text('Error upload!');
                    alert.addClass('alert-active');
                    alert.addClass('alert-danger');

                    setTimeout(() => {
                        alert.removeClass('alert-active');
                        alert.addClass('alert-exit');
                        $("#updateUser").attr('disabled', false);
                    }, 5000);

                }

                if (result.includes('"error_type"')) {

                    alert.addClass('alert-danger');
                    alert.removeClass('alert-exit');
                    alert.text('Error file type!');
                    alert.addClass('alert-active');
                    alert.addClass('alert-danger');

                    setTimeout(() => {
                        alert.removeClass('alert-active');
                        alert.addClass('alert-exit');
                        $("#updateUser").attr('disabled', false);
                    }, 5000);

                }

                if (result.includes('"error_size"')) {

                    alert.addClass('alert-danger');
                    alert.removeClass('alert-exit');
                    alert.text('Error file size!');
                    alert.addClass('alert-active');
                    alert.addClass('alert-danger');

                    setTimeout(() => {
                        alert.removeClass('alert-active');
                        alert.addClass('alert-exit');
                        $("#updateUser").attr('disabled', false);
                    }, 5000);

                }

                if (result === '"You have successfully updated!"') {
                    alert.removeClass('alert-exit');
                    console.log(result);
                    alert.text('You have successfully updated!');
                    alert.addClass('alert-active');

                    setTimeout(() => {
                        alert.removeClass('alert-active');
                        alert.addClass('alert-exit');
                        $("#updateUser").attr('disabled', false);
                    }, 5000);
                }
            }
        });
    },
};