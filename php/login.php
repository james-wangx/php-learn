<?php
/**
 * 获取请求数据的方式
 * GET：http://localhost/php-learn/php/login.php?username=james&password=rewrwe&code=8641
 * POST：http://localhost/php-learn/php/login.php
 */
$username = $_POST["username"];
$password = $_POST["password"];
$code = $_POST["code"];

// $username = $_GET["username"];
// $password = $_GET["password"];
// $code = $_GET["code"];

echo $username . '-' . $password . '-' . $code;

