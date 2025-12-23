<?php
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 2 - PHP Căn Bản</title>
</head>
<body>
    <h1>Kết quả PHP Căn Bản</h1>
    
    <?php
    $ho_ten = "Nguyễn Tuấn Hùng";
    $diem_tb = 8.8;
    $co_di_hoc_chuyen_can = true;

    echo "<h2>Thông tin sinh viên</h2>";
    echo "Họ tên: $ho_ten<br>";
    echo "Điểm: $diem_tb<br>";

    echo "<h2>Xếp loại Học tập</h2>";

    if ($diem_tb > 8.5 && $co_di_hoc_chuyen_can) {
        echo "Xếp loại: Giỏi";
    } elseif ($diem_tb > 6.5 && $co_di_hoc_chuyen_can) { 
        echo "Xếp loại: Khá";
    } elseif ($diem_tb > 5.0 && $co_di_hoc_chuyen_can) { 
        echo "Xếp loại: Trung bình";
    } else {
        echo "Xếp loại: Yếu (Cần cố gắng thêm)"; 
    }
    
    echo "<br><br>";

    function chaoMung() {
        echo "<h2>Kết thúc</h2>";
        echo "Chúc mừng bạn đã hoàn thành PHT Chương 2!";
    }

    chaoMung();
    ?>
    
</body>
</html>