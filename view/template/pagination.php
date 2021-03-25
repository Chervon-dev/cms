<?php if ($paginator->total() > $paginator->perPage()): ?>
    <div class="text-center col-md-12">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $paginator->lastPage(); $i++): ?>

                <li class="<?= getActiveClassForValidationByPage($i) ?>">
                    <a href="<?= $paginator->url($i) ?>">
                        <?= $i ?>
                    </a>
                </li>

            <?php endfor; ?>
        </ul>
    </div>
<?php endif; ?>
