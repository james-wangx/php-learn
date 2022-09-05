<?php
/**
 * 面向对象编程基础用法
 */

// $name = "张三";
//
// function test()
// {
//     // 默认变量是有作用于的，在函数内使用函数外的变量，必须使用 global
//     // $name = "李四";
//     global $name;
//     echo "你好 $name"; // 默认的变量是有作用域的
// }
//
// test();


// 定义类：People
class People
{
    var $name = ""; // 不称为变量，而叫做属性
    var $age = 0;
    var $addr = "";
    var $nation = "";

    // 定义方法，默认情况下方法的定义和函数完全一致
    function talk()
    {
        // this 指具体的实例
        echo "$this->name 正在说话.\n";
    }

    function work()
    {
        echo "$this->name 正在工作.\n";
    }
}

// 实例化类 People，并进行属性和方法的调用
$p1 = new People();
$p1->name = "张三";
$p1->age = 20;
$p1->addr = "苏州";
$p1->nation = "汉族";
echo $p1->name . "\n";
$p1->talk();

$p2 = new People();
$p2->name = "李四";
$p2->age = 22;
$p2->addr = "南京";
$p2->nation = "壮族";
echo $p2->addr . "\n";
$p2->work();