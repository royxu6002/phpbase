<form name="form1" method="post" action="<?php echo "$_SERVER[PHP_SELF]";?>">
	User Name<input name="username" type="text" >
	Password<input name="password" type="password">
	Repeat password<input name="repassword" type="password">
	<input type="submit" name="submit" value="register">
</form>

<?php
if(trim($_POST['password'])!= trim($_POST['repassword'])){
	exit('密码不一致,请返回上一步!');
} else{
	$username=trim($_POST['username']);
	$ps=trim($_POST['password']);
	$time=time();
	$ip=$_SERVER['REMOTE_ADDR'];
	$conn = mysqli_connect("127.0.0.1","root","123456","edu");
	mysqli_set_charset($conn,'utf8');
	if(mysqli_error($conn)){
		echo mysqli_error($conn);
		exit;
	} else{
		$sql = "INSERT INTO Register(username,password,create_time,ip) VALUES('$username','$ps','$time','$ip')";

		$result = mysqli_query($conn,$sql);
		if($result){
			echo '成功注册'. '当前用户插入的ID为:'.mysqli_insert_id($conn);
		}else{
			echo '注册失败';
		}
	}

}
?>


