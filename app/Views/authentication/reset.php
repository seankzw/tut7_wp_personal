<h1><?= $title ?></h1>
<p style='color:red;font-weight:bold'><?= session()->getFlashdata('error') ?></p>
<?= validation_list_errors() ?>

<?php if (session()->getFlashdata('message') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>

<form method='post' action='<?= base_url('/reset') ?>'>
    <label for="email">Email</label>
    <input name="email" type="email" value='<?= isset($email) ? $email : '' ?>'/>
    <?php if(isset($sQuestion) && $sQuestion){
        echo "<br/>";
        echo "<label for='security-question'>Security Question: </label>";
        echo $sQuestion . "<br/>";
        echo '<label for="security-answer">Security Answer: </label>';
        echo '<input name="security-answer" type="text" />';
    }?>
    <?php if(isset($new_pwd) && $new_pwd){
        echo "<br/>Your new password is  <span style='color:red'>" . $new_pwd . "</span>";
    }
    ?>
    <br/>
    <button type="submit">Reset password</button>
    <br/>
    Already have an account? <a href="<?= base_url('login')?>">Login</a>
</form>