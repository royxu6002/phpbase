<?php
//类的继承, 方法重写, 访问控制, static关键字, final关键字, 数据访问, 接口, 多态, 抽象类
class Person{
	public $name;
	public $sex;
	public $age;

	function _construct($name, $sex, $age){
		$this->name = $name;
		$this->sex = $sex;
		$this->age = $age;
	}

	function say(){
		echo "this is $this->name, i am $this->sex; $this->age years old";
	}

	function run(){
		echo "hello";
	}
}

//__construct, __destruct;
//object oriented program
//_autolaod自动加载类, 实例化一个未来定义的类时, 就会触此函数.


//方法重写: 子类重写父类的方法
class English extends Person{
	public function say1(){
		echo "hello world";
		$this->run();
	}
}

final class Germany extends Person{
	static $location = 'WestEuro';
	static function live(){
		echo "我住在".self::$location;
	}
	function get(){
		self::live();
	}
}
// Germany::say1();
// $germany = new Germany();
// $germany->get();

//接口
// interface ICanEat{
// 	public function eat($food);
// }

// class Human implements ICanEat{
// 	//eat()方法必须由子类来实现
// 	public function eat($food){
// 		echo "i will brush the line";
// 	}
// }

// class Animal implements ICanEat{
// 	public function eat($food){
// 		echo $food."had been re-ignited";
// 	}
// }
// $human = new Human();
// $human->eat('hamburg');
// $animal = new Animal;
// $animal->eat('soul');

abstract class Korean{
	abstract function say();
	public function wish(){
		echo "unify to cooperate";
	}
}
class SouthKorean extends Korean{
	public function say(){
		echo "hello world, again";
	}
}
$southKorean = new SouthKorean();
$southKorean->say();
$southKorean->wish();
?>


