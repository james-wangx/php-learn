<?php
$username = $_POST["username"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$tmp_path = $_FILES["avatar"]["tmp_name"];  // 获取文件的临时路径
$avatar_name = $_FILES["avatar"]["name"];   // 获取文件的原始文件名

if ($password !== $password2) {
    die("password-error");
}

$conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
$sql = "select username from user where username='$username';";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count === 1) {
    die("user-exists");
}

// 设置使用中国北京时间
date_default_timezone_set("PRC");
$date = date("Y-m-d H:i:s");
$new_name = date("Ymd_His.") . explode(".", $avatar_name)[1];
$sql = "insert into user(username, password, role, avatar, createtime) 
        values ('$username', '$password', 'user', '$new_name', '$date');";
mysqli_query($conn, $sql) or die("reg-failed");
mysqli_close($conn);

echo "reg-pass";

// 注册成功后，正式上传文件
move_uploaded_file($tmp_path, "upload/$new_name") or die("头像上传失败");