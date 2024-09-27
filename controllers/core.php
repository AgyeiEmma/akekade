<?php
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Session configuration
// ini_set('session.cookie_httponly', 1);
// ini_set('session.use_only_cookies', 1);
// ini_set('session.cookie_secure', 1);

// Database configuration
define('host', 'localhost');
define('db_name', 'dbforlab');
define('username', 'root');
define('password', '');

// URL configuration
define('BASE_URL', 'http://yourdomain.com/');

// Session check function
function checkSession() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: " . BASE_URL . "login.php");
        exit();
    }
}

// // CSRF protection
// if (!function_exists('csrf_token')) {
//     function csrf_token() {
//         if (!isset($_SESSION['csrf_token'])) {
//             $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
//         }
//         return $_SESSION['csrf_token'];
//     }
// }

// if (!function_exists('csrf_field')) {
//     function csrf_field() {
//         return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
//     }
// }

// // CSRF token verification
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//         die('CSRF token mismatch');
//     }
// }