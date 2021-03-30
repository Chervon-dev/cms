<?php

$theme->header('Create user', true);

?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Create User</h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group" style="width: 400px;">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                                <input type="text"
                                       class="form-control form-control-line ps-0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email"
                                       class="form-control form-control-line ps-0" name="example-email"
                                       id="example-email">
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control form-control-line ps-0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12" style="margin-bottom: 23px">Avatar</label>
                            <div class="example-3">
                                <label for="custom-file-upload" class="filupp">
                                    <span class="filupp-file-name js-value">Upload avatar</span>
                                    <input type="file" name="attachment-file" value="1" id="custom-file-upload">
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">About</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ps-0"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label class="col-sm-12">Select Role</label>
                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none border-0 form-control-line ps-0">
                                    <option>Administrator</option>
                                    <option>Content manager</option>
                                    <option>Registered user</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label for="myonoffswitch" class="col-sm-12">Subscription</label>
                            <div class="onoffswitch" style="margin-left: 3px;">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                       id="myonoffswitch" tabindex="0">
                                <label class="onoffswitch-label" for="myonoffswitch"></label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="overflow: visible">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Add user</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

$theme->footer(true);