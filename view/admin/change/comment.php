<?php

$theme->header('Comment', true);

?>

    <div class="container-fluid">
        <div class="alert alert-success" id="alert-update" role="alert"></div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Comment by <a href="/users/<?= $comment->author_id ?>"><?= $comment->author ?></a></h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group">
                            <label class="col-md-12">Text</label>
                            <div class="col-md-12">
                                <textarea rows="5" id="comment-text" class="form-control form-control-line ps-0"><?= $comment->text ?></textarea>
                            </div>
                        </div>
                        <br>
                    </form>
                    <div class="form-group" style="overflow: visible">
                        <div class="col-sm-12">
                            <button class="btn btn-success text-white" onclick="changeItem.comment(<?= $comment->id ?>)">Publish comment</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$theme->footer(true);