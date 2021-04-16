<?php

$theme->header('Update post', true);

?>

    <div class="container-fluid">
        <div class="alert alert-success" id="alert-update" role="alert"></div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Post</h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group" style="width: 400px;">
                            <label class="col-md-12">Title</label>
                            <div class="col-md-12">
                                <input type="text" id="post_title" value="<?= $post->title ?>" class="form-control form-control-line ps-0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12" style="margin-bottom: 17px">Image</label>
                            <div class="example-3">
                                <label for="post_img" id="post_img_label" class="filupp">
                                    <span class="filupp-file-name js-value">Upload new image <?= $post->img ? '( ' . $post->img . ' )' : '' ?></span>
                                    <input type="file" name="attachment-file" id="post_img">
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea rows="5" id="post_description" class="form-control form-control-line ps-0"><?= $post->description ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Content</label>
                            <div class="col-md-12">
                                <textarea rows="5" id="post_content" class="form-control form-control-line ps-0"><?= $post->content ?></textarea>
                            </div>
                        </div>
                        <br>
                    </form>
                    <div class="form-group" style="overflow: visible">
                        <div class="col-sm-12">
                            <button id="updatePost" class="btn btn-success text-white" onclick="changeItem.post(<?= $post->id ?>)">Publish post</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

        $theme->block(
            'admin/list-comments',
            [
                'paginationParams' => $paginationParams,
                'comments' => $comments
            ]
        );

        ?>
    </div>

<?php

$theme->footer(true);