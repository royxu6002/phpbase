<style type="text/css">
tr,td {font-size: 10pt;}
</style>
<?php
include "head.php";
echo "<center>";
if (!$_COOKIE['login'])
{
	echo "尚未登录,点<a href=login.php>这里,请以管理员身份登录</a>再执行该画面";

} 
else
{
	$name = $_COOKIE['login'];
	include "config.php";
	$sql = "select admin from $my_user where id='$name'";
	$result = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
	if (count($result)==0)
	{
		echo "您没有权限执行该画面,&nbsp;";
		echo "请以<a href=login.php>管理员</a>身份登录, 再执行该画面";
	} 
	else
	{
		if(!$_POST['cat'])
		{
?>  
		<script language=javascript>
			function check(f){
				if(f.cat.value==""){
					alert("请输入类别名称!");
					f.cat.focus();
					return(false);
				}
			}

		</script>

		<center>商城系统添加类别</center>
		<table border="1" cellspacing="0" cellpadding="1" width="80%">
			<form method="post" action="<?php $_SERVER['PHP_SELF']?>" onsumit="return check(this)">
				<tr>
					<td colspan="2" bgcolor="#ccccff" align="center">添加类别信息</td>
				</tr>
				<tr>
					<td>添加类别名称</td>
					<td><input type="text" name="cat"></td>
				</tr>
				<tr>
					<td>添加类别介绍</td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="添加"></td>
				</tr>
			</form>
		</table>
	<?php

		} 
		else
		{
			$name=$_POST['cat'];
			if ($_POST['description']!="")
			{
				$description = $_POST['description'];
			} 
			else
			{
				$description = "暂无介绍";
			}
			$sql = "select count(*) from $my_type where name='$name'";
			$re = $my_conn->query($sql);
			$count = $re->fetch(PDO::FETCH_NUM);
			if ($count[0]>0)
			{
				echo "已经存在同名类别";
				echo "点<a href=add_type.php>这里</a>重新添加类别";
			} 
			else 
			{
				$sql = "insert into $my_type(name,description) value('$name','$description')";
				$re = $my_conn->query($sql);
				if ($re)
				{
					echo "成功添加类别: $name";
					echo "点<a href=show.php>这里</a>查看";
				}
			}

		}
	}
}

?>



