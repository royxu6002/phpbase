<?php
include "../config.php";

$host_name = "127.0.0.1"; 
$host_user = "root"; 
$host_pass = "123456"; 
$db_name="test";
$my_user="mini_user";
$my_type="mini_type";
$my_goods="mini_goods";
$my_sales="mini_sales";
$conn = mysqli_connect($host_name,$host_user,$host_pass,$db_name);
mysqli_set_charset($conn, 'utf8');
if(!$conn){
	echo "my_connect_error($conn)";
}


// mysqli_fetch_array(result, resulttype), 从结果集中取得一行作为数字数组或关联数组(包含表头字段)： 
// mysqli_fetch_row, 	从结果集中取得一行，并作为枚举数组返回。(不包含表头字段)
// mysqli_fetch_all(result, resulttype) 从结果集中取得所有行作为关联数组，或数字数组，或二者兼有。
// resulttype: MYSQLI_ASSOC, MYSQLI_NUM, MYSQLI_BOTH 
// mysqli_fetch_assoc, 从结果集中取得一行作为关联数组。

//$k = mysqli_fetch_all($result, MYSQLI_BOTH); 


echo "<pre>";
var_dump($re);

//list, each 分散关联数组集
// while(list($k,$v)=each($result)){
// 	echo "<pre>";
// 	var_dump($v['description']);
// 	echo "<hr>";
// } 




?>