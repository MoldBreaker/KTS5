<?php
require_once "app/config/database.php";

class NhanVien {
    private $conn;

    public function __construct() {
        $this->conn = Database::connect();
    }

    public function getPaginated($limit, $offset) {
        $sql = "SELECT nv.Ma_NV, nv.Ten_NV, nv.Phai, nv.Noi_Sinh, pb.Ten_Phong, nv.Luong 
                FROM nhanvien nv 
                JOIN phongban pb ON nv.Ma_Phong = pb.Ma_Phong
                LIMIT ? OFFSET ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM nhanvien";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total'];
    }

    public function add($maNV, $tenNV, $phai, $noiSinh, $maPhong, $luong) {
        $sql = "INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssi", $maNV, $tenNV, $phai, $noiSinh, $maPhong, $luong);
        return $stmt->execute();
    }

    public function update($maNV, $tenNV, $phai, $noiSinh, $maPhong, $luong) {
        $sql = "UPDATE nhanvien SET Ten_NV = ?, Phai = ?, Noi_Sinh = ?, Ma_Phong = ?, Luong = ? WHERE Ma_NV = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Lỗi prepare: " . $this->conn->error);
        }
    
        $stmt->bind_param("ssssis", $tenNV, $phai, $noiSinh, $maPhong, $luong, $maNV);
        return $stmt->execute();
    }
    
    public function delete($maNV) {
        $sql = "DELETE FROM nhanvien WHERE Ma_NV = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Lỗi prepare: " . $this->conn->error);
        }
    
        $stmt->bind_param("s", $maNV);
        return $stmt->execute();
    }
    
    public function getById($maNV) {
        $sql = "SELECT * FROM nhanvien WHERE Ma_NV = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Lỗi prepare: " . $this->conn->error);
        }
    
        $stmt->bind_param("s", $maNV);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
}
?>
