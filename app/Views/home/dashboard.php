<h1><?= $title ?></h1>

<div class="row">
    <div class="m-5 row card w-25">
        <div class="card-body">
            <h5 class="card-title">Account balance</h5>
            <p class="card-text"><strong>$</strong><?= number_format($acc_bal,2) ?></p>
            <p class="card-subtitle fst-italic mb-3">Last update <?= date("d M, gi")?>hrs</p>
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
                <p class="card-subtitle fst-italic mb-3">Last update <?= date("d M, gi",$latestTrans['date'])?>hrs</p>
                <a href="<?= base_url('transaction') ?>" class="btn btn-primary">View</a>
            <?php else: ?>
                <p class="card-subtitle mb-3"><i>No transaction yet</i></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="m-5 row card w-25">
        <div class="card-body">
            <h5 class="card-title">Outstanding invoices (<?= $invoice_count ?>)</h5>
            <?php if($invoices) :?>
                <p class="card-text"><strong>$<?= $invoices['amount'] ?></strong></p>
                <p class="card-subtitle fst-italic mb-3"><strong>Due date :</strong>
                    <?= date('d M, gi', strtotime($invoices['due_date'])) ?>hrs
                </p>
                <a href="<?= base_url('/invoice') ?>" class="btn btn-primary">View</a>
            <?php else: ?>
                <p class="card-subtitle fst-italic mb-3">No outstanding invoice</p>
            <?php endif ?>
                <a href="<?= base_url('/invoice/new') ?>" class="btn btn-primary">Add new</a>
        </div>
    </div>
</div>