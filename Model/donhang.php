<?php

function bill_insert_id($madh,$user_id,$nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_tel, $ship, $total, $voucher, $tongthanhtoan, $pttt ){
    $sql = "INSERT INTO bill(madh,user_id,nguoidat_ten, nguoidat_diachi, nguoidat_email, nguoidat_tel, ship, total, voucher, tongthanhtoan, pttt) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    return  pdo_execute_id($sql,$madh,$user_id,$nguoidat_ten, $nguoidat_diachi, $nguoidat_email, $nguoidat_tel, $ship, $total, $voucher, $tongthanhtoan, $pttt);
}


?>