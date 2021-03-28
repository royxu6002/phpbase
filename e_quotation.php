<?php include "head.php";?>
<style type=text/css>
tr,td {font-size:10pt;}
</style>


<?php 
echo "<center>";
if(!$_POST['mycat']){ //如果没有提交订单信息, 则显示订单信息
	
	include "config.php"; 
	echo "<table align=center border=1 cellspacing=0 cellpadding=1 width=80%>";
	echo "<form method=post action=$_SERVER[PHP_SELF]>";
	echo "<input type=hidden name=mycat value=post>";
	echo "<tr><td colspan=4><h2>您的购物车信息</h2></td><tr>";
	echo "<tr><td>选择</td><td>名称</td><td>单价</td><td>数量</td></tr>";
	$temp = array_keys($_COOKIE);  //获取Cookie数组键名
	$j=0;
	for($i=0;$i<count($temp);$i++){ //遍历用键名构成的数组
		if(preg_match("/cat/","$temp[$i]")){  //如果键名包含cat(用于标记购物车)
			$catid=preg_replace("{cat}","",$temp["$i"]); //获取被提交的商品id
			$sql="select * from $my_goods where id='$catid'";
			$rows=$my_conn->query($sql)->fetch(PDO::FETCH_ASSOC);
			echo "<input type=hidden name=id[] value=$rows[id]>";
			echo "<input type=hidden name=ca[] value=$rows[type] >";
			echo "<tr><td><input type=checkbox name=c[$j] value=$rows[name]></td><td>$rows[name]</td><td><input type=text value=$rows[cost] name=m[] readonly enable=false size=5></td>";
			echo "<td><select name=t[] size=1>";
			for ($cc=1;$cc<($rows['num']+1);$cc++){
				echo "<option value=$cc>$cc</option>";
			}
			echo "</select></td></tr>";
			$j++;	
		}
	} 
	echo "<tr><td colspan=4><center><input type=submit value=生成订单><input type=button value=继续购物 onclick=window.close()></center></td></tr>";
	echo "</form>";
	echo "</table>";
}
else{
	$id=$_POST['id'];
	$m=$_POST['m'];
	$t=$_POST['t'];
	$c=$_POST['c'];
	$type=$_POST['ca'];
	$time=date("Y年m月d日");
	if(count($c)==0){
		echo "你没有选择任何商品";
		echo "<input type=button value=重新选择 onclick=history.go(-1)>";
	} else{
		require "config.php";
		$sql="insert into $my_sales(sale_goods_id,sale_goods_num,sale_user_name,sale_cost,sale_date) values";
		echo "<table align= center border=1 cellspacing=0 cellpadding=1 width=80% bordercolordark=#ffffff bordercolorlight=#0000ff>";
		echo "<tr><td colspan=4><center>您选购了以下商品:</center></td></tr>";
		echo "<tr><td>名称</td><td>单价</td><td>数量</td><td>小计</td></tr>";
		$i=0;
		foreach($c as $key=>$value){
			$temp=$id[$key];
			$temp2=$m[$key];
			$temp3=$t[$key];
			$temp4=$type[$key];
			$update="update $my_goods,$my_type set $my_goods.num=$my_goods.num-$temp3,$my_type.num=$my_type.num-$temp3 where $my_goods.id=$temp and $my_type.id=$temp4";
			$my_conn->query($update);
			echo "<tr>";
			echo "<td>$value</td><td>$temp2</td><td>$temp3</td>";
			$z[$i]=($temp2*$temp3);
			$sql=$sql."('$temp', '$temp3', '$_COOKIE[login]', '$z[$i]', '$time' )";
			if ($i<count($c)-1){
				$sql=$sql.",";
			}
			echo "<td>$z[$i]</td>";
			echo "</tr>";
			$i++;
		}
		$s = array_sum($z);
		echo "<tr><td colspan=4><center>总计:$s</center></td></tr>";
		$re = $my_conn->query($sql);
		if($re){
			echo "<tr><td colspan=4><center>成功生成订单,<input type=button value=点这里结束操作 onclick=window.close()></center></td></tr>";
		} else{
			echo "<tr><td colspan=4><center>生成订单错误,<input type=button value=点这里结束操作 onclick=window.close()></center></td></tr>";
		}
		echo "</table>";
	}
	echo "</center>";
}
?>