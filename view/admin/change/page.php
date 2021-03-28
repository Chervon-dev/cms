<?php

$theme->header('Pages', true);

?>

    <script src="https://cdn.tiny.cloud/1/gxi76fzyf6oqvujilm85ezyv3ckot7pv7s4sgtxerot3gyx0/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Change static page:</h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group" style="width: 500px">
                            <label for="page_title" class="col-md-12">Title:</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Page 1"
                                       class="form-control form-control-line ps-0" name="page_title"
                                       id="page_title">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="page_content" class="col-md-12">Content:</label>
                            <div class="col-sm-12">
                                    <textarea id="page_content">

                                    </textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Create page</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            height: 250,
            autoresize_min_height: 250,
        });

    </script>

<?php

$theme->footer(true);