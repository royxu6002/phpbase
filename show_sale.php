
<style type=text/csss>
tr,td {font-size:10pt;}
</style>

<?php include "head.php";?>
<center><h4>订单信息</h4></center>
<table align= "center" border="1" cellspacing="0" cellpadding="1" width="80%">
	
<?php

if(!$_COOKIE['login']){
?>
	<tr>
		<td align="center">尚未登录, 点<a href="login.php">这里</a>登录</td>
	</tr>

<?php 
} else{
	include "config.php";
	$sql = "select admin from $my_user where name='$_COOKIE[login]'";
	$res = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
	if ($res[0]==0)
	{ 		//如果是普通用户
		$sql="select * from $my_sales where sale_user_name='$_COOKIE[login]'";
		$result = $my_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		if(count($result)==0)
		{
			echo "<tr><td>尚没有用户$_COOKIE[login]的给客户的报价信息</td></tr>";
		} 
		else
		{
			echo "<tr bgcolor=#ccccff><td>商品名称</td><td>购买数量</td><td>总价格</td><td>报价状态</td><td>报价时间</td><td>客户名称</td></tr>";
			foreach($result as $key=>$row)
			{
				echo "<tr>";
				$sql = "select name from $my_goods where id='$row[sale_goods_id]'";
				$temp = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
				echo "<td><a href=show_goods.php?id=$row[sale_goods_id]>$temp[0]<a></td>";
				echo "<td>$row[sale_goods_num]</td>";
				echo "<td>$row[sale_cost]</td>";
				echo "<td>";
				if($row[sale_state]==0)
				{
					echo "未处理";
				} 
				else
				{
					echo "已处理";
				}
				echo "</td>";
				echo "<td>$row[sale_date]</td>";
				echo "</tr>";
			}
		}
	} 
	else
	{		//如果是管理员
		$sql="select * from $my_sales";
		$result = $my_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		if(count($result)==0)
		{
			echo "<tr><td>尚没有订单信息</td></tr>";
		} 
		else
		{
			echo "<tr bgcolor=#ccccff><td>商品名称</td><td>购买数量</td><td>总价格</td><td>订单状态</td><td>购买时间</td><td>购买者</td></tr>";
			foreach($result as $key=>$row)
			{
				echo "<tr>";
				$sql = "select name from $my_goods where id='$row[sale_goods_id]'";
				$temp = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
				echo "<td><a href=show_goods.php?id=$row[sale_goods_id]>$temp[0]<a></td>";
				echo "<td>$row[sale_goods_num]</td>";
				echo "<td>$row[sale_cost]</td>";
				echo "<td>";
				if ($row[sale_state]==0)
				{
					echo "未处理";
				} 
				else
				{
					echo "已处理";
				}
				echo "</td>";
				echo "<td>$row[sale_date]</td>";
				if ($row[sale_user_name]!="admin")
				{
					echo "<td bgcolor=#ccccff>$row[sale_user_name]</td>";
				} 
				else 
				{
					echo "<td>$row[sale_user_name]</td>";
				}
				echo "</tr>";
			}
		}

	}
	
}
?>
</table>