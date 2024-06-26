<?php 
include 'partials/header.php';

// get back form data if invalid 
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Kategori Ekleme</h2>
        <?php if(isset($_SESSION['add-category'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category']); ?>
                </p>
            </div>
        <?php endif; ?>      
        <form action="<?php echo ROOT_URL; ?>admin/add-category-logic.php" method="POST">
            <input type="text" value="<?= htmlspecialchars($title) ?>" name="title" placeholder="Başlık">
            <textarea rows="4" name="description" placeholder="Tanım"><?= htmlspecialchars($description) ?></textarea>
            <button type="submit" name="submit" class="btn">Kategori ekle</button>
        </form>
    </div>
</section>

<?php 
include '../partials/footer.php';
?>
