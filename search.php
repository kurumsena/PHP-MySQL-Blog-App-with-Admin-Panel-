<?php require 'partials/header.php'; ?>

<?php
require 'config/database.php';

if (isset($_GET['search']) && isset($_GET['submit'])) {
    $search = filter_var($_GET['search'], FILTER_SANITIZE_SPECIAL_CHARS);
    $query = "SELECT * FROM posts WHERE title LIKE '%$search%' ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);

    if ($posts === false) {
        die("Sorgu hatası: " . mysqli_error($connection));
    }
} else {
    header('location: ' . ROOT_URL . 'blog.php');
    die();
}
?>

<section class="search__form section__extra-margin">
    <div class="container search__form-container">
        <form action="<?= ROOT_URL ?>search.php" method="GET" class="centered-form">
            <input type="text" name="search" value="<?= isset($search) ? htmlspecialchars($search) : '' ?>" placeholder="Arama yapın...">
            <button type="submit" name="submit" class="btn">Ara</button>
        </form>
    </div>
</section>

<?php if (mysqli_num_rows($posts) > 0) : ?>
<section class="posts section__extra-margin">
    <div class="container posts__container">
        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./images/<?= $post['thumbnail'] ?>">
                </div>
                <div class="post__info">
                    <?php
                    // Fetch category from categories table using category_id of post
                    $category_id = $post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id=$category_id";
                    $category_result = mysqli_query($connection, $category_query);

                    if ($category_result === false) {
                        die("Kategori sorgu hatası: " . mysqli_error($connection));
                    }

                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['title'] ?></a>
                    <h3 class="post__title">
                        <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a>
                    </h3>
                    <p class="post__body">
                        <?= substr($post['body'], 0, 150) ?>...
                    </p>
                    <div class="post__author">
                        <?php
                        // Fetch author from users table using author_id
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connection, $author_query);

                        if ($author_result === false) {
                            die("Yazar sorgu hatası: " . mysqli_error($connection));
                        }

                        $author = mysqli_fetch_assoc($author_result);
                        ?>
                        <div class="post__author-avatar">
                            <img src="./images/<?= $author['avatar'] ?>">
                        </div>
                        <div class="post__author-info">
                            <h5>Yazar: <?= "{$author['firstname']} {$author['lastname']}" ?></h5>
                            <small>
                                <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?>
                            </small>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile ?>
    </div>
</section>
<?php else : ?>
<div class="alert__message error lg section__extra-margin">
    <p>Bu arama için gönderi bulunamadı</p>
</div>
<?php endif ?>

<section class="category__buttons">
    <div class="container category__buttons-container">
        <?php
        $all_categories_query = "SELECT * FROM categories";
        $all_categories = mysqli_query($connection, $all_categories_query);

        if ($all_categories === false) {
            die("Kategori sorgu hatası: " . mysqli_error($connection));
        }
        ?>
        <?php while ($category = mysqli_fetch_assoc($all_categories)) : ?>
            <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['title'] ?></a>
        <?php endwhile ?>
    </div>
</section>

<?php require 'partials/footer.php'; ?>
