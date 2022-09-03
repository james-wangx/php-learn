<?php
date_default_timezone_set("PRC");


/**
 * 创建数据库连接
 *
 * @return mysqli|void : 数据库连接
 */
function create_connection()
{
    $conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
    mysqli_set_charset($conn, "utf8mb4");

    return $conn;
}


