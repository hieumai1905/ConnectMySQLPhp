<?php

class ConnectDatabase
{
    private static $HOSTNAME = "localhost";
    private static $USERNAME = "root";
    private static $PASSWORD = "19052002";
    private $__conn = null;

    public function getConnection($databaseName)
    {
        if (!$this->__conn) {
            // Kết nối
            $this->__conn = mysqli_connect(self::$HOSTNAME, self::$USERNAME, self::$PASSWORD, $databaseName) or die ('Lỗi kết nối');

            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
        return $this->__conn;
    }

    public function disConnection()
    {
        if ($this->__conn) {
            mysqli_close($this->__conn);
        }
        if ($this->__conn) {
            echo "Đóng kết nối thành công";
        }
    }
}

$connectDb = new ConnectDatabase();

$connect = $connectDb->getConnection("TestConnectPhp");

if ($connect) {
    echo "Kết nối thành công\n";
} else {
    echo "Kết nối thất bại";
}

$connectDb->disConnection();

