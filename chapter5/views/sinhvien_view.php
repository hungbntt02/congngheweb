<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>➕ Thêm Sinh Viên Mới (MVC)</h2>
<form method="POST" action="index.php">
    Tên sinh viên:
    <input type="text" name="ten_sinh_vien" required>
    Email:
    <input type="email" name="email" required>
    <button type="submit">Thêm</button>
</form>

<hr>

<h2>📜 Danh Sách Sinh Viên</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Tên Sinh Viên</th>
        <th>Email</th>
        <th>Ngày Tạo</th>
    </tr>
    <?php foreach ($danh_sach_sv as $sv): ?>
        <tr>
            <td><?= htmlspecialchars($sv['id']) ?></td>
            <td><?= htmlspecialchars($sv['ten_sinh_vien']) ?></td>
            <td><?= htmlspecialchars($sv['email']) ?></td>
            <td><?= htmlspecialchars($sv['ngay_tao']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
