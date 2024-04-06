<?php
// Lưu trữ giá trị của itotal và gtotal vào các biến PHP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itotalValues = $_POST['itotalValues'];
    $gtotalValue = $_POST['gtotalValue'];

    // Bạn có thể thực hiện các thao tác xử lý dữ liệu ở đây
    // Ví dụ: Lưu vào session, cập nhật vào cơ sở dữ liệu, ...

    // Ví dụ: Lưu giá trị gtotal vào session
    session_start();
    $_SESSION['gtotal'] = $gtotalValue;

    // Gửi phản hồi về cho Ajax
    echo "Dữ liệu đã được nhận và xử lý thành công.";
} else {
    echo "Phương thức không hợp lệ.";
}
?>
