<?php
require_once 'pdo.php';
function loadAllProduct(){
    $sql = "SELECT sp.id_sp, sp.name_sp, sp.price_sp, sp.id_dm, sp.thongso, sp.desc_sp, sp.soluong, sp.image_sp, sp.luotban, sp.matsan, dm.name_dm  FROM `sanpham` as sp
    INNER JOIN `danhmuc` as dm 
    ON sp.id_dm = dm.id_dm"
    ;
   $listProduct =  pdo_query($sql);
   return $listProduct;
}
function loadProductById($id_sp){
    $sql="SELECT * FROM `sanpham` WHERE id_sp=$id_sp";
    return $Product = pdo_query_one($sql);
    return $Product;
}
function top6Product(){
    $sql = "SELECT * FROM `sanpham` ORDER BY luotban DESC LIMIT 0,4";
   $listProduct =  pdo_query($sql);
   return $listProduct;
}
function NewProduct(){
    $sql = "SELECT * FROM `sanpham` ORDER BY id_sp DESC LIMIT 0,4 ";
   $listProduct =  pdo_query($sql);
   return $listProduct;
}
function productrelated ($id_dm){
$sql= "SELECT * FROM `sanpham` WHERE id_dm = $id_dm LIMIT 0,4";
$result = pdo_query($sql);
return $result;
}
function loaigiay($matsan){
    $sql = "SELECT * FROM `sanpham` WHERE matsan = '".$matsan."' ";
    $result = pdo_query($sql);
    return $result;
    
}

function loadPro_by_matsan($matsan,$page, $soSp) {
    if (empty($page) || $page == 0) {
        $page = 1;
    }

    $batdau = ($page - 1) * $soSp;
    // Sửa lại cách nối chuỗi trong truy vấn
    $sql = "SELECT sp.id_sp, sp.name_sp, sp.price_sp, sp.id_dm, sp.thongso, sp.desc_sp, sp.soluong, sp.image_sp, sp.luotban, sp.matsan, dm.name_dm  FROM `sanpham` as sp
    INNER JOIN `danhmuc` as dm 
    ON sp.id_dm = dm.id_dm
    WHERE matsan = $matsan
    LIMIT ".$batdau.",".$soSp;
    $list = pdo_query($sql);
    return $list;
}

?>