<h1><?= $title ?></h1>
<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<?php if (session()->getFlashdata('message') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>

<form method='post' action='<?= base_url('/reset') ?>'>
    <label for="email">Email</label>
    <input name="email" type="email" />
    <br/>
    <label for='security-question'>Security Question: </label>
    sQuestion . "<br/>
    <label for="security-answer">Security Answer: </label>
    <input name="security-answer" type="text" />
    <?php if(isset($new_pwd) && $new_pwd){
        echo "Your new password is " . $new_pwd;
    }
    ?>
    <br/>
    <button type="submit">Reset password</button>
    <br/>
    Already have an account? <a href="<?= base_url('login')?>">Login</a>
</form>