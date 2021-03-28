
<style type=text/csss>
tr,td {font-size:10pt;}
</style>
<?php include "head.php";?>
<table align= "center" border="1" cellspacing="0" cellpadding="1" width="80%"" bordercolordark="#ffffff" bordercolorlight="#0000ff">
	

<?php

if(!$_COOKIE['login']){
?>
	<tr>
		<td align="center">尚未登录, 点<a href="login.php">这里</a>登录</td>
	</tr>

<?php 
} else{
	echo "<tr><td align=center colspan=2><a href=show.php>首页</a>&nbsp;<a href=e_pass.php>修改密码</a>&nbsp;<a href=show_sale.php>查看历史订单</a>&nbsp;<a href=show_cat.php>查看购物车</a>&nbsp;<a href=quit.php>退出登录</a></td></tr>";
	include "config.php";
	$sql="select * from $my_user where name='$_COOKIE[login]'";
	try {
		$row = $my_conn->query($sql)->fetch(PDO::FETCH_ASSOC);
		echo "<tr><td>用户姓名</td><td>$row[name]</td></tr>";
		echo "<tr><td>用户邮箱</td><td>$row[email]</td></tr>";
		echo "<tr><td>注册日期</td><td>$row[reg_date]</td></tr>";
		echo "<tr><td>是否为管理员?</td>";
		if($row[admin]==1){
			echo "<td>是管理员&nbsp;<a href=e_sale.php>处理订单</a>&nbsp;&nbsp;<a href=add_goods.php>添加产品</a>&nbsp;&nbsp;<a href=add_type.php>添加类别</a>&nbsp;&nbsp;<a href=add_supplier.php>添加供应商信息</a>&nbsp;&nbsp;</td></tr>";
			echo "<tr align=center><td colspan=2><a href=e_goods.php>管理产品信息</a>&nbsp;&nbsp;<a href=e_type.php>管理产品类别信息</a>&nbsp;&nbsp;<a href=e_supplier.php>管理供应商信息</a>&nbsp;&nbsp;</td></tr>";
		}else{
			echo "<td>非管理员</td></tr>";
		}

	} catch(PDOException $e){
		echo $e->getMessage();
	}

}


?>
</table>