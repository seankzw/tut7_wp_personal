<h1 class="p-5"><?= $title ?></h1>
<p style='color:red;font-weight:bold'><?= session()->getFlashdata('error') ?></p>
<?= validation_list_errors() ?>

<?php if (session()->getFlashdata('message') !== NULL) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo session()->getFlashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
<?php endif; ?>

<div class="p-5">
    <form method='post' action='<?= base_url('/reset') ?>'>
        <div class="mb-5">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" value='<?= isset($email) ? $email : '' ?>'/>
        </div>
        <?php if(isset($sQuestion) && $sQuestion){
            echo "<div class='mb-5'>";
            echo "<label for='security-question' class='form-label'>Security Question: </label>";
            echo $sQuestion . "<br/>";
            echo "</div>";
            echo "<div class='mb-5'>";
            echo '<label for="security-answer" class="form-label">Security Answer: </label>';
            echo '<input name="security-answer" type="text" class="form-control"/>';
            echo "</div>";
        }?>
        <?php if(isset($new_pwd) && $new_pwd){
            echo "Your new password is  <span style='color:red'>" . $new_pwd . "</span>";
        }
        ?>
        <div class="mb-5 text-center">
            <button type="submit" class="btn btn-primary">Reset password</button>
        </div>
        <div class="mb-5 text-center">
            Already have an account? <a href="<?= base_url('login')?>">Login</a>
        </div>
    </form>
    </div>