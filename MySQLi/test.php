<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Login</h2>
<form action="" method="post">
    <div class="input-box">
        <label>Username</label>
        <input type="text" name="username">

    </div>
    <div class="input-box">
        <label>Password</label>
        <input type="password" name="password">

    </div>
    <button type="submit" class="btn">Login</button>

    <?php
    require_once "ConnectDatabase.php";
    $connect = ConnectDatabase::getConnection();
    if ($connect) {
        echo "Kết nối thành công\n";
    } else {
        echo "Kết nối thất bại";
    }
    $password = $GLOBALS["PASSWORD"];



    if (isset($_POST['username']) && $_POST['password']){
        $name = $_POST['username'];
        $password = $_POST['password'];
        echo $name . ' ' . $password;
        $query = "SELECT * FROM users where username = '$name' and password = '$password'"; // k ra ket qua
        //$query = "SELECT * FROM login where username = 'manhhieu' and password = '321' or password = 'whatever' or 'a'='a'"; //rq kq dung
        $result = $connect->query($query);

        $user = $result->fetch_all(MYSQLI_ASSOC);
        echo $result->num_rows;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "UserName: " . $row["username"] . "<br> PassWord: " . $row["password"] . "<br>";
            }
        } else {
            echo "Không tìm thấy dữ liệu.";
        }
    }

    $connect->close();
    ?>
</body>
</html>

