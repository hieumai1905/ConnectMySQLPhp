<?php
require_once "ConnectDatabase.php";
include "User.php";
$connect = ConnectDatabase::getConnection();
if ($connect) {
    echo "Kết nối thành công\n";
} else {
    echo "Kết nối thất bại";
}

$sql = "SELECT * FROM users";

$result = $connect->query($sql, PDO::FETCH_OBJ);

$user = $result->fetchAll(PDO::FETCH_CLASS, "User");


foreach ($user as $value){
    echo $value->id . " - " . $value->username . " - " . $value->password . "\n";
}