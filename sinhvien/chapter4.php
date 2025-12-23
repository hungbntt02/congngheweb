<?php 

// === THIẾT LẬP KẾT NỐI PDO === 

$host = '127.0.0.1';
$dbname = 'cse485_web'; 
$username = 'root'; 
$password = ''; 

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4"; 

try { 
    $pdo = new PDO($dsn, $username, $password); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} 
catch (PDOException $e) {    
    die("Kết nối thất bại: " . $e->getMessage()); 
} 

// --- 

// === LOGIC THÊM SINH VIÊN (XỬ LÝ FORM POST) === 

if (isset($_POST['ten_sinh_vien']) && isset($_POST['email'])) { 
     
    $ten = $_POST['ten_sinh_vien']; 
    $email = $_POST['email']; 

    // Câu lệnh SQL INSERT với Prepared Statement
    $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (?, ?)"; 
 
    // Chuẩn bị và thực thi câu lệnh
    $stmt = $pdo->prepare($sql); 
    $stmt->execute([$ten, $email]); 

    // Chuyển hướng để ngăn lỗi gửi lại form khi refresh
    header('Location: ' . $_SERVER['PHP_SELF']); 
    exit; 
} 

// --- 

// === LOGIC LẤY DANH SÁCH SINH VIÊN (SELECT) === 

// Câu lệnh SQL SELECT
$sql_select = "SELECT id, ten_sinh_vien, email, ngay_tao FROM sinhvien ORDER BY ngay_tao DESC"; 
 
// Thực thi câu lệnh SELECT
$stmt_select = $pdo->query($sql_select); 

// Lấy tất cả kết quả vào một mảng để đảm bảo việc hiển thị an toàn
$sinh_vien_list = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

?> 

<!DOCTYPE html> 
<html lang="vi"> 
<head> 
    <meta charset="UTF-8"> 
    <title>PHT Chương 4 - Website hướng dữ liệu</title> 
    <style>        
        table { width: 100%; border-collapse: collapse; }        
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }        
        th { background-color: #f2f2f2; } 
    </style> 
</head> 
<body> 

    <h2>➕ Thêm Sinh Viên Mới</h2> 
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST"> 
        Tên sinh viên: <input type="text" name="ten_sinh_vien" required> 
        Email: <input type="email" name="email" required> 
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
        <?php 
        
        foreach ($sinh_vien_list as $row) { 
             
            echo "<tr>"; 
            echo "<td>" . htmlspecialchars($row['id']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['ten_sinh_vien']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['email']) . "</td>"; 
            echo "<td>" . htmlspecialchars($row['ngay_tao']) . "</td>"; 
            echo "</tr>"; 
             
        } 
        ?> 
    </table> 
</body> 
</html>