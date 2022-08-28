<?php
/**
 * 获取请求数据的方式
 * GET：http://localhost/php-learn/php/login.php?username=james&password=wang&code=8641
 * POST：http://localhost/php-learn/php/login.php
 */
$username = $_POST["username"];
$password = $_POST["password"];
$code = $_POST["code"];

// $username = $_GET["username"];
// $password = $_GET["password"];
// $code = $_GET["code"];

// echo $username . '-' . $password . '-' . $code;


/**
 * 如何访问 MySQL 数据库？
 * MySQLi 和 PDO
 * 1、连接到数据库
 * 2、执行 SQL 语句
 * 3、处理 SQL 语句的结果
 * 4、关闭数据库连接
 * 事实上，所有的 IO 操作，都需要打开和关闭
 */
$conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");

// 设置字符编码
mysqli_query($conn, "set names utf8;");
mysqli_set_charset($conn, "utf8mb4");

// 拼接 SQL 语句并执行
$sql = "select * from user where username='$username' and password='$password'";
$result = mysqli_query($conn, $sql); // $result 获取到的结果，称结果集

if (mysqli_num_rows($result) == 1) {
    echo "登录成功<br>";
} else {
    echo "登录失败<br>";
}

// 关闭数据库
mysqli_close($conn);