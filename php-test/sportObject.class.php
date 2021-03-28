<?php
//父类
Class SportObject{
	public $name;
	public $age;
	public $avoirdupois;
	public $sex;
	public function __construct($name,$age,$avoirdupois,$sex){
		$this->name = $name;
		$this->age = $age;
		$this->avoirdupois = $avoirdupois;
		$this->sex = $sex;
	}
	function showMe(){
		echo "这句话不会显示";
	}
}


Class BeatBasketball extends SportObject{
	public $height;
	function __construct($name,$height){
		$this->height = $height;
		$this->name = $name;
	}
	function showMe(){
		if ($this->height>185){
			return $this->name."符合打篮球的要求!";
		} else{
			return $this->name."不符合打篮球的要求";
		}
	}
	
}

Class WeightLifting extends SportObject{
	function showMe(){
		if ($this->avoirdupois < 85){
			return $this->name."符合举重的要求";
		} else{
			return $this->name."不符合举重的要求";
		}
	}
}

$beatbasketball = new BeatBasketball('科技','190');
$weightlifting = new WeightLifting('明日','185','20','男');
echo $beatbasketball->showMe()."<br>";
echo $weightlifting->showMe();

class Employee{
	function __construct(){

	}
}

class Manager extends Employee{
	function __construct(){
		//也可以调用与该实例饿没有任何关系的构造函数, 只需在__construct()函数加上类名即可
		/* SportObject::__construct(){ } */

		//调用父类构造函数
		parent::__construct(){

		}
	}
}

?>






