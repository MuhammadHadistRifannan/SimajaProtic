register.php

<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<style>
    body {
        background: #0a3d35;
        font-family: 'Poppins', sans-serif;
    }

    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .register-box {
        display: flex;
        background: linear-gradient(to bottom right, #005f4a, #008060);
        border-radius: 12px;
        overflow: hidden;
        width: 850px;
        max-width: 95%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    /* Bagian kiri */
    .register-left {
        background: #e5e5e5;
        width: 50%;
        text-align: center;
        padding: 40px 20px;
        position: relative;
        overflow: hidden;
    }

    .register-left::before {
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

    .register-left::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 180px;
        background: linear-gradient(to bottom right, #007b66, #005f4a);
        clip-path: polygon(50% 50%, 0% 100%, 100% 100%);
    }

    .register-left h2 {
        position: relative;
        margin-top: 70px;
        color: white;
        font-weight: 700;
    }

    .register-left p {
        color: white;
        font-size: 14px;
        margin-top: -5px;
    }

    .register-left .logo {
        position: relative;
        transform: translateY(-30px);
    }

    .register-left img {
        width: 120px;
        margin-top: 20px;
        z-index: 2;
        position: relative;
    }

    /* Bagian kanan */
    .register-right {
        background: linear-gradient(to bottom right, #007b66, #009e7f);
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }

    /* Judul di luar card */
    .register-header {
        color: white;
        font-weight: 700;
        font-size: 26px;
        letter-spacing: 1px;
        margin-top: 10px;
        margin-bottom: 20px;
        text-align: center;
    }

    .register-form {
        background: #f0f0f0;
        border-radius: 10px;
        padding: 30px 40px;
        width: 100%;
        max-width: 350px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .register-form img {
        width: 60px;
        margin-bottom: 10px;
    }

    .form-control {
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
    }

    .btn-register {
        width: 100%;
        background: linear-gradient(to right, #007b66, #009e7f);
        border: none;
        padding: 10px;
        color: white;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-register:hover {
        background: #005f52;
    }

    .register-form a {
        font-size: 13px;
        color: #005f52;
        text-decoration: none;
    }

    .register-form a:hover {
        text-decoration: underline;
    }

    .small-links {
        margin-top: 10px;
    }
</style>

<div class="register-container">
    <div class="register-box">

        <!-- Kiri -->
        <div class="register-left">
            <div class="logo">
                <h2>SIMAJA</h2>
                <p>Sistem Manajemen Study Jam</p>
                <h4 style="color: black; font-weight: 700;">PROTIC</h4>
                <img src="<?= base_url('img/protic.png') ?>" alt="Logo">
            </div>
        </div>

        <!-- Kanan -->
        <div class="register-right">
            <!-- Tulisan di luar card -->
            <div class="register-header">REGISTER</div>

            <div class="register-form">
                <img src="<?= base_url('img/protic.png') ?>" alt="Logo kecil">

                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <input type="email" name="email"
                        class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                        placeholder="Email" value="<?= old('email') ?>">
                    <div class="invalid-feedback"><?= session('errors.email') ?></div>

                    <input type="text" name="username"
                        class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                        placeholder="Username" value="<?= old('username') ?>">
                    <div class="invalid-feedback"><?= session('errors.username') ?></div>

                    <input type="password" name="password"
                        class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                        placeholder="Password">
                    <div class="invalid-feedback"><?= session('errors.password') ?></div>

                    <input type="password" name="pass_confirm"
                        class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                        placeholder="Repeat Password">
                    <div class="invalid-feedback"><?= session('errors.pass_confirm') ?></div>

                    <button type="submit" class="btn-register">Daftar</button>

                    <div class="small-links">
                        <p>Already registered? <a href="<?= url_to('login') ?>">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>