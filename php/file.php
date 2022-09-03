<?php
/**
 * 文件读写的步骤
 * 1、打开文件：fopen
 * 2、读写文件：fgets，fwrite
 * 3、关闭文件：fclose
 * 附加函数：
 * 1、判断文件是否已经到达末尾：feof($fp)
 * 2、一次性将文件所有内容读出：file_get_contents($filename)
 * 3、使用 file_get_contents 还可以发送 GET 请求
 * 4、使用 file_put_contents 一次性写入文件
 * 5、取得当前文件指针所在位置
 * 6、直接将文件指针指向某个位置：fseek
 */

// // 最基本的按行读取整份文件
// $fp = fopen("D:\\DevTools\\xampp\\htdocs\\php-learn\\php\\Test.txt", "r");
//
// while (!feof($fp)) {
//     $line = fgets($fp);
//     $line = str_replace("\n", "<br>", $line);
//     echo $line;
// }
//
// fclose($fp);

// // 往文件中写入内容
// $fp = fopen("D:\\DevTools\\xampp\\htdocs\\php-learn\\php\\Test.txt", "a");
// fwrite($fp, "\n新的一段");
// fclose($fp);

// // file_get_contents 直接读取文件内容
// // header("content-type:text/html; charset='UTF-8'");
// $contents = file_get_contents("D:\\DevTools\\xampp\\htdocs\\php-learn\\php\\Test.txt");
// // $contents = iconv("GBK", "UTF-8", $contents);
// // $contents = str_replace("\n", "<br>", $contents);
// // echo $contents;
// $list = explode("\n", $contents);
// print_r($list);

// // 使用 file_get_contents 发送 GET 请求访问网页
// $contents = file_get_contents("http://www.woniunote.com");
// echo $contents;

// // 使用 file_put_contents 一次性写入文件
// // UTF-8 处理中文使用的是三字节，而 GBK 使用的是俩字节
// file_put_contents("Test.txt", "\nHello蜗牛", FILE_APPEND);

// // 读取一个 CSV 文件（逗号分隔符）
// $contents = file_get_contents("userpass.csv");
// $rows = explode("\n", $contents);
//
// // 循环之前，先定义一个数组
// $list = array();
//
// for ($i = 1; $i < count($rows); $i++) {
//     $row = explode(",", $rows[$i]);
//     array_push($list, $row);
// }
//
// print_r($list);

// // 使用 PHP 模拟 tail -f 实时查看文件内容
// $fp = fopen("userpass.csv", "r");
// fseek($fp, 26);
//
// while ($line = fgets($fp)) {
//     $line = str_replace("\n", "<br>", $line);
//     echo $line;
// }
//
// fclose($fp);

$pos = 0;
set_time_limit(0); // 设置为0表示没有超时时间限制

while (true) {
    $fp = fopen("date.txt", "r");
    fseek($fp, $pos);

    while ($line = fgets($fp)) {
        $line = iconv("GBK", "UTF-8", $line);
        echo $line . "<br>";
    }
    $pos = ftell($fp); // 返回当前文件指针位置
    fclose($fp); // 及时关闭文件，防止 PHP 一直占用文件

    ob_flush();
    flush();
    sleep(2);
}