<a class="btn btn-primary mb-5" href="<?= base_url("/invoice/new") ?>">Add new invoice</a>
<?php if($invoices) :?>
    <?php foreach($invoices as $key => $invoice): ?>
        <div class="card">
            <h5 class="card-header"><?= $invoice['statement_number'] ?></h5>
            <div class="card-body">
                <?php foreach($invoice as $key => $value): ?>
                <div class="card-text">
                    <?= $key ?> : <?= $value ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

<?php else: ?>
    <p>Nothing much to see here right now!</p>
<?php endif; ?>