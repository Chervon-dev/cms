$('#peprage-select').on('change', function () {
    var perpage = $(this).val();
    window.location = window.location.origin + window.location.pathname + '?limit=' + perpage;
});