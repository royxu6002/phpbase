<?php

if(!$_POST['user']){ //如果没有提交用户名, 显示前台
	echo "<center>";
?>	
	<script language="javascript" type="text/javascript">
		function check(f){
			if(f.user.value==""){
				alert("请输入用户名");
				f.user.focus();
				return(false);
			}
			if(f.pass.value==""){
				alert("请输入密码");
				f.pass.focus();
				return(false);
			}
		}
	</script>

	<p>mini商城系统登录程序</p>
	<table border="1" cellpadding="1" cellspacing="0" bordercolordark="#ffffff" bordercolorlight="#0000ff" width="300">
		<form method="post" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return check(this)">
			<tr>
				<td colspan="2" bgcolor="#ccccff" align="center">登录用户信息</td>
			</tr>
			<tr>
				<td>用户名称</td>
				<td><input name="user" type="text"></td>
			</tr>
			<tr>
				<td>用户密码</td>
				<td><input name="pass" type="password" size="21"></td>
			</tr>
			<tr>
				<td>登陆有效期</td>
				<td>
					<select name="c_1" size="1">
						<option value="0">不保存</option>
						<option value="<?php echo 60*60*24 ?>" selected="selected">一天</option>
						<option value="<?php echo 3600*24*7 ?>">一周</option>
						<option value="<?php echo 3600*24*30 ?>">一月</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="登录"></td>
			</tr>
		</form>
	</table>
<?php
}

else{  //如果提交用户名则进行处理
	$name=$_POST['user'];
	$pass=md5($_POST['pass']);
	$c_1=$_POST['c_1'];
	include "config.php";
	try{
		$sql="select count(*) from $my_user WHERE name='$name' && password='$pass'";
		$count=$my_conn->query($sql)->fetch(PDO::FETCH_NUM);
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	if($count[0]>0){
		setcookie("login",$name,time()+$c_1);
		echo "<meta http-equiv=\"refresh\" content=\"2, url=show.php\">";
		echo "<center>";
		echo "成功登录mini商城系统!";
		echo "2秒后进入浏览商品页面";
		echo "</center>";
	}else{
		echo "<center>";
		echo "<meta http-equiv=\"refresh\" content=\"2, url=login.php\">";
		echo "用户名或者密码错误,请重新输入!	";
		echo "2秒后返回重新输入";
		echo "</center>";
	}
}

echo "</center>";
?>