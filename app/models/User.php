<?php
require_once "app/config/database.php";

class User {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $password == $user['password']) {
            return $user;
        }
        return false;
    }
}
?>
