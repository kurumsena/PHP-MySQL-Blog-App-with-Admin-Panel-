<?php 
include 'partials/header.php';

// get back from data if there was an error 
$firstname = $_SESSION['add-user-data']['firstname'] ?? '';
$lastname = $_SESSION['add-user-data']['lastname'] ?? '';
$username = $_SESSION['add-user-data']['username'] ?? '';
$email = $_SESSION['add-user-data']['email'] ?? '';
$createpassword = $_SESSION['add-user-data']['createpassword'] ?? '';
$confirmpassword = $_SESSION['add-user-data']['confirmpassword'] ?? '';

// delete session data 
unset($_SESSION['add-user-data']);
?>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Kullanıcı Ekleme</h2>
        <?php if (isset($_SESSION['add-user'])) : ?>
            <div class="alert__message error">
            <p>
                <?= $_SESSION['add-user']; 
                unset($_SESSION['add-user']);
                ?>
            </p>
        </div> 
        <?php endif; ?>
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?= $firstname ?>" placeholder="Ad">
            <input type="text" name="lastname" value="<?= $lastname ?>" placeholder="Soyad">
            <input type="text" name="username" value="<?= $username ?>" placeholder="Kullanıcı Adı">
            <input type="email" name="email" value="<?= $email ?>" placeholder="E-mail">
            <input type="password" name="createpassword" value="<?= $createpassword ?>" placeholder="Şifre giriniz">
            <input type="password" name="confirmpassword" value="<?= $confirmpassword ?>" placeholder="Şifreyi onaylayın">
            <select name="userrole">
                <option value="0">Yazar</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar"> Kullanıcı Avatarı</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Kullanıcı ekle</button>
        </form>
    </div>
</section>

<?php
include '../partials/footer.php';
?>
