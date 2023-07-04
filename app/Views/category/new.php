<h1 class="p-5"><?= $title ?></h1>
<p style='color:red;font-weight:bold'><?= session()->getFlashdata('error') ?></p>
<?= validation_list_errors() ?>

<div class="p-5">
    <form method='post' action='<?= base_url('/category/new') ?>'>
        <div class="mb-3">
            <label for="name" class="form-label">Category name</label>
            <input name="name" type="text" class="form-control"/>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>