<?php
$id = $_GET["id"];

$conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
mysqli_set_charset($conn, "utf8mb4");
$sql = "select * from article where articleid=$id;";
$result = mysqli_query($conn, $sql);
$article = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="static/css/read.css">

  <title><?= $article["headline"] ?></title>
</head>
<body>
  <div id="content">
    <h1><?= $article["headline"] ?></h1>
    <hr>
    <div><?= $article["content"] ?></div>
  </div>
</body>
</html>