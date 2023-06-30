<h1><?= $title ?></h1>
<p>Hello world ! Welcome <?= session()->get('email') ?></p>

<div class="row">
    <div class="m-5 row card w-25">
        <div class="card-body">
            <h5 class="card-title">Account balance</h5>
            <p class="card-text"><strong>$</strong>1,000,000,000</p>
            <p class="card-subtitle mb-3">Last update 30 Jun, 2030hrs</p>
        </div>
    </div>
    <div class="m-5 row card w-25">
        <div class="card-body">
            <h5 class="card-title">Recent transaction</h5>
            <strong class="card-text"><?= $latestTrans[0]['from'] ?></strong>
            <?php if($latestTrans[0]['amount'] > 0): ?>
                <p class="card-text text-success"><strong>+</strong><?= $latestTrans[0]['amount'] ?></p>
            <?php else: ?>
                <p class="card-text text-danger"><strong>-</strong><?= $latestTrans[0]['amount'] ?></p>
            <?php endif; ?>
            <p class="card-subtitle mb-3">Last update <?= $latestTrans[0]['created_date'] ?></p>
            <a href="<?= base_url('transaction') ?>" class="btn btn-primary">Button</a>
        </div>
    </div>
    <div class="m-5 row card w-25">
        <div class="card-body">
            <h5 class="card-title">Outstanding invoices</h5>
            <p class="card-text"><strong>+</strong>1,000,000,000</p>
            <p class="card-subtitle mb-3">Last update 30 Jun, 2030hrs</p>
            <a href="<?= base_url('/invoices') ?>" class="btn btn-primary">Button</a>
        </div>
    </div>
</div>