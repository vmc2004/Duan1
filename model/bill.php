<?php

    function select_hoadon($kyc, $sgia)
    {
        if ($kyc != "") {
            $sql = "select * from bill inner join user on bill.id_user = user.id_user where 1 and id_bill =" . $kyc;
        } else if ($sgia > 0) {
            $sql = "select * from bill inner join user on bill.id_user = user.id_user where 1 and tongbill >=" . $sgia;
        }else{
            $sql = "select * from bill inner join user on bill.id_user = user.id_user order by id_bill desc";
        }
        $listhd = pdo_query($sql);
        return $listhd;
    }   

function loadBill(){
    $sql = "SELECT * FROM `bill` as bi
    INNER JOIN `user` as us 
    ON bi.id_user = us.id_user
    ORDER BY id_bill DESC";
    $resutl = pdo_query($sql);
    return $resutl;
}
function select_billhoadon(){
    $sql = "select * from cart order by id_cart desc";
    $listbhd = pdo_query($sql);
    return $listbhd;
}
function capnhat_tthd($trangthain, $id_bill)
{
    $sql = "update bill set trangthai='" . $trangthain . "' where id_bill=" . $id_bill;
    pdo_execute($sql);
}
?>