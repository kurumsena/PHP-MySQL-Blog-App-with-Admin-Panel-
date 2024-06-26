<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    // Input değerlerini doğrula
    if (!$firstname) {
        $_SESSION['add-user'] = "Lütfen Adınızı Giriniz";
    } elseif (!$lastname) {
        $_SESSION['add-user'] = "Lütfen Soyadınızı Giriniz";
    } elseif (!$username) {
        $_SESSION['add-user'] = "Lütfen Kullanıcı Adınızı Giriniz";
    } elseif (!$email) {
        $_SESSION['add-user'] = "Lütfen geçerli bir e-posta adresi girin";
    } elseif ($is_admin === false) {
        $_SESSION['add-user'] = "Lütfen bir kullanıcı rolü seçin";
    } elseif (strlen($createpassword) < 8 || strlen($confirmpassword) < 8) {
        $_SESSION['add-user'] = "Şifre uzunluğu en az 8 karakter olmalıdır";
    } elseif (!$avatar['name']) {
        $_SESSION['add-user'] = "Lütfen avatar ekleyin";
    } else {
        // check if passwords don't match 
        if ($createpassword !== $confirmpassword) {
            $_SESSION['add-user'] = "Şifreler eşleşmedi";
        } else {
            // hash password 
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            
            // check if username or email already exist in database
            $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
            $user_check_result = mysqli_query($connection, $user_check_query);
            
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['add-user'] = "Kullanıcı adı veya e-posta adresi zaten mevcut";
            } else {
                // WORK ON AVATAR
                // rename avatar
                $time = time(); // make each image name unique using current timestamp
                $avatar_name = $time . '_' . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;

                // make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = pathinfo($avatar_name, PATHINFO_EXTENSION);
                if (in_array($extention, $allowed_files)) {
                    // make sure image is not too large (1mb+)
                    if ($avatar['size'] < 1000000) {
                        // upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    } else {
                        $_SESSION['add-user'] = "Dosya boyutu çok büyük. 1 MB'tan küçük olmalıdır";
                    }
                } else {
                    $_SESSION['add-user'] = "Dosya png, jpg veya jpeg olmalıdır";
                }
            }
        }
    }

    // redirect back to add-user page if there was any problem
    if (isset($_SESSION['add-user'])) {
        // pass form data back to add-user page
        $_SESSION['add-user-data'] = $_POST;
        header('location: ' . ROOT_URL . 'admin/add-user.php');
        die();
    } else {
        // insert new user into users table
        $insert_user_query = "INSERT INTO users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email', password='$hashed_password', avatar='$avatar_name', is_admin=$is_admin";
        $insert_user_result = mysqli_query($connection, $insert_user_query);

        if (!mysqli_errno($connection)) {
            // redirect to manage-users page with success message
            $_SESSION['add-user-success'] = "Yeni kullanıcı $firstname $lastname başarıyla eklendi.";
            header('location: ' . ROOT_URL . 'admin/manage-users.php');
            die();
        }
    }
} else {
    // if button wasn't clicked, bounce back to add-user page 
    header('location: ' . ROOT_URL . 'admin/add-user.php');
    die();
}
?>
