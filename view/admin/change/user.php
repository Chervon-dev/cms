<?php

$theme->header('Update user', true);

?>

    <div class="container-fluid">
        <div class="alert alert-success" id="alert-update" role="alert"></div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update User</h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group" style="width: 400px;">
                            <label class="col-md-12">Name</label>
                            <div class="col-md-12">
                                <input type="text" id="user_name" value="<?= $user->name ?>"
                                       class="form-control form-control-line ps-0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" id="user_email" value="<?= $user->email ?>"
                                       class="form-control form-control-line ps-0" name="example-email">
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label class="col-md-12">New password</label>
                            <div class="col-md-12">
                                <input type="password" id="user_password" class="form-control form-control-line ps-0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">About</label>
                            <div class="col-md-12">
                                <textarea rows="5" id="user_about"
                                          class="form-control form-control-line ps-0"><?= $user->about ?></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label class="col-sm-12">Select Role</label>
                            <div class="col-sm-12 border-bottom">
                                <select id="user_role" class="form-select shadow-none border-0 form-control-line ps-0">
                                    <?php foreach ($roles as $role): ?>
                                        <option value="<?= $role->id ?>" <?= $user->role_id == $role->id ? 'selected' : '' ?>>
                                            <?= $role->title ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label for="myonoffswitch" class="col-sm-12">Subscription</label>
                            <div class="onoffswitch" style="margin-left: 3px;">
                                <input id="user_subscribe" type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                       tabindex="0" <?= $user->isSubscribe ? 'checked' : '' ?>>
                                <label class="onoffswitch-label" for="user_subscribe"></label>
                            </div>
                        </div>
                        <br>
                    </form>
                    <div class="form-group" style="overflow: visible">
                        <div class="col-sm-12">
                            <button id="updateUser" class="btn btn-success text-white" onclick="changeItem.user(<?= $user->id ?>)">Update user</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$theme->footer(true);