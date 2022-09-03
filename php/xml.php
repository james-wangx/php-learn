<?php
// $doc = new DOMDocument(); // 实例化DOMDocument类
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
// $doc->load("firewall.xml");
// $nodes = $doc->getElementsByTagName("port");
// foreach ($nodes as $node) {
//     $port = $node->attributes->item(1)->nodeValue;
//     echo $port . "<br>";
// }

// $doc->preserveWhiteSpace = false;   // 不保留空白节点
// $doc->formatOutput = true;          // 格式化输出
// $doc->load("student.xml");
// $nodes = $doc->getElementsByTagName("student");

// // 修改节点的属性
// $nodes->item(2)->attributes->item(0)->nodeValue = '5';
// // 修改节点的值
// $nodes->item(2)->childNodes->item(1)->nodeValue = "扬大言";

// 删除节点，先找到父节点，再找到子节点，调用父节点的removeChild方法
// $parent = $nodes->item(2);
// $child = $parent->childNodes->item(4);
// $parent->removeChild($child);

// 直接找到要删除节点，再通过上一层找到父节点
// $child = $doc->getElementsByTagName("degree")->item(2);
// $child->parentNode->removeChild($child);
//
// $doc->save("student.xml");

// $student01=array("id"=>"WNCD201703015", "name"=>"敬小越", "sex"=>"男", "age"=>"24", "degree"=>"本科", "school"=>"电子科技大学成都学院");
// $student02=array("id"=>"WNCD201703020", "name"=>"何小学", "sex"=>"男", "age"=>"29", "degree"=>"本科", "school"=>"成都理工大学");
// $student03=array("id"=>"WNCD201703025", "name"=>"杨小言", "sex"=>"女", "age"=>"22", "degree"=>"大专", "school"=>"四川华新现代职业学院");
// $students = array($student01, $student02, $student03);
//
// $doc = new DOMDocument("1.0", "utf8");
// $doc->preserveWhiteSpace = false;
// $doc->formatOutput = true;
//
// // 创建根节点 class 并设置 id 属性
// $class = $doc->createElement("class");
// $class->setAttribute("id", "WNCDC085");
// $doc->appendChild($class);
// foreach ($students as $key=>$student) {
//     // 为 class 节点添加 student 子节点
//     $nodeStudent = $doc->createElement("student");
//     $nodeStudent->setAttribute("sequence", $key + 1);
//     $class->appendChild($nodeStudent);
//     // 为 student 节点添加 id, name, sex 等子节点
//     foreach ($student as $key => $value) {
//         $node = $doc->createElement($key);
//         $node->nodeValue = $value;
//         $nodeStudent->appendChild($node);
//     }
// }
//
// $doc->save("write.xml");

// XPATH 定位元素
$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->load("student.xml");
$xpath = new DOMXPath($doc);
// $expression = "/class/student[@sequence='1']/school";
// $expression = "/class/student[@sequence='2']/school";
// $expression = "//student[@sequence='5']/name";
// $expression = "//student[2]/name"; // 找第二个学生
$expression = "//student/school[contains(text(), '科技')]"; // 找第二个学生
$nodes = $xpath->query($expression); // 返回的是找到的所有节点
echo $nodes->item(0)->nodeValue;