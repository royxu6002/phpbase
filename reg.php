<?php

if(!$_POST['user']){
echo "<center>";
?>
<script language="javascript" type="text/javascript">
function check(f){
	if(f.user.value==""){
		alert("请输入注册用户姓名!");
		f.user.focus();
		return(false);
    }
    if(f.pass.value==""){
    	alert("请输入注册用户密码");
    	f.pass.focus();
    	return(false);
    }
    if(f.re_pass.value!=f.pass.value){
    	alert("重复密码与密码不一致!");
    	f.re_pass.focus();
    	f.re_pass.select();
    	return(false);
    }
    if(f.mail.value==""){
    	alert("请输入注册邮箱~");
    	f.mail.focus();
    	return(false);
    }

}

</script>


<style type="text/css">

tr,td {font-size: 10pt;}

</style>

<p>mini商城系统注册程序</p>

<table border="1" cellspacing="0" cellpadding="1" bordercolordark="#ffffff" bordercolorlight="0000FF" width="300">
	<form method="post" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return check(this)">
		<tr>
			<td colspan="2" bgcolor="#ccccff" align="center">注册用户信息</td>
		</tr>
		<tr>
			<td>注册用户姓名</td>
			<td><input type="text" name="user"></td>
		</tr>
		<tr>
			<td>注册用户密码</td>
			<td><input type="password" name="pass" size="21"></td>
		</tr>
		<tr>
			<td>确认密码</td>
			<td><input type="password" name="re_pass" size="21"></td>
		</tr>
		<tr>
			<td>注册用户邮箱</td>
			<td><input type="text" name="mail"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="注册"></td>
		</tr>
	</form>
</table>

<?php
}
else 
{
	$name=$_POST['user'];
	$pass=md5($_POST['pass']);
	$mail=$_POST['mail'];
	$time=date("Y年m月d日");
	include "config.php";

	try{
		//COUNT(*) 函数返回表中的记录数：SELECT COUNT(*) FROM table_name;
		//COUNT(column_name) 函数返回指定列的值的数目（NULL 不计入）：SELECT COUNT(column_name) FROM table_name;
		$sql="select count(*) as nums from $my_user WHERE name='$name'"; 
		$count = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);

	}catch(PDOException $e){
		echo $sql.'<br>'.$e->getMessage();
	}

	if($count[0]>0) {
		echo "已经存在同名同姓";
		echo "点<a href=reg.php>这里</a>注册新用户"."&nbsp;&nbsp;". "点<a href=login.php>这里</a>登录";
	} else { 
		try{
			$sql= "insert into $my_user(name, password,email,reg_date) values('$name','$pass','$mail','$time')";
			$re=$my_conn->query($sql);
			if($re){
				echo "成功注册用户:".$name;
				echo "点<a href=login.php>这里</a>登录";
			}
			} catch(PDOException $e){	
				echo $e->getMessage();
			}
	}
}
	
echo "</center>";

?>

