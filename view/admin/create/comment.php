<?php

$theme->header('Create comment', true);

?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create Comment</h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group">
                            <label class="col-md-12">Text</label>
                            <div class="col-md-12">
                                <textarea rows="5"
                                          class="form-control form-control-line ps-0"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="overflow: visible">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Publish comment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

$theme->footer(true);