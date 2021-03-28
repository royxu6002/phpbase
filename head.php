<style type="text/css">
tr, td{font-size:10pt;}

</style>
<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.css" rel="stylesheet">

<p align="center" style="font-size: 20px;">COMLIBRA ELECTRONIC CO., LTD.</p>
<p align="center"><i>ROOM 2112, BAOLONG SQUARE, XIAOSHAN, HANGZHOU, ZHEJIANG</i></p>
<table border="1" cellspacing="0" cellpadding="1" bordercolordarker="#ffffff" bordercolorlight="$0000ff" width="80%" align="center">

<?php
echo "<center>";
if(!$_COOKIE['login']){
?>
	<script language="javascript" type="text/javascript">
		function check(f){
			if(f.user.value==""){
				alert("请输入用户名");
				f.user.focus();
				return(false);
			}
			if(f.pass.value==""){
				alert("请输入密码");
				f.pass.focus();
				return(false);
			}
		}
	</script>
	<form method="post" action="login.php">
		<tr> 
			<td align="right">尚未登录, 用户名<input type="text" name="user" >密码<input type="password" name="pass" size="6">
			<select name="c_1" size="1">
				<option value="0">不保存</option>
				<option value="<?php echo 3600*24 ?>" selected = "selected">一天</option>
				<option value="<?php echo 3600*24*7 ?>">一周</option>
				<option value="<?php echo 3600*24*30 ?>">一月</option>
			</select>
			<input value="登录" type="submit">
			</td>
		</tr>
	</form>
	<?php
}
else{ 
	echo "<tr><td align=\"right\">";
	echo "Welcome&nbsp;";
	echo "<a href=userinfo.php>".$_COOKIE['login']."</a>&nbsp;&nbsp;"; //显示用户信息链接
	echo "<a href=quit.php>Quit the system</a>";
	echo "</td></tr>";
}
echo "</center>";
?>
</table>
<br>

