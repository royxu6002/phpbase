<?php
	// 超链接中的双引号省略了
	echo "<a href=buy.php?name=". a. "&price=" . b .">购买</a>";
?>

			
<?php 
/*
$servername = "localhost"; 
$username = "username"; 
$password = "password"; 

//创建数据库
try { 
    $conn = new PDO("mysql:host=$servername", $username, $password); 

    // 设置 PDO 错误模式为异常 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $sql = "CREATE DATABASE myDBPDO"; 

    // 使用 exec() ，因为没有结果返回 
    $conn->exec($sql); 

    echo "数据库创建成功<br>"; 
}  catch(PDOException $e) { 
    echo $sql . "<br>" . $e->getMessage(); 
} 
*/

$conn = null; 
$servername = "localhost"; 
$username = "username"; 
$password = "password"; 
$dbname="dbname";
$dsn="mysql:dbname=$dbname;host=$servername";

try{
	$conn = new PDO("mysql:host=$servername",$username,$password);
	//$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	$conn->setAttibute(PDO::ATTR_ERRMODE, PDO::ATTR_ERRMODE_EXCEPTION);
	/* 
	try {
	    $dbh = new PDO($dsn, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
	} catch (PDOException $e) {
	    echo 'Connection failed: ' . $e->getMessage();
	    exit;
	} 
	*/

	$sql = "CREATE DATABASE myDB";
	$conn->exec($sql);
	echo '创建数据库成功';

} catch(PDOException $e) {	
	echo $sql."<br>".$e->getMessage();
}
$conn = null;

?>
