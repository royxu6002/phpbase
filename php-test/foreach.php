<?php
// include "../config.php";

// $sql="select * from $my_type";
// //FETCH_style, 此处可用'./www/test/fetch_assoc.php'测试PDO::FETCH_ASSOC, PDO::FETCH_NUM的数组集加深理解. 
// //fetchAll, 取回所有结果集 fetch 取回 一行结果集
// $result=$my_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// foreach($result as $k->$v){
// 	echo 

// }
// var_dump($result[0]['name']);

$myArray = array (

　　0=>array("11"=>"val11","12"=>"val12","13"=>"val13"),

　　1=>array("21"=>"val21","22"=>"val22","23"=>"val23"),

　　2=>array("31"=>"val31","32"=>"val32","33"=>"val33")

　　);
	
foreach($myArray as $key=>$value) {
	var_dump(is_array($val));  //判断$val的值是否是一个数组，如果是，则进入下层遍历

}




?>