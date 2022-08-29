<?php
/**
 * 验证验证码
 *
 * @param $code : 验证码
 *
 * @return void
 */
function verify_code($code)
{
    if ($code !== "0000") {
        die("code-error");
    }
}


/**
 * 验证用户名和密码
 *
 * @param $username : 用户名
 * @param $password : 密码
 *
 * @return void
 */
function verify_user($username, $password)
{
    $conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");

    // 设置字符编码
    mysqli_set_charset($conn, "utf8mb4");

    // 拼接 SQL 语句并执行
    $sql = "select username, password from user where username='$username'";
    $result = mysqli_query($conn, $sql); // $result 获取到的结果，称结果集
    $row = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) === 1) {
        if ($password === $row["password"]) {
            echo "login-pass";
        } else {
            echo "password-error";
        }
    } else {
        echo "username-error";
    }

    // 关闭数据库
    mysqli_close($conn);
}


$username = $_POST["username"];
$password = $_POST["password"];
$code = $_POST["code"];

verify_code($code);
verify_user($username, $password);