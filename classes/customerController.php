<?php
require_once 'classes/Customer.php';

class CustomerController {
    private $customer;

    public function __construct() {
        $this->customer = new Customer();
    }

    public function register($fullName, $email, $password, $country, $city, $contactNumber) {
        return $this->customer->addCustomer($fullName, $email, $password, $country, $city, $contactNumber);
    }

    public function login($email, $password) {
        return $this->customer->login($email, $password);
    }

    public function isEmailAvailable($email) {
        return $this->customer->isEmailAvailable($email);
    }
}