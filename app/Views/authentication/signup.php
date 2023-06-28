<h1><?= $title ?></h1>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<?php if (session()->getFlashdata('message') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>

<form method='post' action='<?= base_url('/signup') ?>'>
    <label for="email">Email</label>
    <input name="email" type="email" />
    <br/>
    <label for="password">Password</label>
    <input name="password" type="password"/>
    <br/>
    <label for="cpassword">Confirm Password</label>
    <input name="cpassword" type="password"/>
    </br>
    <button type="submit">Sign up</button>
    </br>
    Already have an account? <a href="<?= base_url('login')?>">Login</a>
</form>