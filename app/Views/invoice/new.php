<h1 class="p-5"><?= $title ?></h1>
<p style='color:red;font-weight:bold'><?= session()->getFlashdata('error') ?></p>
<?= validation_list_errors() ?>

<div class="p-5">
    <form method='post' action='<?= base_url('/invoice/new') ?>'>
        <!-- Income and expenses -->
        <!-- Date, Description, category, amount -->
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input name="date" type="date"  class="form-control"/>
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea name="desc" class="form-control"></textarea>
        </div>


        <div class="mb-3">
            <label for="amount" class="form-label">Amount ($) [- for expenses, + for income] eg. +45, -10</label>
            <input name="amount" step="any" type="number" class="form-control"/>
        </div>

        <a href="<?= base_url('invoice') ?>" class="btn btn-primary">View all transactions</a>
        <button type="submit" class='btn btn-primary'>Add expenses</button>
    </form>
</div>