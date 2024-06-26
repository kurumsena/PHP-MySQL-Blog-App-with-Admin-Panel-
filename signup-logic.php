<?php
session_start();
require 'config/database.php';

// Kayıt formu gönderildiğinde form verilerini al
if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    // Giriş doğrulaması
    if (!$firstname) {
        $_SESSION['signup'] = "Lütfen Adınızı Giriniz";
    } elseif (!$lastname) {
        $_SESSION['signup'] = "Lütfen Soyadınızı Giriniz";
    } elseif (!$username) {
        $_SESSION['signup'] = "Lütfen Kullanıcı Adınızı Giriniz";
    } elseif (!$email) {
        $_SESSION['signup'] = "Lütfen geçerli bir e-posta adresi girin";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['signup'] = "Şifre uzunluğu en az 8 karakter olmalıdır";
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "Lütfen avatar ekleyin";
    } else {
        // Şifrelerin eşleşip eşleşmediğini kontrol et
        if ($createpassword !== $confirmpassword) {
            $_SESSION['signup'] = "Şifreler eşleşmedi";
        } else {
            // Şifre hashleme
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);

            // Kullanıcı adı veya e-posta veritabanında var mı diye kontrol et
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email= '$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);

            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = " Kullanıcı adı veya e-posta adresi zaten mevcut";
            } else {
                // Avatar üzerinde çalış
                // Avatarı yeniden adlandır
                $time = time();
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                // Dosyanın bir resim dosyası olduğundan emin ol
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    // Dosyanın boyutunun fazla büyük olmadığından emin ol (1MB'den az)
                    if ($avatar['size'] < 1000000) {
                        // Avatarı yükle
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "Dosya boyutu çok büyük. 1 MB'tan küçük olmalıdır";
                    }
                } else {
                    $_SESSION['signup'] = "Dosya png, jpg veya jpeg olmalıdır";
                }
            }
        }
    }

    // Eğer bir sorun varsa, kayıt sayfasına geri yönlendir
    if (isset($_SESSION['signup'])) {
        // Form verilerini kayıt sayfasına gönder
        $_SESSION['signup-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signup.php');
        die();
    } else {
        // Yeni kullanıcıyı veritabanına ekle
        $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=0";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            // Başarıyla kaydedildiğine dair mesajla giriş sayfasına yönlendir
            $_SESSION['signup-success'] = "Kayıt başarılı. Lütfen Giriş Yapın";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }
    }
} else {
    // Eğer butona tıklanmadıysa, kayıt sayfasına geri dön
    header('location:' . ROOT_URL . 'signup.php');
    die();
}
?>
