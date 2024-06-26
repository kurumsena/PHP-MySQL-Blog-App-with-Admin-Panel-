<?php
// Oturum başlatma kontrolü
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Sabit tanımları
define('ROOT_URL', 'http://localhost/blog/');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'blog');
