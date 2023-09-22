<?php
require_once "ConnectDatabase.php";
include "User.php";
$connect = ConnectDatabase::getConnection();
if ($connect) {
    echo "Kết nối thành công\n";
} else {
    echo "Kết nối thất bại";
}

// lấy tất cả dữ liệu từ bảng users
$sql = "SELECT * FROM users";

$result = $connect->query($sql, PDO::FETCH_OBJ);

$user = $result->fetchAll(PDO::FETCH_CLASS, "User");

foreach ($user as $value) {
    echo $value->id . " - " . $value->username . " - " . $value->password . "\n";
}


// Information login
$name = "hieu";
$password = "hieu";

// khai báo câu query sử dụng tham số định danh kiểu :tên_tham_số
$sql = "SELECT * FROM users WHERE username = :username AND password = :password";

$stmt = $connect->prepare($sql);
$stmt->bindParam(':username', $name);
$stmt->bindParam(':password', $password);
$stmt->execute();

// chuyển đổi dữ liệu trả về thành đối tượng
$users = $stmt->fetchAll(PDO::FETCH_CLASS, "User");

if (count($users) > 0) {
    foreach ($users as $user) {
        echo "user login: ";
        echo $user->id . " - " . $user->username . " - " . $user->password . "\n";
    }
} else {
    echo "Không tìm thấy người dùng";
}

// khai báo câu query sử dụng tham số định danh kiểu ?
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";

$stmt = $connect->prepare($sql);`¡`
$stmt->bindValue(1, $name);
$stmt->bindValue(2, $password);
$stmt->execute();

// chuyển đổi dữ liệu trả về thành đối tượng User
$users = $stmt->fetchAll(PDO::FETCH_CLASS, "User");

if (count($users) > 0) {
    foreach ($users as $user) {
        echo "user login: ";
        echo $user->id . " - " . $user->username . " - " . $user->password . "\n";
    }
} else {
    echo "Không tìm thấy người dùng";
}