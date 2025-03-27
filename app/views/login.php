<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="/KTS5/public/css/loginlogin.css">
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập hệ thống</h2>
        <?php if (isset($_SESSION['error'])) { ?>
            <p class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php } ?>
        <form method="POST" action="/KTS5/auth/login">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" name="username" required>
            <label for="password">Mật khẩu:</label>
            <input type="password" name="password" required>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>
</html>
