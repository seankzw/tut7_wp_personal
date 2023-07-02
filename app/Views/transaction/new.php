<h1 class="p-5"><?= $title ?></h1>
<p style='color:red;font-weight:bold'><?= session()->getFlashdata('error') ?></p>
<?= validation_list_errors() ?>

<div class="p-5">
    <form method='post' action='<?= base_url('/transaction/new') ?>'>
        <div class="mb-3">
            <label for="from" class="form-label">From</label>
            <input name="from" type="text" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="to" class="form-label">To</label>
            <input name="to" type="text" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount ($)</label>
            <input name="amount" type="number" class="form-control"/>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>