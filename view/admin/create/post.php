<?php

$theme->header('Create post', true);

?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Post</h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group">
                            <label class="col-md-12" style="margin-bottom: 23px">Image</label>
                            <div class="example-3">
                                <label for="custom-file-upload" class="filupp">
                                    <span class="filupp-file-name js-value">Upload image</span>
                                    <input type="file" name="attachment-file" value="1" id="custom-file-upload">
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label class="col-md-12">Title</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-line ps-0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ps-0"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Content</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ps-0"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="overflow: visible">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Create post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

$theme->footer(true);