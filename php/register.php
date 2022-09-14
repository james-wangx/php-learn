<?php
/**
 * 验证密码
 *
 * @param $password : 密码
 * @param $password2 : 确认密码
 *
 * @return void
 */
function verify_password($password, $password2)
{
    if ($password !== $password2) {
        die("password-error");
    }
}


/**
 * 验证用户是否存在
 *
 * @param $conn : 数据库连接
 * @param $username : 用户名
 *
 * @return void
 */
function verify_user($conn, $username)
{
    $sql = "select username from user where username='$username';";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count === 1) {
        die("user-exists");
    }
}


/**
 * 注册用户
 *
 * @param $conn : 数据库连接
 * @param $username : 用户名
 * @param $password : 密码
 * @param $avatar : 头像
 *
 * @return void
 */
function register_user($conn, $username, $password, $avatar)
{
    $date = date("Y-m-d H:i:s");
    $sql = "insert into user(username, password, role, avatar, createtime) 
        values ('$username', '$password', 'user', '$avatar', '$date');";
    mysqli_query($conn, $sql) or die("reg-failed");
}


/**
 * 上传头像
 *
 * @param $tmp_path : 临时路径
 * @param $new_path : 上传路径
 *
 * @return void
 */
function upload_avatar($tmp_path, $new_path)
{
    move_uploaded_file($tmp_path, $new_path) or die("头像上传失败");
}


$username = $_POST["username"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
$tmp_path = $_FILES["avatar"]["tmp_name"];  // 获取文件的临时路径
$avatar_name = $_FILES["avatar"]["name"];   // 获取文件的原始文件名

verify_password($password, $password2);
$conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
date_default_timezone_set("PRC"); // 设置使用中国北京时间
verify_user($conn, $username);
$new_name = date("Ymd_His.") . explode(".", $avatar_name)[1];
register_user($conn, $username, $password, $new_name);
upload_avatar($tmp_path, "upload/$new_name");
mysqli_close($conn);

echo "reg-pass";