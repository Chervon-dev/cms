const createItem = {

    showError: function (error, object, message) {
        if (!error.length) {
            object.css({'borderBottomColor' : 'red'});
            object.after('<div class="error_admin">' + message + '</div>');
        } else {
            error.text(message);
        }
    },

    hideError: function (error, object) {
        object.css({'borderBottomColor' : '#000'});
        error.remove();
    },

    user: function () {

        const formData = new FormData();

        var name = $('#user_name');
        var email = $('#user_email');
        var password = $('#user_password');
        var about = $('#user_about');
        var role = $('#user_role');
        var subscribe = $('#user_subscribe');
        var alertSuccess = $("#alert-update");

        var nameError = $('#user_name + .error_admin');
        var emailError = $('#user_email + .error_admin');
        var passwordError = $('#user_password + .error_admin');

        formData.append('name', name.val());
        formData.append('email', email.val());
        formData.append('password', password.val());
        formData.append('about', about.val());
        formData.append('role', role.val());
        formData.append('subscribe', subscribe.prop('checked'));

        $.ajax({
            url: '/admin/create/user/post',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

                if (result.includes('"empty_name"')) {
                    createItem.showError(nameError, name, 'Name field cannot be empty');
                } else {
                    createItem.hideError(nameError, name);
                }

                if (result.includes('"empty_email"')) {
                    createItem.showError(emailError, email, 'Email field cannot be empty');

                } else if (result.includes('"isset_email"')) {
                    createItem.showError(emailError, email, 'User with this email already exists');

                } else if (result.includes('"wrong_email"')) {
                    createItem.showError(emailError, email, 'Invalid email type');

                } else {
                    createItem.hideError(emailError, email);
                }

                if (result.includes('"empty_password"')) {
                    createItem.showError(passwordError, password, 'Password field cannot be empty');
                } else {
                    createItem.hideError(passwordError, password);
                }

                if (result === '"Success!"') {
                    $("#updateUser").attr('disabled', true);

                    password.val('');
                    name.val('');
                    email.val('');
                    about.val('');
                    role.val('');
                    subscribe.prop('checked', true);

                    alertSuccess.text('User successfully created!');
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

    post: function () {

    },

    page: function () {

    },

    comment: function () {

    },

}