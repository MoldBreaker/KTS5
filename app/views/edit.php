<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" href="/KTS5/public/css/add.css">
</head>
<body>
    <div class="container">
        <h2>SuaSua Nhân Viên</h2>
        <?php if (isset($_SESSION['error'])) { ?>
            <p style="color:red; text-align: center;"> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?> </p>
        <?php } ?>

        <form method="POST">
            <label for="Ma_NV">Mã Nhân Viên:</label>
            <input type="text" name="Ma_NV" value="<?= $nhanVien['Ma_NV'] ?>" readonly>

            <label for="Ten_NV">Tên Nhân Viên:</label>
            <input type="text" name="Ten_NV" value="<?= $nhanVien['Ten_NV'] ?>" required>

            <label for="Phai">Giới Tính:</label>
            <select name="Phai" value="<?= $nhanVien['Phai'] ?>">
                <option value="NAM">Nam</option>
                <option value="NU">Nữ</option>
            </select>

            <label for="Noi_Sinh">Nơi Sinh:</label>
            <input type="text" value="<?= $nhanVien['Noi_Sinh'] ?>" name="Noi_Sinh" required>

            <label for="Noi_Sinh">Ma Phong:</label>
            <input type="text" name="Ma_Phong" value="<?= $nhanVien['Ma_Phong'] ?>" required>

            <label for="Luong">Lương:</label>
            <input type="number" name="Luong" value="<?= $nhanVien['Luong'] ?>" required>

            <button type="submit">Edit Nhân Viên</button>
        </form>

        <a href="/KTS5" class="back-link">Quay lại danh sách</a>
    </div>
</body>
</html>
