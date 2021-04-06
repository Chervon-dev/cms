<?php if ($paginator->total() > $paginator->perPage()): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $paginator->lastPage(); $i++): ?>

                <li class="page-item">
                    <a class="page-link <?= getActiveClassForValidationByPage($i) ?>" href="<?= getParams("page", $i) ?>">
                        <?= $i ?>
                    </a>
                </li>

            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>