<?php
class Demo{
	//静态私有属性, 保存当前类的实例
	private static $instance = null;

	//构造方法私有化, 禁止从外部用New 来创建于
	private function __construct(){
	}

	//克隆方法私有化, 禁止从外部克隆来生成本类的实例
	private function __clone(){
	}

	//生成当前类的唯一实例
	public static function getInstance(){
		//如果不是当前类的实例, 那么实例化当前类创建新实例
		if(!self::$instance instanceof self){
			self::$instance = new self();
		}
		return self::$instance;
	}
}



// $obj1 = new Demo();
// $obj2 = new Demo();
// $obj3 = new Demo();
// $obj4 = new Demo();
// $obj5 = clone($obj4); //克隆方法需要被禁用 
$obj1 = Demo::getInstance();
$obj2 = Demo::getInstance();

var_dump($obj1);
var_dump($obj2);


?>