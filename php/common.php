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
    public function __construct($host = "localhost", $username = "root", $password = "", $database = "learn")
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
    public function modify($sql)
    {
        $result = mysqli_query($this->conn, $sql);

        if (!$result) {
            die("数据库更新操作不成功！");
        }
    }

    /**
     * @return mixed|string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed|string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed|string
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @return mysqli|null
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * 类的析构方法：当类的实例使用完并从内存中释放时，将会触发调用该方法
     */
    public function __destruct()
    {
        mysqli_close($this->conn);
    }

    /**
     * 序列化时自动调用
     *
     * @return string[] : 需要实例化的类属性组成的数组
     */
    public function __sleep()
    {
        echo "DB 类正在被序列化！";

        return array("host", "username", "password", "database");
    }

    /**
     * 反序列化时自动调用
     *
     * @return void
     */
    public function __wakeup()
    {
        echo "DB 类正在被反序列化！" . PHP_EOL;
        $this->conn = $this->createConnection(); // 恢复数据库的连接状态
    }

    /**
     * 当调用一个不存在的成员方法时，此方法被调用
     *
     * @param $name
     * @param $arguments
     *
     * @return void
     */
    public function __call($name, $arguments)
    {
        echo "调用的成员方法不存在" . PHP_EOL;
    }

    /**
     * 当调用一个不存在的静态方法时，此方法被调用
     *
     * @param $name
     * @param $arguments
     *
     * @return void
     */
    public static function __callStatic($name, $arguments)
    {
        echo "调用的静态方法不存在" . PHP_EOL;
    }
}