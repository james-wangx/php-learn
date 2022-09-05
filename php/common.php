<?php
// date_default_timezone_set("PRC");
//
//
// /**
//  * 创建数据库连接
//  *
//  * @return mysqli|void : 数据库连接
//  */
// function create_connection()
// {
//     $conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
//     mysqli_set_charset($conn, "utf8mb4");
//
//     return $conn;
// }


class DB
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    /**
     * 类的构造方法：当类在进行实例化时会触发执行该方法
     */
    public function __construct($host="localhost", $username="root", $password="", $database="learn")
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->conn = $this->createConnection();
    }

    /**
     * 用于建立与数据库的连接，并返回
     *
     * @return mysqli|void : 数据库连接
     */
    private function createConnection()
    {
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database) or die("数据库连接不成功");
        mysqli_set_charset($conn, "utf8mb4");

        return $conn;
    }

    /**
     * 查询数据并返回
     *
     * @param $sql : 用来查询的 SQL 语句
     *
     * @return array
     */
    public function query($sql)
    {
        $result = mysqli_query($this->conn, $sql);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /**
     * 更新数据库
     *
     * @param $sql : 要执行更新的 SQL 语句
     *
     * @return void
     */
    public function modify($sql) {
        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            die("数据库更新操作不成功！");
        }
    }

    /**
     * 类的析构方法：当类的实例使用完并从内存中释放时，将会触发调用该方法
     */
    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}