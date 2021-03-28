<?php
include "../config.php";
//$sql="select * from $my_type";
//FETCH_style, 此处可用'./www/test/fetch_assoc.php'测试PDO::FETCH_ASSOC, PDO::FETCH_NUM的数组集加深理解.
//$result=$my_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);


// while($i=0;$i<count($result);$i++){
// 	echo '<pre>';
// 	var_dump($result[$i]);
// }

//$sql="select * from $my_type";
try{
	//$sql= "select count(*) from $my_goods";
//FETCH_style, 此处可用'./www/test/fetch_assoc.php'测试PDO::FETCH_ASSOC, PDO::FETCH_NUM的数组集加深理解. 
//fetchAll, 取回所有结果集 fetch 取回 一行结果集
//$result=$my_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	//$result = $my_conn->query($sql);
	//$row = $result->fetchALL(PDO::FETCH_ASSOC);
	//echo "<pre>";
	//print_r($row);
	//print_r($result->fetch_assoc);
	// $sql="select * from test_main";


// 在 SQL Server 数据库中，为咱们提供了一个函数 row_number()  用于给数据库表中的记录进行标号，
//	在使用的时候，其后还跟着一个函数 over()，而函数 over() 的作用是将表中的记录进行分组和排序。两者使用的语法为：
// ROW_NUMBER() OVER(PARTITION BY COLUMN1 ORDER BY COLUMN2) 意为：
//将表中的记录按字段 COLUMN1进行分组，按字段 COLUMN2 进行排序，其中 PARTITION BY：表示分组 ORDER BY：表示排序

	$sql="SELECT test_main.value, test_sub.value, ROW_NUMBER() OVER (PARTITION BY test_main.value ORDER BY test_sub.value) FROM test_main,test_sub";
	$result = $my_conn->query($sql);
	// WHERE test_main.id = test_sub.main_id
	$re = $result->fetch(PDO::FETCH_ASSOC);
} catch(PDOExpection $e){
	echo $e->getMessage();
}

echo "<pre>";
var_dump($re);




//遍历数组
/* while($row = $result->fetch(PDO::FETCH_ASSOC)){
	echo 'price@'.$row['name'].':'.$row['cost']."<br>";

}
*/

// for($i=0;$i<count($result);$i++){
// 	echo "<pre>";
// 	var_dump($result[$i]['name']);
// }

//list, each 分散关联数组集
// while(list($k,$v)=each($result)){
// 	echo "<pre>";
// 	//for($i=0;$i<count($v);$i++)
// 	var_dump($v['name']);
// 	echo "<hr>";
// } 



?>