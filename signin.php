<?php
session_start();
require 'config/constants.php';

$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
?>





<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sema Sena Kürüm</title>
    <!--ÖZEL STİL DOSYASI-->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <!-- İKONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--GOOGLE YAZI TIPI (MONTSERRAT)-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>


<body>



<section class="form__section">
    <div class="container form__section-container">
        <h2>Oturum Aç</h2>
        <?php if(isset($_SESSION['signup-success'])) : ?>
            <div class="alert__message success">
                <p>
                    <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success']);
                    ?>
                </p>
            </div>

        <?php elseif(isset($_SESSION['signin'])) : ?>
        <div class="alert__message error">
                <p>
                    <?= $_SESSION['signin'];
                    unset($_SESSION['signin']);
                    ?>
                </p>
            </div>

        <?php endif ?>
        <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
            <input type="text" name="username_email" value="<?= $username_email ?>" placeholder="Kullanıcı adı veya Email">
            <input type="password" name="password" value="<?= $password ?>" placeholder="Şifre">
            <button type="submit" name="submit" class="btn">Giriş Yap</button>
            <small> Hesabınız yok mu? <a href="signup.php">Kaydol</a></small>
        </form>
    </div>
</section>

</body>
</html>