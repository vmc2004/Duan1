<?php
require_once 'pdo.php';
function loadCart(){
    $sql="SELECT ca.id_cart, ca.id_sp, ca.soluong, sp.name_sp, sp.image_sp, sp.price_sp FROM `cart` as ca
    INNER JOIN   `sanpham` as sp
    ON ca.id_sp = sp.id_sp";
    $Cart = pdo_query($sql);
    return $Cart;
}
function AddToCart($id_sp,$name_sp,$price_sp,$soluong,$image_sp){
    $sql="INSERT INTO `cart`(`id_sp`, `SoLuong`, `name_sp`, `price_sp`,`image_sp`) VALUES ('$id_sp','$soluong','$name_sp','$price_sp','$image_sp')";
    pdo_execute($sql);
    
}
function count_sp(){
    $sql="SELECT COUNT(id_cart) FROM cart";
    $count = pdo_query($sql);
    return $count;
}
function deleteCart($del){
    $sql="DELETE FROM `cart` WHERE id_sp = $del";
    pdo_execute($sql);
}
?>