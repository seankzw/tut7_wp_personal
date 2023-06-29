<h1><?= $title ?></h1>
<p style='color:red;font-weight:bold'><?= session()->getFlashdata('error') ?></p>
<?= validation_list_errors() ?>

<form method='post' action='<?= base_url('/login') ?>'>
    <label for="email">Email</label>
    <input name="email" type="email"/>
    <br/>
    <label for="password">Password</label>
    <input name="password" type="password"/>
    </br>
    <button type="submit">Login</button>
    </br>
    No account? <a href="<?= base_url('/signup')?>">Sign up</a>
    </br>
    Forget password? <a href="<?= base_url('/reset')?>">Reset password</a>
</form>