<style type="text/css">
tr,td {font-size: 10pt;}
</style>


<?php
echo "<center>";
include "head.php";
if (!$_COOKIE['login']){

	echo "尚未登录,点<a href=login.php>这里,请以管理员身份登录</a>再执行该画面";

} else{
	$name = $_COOKIE['login'];
	include "config.php";
	$sql = "select admin from $my_user where id='$name'";
	$result = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
	if (count($result)==0){
		echo "您没有权限执行该画面,&nbsp;";
		echo "请以<a href=login.php>管理员</a>身份登录, 再执行该画面";
	} else{
		if(!$_GET['id'])
		{
			echo "管理所有类别";
			include "config.php";
			$sql = "select * from $my_type";
			$result = $my_conn->query($sql);
			$num = $result->rowCount();
			if ($num==0)
			{
				echo "尚没有任何类别, 请点<a href=show.php>这里返回首页</a>";
			} 
			else 
			{
				echo "<table border=1 cellspacing=0 cellpadding=1 bordercolordark=#ffffff bordercolorlight=#0000ff width=80%>";
				echo "<tr bgcolor=#ccccff><td>编号</td><td>类别名称</td><td>类别介绍</td><td>修改</td></tr>";
				while($row = $result->fetch(PDO::FETCH_ASSOC))
				{
					echo "<tr>";
					echo "<td>$row[id]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[description]</td>";
					echo "<td><a href=e_type.php?id=$row[id]>修改</a></td>";
					echo "</tr>";
				}
				echo "</table>";
			}


		} 
		else
		{
			$id = $_GET['id'];
			include "config.php";
			if (!$_POST['description']){
				echo "<script language=javascript>
				function check(f){
					if(f.ca_name.value==\"\"){
						alert(请输入类别名称);
						f.ca_name.focus();
						return(false);
					}
					if(f.description.value==\"\"){
						alert(请输入类别介绍);
						f.description.focus();
						return(false);
					}
				}

				</script>";
				$sql = "select * from $my_type where id='$id'";
				$result = $my_conn->query($sql);
				$row = $result->fetch(PDO::FETCH_ASSOC);
				echo "<table border=1 cellsapcing=0 cellpadding=1 bordercolordark=#ffffff bordercolorlight=#0000ff width=80%>";
				echo "<form method=post action=e_type.php?id=$id onsubmit=\"return check(this)\">";
				echo "<tr><td colspan=2 align=center>类别:<font color=#ff0000> $row[name]</font>的内容</td></tr>";
				echo "<tr>";
				echo "<td>类别编号:</td><td>$row[id]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>类别名称</td><td><input type=text name=ca_name value='$row[name]'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>类别介绍</td><td><input type=text name=description value='$row[description]'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan=2 align=center><input type=submit value=提交修改><input type=button value=放弃修改 onclick=history.go(-1)></td>";
				echo "</tr>";
				echo "</form>";
				echo "</table>";
			} 
			else 
			{
				$description = $_POST['description'];
				$sql = "update $my_type set description='$description' where id='$id'";
				$re = $my_conn->query($sql);
				if ($re)
				{
					echo "<meta http-equiv=refresh content=\"2; url=e_type.php\">";
					echo "成功更新了类别介绍信息: $id&nbsp;&nbsp;";
					echo "2秒后返回";
				} 
				else 
				{
					echo "<meta http-equiv=refresh content=\"2; url=e_type.php\">";
					echo "更新类别信息: $id失败&nbsp;&nbsp";
					echo "2秒后返回";
				}
			}
		}
	}
}
echo "</center>";
?>
