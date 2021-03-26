<div style="float: right">
    <div class="row g-3 align-items-center" style="font-size: 16px">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">Per page config:</label>
        </div>
        <div class="col-auto" style="font-weight: 100">
            <select class="form-select" aria-label="Default select example">

                <?php foreach ($params['per_page_values'] as $value): ?>
                    <option value="<?= $value ?>" <?= $value == $params['per_page_default'] ? 'selected' : '' ?>>
                        <?= $value ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>
    </div>
</div>