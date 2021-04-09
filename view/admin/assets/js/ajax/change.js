const changeItem = {

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

    user: function (id) {

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

        formData.append('id', id);
        formData.append('name', name.val());
        formData.append('email', email.val());
        formData.append('password', password.val());
        formData.append('about', about.val());
        formData.append('role', role.val());
        formData.append('subscribe', subscribe.prop('checked'));

        $.ajax({
            url: '/admin/change/user',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

                if (result.includes('"empty_name"')) {
                    changeItem.showError(nameError, name, 'Name field cannot be empty');
                } else {
                    changeItem.hideError(nameError, name);
                }

                if (result.includes('"empty_email"')) {
                    changeItem.showError(emailError, email, 'Email field cannot be empty');

                } else if (result.includes('"isset_email"')) {
                    changeItem.showError(emailError, email, 'User with this email already exists');

                } else if (result.includes('"wrong_email"')) {
                    changeItem.showError(emailError, email, 'Invalid email type');

                } else {
                    changeItem.hideError(emailError, email);
                }

                if (result === '"Success!"') {
                    $("#updateUser").attr('disabled', true);
                    password.val('');
                    alertSuccess.text('You have successfully update!');
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

    post: function (id) {

        const formData = new FormData();

        var title = $('#post_title');
        var img = $('#post_img');
        var description = $('#post_description');
        var content = $('#post_content');
        var alertSuccess = $('#alert-update');

        var titleError = $('#post_title + .error_admin');
        var imgError = $('#post_img_label + .error_admin');
        var descriptionError = $('#post_description + .error_admin');
        var contentError = $('#post_content + .error_admin');

        formData.append('id', id);
        formData.append('title', title.val());
        formData.append('img', img.prop('files')[0]);
        formData.append('description', description.val());
        formData.append('content', content.val());

        $.ajax({
            url: '/admin/change/post',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

                if (result.includes('"empty_title"')) {
                    changeItem.showError(titleError, title, 'Title field cannot be empty');
                } else {
                    changeItem.hideError(titleError, title);
                }

                if (result.includes('"empty_description"')) {
                    changeItem.showError(descriptionError, description, 'Description field cannot be empty');
                } else {
                    changeItem.hideError(descriptionError, description);
                }

                if (result.includes('"empty_content"')) {
                    changeItem.showError(contentError, content, 'Content field cannot be empty');
                } else {
                    changeItem.hideError(contentError, content);
                }

                if (result.includes('"error_type"')) {
                    changeItem.showError(imgError, $('#post_img_label'), 'Invalid file type');

                } else if (result.includes('"error_size"')) {
                    changeItem.showError(imgError, $('#post_img_label'), 'File size must not exceed 2097152 bytes');

                } else {
                    changeItem.hideError(imgError, $('#post_img_label'));
                }

                if (result === '"Success!"') {
                    $("#updatePost").attr('disabled', true);
                    alertSuccess.text('You have successfully update!');
                    alertSuccess.removeClass('alert-exit');
                    alertSuccess.addClass('alert-active');

                    setTimeout(() => {
                        alertSuccess.removeClass('alert-active');
                        alertSuccess.addClass('alert-exit');
                        $("#updatePost").attr('disabled', false);
                    }, 5000);
                }

            }
        });
    },

    page: function (id) {

    },

    comment: function (id) {

    },

}