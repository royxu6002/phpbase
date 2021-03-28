<?php 
date_default_timezone_set("PRC");   
$host_name = "127.0.0.1"; 
$host_user = "homestead"; 
$host_pass = "secret"; 
$db_name="mini_shop";
$my_user="mini_user";
$my_type="mini_type";
$my_goods="mini_goods";
$my_sales="mini_sales";
$my_suppliers = "my_suppliers";
$my_quotation = "my_quotation";
	try { 
	    $my_conn = new PDO("mysql:host=$host_name;dbname=$db_name;", $host_user,$host_pass); 
	    $my_conn->exec("SET NAMES 'utf8'");
	} catch(PDOException $e) { 
	    echo '数据连接出错'.$e->getMessage(); 
	} 

?>