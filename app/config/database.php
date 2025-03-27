<?php
class Database {
    private static $host = "localhost";
    private static $dbname = "ql_nhansu";
    private static $username = "root";
    private static $password = "";
    private static $conn;

    public static function connect() {
        if (!isset(self::$conn)) {
            self::$conn = new mysqli(self::$host, self::$username, self::$password, self::$dbname);
            if (self::$conn->connect_error) {
                die("Kết nối thất bại: " . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}
?>
