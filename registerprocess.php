<?php
session_start();
require_once 'classes/customerController.php';
require_once 'vendor/autoload.php'; // For phone number formatting

use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;

$controller = new CustomerController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $country = trim($_POST['country']);
    $city = trim($_POST['city']);
    $contactNumber = trim($_POST['contactNumber']);

    // Validate email
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@gmail\.com$/', $email)) {
        $_SESSION['message'] = "Please use a valid Gmail address.";
        header("Location: register.php");
        exit();
    }

    // Format phone number
    $phoneUtil = PhoneNumberUtil::getInstance();
    try {
        $phoneNumber = $phoneUtil->parse($contactNumber, $country);
        $formattedNumber = $phoneUtil->format($phoneNumber, PhoneNumberFormat::E164);
    } catch (\libphonenumber\NumberParseException $e) {
        $_SESSION['message'] = "Invalid phone number format.";
        header("Location: register.php");
        exit();
    }

    if ($controller->register($fullName, $email, $password, $country, $city, $formattedNumber)) {
        $_SESSION['message'] = "Registration successful. Please log in.";
        header("Location: login.php");
    } else {
        $_SESSION['message'] = "Registration failed. Please try again.";
        header("Location: register.php");
    }
} else {
    header("Location: register.php");
}