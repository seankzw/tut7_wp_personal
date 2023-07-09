<a class="btn btn-primary" href="<?= base_url('/transaction/new') ?>" target="_blank">New transaction</a>
<?php if(!empty($transactions) && is_array($transactions)) : ?>
    <?php foreach($transactions as $transaction): ?>
    <div class="card">
        <?= $transaction['date'] ?>
        <h5 class="card-header"><?= date("d M Y",strtotime($transaction['date']))?></h5>
        <div class="card-body">
            <h5 class="card-title"><?= $transaction['desc'] ?></h5>

            <?php if($transaction['amount'] > 0) :?>
                <p class="card-text text-success">
                    <strong>+ $</strong>
                    <?= number_format(str_replace("+","",$transaction['amount']),2) ?>
                </p>
            <?php else: ?>
                <p class="card-text text-danger">
                    <strong>- $</strong>
                    <?= number_format(str_replace("-","",$transaction['amount']),2) ?>
                </p>

            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <p> No transaction found </p>
<?php endif; ?>
