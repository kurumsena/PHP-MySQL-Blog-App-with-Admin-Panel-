<?php 
include 'partials/header.php';

// fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

// Get back form data if there was a validation error
$title = $_SESSION['add-post-data']['title'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
$category_id = $_SESSION['add-post-data']['category'] ?? null;

// Remove form data from session
unset($_SESSION['add-post-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Gönderi Ekleme</h2>
        <?php if(isset($_SESSION['add-post'])): ?>
            <div class="alert__message error">
                <p><?= $_SESSION['add-post']; unset($_SESSION['add-post']); ?></p>
            </div>
        <?php endif; ?>
       
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Başlık" value="<?= $title ?>">
            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>" <?= ($category_id == $category['id']) ? 'selected' : '' ?>><?= $category['title'] ?></option>
                <?php endwhile; ?>
            </select>
            <textarea rows="10" name="body" placeholder="Metin"><?= $body ?></textarea>
            <?php if(isset($_SESSION['user_is_admin'])): ?>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                <label for="is_featured">Seçme</label>
            </div>
            <?php endif; ?>
            <div class="form__control">
                <label for="thumbnail">Küçük resim ekle</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Gönderiyi ekle</button>
        </form>
    </div>
</section>

<?php 
include '../partials/footer.php';
?>
