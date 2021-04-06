<?php

$theme->header('Update post', true);

?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Post</h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group" style="width: 400px;">
                            <label class="col-md-12">Title</label>
                            <div class="col-md-12">
                                <input type="text" value="Title" class="form-control form-control-line ps-0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12" style="margin-bottom: 17px">Image</label>
                            <div class="example-3">
                                <label for="custom-file-upload" class="filupp">
                                    <span class="filupp-file-name js-value">Upload new image</span>
                                    <input type="file" name="attachment-file" value="1" id="custom-file-upload">
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ps-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Content</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ps-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="overflow: visible">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Publish post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php

        $theme->block(
            'admin/list-comments',
            [
                'paginationParams' => $paginationParams
            ]
        );

        ?>
    </div>

<?php

$theme->footer(true);