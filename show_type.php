<?php
include "head.php";
?>

<?php
if(!$_GET['id']){
	echo "<meta http-equiv=refresh content=\"2; url=show.php\">";
	echo "没有提供类别";
	echo "2秒后返回查看主页面";
} else{
?>	
	<table border="1" cellpadding="1" cellspacing="0" bordercolordark="" bordercolorlight="" width="80%" align="center">
	<?php
	include "config.php";
	$_id=$_GET['id'];
	$sql="select name from $my_type where id='$_id'";
	//此处可以可用'./www/test/fetch_assoc.php'测试PDO::FETCH_ASSOC的结果集加深理解.
	$result=$my_conn->query($sql)->fetch(PDO::FETCH_ASSOC);
	$num=count($result);
	if($num==0){    	
		echo "<tr><td bgcolor=\"#ccccff\" colspan=3><center>尚没有商品分类</center></td></tr>";
	} else {
		echo "<tr><td bgcolor=#ccccff colspan=3><a href=show.php>首页</a>&nbsp;浏览当前$result[name]记录&nbsp;";
		$sql="select * from $my_goods where type='$_id'";
		$result = $my_conn->query($sql)->fetchAll(PDO::FETCH_ASSOC); //遍历表中属于该类别的产品
		$num = count($result);
		$column = 3;
		if ($num==0) {
			echo "该类别中没有产品</tr></td>";
		} else{
			echo "共有".$num."种商品</td></tr>";
			for($i=0;$i<ceil($num/$column);$i++){
				echo '<tr>';
				for($j=0;$j<$column;$j++){
					echo '<td class=col-md-4 align=center>';
					if($j+$i*$column>$num-1){
						echo "";
					}else{
						echo "<a href=show_goods.php?id=".$result[$j+$i*$column]['id'].">".$result[$j+$i*$column]['name']."</a>"."&nbsp;(".$result[$j+$i*$column]['num'].")";
						echo "<br>";
						echo "<img src= ".$result[$j+$i*$column][img]." width=100px>";
					}
					
					echo '</td>';
				}
				echo '</tr>';	
			}
			
		}
	}	
}

echo "</table>";

?>