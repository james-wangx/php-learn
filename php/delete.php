<?php
// $articleid = $_POST["articleid"];
$articleid = $_GET["articleid"];

// 直接删除，通常不建议这样做
$conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
mysqli_query($conn, "delete from article where articleid=$articleid;") or die("delete-failed");

echo "delete-ok";

// 通常情况会使用回收站、设定列标识