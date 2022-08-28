<?php
$id = $_GET["id"];

$conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
mysqli_set_charset($conn, "utf8mb4");
$sql = "select content from article where articleid=$id;";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result);

print_r($rows[0][0]);