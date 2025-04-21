<?php
include '../config/db.php';
include '../includes/header.php';

$sql = "SELECT * FROM laptop";
$result = $conn->query($sql);
?>

<h2>DANH SÁCH LAPTOP GAMING</h2>
<div class="laptop-list">
<?php while($row = $result->fetch_assoc()) { ?>
    <div class="laptop-item">
        <img src="../assets/images/<?= $row['hinh_anh'] ?? 'default.png' ?>" width="200">
        <h3><?= $row['ten'] ?></h3>
        <p>Giá: <?= number_format($row['gia']) ?> VNĐ</p>
        <a href="chi_tiet.php?id=<?= $row['id'] ?>">Chi tiết</a>
    </div>
<?php } ?>
</div>

<?php include '../includes/footer.php'; ?>