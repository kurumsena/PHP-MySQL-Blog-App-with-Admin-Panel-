<?php
require 'config/database.php';

if(isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = isset($_POST['is_featured']) ? 1 : 0;
    $thumbnail = $_FILES['thumbnail'];

    // validate form data
    $errors = [];
    if(empty($title)) {
        $errors[] = "Gönderi başlığını girin";
    } 
    if(empty($category_id)) {
        $errors[] = "Gönderi kategorisini seçin";
    } 
    if(empty($body)) {
        $errors[] = "Gönderi metnini girin";
    } 

    // handle thumbnail upload
    if(!empty($thumbnail['name'])) {
        // rename the image
        $time = time(); // make each image name unique
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        // make sure file is an image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION);
        if(in_array($extension, $allowed_files)) {
            // make sure image is not too big. (2mb+)
            if($thumbnail['size'] < 2_000_000) {
                // upload thumbnail
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);

                // delete previous thumbnail
                unlink('../images/' . $previous_thumbnail_name);
            } else {
                $errors[] = "Dosya boyutu çok büyük. 2mb'den az olmalı";
            }
        } else {
            $errors[] = "Dosya png, jpg, jpeg olmalıdır";
        }
    } else {
        // if no new thumbnail uploaded, keep the previous one
        $thumbnail_name = $previous_thumbnail_name;
    }

    // if there are errors, redirect back to edit-post page with errors
    if(!empty($errors)) {
        $_SESSION['edit-post-errors'] = $errors;
        header('location: ' . ROOT_URL . 'admin/edit-post.php?id=' . $id);
        die();
    } else {
        // update post in database
        $query = "UPDATE posts SET title=?, body=?, thumbnail=?, category_id=?, is_featured=? WHERE id=?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'sssiii', $title, $body, $thumbnail_name, $category_id, $is_featured, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if(!mysqli_errno($connection)) {
            $_SESSION['edit-post-success'] = "Gönderi başarıyla güncellendi";
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
    }
}

header('location: ' . ROOT_URL . 'admin/edit-post.php?id=' . $id);
die();
?>
