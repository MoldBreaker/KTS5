<?php
require_once 'app/models/NhanVien.php';
session_start();

class HomeController {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: /KTS5/auth/login");
            exit();
        }
        $NhanVienModel = new NhanVien();
        $limit = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
        $DSNhanVien = $NhanVienModel->getPaginated($limit, $offset);

        $totalEmployees = $NhanVienModel->countAll();
        $totalPages = ceil($totalEmployees / $limit);

        require 'app/views/home.php';
    }
}
?>
