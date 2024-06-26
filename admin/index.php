<?php 
include 'partials/header.php';

// Oturum değişkenlerini kontrol etme
if (!isset($_SESSION['user-id'])) {
    header('location: signin.php');
    exit();
}

// Mevcut kullanıcının gönderilerini veritabanından çekme 
$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id FROM posts WHERE author_id=$current_user_id ORDER BY id DESC";
$posts = mysqli_query($connection, $query);
?>

<section class="dashboard">
    <!-- Mesajlar ve diğer içerikler -->
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>       
        <aside>
            <ul>
                <li>
                    <a href="add-post.php">
                        <i class="uil uil-pen"></i>
                        <h5>Gönderi Ekle</h5>
                    </a>
                </li>
                <li>
                    <a href="index.php" class="active">
                        <i class="uil uil-postcard"></i>
                        <h5>Gönderileri Yönet</h5>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_is_admin']) && $_SESSION['user_is_admin'] == 1): ?>
                <li>
                    <a href="add-user.php">
                        <i class="uil uil-user-plus"></i>
                        <h5>Kullanıcı Ekle</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php">
                        <i class="uil uil-users-alt"></i>
                        <h5>Kullanıcıları Yönet</h5>
                    </a>
                </li>
                <li>
                    <a href="add-category.php">
                        <i class="uil uil-edit"></i>
                        <h5>Kategori Ekle</h5>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php">
                        <i class="uil uil-list-ul"></i>
                        <h5>Kategorileri Yönet</h5>
                    </a>
                </li>
                <?php endif ?> 
            </ul>
        </aside>
        <main>
            <h2>Gönderileri Yönet</h2>
            <?php if($posts && mysqli_num_rows($posts) > 0) : ?>
                <table>
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Kategori</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                            <!-- Her gönderinin kategorisini kategoriler tablosundan al -->
                            <?php
                            $category_id = $post['category_id'];
                            $category_query = "SELECT title FROM categories WHERE id=$category_id";
                            $category_result = mysqli_query($connection, $category_query);
                            $category = mysqli_fetch_assoc($category_result);
                            ?> 
                            <tr>
                                <td><?= $post['title'] ?></td>
                                <td><?= $category ? $category['title'] : 'Kategori Bulunamadı' ?></td> <!-- Eğer kategori yoksa uyarı mesajı göster -->
                                <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id'] ?>" class="btn sm">Düzenle</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id'] ?>" class="btn sm danger">Sil</a></td>
                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="alert__message error"><?= "Gönderi bulunamadı" ?></div>
            <?php endif ?>
        </main>
    </div>
</section>

<?php 
include '../partials/footer.php';
?>
