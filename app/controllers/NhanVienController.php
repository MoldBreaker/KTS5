<?php
require_once 'app/models/NhanVien.php';
require_once 'app/models/PhongBan.php';
session_start();

class NhanVienController {
    public function add() {
        if (!isset($_SESSION['user'])) {
            header("Location: /KTS5/auth/login");
            exit();
        }
        if ($_SESSION['user']['role'] != 'admin') {
            header("Location: /KTS5");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $maNV = trim($_POST['Ma_NV']);
            $tenNV = trim($_POST['Ten_NV']);
            $phai = trim($_POST['Phai']);
            $noiSinh = trim($_POST['Noi_Sinh']);
            $maPhong = trim($_POST['Ma_Phong']);
            $luong = trim($_POST['Luong']);

            if (empty($maNV) || empty($tenNV) || empty($phai) || empty($noiSinh) || empty($maPhong) || empty($luong)) {
                $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin!";
                header("Location: /KTS5/nhanvien/add");
                exit();
            }

            $NhanVienModel = new NhanVien();
            $result = $NhanVienModel->add($maNV, $tenNV, $phai, $noiSinh, $maPhong, $luong);

            if ($result) {
                $_SESSION['success'] = "Thêm nhân viên thành công!";
                header("Location: /KTS5/nhanvien");
            } else {
                $_SESSION['error'] = "Lỗi! Không thể thêm nhân viên.";
                header("Location: /KTS5/nhanvien/add");
            }
            
            header("Location: /KTS5");
            exit();
        } 
        require_once 'app/views/add.php';
    }

    public function edit($maNV) {
        if (!isset($_SESSION['user'])) {
            header("Location: /KTS5/auth/login");
            exit();
        }
        if ($_SESSION['user']['role'] != 'admin') {
            header("Location: /KTS5");
            exit();
        }
    
        $NhanVienModel = new NhanVien();
        $nhanVien = $NhanVienModel->getById($maNV);
        if (!$nhanVien) {
            $_SESSION['error'] = "Nhân viên không tồn tại!";
            header("Location: /KTS5");
            exit();
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tenNV = trim($_POST['Ten_NV']);
            $phai = trim($_POST['Phai']);
            $noiSinh = trim($_POST['Noi_Sinh']);
            $maPhong = trim($_POST['Ma_Phong']);
            $luong = trim($_POST['Luong']);
    
            if (empty($tenNV) || empty($phai) || empty($noiSinh) || empty($maPhong) || empty($luong)) {
                $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin!";
                header("Location: /KTS5/nhanvien/edit/$maNV");
                exit();
            }
    
            $result = $NhanVienModel->update($maNV, $tenNV, $phai, $noiSinh, $maPhong, $luong);
    
            if ($result) {
                $_SESSION['success'] = "Cập nhật nhân viên thành công!";
                header("Location: /KTS5");
            } else {
                $_SESSION['error'] = "Lỗi! Không thể cập nhật nhân viên.";
                header("Location: /KTS5/nhanvien/edit/$maNV");
            }
            exit();
        }
    
        require_once 'app/views/edit.php';
    }
    
    public function delete($maNV) {
        if (!isset($_SESSION['user'])) {
            header("Location: /KTS5/auth/login");
            exit();
        }
        if ($_SESSION['user']['role'] != 'admin') {
            header("Location: /KTS5");
            exit();
        }
    
        $NhanVienModel = new NhanVien();
        $result = $NhanVienModel->delete($maNV);
    
        if ($result) {
            $_SESSION['success'] = "Xóa nhân viên thành công!";
        } else {
            $_SESSION['error'] = "Lỗi! Không thể xóa nhân viên.";
        }
    
        header("Location: /KTS5");
        exit();
    }
    
}
?>