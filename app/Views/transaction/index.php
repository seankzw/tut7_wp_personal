<?php if(!empty($transactions) && is_array($transactions)) : ?>
    <?php foreach($transactions as $transaction): ?>
    <div class="card">
        <h5 class="card-header"><?= $transaction['created_date'] ?></h5>
        <div class="card-body">
            <h5 class="card-title">From: <?= $transaction['from'] ?></h5>
            <p class="card-text">
                <strong>$</strong>
                <?= $transaction['amount'] ?>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <p> No transaction found </p>
<?php endif; ?>
