<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM tai_khoan_admin WHERE ten_dang_nhap='$user'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        if ($pass === $admin['mat_khau']) {
            $_SESSION['admin'] = $admin['id'];
            header("Location: dashboard.php");
            exit();
        }
    }
    echo "Sai tài khoản hoặc mật khẩu!";
}
?>

<form method="POST">
    <h2>Đăng nhập Admin</h2>
    <input type="text" name="username" placeholder="Tên đăng nhập"><br>
    <input type="password" name="password" placeholder="Mật khẩu"><br>
    <button type="submit">Đăng nhập</button>
</form>