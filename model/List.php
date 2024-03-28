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
    $sql = "SELECT * FROM `sanpham` ORDER BY luotban DESC LIMIT 0,4";
   $listProduct =  pdo_query($sql);
   return $listProduct;
}
function productrelated ($id_dm){
$sql= "SELECT * FROM `sanpham` WHERE id_dm = $id_dm LIMIT 0,4";
$result = pdo_query($sql);
return $result;
}
function loaigiay(){
    $sql = "SELECT * FROM `sanpham` WHERE matsan = '1'";
    $result = pdo_query($sql);
    return $result;
    
}
function tunhien(){
    $sql = "SELECT * FROM `sanpham` WHERE matsan = '2'";
    $result = pdo_query($sql);
    return $result;
    
}


?>