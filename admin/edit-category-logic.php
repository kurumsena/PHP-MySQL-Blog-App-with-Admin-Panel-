<?php
session_start();
require 'config/database.php';

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);

    // Validate input
    if(empty($title) || empty($description)) {
        $_SESSION['edit-category'] = "Kategori düzenleme sayfasında eksik form girişi";
    } else {
        $query = "UPDATE categories SET title='$title', description='$description' WHERE id=$id";
        $result = mysqli_query($connection, $query);
        
        if($result) {
            $_SESSION['edit-category-success'] = "Kategori başarıyla güncellendi";
        } else {
            $_SESSION['edit-category'] = "Kategori güncellenirken hata oluştu: " . mysqli_error($connection);
        }
    }
} else {
    $_SESSION['edit-category'] = "Form gönderimi bekleniyor";
}

header('location: ' . ROOT_URL . 'admin/manage-categories.php');
exit();
?>
