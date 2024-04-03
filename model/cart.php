<?php
require_once 'pdo.php';
function insert_hoadon($ngaydh, $pttt, $tongbill, $trangthai, $trangthaitt, $iduser)
{
    $sql = "insert into bill(ngaydat, pttt, tongbill, trangthai, trangthaitt, id_user) 
            values('$ngaydh', '$pttt', '$tongbill', '$trangthai', '$trangthaitt', '$iduser')";
    $id = pdo_executeid($sql);
    return $id;
}


function insert_billhoadon($idBill, $id_sp, $name_sp, $price_sp, $soluong_sp, $tongtien)
{
    $sql = "insert into cart(id_sp, name_sp, price_sp, soluong_sp, tong_tien, id_bill) 
            values('$id_sp', '$name_sp', '$price_sp', '$soluong_sp', '$tongtien', '$idBill')";
    pdo_execute($sql);
}
function select_hoadon(){
    $sql= "SELECT * FROM `bill` ORDER BY id_bill DESC";
    $result = pdo_query($sql);
    return $result;
}
function select_billhoadon($id_bill)
{
    $sql = "SELECT * FROM `bill` WHERE id_bill = $id_bill";
    $listbhd = pdo_query($sql);
    return $listbhd;
}
?>