<?php
session_start();
require 'config/database.php';

if (isset($_POST['submit'])) {
    // get form data (Form verilerini al ve filtrele)
    $username_email = filter_var($_POST['username_email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Giriş verilerini kontrol et
    if (!$username_email) {
        $_SESSION['signin'] = "Kullanıcı adı veya E-mail gerekli";
    } elseif (!$password) {
        $_SESSION['signin'] = "Şifre gerekli";
    } else {
        // fetch user from database (Kullanıcıyı veritabanında ara)
        $fetch_user_query = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
        $fetch_user_result = mysqli_query($connection, $fetch_user_query);

        if (mysqli_num_rows($fetch_user_result) == 1) {
            // convert the record into assoc array (Kullanıcı kaydını diziye dönüştür)
            $user_record = mysqli_fetch_assoc($fetch_user_result);
            $db_password = $user_record['password'];

            // compare form password with database password (Form şifresi ile veritabanı şifresini karşılaştır)
            if (password_verify($password, $db_password)) {
                // set session for access control (Oturum değişkenlerini ayarla)
                $_SESSION['user-id'] = $user_record['id'];

                // set session if user is an admin (Kullanıcı admin mi kontrol et)
                if ($user_record['is_admin'] == 1) {
                    $_SESSION['user_is_admin'] = true;
                }

                // Debugging: Print session data
                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';

                // log user in (Kullanıcıyı yönlendir)
                header('location: ' . ROOT_URL . 'admin/');
                exit(); // Make sure to exit after redirection
            } else {
                $_SESSION['signin'] = "Lütfen girdiğiniz değerleri kontrol ediniz";
            }
        } else {
            $_SESSION['signin'] = "Kullanıcı bulunamadı";
        }
    }

    // if any problem, redirect back to signin page with login data (Hata varsa giriş sayfasına yönlendir)
    if (isset($_SESSION['signin'])) {
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        exit();
    }
} else {
    header('location: ' . ROOT_URL . 'signin.php');
    exit();
}
