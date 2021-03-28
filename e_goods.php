<?php
//产品海关编码信息, 图片信息, 供应商信息, 类别信息
include "head.php";
echo "<center>";
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
			echo "管理所有商品";
			include "config.php";
			$sql = "select * from $my_goods";
			$result = $my_conn->query($sql);
			$num = $result->rowCount();
			if ($num==0)
			{
				echo "尚没有任何商品点<a href=show.php>这里</a>返回首页";
			} else
			{
				echo "<table border=1 align=center cellspacing=0 cellpadding=1 bordercolordark=#ffffff bordercolorlight=#0000ff width=80%>";
				echo "<tr><td>编号</td><td>商品名称</td><td>所属类别</td><td>售价</td><td>商品介绍</td><td>存货量</td><td>修改</td></tr>";
				while ($row=$result->fetch(PDO::FETCH_ASSOC)){
					echo "<tr>";
					echo "<td>$row[id]</td>";
					echo "<td>$row[name]</td>";
					echo "<td>$row[type]</td>";
					echo "<td>$row[cost]</td>";
					echo "<td width=60%>$row[description]</td>";
					echo "<td>$row[num]</td>";
					echo "<td><a href=e_goods.php?id=$row[id]>修改</a></td>";
					echo "</tr>";
				}
				echo "</table>";		
			}	
		
		}  
		else 
		{
			$id = $_GET['id'];
			include "config.php";
			if(!$_POST['product'])
			{
				echo "<script language=javascript>
					function check(f){
						if(f.product.value==\"\"){
							alert(请输入产品名称);
							f.product.focus();
							return(false);
						}
						if(f.cost.value==\"\"){
							alert(请输入商品售价);
							f.cost.focus();
							return(false);
						}
						if(f.num.value==\"\"){
							alert(请输入商品存量);
							f.num.focus();
							return(false);
						}
						if(f.description.value==\"\"){
							alert(请输入产品名称);
							f.description.focus();
							return(false);
						}
					}</script>";
				$sql = "select * from $my_goods where id='$id'";
				$result = $my_conn->query($sql);
				$row = $result->fetch(PDO::FETCH_ASSOC);
				echo "<table border=1 align=center cellspacing=0 cellpadding=1 width=80%>";
				echo "<form method='post' action=e_goods.php?id=$row[id] onsubmit=\"return check(this)\">";
				echo "<tr><td colspan=2 align=center>商品:&nbsp;<font color=#ff0000>$row[name]</font></td></tr>";
				echo "<tr>";
				echo "<td >商品编号</td><td>$row[id]</td>";
				echo "</tr>";
				echo "<input type=hidden name=category value=$row[type]>";
				echo "<input type=hidden name=old_num value=$row[num]>";
				echo "<tr>";
				echo "<td>商品名称:</td><td><input type=text name=product value='$row[name]'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>商品售价:</td><td><input type=text name=cost value='$row[cost]'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>商品数量:</td><td><input type=text name=num value='$row[num]'></td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>商品介绍:</td><td><textarea name='description' wrap=soft>$row[description]</textarea></td>";
				
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan=2 align=center><input type=submit value=提交修改><input type=button name=num value=放弃修改 onclick=history.go(-1)></td>";
				echo "</tr>";
				echo "</form>";
				echo "</table>";
			} 
			else 
			{
				$name =$_POST['product'];
				$cost = $_POST['cost'];
				$num = $_POST['num'];
				$type = $_POST['category'];
				$old_num = $_POST['old_num'];
				$description = $_POST['description'];
				$a_num = ($num - $old_num);
				$sql = "update $my_goods set name='$name',cost='$cost',num='$num',description='$description' where id='$id'";
				$re = $my_conn->exec($sql);
				$sql2 = "update $my_type set num=num+'$a_num' where id='$id'";
				$re2 = $my_conn->exec($sql2);
				if ($re || $re2)
				{
					echo "<meta http-equiv=refresh content=\"2; url=e_goods.php\">";
					echo "成功更改商品信息:$id, 2秒后返回";
				} 
				else 
				{
					echo "未成功更新商品信息";
				}

			}
		}
	}
}
echo "</center>";
?>
 
	
		
