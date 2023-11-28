<?php
require_once 'database.php';

function user_insert($user_name, $user_pass, $user_email){
    $sql = "INSERT INTO user(user_name, user_pass, user_email) VALUES (?, ?, ?)";
    pdo_execute($sql, $user_name, $user_pass, $user_email);
}
function user_insert_id($user_name,$user_pass,$user_ten, $user_diachi, $user_email, $user_sdt){
    $sql = "INSERT INTO user(user_name,user_pass,user_ten, user_diachi, user_email,user_sdt) VALUES (?, ?, ?, ?, ?, ?)";
    return  pdo_execute_id($sql,$user_name,$user_pass, $user_ten, $user_diachi, $user_email, $user_sdt);
}
function  user_update($user_name,$user_pass,$user_email,$user_diachi,$user_sdt,$role,$user_id){
    $sql = "UPDATE user SET user_name=?,user_pass=?,user_email=?,user_diachi=?,user_sdt=?,role=? WHERE user_id=?";
    pdo_execute($sql,$user_name,$user_pass,$user_email,$user_diachi,$user_sdt,$role,$user_id);    
}


function get_user($user_id){
    $sql="Select * from user where user_id=?";
    return pdo_query_one($sql, $user_id);
}
function checkuser($user_name,$user_pass){
    $sql="Select * from user where user_name=? and user_pass=?";
     return pdo_query_one($sql, $user_name,$user_pass);
    // if(is_array($kq)&&(count($kq))){
    //     return $kq["user_id"];
    // }else{
    //     return 0;
    // }
}
?>