<h1 class="p-5"><?= $title ?></h1>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<?php if (session()->getFlashdata('message') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>

<div class="p-5">
    <form method='post' action='<?= base_url('/signup') ?>'>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input name="cpassword" type="password"class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="security-question" class="form-label">Security question</label>
            <input name="security-question" type="text" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="security-answer" class="form-label">Security answer</label>
            <input name="security-answer" type="text" class="form-control"/>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Sign up</button>
        </div>
        <div class="mb-3 text-center">
            Already have an account? <a href="<?= base_url('login')?>">Login</a>
        </div>
    </form>
</div>