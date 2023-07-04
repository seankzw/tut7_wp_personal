<h1><?= $title ?></h1>

<div class="row">
    <div class="m-5 row card w-25">
        <div class="card-body">
            <h5 class="card-title">Account balance</h5>
            <p class="card-text"><strong>$</strong><?= number_format($acc_bal,2) ?></p>
            <p class="card-subtitle fst-italic mb-3">Last update <?= date("d M, Gi")?>hrs</p>
        </div>
    </div>
    <div class="m-5 row card w-25">
        <div class="card-body">
            <h5 class="card-title">Recent transaction</h5>
            <?php if($latestTrans) : ?>
                <strong class="card-text"><?= $latestTrans['desc'] ?></strong>
                <?php if($latestTrans['amount'] > 0): ?>
                    <p class="card-text text-success"><strong>+$</strong><?= number_format($latestTrans['amount'],2) ?></p>
                <?php else: ?>
                    <p class="card-text text-danger"><strong>-</strong><?= number_format($latestTrans['amount'],2) ?></p>
                <?php endif; ?>
                <p class="card-subtitle fst-italic mb-3">Last update <?= date("d M, Gi",$latestTrans['date'])?>hrs</p>
                <a href="<?= base_url('transaction') ?>" class="btn btn-primary">Button</a>
            <?php else: ?>
                <p class="card-subtitle mb-3"><i>No transaction yet</i></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="m-5 row card w-25">
        <div class="card-body">
            <h5 class="card-title">Outstanding invoices</h5>
            <p class="card-text"><strong>+</strong>1,000,000,000</p>
            <p class="card-subtitle fst-italic mb-3">Last update 30 Jun, 2030hrs</p>
            <a href="<?= base_url('/invoices') ?>" class="btn btn-primary">Button</a>
        </div>
    </div>
</div>