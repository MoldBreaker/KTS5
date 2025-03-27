<?php
require_once 'app/models/User.php';

class AuthController {
    public function login() {
        session_start();
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $userModel = new User();
            $user = $userModel->login($username, $password);

            if ($user) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                header("Location: /KTS5");
                exit();
            } else {
                $_SESSION['error'] = "Sai tài khoản hoặc mật khẩu!";
                header("Location: /KTS5/auth/login");
                exit();
            }
        }

        require_once 'app/views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /KTS5/auth/login");
        exit();
    }
}
