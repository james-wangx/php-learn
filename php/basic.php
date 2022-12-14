<?php
/**
 * 在 PHP 中，可以通过两个函数往页面中输出
 * 1、echo：支持逗号分隔字符串
 * 2、print：不支持逗号
 * 注意：在 PHP 中，换行符无法被浏览器解析，只能解析<br>
 */
// echo "这是一个牛逼的网页.\n";
echo "这是一个牛逼的网页.<br>";
print "这又是一个牛逼的网页.<br>";

echo "111111", "222222", "333333<br>";
// print "111111", "222222", "333333"; // print 不支持逗号分隔字符串

// '.' 代表连接符
echo "111111" . "222222" . "333333<br>";
print "111111" . "222222" . "333333<br>";

echo "你好，你的余额为：" . 20000 . "元<br>";


/**
 * 引号问题
 * 1、双引号：里面可以包裹字符串和变量
 * 2、单引号：只能表示字符串，不能引用字符串
 * 3、反引号：执行操作系统命令并返回结果
 */
$addr = "四川成都";
echo "你当前所在城市为：$addr<br>";
echo '你当前所在城市为：$addr<br>';
// echo `ipconfig`;


/**
 * 乱码问题
 * 网页编码为UTF-8，而操作系统编码为GBK
 * 1、使用 header 函数往网页中写入 GBK 的响应头，让浏览器按照 GBK 的编码格式处理；会导致网页编码全部变为 GBK，其它位置会乱码
 * 2、使用 PHP 内置函数：iconv 对需要转码的文本进行转换，不会影响其他内容
 */
// header("content-type:text/html; charset='GBK'");
// echo `ipconfig`;
$result = `ipconfig`;
$result = iconv("GBK", "UTF-8", $result);
echo $result . "<br>";


if ("100" == 100)
    echo "两者相等<br>";

$i = date("s");
while ($i <= 30) {
    ob_flush(); // 清空缓冲区，直接输出
    flush();
    echo date("Y-m-d H:i:s") . "<br>";
    $i = date("s");
    sleep(1);
}