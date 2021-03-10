const showSubscribeError = (error, object, message) => {
    if (!error.length) {
        object.after('<p class="error_subscribe">' + message + '</p>');
    } else {
        error.text(message);
    }
};

/**
 * @param button
 */
const changeButtonText = (button) => {
    if (button.innerText === "SUBSCRIBE") {
        button.textContent = "UNSUBSCRIBE";
    } else {
        button.textContent = "SUBSCRIBE";
    }
};

/**
 * @param button
 */
const changeOnclick = (button) => {
    if (button.getAttribute("onclick") === 'subscription.sign()') {
        button.setAttribute('onclick', 'subscription.unsubscribe()');
    } else {
        button.setAttribute('onclick', 'subscription.sign()');
    }
};

const updateButton = (button) => {
    changeButtonText(button);
    changeOnclick(button);
};

const subscription = {
    ajaxMethod: 'POST',

    sign: function () {
        const formData = new FormData();

        var email = $('#email');
        var emailError = $('#email +.error_subscribe');
        var subscriptionButton = document.getElementById("subscription");

        formData.append('email', email.val());

        // Запрос Ajax
        $.ajax({
            url: '/subscribe/sign',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

                if (isAuth === 1) {
                    updateButton(subscriptionButton);

                } else {

                    if (result === '"Success!"') {
                        location.reload();
                    }

                    if (result.includes('"empty_email"')) {
                        showSubscribeError(emailError, email, 'Email field cannot be empty');

                    } else if (result.includes('"isset_email"')) {
                        showSubscribeError(emailError, email, 'This email has already been subscribed');

                    } else if (result.includes('"wrong_email"')) {
                        showSubscribeError(emailError, email, 'Invalid email type');
                    }
                }
            }
        });
    },

    unsubscribe: function () {
        const formData = new FormData();

        var email = $('#email');
        var subscriptionButton = document.getElementById("subscription");

        formData.append('email', email.val());

        // Запрос Ajax
        $.ajax({
            url: '/subscribe/unsubscribe',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {
                updateButton(subscriptionButton)
            }
        });
    },
};