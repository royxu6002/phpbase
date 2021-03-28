<?php

//数据库的基本操作
class Db{

	//数据库的默认链接参数
	private $dbConfig=[
		'db'=>'mysql',
		'host'=>'localhost',
		'port'=>'3306',
		'user'=>'root',
		'pass'=>'123456',
		'charset'=>'utf8',
		'dbname'=>'edu',
	];

	//单例模式, 本类的实例
	private static $instance = null;
	private $my_conn = null;

	/*	 Db构造方法
		私有化防止外部实例化
		 @param @params
	*/

	private function __construct($params){
		//初始化链接参数
		$this->dbConfig = array_merge($this->dbConfig,$params)
		//链接数据库
		$this->connect();
	}

	private function __clone(){

	}

	/*获取当前类的唯一实例*/
	public static function getInstance(){
		if (!self::$instance instanceof self){
			self::$instance = new self();
		}
		return self::$instance;
	}

	// 数据库的链接
	private function connect(){
		try{
			//配置数据源dsn
			$dsn = "{$this->dbConfig['db']}:host={$this->dbConfig['host']};port={$this->dbConfig['port']};dbname={$this->dbConfig['dbname']};charset={$this->dbConfig['charset']}";
			//创建PDO对象
			new PDO($dsn,$this->dbConfig['user'],$this->dbConfig['pass']);
			//设置客户端字符集
			$my_conn->query("set names {$this->dbConfig['charset']}");

		} catch (PDOException $e){
			die('数据库链接失败'.$e->getMessage());
		}
	}

	//完成数据的写操作: 新增, 更新, 删除
	//返回受影响的记录

	function exec($sql){
		$result = $my_conn->exec($sql);
	}
	function


}




?>