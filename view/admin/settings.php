<?php

$theme->header('Settings', true);

?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Settings</h4>
                <div class="posts_per_page" style="float: left;">
                    <?php

                    $theme->block(
                        'admin/select-perpage',
                        [
                            'params' => $paginationParams,
                            'label' => 'Select the number of posts to display:',
                        ]
                    );

                    ?>
                </div>
            </div>
        </div>
    </div>

<?php

$theme->footer(true);