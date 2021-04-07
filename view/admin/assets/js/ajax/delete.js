const deleteItem = {

    user: function (id) {

        const formData = new FormData();
        formData.append('id', id);
        $('#user_' + id).remove();

        $.ajax({
            url: '/admin/delete/user',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function (result) {

            }
        });
    },

    post: function (id) {

    },

    page: function (id) {

    },

    comment: function (id) {

    },

}