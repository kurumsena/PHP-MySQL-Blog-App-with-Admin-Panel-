<?php
session_start();
require 'config/constants.php';

// get back form data if there was a registration error 
$firstname = $_SESSION['signup-data']['firstname'] ?? null;
$lastname = $_SESSION['signup-data']['lastname'] ?? null;
$username = $_SESSION['signup-data']['username'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword = $_SESSION['signup-data']['confirmpassword'] ?? null;
// delete signup data session
unset($_SESSION['signup-data']);

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
        <h2>Kaydol</h2>
        <?php if(isset($_SESSION['signup'])): ?> 
                <div class="alert__message error">
            <p>
                <?= $_SESSION['signup'];
                unset($_SESSION['signup']); 
                ?>
            </p>
            
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Ad">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Soyad">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Kullanıcı Adı">
            <input type="email" name="email" value="<?= $email ?>" placeholder="E-mail">
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Şifre giriniz">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Şifreyi onaylayın">
            <div class="form__control">
                <label for="avatar"> Kullanıcı Avatarı</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Kayıt Ol</button>
            <small> Zaten hesabınız var mı? <a href="signin.php">Giriş Yap</a></small>
        </form>
    </div>
</section>

</body>
</html>