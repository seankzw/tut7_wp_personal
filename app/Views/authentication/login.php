<h1><?= $title ?></h1>
<?= session()->getFlashdata('error') ?>
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
</form>