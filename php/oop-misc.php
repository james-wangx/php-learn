<?php
/**
 * 封装：public、private、protected
 * 1、默认情况下为 public
 * 2、private 表示在类的定义中可以使用，而无法在实例中使用
 * 3、protected 表示受类的保护，实例中不能直接使用，但是在子类中可以使用
 */

class People
{
    private $name = "王五"; // 使用访问修饰符后，不再需要 var
    var $age = 0;
    var $addr = "";
    var $nation = "";

    public function talk()
    {
        echo "{$this->name}正在说话.\n";
    }

    private function work()
    {
        echo "{$this->name}正在工作.\n";
    }

    protected function eat($type)
    {
        echo "{$this->name}正在吃{$type}\n";
    }

    // 正对私有属性，如何在实例中对其修改？
    // 设置一个公共方法对私有属性进行修改
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

// $p = new People();
// // $p->name = "张三";
// $p->setName("张三");
// // $p->eat("米饭");


/**
 * 定义类：Man，继承 People
 * 可以继承父类的属性和方法（非私有）
 */
class Man extends People {
    // Man 这个类，什么都不做，People 的非私有属性和方法均可以使用
    function work() {

    }
}

$m = new Man();
$m->talk();