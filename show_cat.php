<?php include "head.php";?>
<style type=text/css>
tr,td {font-size:10pt;}
</style>


<?php 
//date_default_timezone_set('UTC+8');
date_default_timezone_set("Asia/Shanghai");
echo "<center>";
if(!$_POST['mycat']) //如果没有提交订单信息, 则显示订单信息
{ 
	include "config.php"; 
	echo "<table align=center border=1 cellspacing=0 cellpadding=1 width=80%>";
	echo "<form method=post action=$_SERVER[PHP_SELF]>";
	echo "<input type=hidden name=mycat value=post>";
	echo "<tr><td colspan=5><h4>您<input type=text name=buyer>的购物车信息</h4></td><tr>";
	echo "<tr><td>Selection</td><td></td><td>Name</td><td>Unit Price</td><td>Quantity</td></tr>";
	$temp = array_keys($_COOKIE);  //获取Cookie数组键名
	$j=0;
	for($i=0;$i<count($temp);$i++){ //遍历用键名构成的数组
		if(preg_match("/cat/","$temp[$i]")){  //如果键名包含cat(用于标记购物车)
			$catid=preg_replace("{cat}","",$temp["$i"]); //获取被提交的商品id
			$sql="select * from $my_goods where id='$catid'";
			$rows=$my_conn->query($sql)->fetch(PDO::FETCH_ASSOC);
			echo "<input type=hidden name=id[] value=$rows[id]>";
			echo "<input type=hidden name=ca[] value=$rows[type] >";
			echo "<tr><td><input type=checkbox name=c[$j] value=$rows[id]></td>";
			echo "<td width=100px><img src=$rows[img] height=100px></td>";
			echo "<td>$rows[name]<br>$rows[description]</td><td><input type=text value=$rows[cost] name=m[] size=5></td>";
			echo "<td><input type=text name=t[]></td>";
			echo "</tr>";
			$j++;	
		}
	} 

	echo "<tr><td colspan=5><center><input type=submit value=GenerateQuotation>&nbsp;&nbsp;</center></td></tr>";
	echo "</form>";
	echo "</table>";
}
else{
		$id=$_POST['id'];
		$m=$_POST['m'];
		$t=$_POST['t'];
		$c=$_POST['c'];
		$type=$_POST['ca'];
		$buyer=$_POST['buyer'];
		$quoter =$_COOKIE['login'];
		// $time=date("Y-m-d H:m:s");
		$time=date("Y-m-d H:m:s",time()); 
		$expiration = date("Y-m-d H:m:s", time()+3600*24*30);
		include "config.php";
		if(count($c)==0){
			echo "Please select items you want!";
			echo "<input type=button value=Re-select onclick=history.go(-1)>";
		} else{
				$sql="insert into $my_quotation(buyer,date,item,quantity,cost,quote_state,sale_user_name) values";
				echo "<table align= center border=1 cellspacing=0 cellpadding=10 width=80%>";
				echo "<tr><td align=left colspan=5>To: &nbsp;$buyer</td></tr>";
				echo "<tr><th></th><th>Name of Commodity and Specifications</th><th>Unit Price</th><th>Quantity</th><th>Sum</th></tr>";
				$i=0;
				foreach($c as $key=>$value){
					$temp=$id[$key];
					$temp2=$m[$key];
					$temp3=$t[$key];
					$temp4=$type[$key];
					$sql1="select name,img,description from $my_goods where id='$value'";
					$rows=$my_conn->query($sql1)->fetch(PDO::FETCH_ASSOC);
					echo "<tr>";
					echo "<td width=100px><img src=$rows[img] width=100px></td>";
					echo "<td>$rows[name]<br>$rows[description]</td>";
					echo "<td>US\$$temp2</td>";
					echo "<td>$temp3</td>";
					$z[$i]=($temp2*$temp3);
					$sql .="('$buyer','$time','$value','$temp3','$temp2','1','$quoter')";
					if ($i<count($c)-1){
						$sql=$sql.",";
					}
					echo "<td>US\$$z[$i]</td>";
					echo "</tr>";
					$i++;
				}
				$s = array_sum($z);
				echo "<tr><td align=center colspan=5>TOTAL AMOUNT:US\$$s</td></tr>";
				$re = $my_conn->exec($sql);
				if($re){
					echo "<tr><td colspan=5><center>Log the quotation sheet in system successfully on $time;<br> The Quotation shall be invalid after $expiration.<input type=button value=Return onclick=window.close()></center></td></tr>";
				} else{
					echo "<tr><td colspan=5><center>Log the quotation failed<input type=button value=Return onclick=window.close()></center></td></tr>";
				}
			
			echo "</table>";
		}
		echo "</center>";
	} 
?>