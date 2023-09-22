<?php
require_once "ConnectDatabase.php";
$connect = ConnectDatabase::getConnection();
if ($connect) {
    echo "Kết nối thành công\n";
} else {
    echo "Kết nối thất bại";
}

$name = "hieu";
$password = "hieu";

$sql = "SELECT * FROM users where username = '$name' and password = '$password'";

echo $sql . "\n";
$result = $connect->query($sql);

echo $result->num_rows;

$user = $result->fetch_all(MYSQLI_ASSOC);


foreach ($user as $value){
    echo $value['id'] . " - " . $value['username'] . " - " . $value['password'] . "\n";
}