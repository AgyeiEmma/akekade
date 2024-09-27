<?php
session_start();
require_once 'classes/customerController.php';

$controller = new CustomerController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    echo $controller->login($email, $password);
    if ($controller->login($email, $password)) {
        header("Location: index.php");
    } else {
        $_SESSION['message'] = "Invalid email or password.";
        header("Location: login.php");
    }
} else {
    header("Location: login.php");
}