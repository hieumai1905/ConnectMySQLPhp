<?php
require_once "DatabaseConfig.php";

class ConnectDatabase
{
    private static $connection = null;

    public static function getConnection()
    {
//        global $HOSTNAME, $DATABASENAME, $USERNAME, $PASSWORD; // Sử dụng biến toàn cục
//
//        if (!self::$connection) {
//            self::$connection = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASENAME) or die ('Connect error');
//        }
        if (!self::$connection) {
            self::$connection = mysqli_connect($GLOBALS['HOSTNAME'], $GLOBALS['USERNAME'], $GLOBALS['PASSWORD'], $GLOBALS['DATABASENAME']) or die ('Connect error');

        }
        return self::$connection;
    }

    public static function closeConnection()
    {
        if (self::$connection) {
            mysqli_close(self::$connection);
            self::$connection = null;
        }
    }
}