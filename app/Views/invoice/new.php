<h1 class="p-5"><?= $title ?></h1>
<p style='color:red;font-weight:bold'><?= session()->getFlashdata('error') ?></p>
<?= validation_list_errors() ?>

<div class="p-5">
    <form method='post' action='<?= base_url('/invoice/new') ?>'>
        <!-- Income and expenses -->
        <!-- Date, Description, category, amount -->
        <?php foreach($columns as $columnName): ?>
            <?php if($columnName->name != "id" && $columnName->name != "created_at" && $columnName->name != "updated_at" && $columnName->name != "deleted_at"): ?>
                <div class="mb-3">
                    <label for="<?= $columnName->name ?>" class="form-label"><?= $columnName->name ?></label>
                    <input name="<?= $columnName->name ?>" type="<?= ($columnName->type == "varchar") ? 'text' : (($columnName->type == "int") ? 'number' : $columnName->type) ?>"  class="form-control"/>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

        <a href="<?= base_url('invoice') ?>" class="btn btn-primary">View all transactions</a>
        <button type="submit" class='btn btn-primary'>Add expenses</button>
    </form>
</div>