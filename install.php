<?php

echo '<center>';
if(!$_POST['admin'])
{

?>

	<script language="javascript" type="text/javascript">

	function check(f)
	{
		if(f.admin.value==""){
			alter("请输入管理员名称!");
			f.admin.focus();
			return(false);
		}
		if(f.pass.value==""){
			alter("请输入管理员密码!");
			f.pass.focus();
			return(false);
		}
		if(f.re_pass.value!=f.pass.value){
			alter("重复密码和密码不一致");
			f.re_pass.focus();
			f.re_pass.select();
			return(false);
		}
		if(f.mail.value==""){
			alter("请输入管理员邮箱");
			f.mail.focus();
			return(false);
		}
		if(f.category.value==""){
			alter("请输入默认产品类别");
			f.category.focus();
			return(false);
		}

	}

	</script>

	<style type="text/css">
	tr,td{
		font-size:10pt;
	}

	</style>
	<p>mini 商城系统安装过程</p>
	<table border="1" cellspacing="0" cellpadding="1" bordercolordark="#ffffff" bordercolorlight="0000FF" width="300">
		<form method="post" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return check(this)">

		<tr>
			<td colspan="2" bgcolor="#ccccff" align="center">管理员信息</td>
		</tr>
		<tr>
			<td>管理员名称</td>
			<td><input type="text" name="admin"></td>
		</tr>
		<tr>
			<td>管理员密码</td>
			<td><input type="password" name="pass" size="21"></td>
		</tr>
		<tr>
			<td>确认密码</td>
			<td><input type="password" name="re_pass" size="21"></td>
		</tr>
		<tr>
			<td>管理员邮箱</td>
			<td><input type="text" name="mail"></td>
		</tr>
		<tr>
			<td colspan="2" bgcolor="#ccffcc" align="center">商品类别信息</td>
		</tr>
		<tr>
			<td>默认商品类别名称</td>
			<td><input type="text" name="catagory"></td>
		</tr>
		<tr>
			<td>默认商品类别介绍</td>
			<td><input type="text" name="description"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" value="确认安装"></td>
		</tr>
		</form>
	</table>

	<?php
}
else
{
	$admin=$_POST["admin"];
	$pass=md5($_POST["pass"]);
	$mail=$_POST["mail"];
	$type=$_POST["category"];
	$description=$_POST["description"];
	$time=date("Y年m月d日");
	include "config.php";
	
	

	try{
		$sql="insert into $my_type(name, description) values('$type','$description')";
		$catagory=$my_conn->query($sql);

	}catch(PDOException $e){
		echo $e->getMessage();
	}

	try {
		$sql="insert into $my_user(name, password, email,reg_date,admin) values('$admin','$pass','$mail','$time',1)";
		$re = $my_conn->query($sql);
		if($re){
			echo "成功安装mini商城系统";
			echo "点<a href=reg.php>这里</a>注册新用户"."&nbsp;&nbsp;". "点<a href=login.php>这里</a>登录";
		}
	}
	catch(PDOException $e){
		echo "数据库写入数据失败".$e->getMessage();
	}
	
}
echo "</center>";

?>