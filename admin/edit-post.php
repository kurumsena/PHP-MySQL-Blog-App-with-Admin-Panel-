<?php 
include 'partials/header.php';

// fetch categories from database 
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);

// fetch post data from database if id is set 
if(isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/');
    die();
}
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Gönderi Düzenleme</h2>
        <?php if(isset($_SESSION['edit-post-errors'])) : ?>
            <div class="alert__message error container">
                <ul>
                    <?php foreach($_SESSION['edit-post-errors'] as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php unset($_SESSION['edit-post-errors']); ?>
        <?php endif ?>       
        <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
            <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Başlık">
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>" <?= ($category['id'] == $post['category_id']) ? 'selected' : '' ?>>
                        <?= $category['title'] ?>
                    </option>
                <?php endwhile ?>
            </select>
            <textarea rows="10" name="body" placeholder="Metin"><?= $post['body'] ?></textarea>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" <?= ($post['is_featured'] == 1) ? 'checked' : '' ?>>
                <label for="is_featured">Öne Çıkan</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Küçük resmi değiştir</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Gönderiyi düzenle</button>
        </form>
    </div>
</section>

<?php 
include '../partials/footer.php';
?>
