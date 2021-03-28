<?php
	$goods = array();

	$conn = mysqli_connect('127.0.0.1','root','123456','test');



	//写法1
	if(!$conn){
		die('Could not connect'.mysqli_errno($conn));
	}
*/
	//写法2
	if (mysqli_connect_errno($conn))  
	{  
	    echo "连接 MySQL 失败: " . mysqli_connect_error();  
	}  
	

	$sql= "select * from shopmall_1";
	$res = mysqli_query($conn, $sql);
	
	//判断这里是否有数据获取 是否正确??
	if(!$res){
		echo '未获取数据';
	}


	/* 其他的验证方法
		
		if ($res && mysqli_num_rows($result)>0){

			// $rows = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
			  
		} else{
			echo '<h2>没有数据返回</h2>';
		};

	*/


	// 关联数组

	$i=0;

	while($row = mysqli_fetch_assoc($res)){
		$goods[$i]['id']=$rows['id'];
		$goods[$i]['name']=$rows['name'];
		$goods[$i]['price']=$rows['price'];
	}

	// 释放结果集
	mysqli_free_result($res);
	mysqli_close($conn);

?>


