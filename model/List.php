<?php
require_once 'pdo.php';
function loadAllProduct(){
    $sql = "SELECT * FROM `sanpham` ";
   $listProduct =  pdo_query($sql);
   return $listProduct;
}
function loadProductById($id_sp){
    $sql="SELECT * FROM `sanpham` WHERE id_sp=$id_sp";
    return $Product = pdo_query_one($sql);
    return $Product;
}
function top6Product(){
    $sql = "SELECT * FROM `sanpham` ORDER BY luotban DESC LIMIT 0,8";
   $listProduct =  pdo_query($sql);
   return $listProduct;
}


?>