<?php
require_once "common.php";

// $db = new DB();

// $rows = $db->query("select articleid, headline from article where articleid < 11;");
// print_r($rows);

// $db->modify("update article set headline='你好新标题' where articleid=10;");

// $name = "张三";           // 定义变量
// echo serialize($name);   // 序列化后的指：s:6:"张三";
// echo unserialize('s:6:"张三";');

// $student = array('name' => '张三', 'age' => 30, 'addr' => '成都高新区', 'phone' => '18812345678');
// echo serialize($student);

// $source = 'a:4:{s:4:"name";s:6:"张三";s:3:"age";i:30;s:4:"addr";s:15:"成都高新区";s:5:"phone";s:11:"18812345678";}';
// $student = unserialize($source);
// print_r($student);

// $db = new DB();
// file_put_contents("db.txt", serialize($db));

$source = file_get_contents("db.txt");
$db = unserialize($source);
echo $db->getHost() . PHP_EOL;
echo $db->getUsername() . PHP_EOL;