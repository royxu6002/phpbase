<center>
<!--项目的连贯性和一致性, 还是面向对象的思路需要提升? PHP执行的原理未理解~-->
<style>
tr, td{font-size=10pt;}
</style>
<?php
include "head.php";
if (!$_COOKIE['login']){ //判断用户是否登录
	echo "您还没有登录";
	echo "请以<a href=login.php>管理员</a>身份登录, 再执行该页面";
} else { //如果用户已经登录
	$name = $_COOKIE['login'];
	include "config.php";
	$sql = "select admin from $my_user where name='$name'"; //判断用户是否是管理员
	$result = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
	if (count($result) ==0){
		echo "您没有权限执行该画面";
		echo "请以<a href=login.php>管理员</a>身份登录, 再执行该页面";
	} else {  						//如果是管理员
		if (!$_GET['id']){ 			//如果没有提供未处理的订单id
			echo "管理所有未处理历史订单";
			include "config.php";
			$sql = "select * from $my_sales where sale_state='0'"; //查看所有状态未未处理的订单
			$result = $my_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			if (count($result) == 0){
				echo "您尚未有未处理的订单,点<a href=show.php>这里</a>返回首页";
			} else{
				echo "<table align=center border=1 cellspacing=0 cellpadding=1 bordercolordark=#ffffff bordercolorlight=0000FF width=80%>";
				echo "<tr bgcolor=#ccccff><td>编号</td><td>购买人</td><td>商品名称</td><td>购买数量</td><td>总金额</td><td>购买时间</td><td>需要处理</td></tr>";
				foreach($result as $key=>$row){ 		//遍历所有结果集
					echo "<tr>";
					echo "<td>$row[id]</td>";
					echo "<td>$row[sale_user_name]</td>";
					echo "<td>";
					$sql = "select name from $my_goods where id='$row[sale_goods_id]'";
					$temp = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
					echo "$temp[0]";
					echo "</td>";
					echo "<td>$row[sale_goods_num]</td>";
					echo "<td>$row[sale_cost]</td>";
					echo "<td>$row[sale_date]</td>";
					echo "<td><a href=e_sale.php?id=$row[id]>处理</a></td>";
				}
			}
		} else { 		//如果提供有待处理的订单id	
			$id = $_GET['id'];
			try {		//更新订单状态为1
				$sql = "update $my_sales set sale_state='1' where id='$id'";
				$re = $my_conn->query($sql);
			} catch(PDOException $e){
				echo $e->getMessage();
			}
			if ($re){	 //如果成功执行
				echo "<meta http-equiv=refresh content=\"2; url=e_sale.php\">";
				echo "成功处理订单:$id&nbsp;";
				echo "2秒后返回";
			} else{ 	//如果执行失败
				echo "<meta http-equiv=refresh content=\"2; url=e_sale.php\">";
				echo "处理订单:$id失败";
				echo "2秒后返回";
			}
		}
	}
}
?>
</table>
</center>