<?php
//显示模块分三个部分:1 首页显示模块 2 类别显示模块 3 商品显示模块
include "head.php";
?>

<table border="1" cellpadding="1" cellspacing="0" width="80%" align="center">
<?php
include "config.php";
$sql="select count(*) from $my_type";
//此处可以可用'./www/test/fetch_assoc.php'测试PDO::FETCH_ASSOC的结果集加深理解.
$re = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
$num = $re[0];
$column = 3;
if($num==0){    		
	echo "<tr><td bgcolor=\"#ccccff\" colspan=3><center>尚没有商品分类</center></td></tr>";
} else { //如果有记录则输出内容
	echo "<tr><td bgcolor=#ccccff colspan=3>共有".$num."种商品</td></tr>";
	$sql = "select * from $my_type";
	$obj = $my_conn->query($sql);
	for($i=0;$i<ceil($num/$column);$i++){
		echo "<tr>";
		for($j=0;$j<$column;$j++){
			echo "<td class=col-md-4 >";
			$row= $obj->fetch(PDO::FETCH_ASSOC);
			echo "<a href=show_type.php?id=$row[id]>$row[name]</a>$row[num]";
			echo "<br>";
			echo "$row[description]";
			echo "</td>";	
		}
		echo "</tr>";		
	}
}
echo "</table>";

?>
