<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ten = $_POST['ten'];
    $thuong_hieu = $_POST['thuong_hieu'];
    $cpu = $_POST['cpu'];
    $gpu = $_POST['gpu'];
    $gia = $_POST['gia'];

    $sql = "INSERT INTO laptop (ten, thuong_hieu, cpu, gpu, gia, id_admin_tao) 
            VALUES ('$ten', '$thuong_hieu', '$cpu', '$gpu', '$gia', ".$_SESSION['admin'].")";

    if ($conn->query($sql)) {
        echo "Đã thêm thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<form method="POST">
    <input name="ten" placeholder="Tên Laptop"><br>
    <input name="thuong_hieu" placeholder="Thương hiệu"><br>
    <input name="cpu" placeholder="CPU"><br>
    <input name="gpu" placeholder="GPU"><br>
    <input name="gia" placeholder="Giá"><br>
    <button type="submit">Thêm laptop</button>
</form>