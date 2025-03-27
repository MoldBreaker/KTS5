<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" href="/KTS5/public/css/home.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f8f9fa;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .add-btn {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-bottom: 15px;
        }
        .add-btn:hover {
            background: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .gender img {
            width: 20px;
            height: 20px;
        }
        .actions a {
            text-decoration: none;
            margin: 0 5px;
            color: #007bff;
            font-weight: bold;
        }
        .actions a:hover {
            text-decoration: underline;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination a {
            padding: 8px 12px;
            margin: 2px;
            text-decoration: none;
            color: #007bff;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .pagination a.active {
            background-color: #007bff;
            color: white;
        }
        @media (max-width: 600px) {
            table, th, td {
                display: block;
                width: 100%;
            }
            th {
                display: none;
            }
            td {
                text-align: right;
                position: relative;
                padding-left: 50%;
            }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xin chào <?php echo $_SESSION['user']['username']; ?>, THÔNG TIN NHÂN VIÊN</h2>
        <?php if ($_SESSION['user']['role'] == 'admin') { ?>
            <button class="add-btn" onclick="window.location.href = '/KTS5/nhanvien/add'">THÊM NHÂN VIÊN</button>
        <?php } ?>
        <table>
            <thead>
                <tr>
                    <th>Mã Nhân Viên</th>
                    <th>Tên Nhân Viên</th>
                    <th>Giới tính</th>
                    <th>Nơi Sinh</th>
                    <th>Tên Phòng</th>
                    <th>Lương</th>
                    <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                        <th>Hành động</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($DSNhanVien as $NhanVien) { ?>
                    <tr>
                        <td data-label="Mã Nhân Viên"><?php echo $NhanVien['Ma_NV']; ?></td>
                        <td data-label="Tên Nhân Viên"><?php echo $NhanVien['Ten_NV']; ?></td>
                        <td data-label="Giới tính" class="gender">
                            <img src="/KTS5/public/images/<?php echo ($NhanVien['Phai'] == 'NAM') ? 'male.webp' : 'female.png'; ?>" alt="<?php echo $NhanVien['Phai']; ?>">
                        </td>
                        <td data-label="Nơi Sinh"><?php echo $NhanVien['Noi_Sinh']; ?></td>
                        <td data-label="Tên Phòng"><?php echo $NhanVien['Ten_Phong']; ?></td>
                        <td data-label="Lương"><?php echo $NhanVien['Luong']; ?></td>
                        <?php if ($_SESSION['user']['role'] == 'admin') { ?>
                            <td data-label="Hành động" class="actions">
                                <a href="/KTS5/nhanvien/edit/<?php echo $NhanVien['Ma_NV']; ?>">Sửa</a>
                                <a href="/KTS5/nhanvien/delete/<?php echo $NhanVien['Ma_NV']; ?>" onclick="return confirm('Xóa nhân viên này?')">Xóa</a>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="pagination">
            <?php if ($totalPages > 1) { ?>
                <?php if ($page > 1) { ?>
                    <a href="?page=<?= $page - 1 ?>">&laquo; Trước</a>
                <?php } ?>
                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <a href="?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>"><?= $i ?></a>
                <?php } ?>
                <?php if ($page < $totalPages) { ?>
                    <a href="?page=<?= $page + 1 ?>">Sau &raquo;</a>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</body>
</html>
