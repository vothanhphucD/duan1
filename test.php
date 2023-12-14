<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'duan1_help';

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT time_reg FROM orders WHERE order_id = 128";
$result = $conn->query($sql);

$dateNow = date('Y-m-d');
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $time_reg = $row["time_reg"];
    $test = date('m', strtotime($time_reg));
    if($dateNow == $time_reg) {
        echo 'Trùng ngày';
    } else {
        echo 'Không trùng';
    }

    echo $test;
}
?>