<?php
require_once "ConnectDatabase.php";
$connect = ConnectDatabase::getConnection();
if ($connect) {
    echo "Kết nối thành công";
} else {
    echo "Kết nối thất bại";
}