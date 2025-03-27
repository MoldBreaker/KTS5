<form method="POST">
    <label>Mã nhân viên:</label>
    <input type="text" name="Ma_NV" value="<?= $nhanVien['Ma_NV'] ?>" readonly>

    <label>Tên nhân viên:</label>
    <input type="text" name="Ten_NV" value="<?= $nhanVien['Ten_NV'] ?>" required>

    <label>Phái:</label>
    <input type="text" name="Phai" value="<?= $nhanVien['Phai'] ?>" required>

    <label>Nơi sinh:</label>
    <input type="text" name="Noi_Sinh" value="<?= $nhanVien['Noi_Sinh'] ?>" required>

    <label>Mã phòng:</label>
    <input type="text" name="Ma_Phong" value="<?= $nhanVien['Ma_Phong'] ?>" required>

    <label>Lương:</label>
    <input type="number" name="Luong" value="<?= $nhanVien['Luong'] ?>" required>

    <button type="submit">Cập nhật</button>
</form>
