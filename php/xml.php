<?php
$doc = new DOMDocument(); // 实例化DOMDocument类
// $doc->load("student.xml");

// 读取 class 节点的属性
// $nodes = $doc->getElementsByTagName("class");
// $node_name = $nodes->item(0)->nodeName;
// echo $node_name;
// $attr = $nodes->item(0)->attributes->item(0)->nodeName;
// $attr = $nodes->item(0)->attributes->item(0)->nodeValue;
// echo $attr;

// 读取第二个学生的所有信息
// $nodes = $doc->getElementsByTagName("student");
// $child_nodes = $nodes->item(1)->childNodes;
// foreach ($child_nodes as $node) {
//     echo $node->nodeValue;
// }

// 读取所有学生姓名
// $nodes = $doc->getElementsByTagName("name");
// foreach ($nodes as $node) {
//     echo $node->nodeValue . "<br>";
// }

// 将 XML 读取为二维数组
// $nodes = $doc->getElementsByTagName("student");
// $students = array();
// $tags = array("id", "name", "sex", "age", "degree", "school");
// foreach ($nodes as $k=>$v) {
//     foreach ($tags as $tg) {
//         $students[$k][$tg] = $v->getElementsByTagName($tg)->item(0)->nodeValue;
//     }
// }
// print_r($students);

// 读取 firewall.xml 的所有端口信息
$doc->load("firewall.xml");
$nodes = $doc->getElementsByTagName("port");
foreach ($nodes as $node) {
    $port = $node->attributes->item(1)->nodeValue;
    echo $port . "<br>";
}