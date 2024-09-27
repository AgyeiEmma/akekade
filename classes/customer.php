<?php
require_once 'Database.php';

class Customer extends Database {
    public $conn;
    private $table_name = "customer";

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    public function addCustomer($fullName, $email, $password, $country, $city, $contactNumber, $userRole = 2) {
        if ($this->isEmailAvailable($email)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO " . $this->table_name . " 
                      (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, user_role) 
                      VALUES (:fullName, :email, :password, :country, :city, :contactNumber, :userRole)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":fullName", $fullName);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->bindParam(":country", $country);
            $stmt->bindParam(":city", $city);
            $stmt->bindParam(":contactNumber", $contactNumber);
            $stmt->bindParam(":userRole", $userRole);

            if ($stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    public function isEmailAvailable($email) {
        $query = "SELECT customer_id FROM " . $this->table_name . " WHERE customer_email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        return $stmt->rowCount() == 0;
    }

    public function login($email, $password) {
        $query = "SELECT customer_id, customer_pass, user_role FROM " . $this->table_name . " WHERE customer_email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($password, $row['customer_pass'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_role'] = $row['user_role'];
                return true;
            }
        }
        return false;
    }
}