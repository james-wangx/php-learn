<?php
session_start();

if (!(isset($_SESSION["is_login"]) and $_SESSION["is_login"] === "true")) {
    die("请先登录！");
} elseif ($_SESSION["role"] === "editor") {
    $headline = $_POST["headline"];
    $content = $_POST["content"];

    $conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
    mysqli_set_charset($conn, "utf8mb4");

    $sql = "insert into article(author, headline, content, viewcount, createtime) 
        values('James', '$headline', '$content', 0, now());";
    mysqli_query($conn, $sql) or die("add-failed");

    echo "add-pass";

    mysqli_close($conn);
} else {
    die("你没有权限！");
}