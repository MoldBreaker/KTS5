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
        <h2>Thêm Nhân Viên</h2>
        <?php if (isset($_SESSION['error'])) { ?>
            <p style="color:red; text-align: center;"> <?php echo $_SESSION['error']; unset($_SESSION['error']); ?> </p>
        <?php } ?>

        <form action="/KTS5/nhanvien/add" method="POST">
            <label for="Ma_NV">Mã Nhân Viên:</label>
            <input type="text" name="Ma_NV" required>

            <label for="Ten_NV">Tên Nhân Viên:</label>
            <input type="text" name="Ten_NV" required>

            <label for="Phai">Giới Tính:</label>
            <select name="Phai">
                <option value="NAM">Nam</option>
                <option value="NU">Nữ</option>
            </select>

            <label for="Noi_Sinh">Nơi Sinh:</label>
            <input type="text" name="Noi_Sinh" required>

            <label for="Noi_Sinh">Ma Phong:</label>
            <input type="text" name="Ma_Phong" required>

            <label for="Luong">Lương:</label>
            <input type="number" name="Luong" required>

            <button type="submit">Thêm Nhân Viên</button>
        </form>

        <a href="/KTS5" class="back-link">Quay lại danh sách</a>
    </div>
</body>
</html>
