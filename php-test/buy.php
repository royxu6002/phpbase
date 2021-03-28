<?php
/* 将购物车的类引入,并声明一个购物车对象
 * 当窗体数据还没有被发送时, 购物车对象内并无任何商品; 在窗体数据被发送后, 再将商品数据加入购物车中.
 */

require "car.php";

$car = new Cart; //声明购物车对象

if (!empty($Submit)){ //当窗体信息被送出时
	for ($j=0;$j<count($goods);$j++){
		$car->add_item($goods[$j]);
	}
}

?>

<html>
<head>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
<title>无标题文件</title>
<body>
<table width="100%" border="1">
	<tr>
		<td width="25%" rowspan="2">
			<form name="form1" method="post" action ="buy.php">
			<p> <input name="goods[]" type="checkbox" id="goods" value="CPU">CPU</p>
			<p> <input name="goods[]" type="checkbox" id="goods" value="主板">主板</p>
			<p> <input name="goods[]" type="checkbox" id="goods" value="内存">内存</p>
			<p> <input name="goods[]" type="checkbox" id="goods" value="键盘">键盘</p>
			<p> <input name="goods[]" type="checkbox" id="goods" value="鼠标">鼠标</p>
			<p> <input type="submit" name="Submit" value="放入购物车"></p>
			</form>
		</td>
		<td width="75%"><div align="center">购物车内的商品</div>
		</td>
	</tr>
	<tr>
		<td>
			<?php
				if($car->sum==0){
					echo "购物车内尚无商品~";

				} else {
					$car->show_item(); //显示购物车中的信息
				}
			?>
		</td>
	</tr>
	
</table>

</body>

</html>

