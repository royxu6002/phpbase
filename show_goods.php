<?php include 'head.php'; 
?>

<?php
if(!$_GET['id']){
	echo "<meta http-equiv=\"refresh\" content=\"2; url=show.php\">";
	echo "没有该商品id";
	echo "2秒后返回查看主页面";
}else{

?>
	
	<script language="javascript" src="mycat.js"> 
	</script>
	<table align= "center" border="1" cellspacing="0" cellpadding="1" width="80%">
<?php	
	include "config.php";
	$sql="select * from $my_goods where id='$_GET[id]'"; //此处是否需要修改SQL语句待定
	$row=$my_conn->query($sql)->fetch(PDO::FETCH_ASSOC);
	$sql="select id,name from $my_type where id='$row[type]'";
	$type_info=$my_conn->query($sql)->fetch(PDO::FETCH_BOTH);
	echo '<tr><td bgcolor=#ccccff colspan=2><a href=show.php>首页</a>&nbsp;>&nbsp;<a href=show_type.php?id='.$type_info['id'].'>'.$type_info['name'].'</a>&nbsp;'.'&nbsp;>&nbsp;查看'.$row['name'].'详细信息</td></tr>';
	echo '<tr><td width=20%>商品名称</td><td>'.$row['name'].'</td></tr>';
	echo '<tr><td>商品图片</td><td><img src='.$row['img'].' height=200px></td></tr>';
	echo '<tr><td>商品售价</td><td>US$'.$row['cost'].'</td></tr>';
	echo '<tr><td>商品存货</td><td>'.$row['num'].'</td></tr>';
	echo '<tr><td>商品介绍</td><td>'.$row['description'].'</td></tr>';
	if ($_COOKIE['login'])
	{
		echo "<tr>";
		echo "<td colspan=\"2\" align=\"center\"><input type=\"button\" value=\"把商品加入购物车\" onclick=SetCookie(\"cat".$row[id]."\",\"1\")>";
		$name = $_COOKIE['login'];
		$sql = "select admin from $my_user where name='$name'";
		$result = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
		echo "</td>\n";
		echo "</tr>";
	}
	echo '</table>';
}

?>