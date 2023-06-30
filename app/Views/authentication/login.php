<h1 class="p-5"><?= $title ?></h1>
<p style='color:red;font-weight:bold'><?= session()->getFlashdata('error') ?></p>
<?= validation_list_errors() ?>

<div class="p-5">
    <form method='post' action='<?= base_url('/login') ?>'>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control"/>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input name="password" type="password" class="form-control"/>
        </div>
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <div class="mb-3 text-center">
            No account? <a href="<?= base_url('/signup')?>">Sign up</a>
        </div>
        <div class="mb-3 text-center">
            Forget password? <a href="<?= base_url('/reset')?>">Reset password</a>
        </div>
    </form>
</div>