
<style type="text/css">
tr,td {font-size: 10pt;}
</style>


<?php
include "head.php";
echo "<center>";
if (!$_COOKIE['login']){
	echo "尚未登录,点<a href=login.php>这里,请以管理员身份登录</a>再执行该画面";
} else{
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
		if(!$_GET['id'])
		{
			echo "<h4>管理供应商信息<h4>";
			include "config.php";
			$sql = "select * from $my_suppliers";
			$result = $my_conn->query($sql);
			$num = $result->rowCount();
			if ($num==0)
			{
				echo "尚没有任何供应商信息, 请点<a href=add_supplier.php>这里添加供应商信息</a>";
			} 
			else 
			{
				echo "<table border=1 cellspacing=0 cellpadding=1 width=80%>";
				echo "<tr bgcolor=#ccccff><td>编号</td><td>供应商</td><td>法人代表</td><td>地址</td><td>电话</td><td>联系人</td><td>公司开票税点</td><td>信息修改</td></tr>";
				while($row = $result->fetch(PDO::FETCH_ASSOC))
				{
					echo "<tr>";
					echo "<td>$row[id]</td>";
					echo "<td>$row[supplier_name]</td>";
					echo "<td>$row[supplier_legal_person]</td>";
					echo "<td>$row[supplier_add]</td>";
					echo "<td>$row[supplier_tel]</td>";
					echo "<td>$row[supplier_contact]</td>";
					echo "<td>$row[supplier_tax]</td>";
					echo "<td><a href=e_supplier.php?id=$row[id]>修改信息</a></td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		} 
		else
		{
			$id = $_GET['id'];
			include "config.php";
			if (!$_POST['supplier'])
			{
				echo "<script language=javascript>
				function check(f){
					if(f.supplier.value==\"\"){
						alert(请输入名称);
						f.supplier.focus();
						return(false);
					}
				}
				</script>";
				$sql = "select * from $my_suppliers where id='$id'";
				$result = $my_conn->query($sql);
				$row = $result->fetch(PDO::FETCH_ASSOC);
				echo "<table border=1 cellsapcing=0 cellpadding=1 width=80%>";
				echo "<form method=post action=e_supplier.php?id=$id onsubmit=\"return check(this)\">";
				echo "<tr><td colspan=2 align=center>供应商:<font color=#ff0000> $row[supplier_name]</font>的内容</td></tr>";
				echo "<tr>";
				echo "<td colspan=1>编号:</td><td>$row[id]</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>公司名称</td><td><input type=text name=supplier value=\"$row[supplier_name]\" style=\"float:left; width:100%;\"></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>公司法人</td><td><input type=text name=legal value=\"$row[supplier_legal_person]\" style=\"float:left; width:100%;\"></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>供应商地址</td><td><input type=text name=address value=\"$row[supplier_add]\" style=\"float:left; width:100%;\"></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>联系人</td><td><input type=text name=\"contact\" value=\"$row[supplier_contact]\" style=\"float:left; width:100%;\"></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>电话</td><td><input type=text name=tel value=\"$row[supplier_tel]\" style=\"float:left; width:100%;\"></td>";
				echo "</tr>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>税点</td><td><input type=text name=tax value=\"$row[supplier_tax]\" style=\"float:left; width:100%;\"></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan=2 align=center><input type=submit value=提交修改>&nbsp;&nbsp;<input type=button value=放弃修改 onclick=history.go(-1)></td>";
				echo "</tr>";
				echo "</form>";
				echo "</table>";
			} 
			else 
			{	
				$supplier = $_POST["supplier"];
				$legal = $_POST["legal"];
				$add = $_POST["address"];
				$contact = $_POST["contact"];
				$tel = $_POST["tel"];
				$tax = $_POST["tax"];
				echo $row[supplier_tel];
				include "config.php";
				$sql = "update $my_suppliers set supplier_name='$supplier',supplier_legal_person='$legal',supplier_add='$add',supplier_contact='$contact',supplier_tel='$tel',supplier_tax='$tax' where id='$id'";
				$re = $my_conn->query($sql);
				if ($re)
				{
					echo "<meta http-equiv=refresh content=\"2; url=e_supplier.php\">";
					echo "成功更新供应商信息: $id&nbsp;&nbsp;";
					echo "2秒后返回";
				} 
				else 
				{
					echo "<meta http-equiv=refresh content=\"2; url=e_supplier.php\">";
					echo "更新供应商信息失败: $id&nbsp;&nbsp";
					echo "2秒后返回";
				}
			}
		}
	}
}
echo "</center>";
?>
