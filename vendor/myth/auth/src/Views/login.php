login.php

<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<?php if (session()->getFlashdata('pesan')) : ?>
  <div class="alert alert-success text-center">
    <?= session()->getFlashdata('pesan'); ?>
  </div>
<?php endif; ?>


<style>
    body {
        background: #0a3d35;
        font-family: 'Poppins', sans-serif;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .login-box {
        display: flex;
        background: linear-gradient(to bottom right, #005f4a, #008060);
        border-radius: 12px;
        overflow: hidden;
        width: 850px;
        max-width: 95%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        position: relative;
    }

    /* Bagian kiri */
    .login-left {
        background: #e5e5e5;
        width: 50%;
        text-align: center;
        padding: 40px 20px;
        position: relative;
        overflow: hidden;
    }

    /* Lengkungan atas */
    .login-left::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 200px;
        background: linear-gradient(to bottom, #007b66, #006250);
        border-bottom-left-radius: 60px;
        border-bottom-right-radius: 60px;
    }

    /* Segitiga bawah */
    .login-left::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 180px;
        background: linear-gradient(to bottom right, #007b66, #005f4a);
        clip-path: polygon(50% 50%, 0% 100%, 100% 100%);
    }

    .login-left h2 {
        position: relative;
        margin-top: 60px;
        color: white;
        font-weight: 700;
    }

    .login-left p {
        color: white;
        font-size: 14px;
        margin-top: -5px;
    }

    .login-left .logo {
        position: relative;
        transform: translateY(-30px);
    }

    .login-left img {
        width: 120px;
        margin-top: 15px;
        z-index: 2;
        position: relative;
    }

    /* Bagian kanan */
    .login-right {
        background: linear-gradient(to bottom right, #007b66, #009e7f);
        width: 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        padding: 40px;
    }

    /* Tulisan LOGIN di luar card */
    .login-header {
        color: white;
        font-weight: 700;
        font-size: 26px;
        letter-spacing: 1px;
        margin-top: 20px;
        margin-bottom: 15px;
        text-align: center;
    }

    /* Kotak form */
    .login-form {
        background: #f0f0f0;
        border-radius: 10px;
        padding: 30px 40px;
        width: 100%;
        max-width: 350px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .login-form img {
        width: 60px;
        margin-bottom: 10px;
    }

    .form-control {
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .btn-login {
        width: 100%;
        background: linear-gradient(to right, #007b66, #009e7f);
        border: none;
        padding: 10px;
        color: white;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-login:hover {
        background: #005f52;
    }

    .login-form a {
        font-size: 13px;
        color: #005f52;
        text-decoration: none;
    }

    .login-form a:hover {
        text-decoration: underline;
    }

    .small-links {
        margin-top: 10px;
    }
</style>

<div class="login-container">
    <div class="login-box">

        <!-- Bagian kiri -->
        <div class="login-left">
            <div class="logo">
                <h2>SIMAJA</h2>
                <p>Sistem Manajemen Study Jam</p>
                <h4 style="color: black; font-weight: 700;">PROTIC</h4>
                <img src="<?= base_url('img/protic.png') ?>" alt="Logo">
            </div>
        </div>

        <!-- Bagian kanan -->
        <div class="login-right">
            <!-- Tulisan LOGIN di atas card -->
            <div class="login-header">LOGIN</div>

            <!-- Form box -->
            <div class="login-form">
                <img src="<?= base_url('img/protic.png') ?>" alt="Logo kecil">

                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <input type="text" name="login" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="Email/Username">
                    <div class="invalid-feedback">
                        <?= session('errors.login') ?>
                    </div>

                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Password">
                    <div class="invalid-feedback">
                        <?= session('errors.password') ?>
                    </div>

                    <button type="submit" class="btn-login">Login</button>

                    <div class="small-links">
                        <?php if ($config->allowRegistration) : ?>
                            <p><a href="<?= url_to('register') ?>">Need an account?</a></p>
                        <?php endif; ?>
                        <?php if ($config->activeResetter): ?>
                            <p><a href="<?= url_to('forgot') ?>">Forgot your password?</a></p>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>