<?php
require_once '../model/category.php';
require_once '../product/product.php';
// Xử lý lọc sản phẩm
$filter = "";
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'a-z':
            $filter = "ORDER BY price_sp ASC";
            break;
        case 'z-a':
            $filter = "ORDER BY price_sp DESC";
            break;
       
        default:
            // Không có hoặc xử lý lọc mặc định
            break;
    }
}

// Tạo câu truy vấn SQL với điều kiện lọc
$query = "SELECT * FROM products $filter";
$result = pdo_query($query);
return $result;
// Thực hiện truy vấn và lấy dữ liệu từ cơ sở dữ liệu

// Tiếp tục với mã HTML và hiển thị dữ liệu sản phẩm...
?>
