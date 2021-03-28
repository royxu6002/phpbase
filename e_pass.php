<style type="text/css">
tr,td {font-size: 10pt;}
</style>
<?php include "head.php";?>
<center>修改用户密码页面</center>
<table align="center" border="1" cellspacing="0" cellpadding="1" bordercolordark="#ffffff" bordercolorlight="0000FF" width="80%">
<?php
if (!$_COOKIE['login']){
?>	
	<tr><td>尚未登录,点<a href="login.php">这里</a>登录</td></tr>
<?php
} else{
	if (!$_POST['pass']){
		?>
		<script language="javascript" type="text/javascript">
			function check(f){
			    if(f.pass.value == ""){
			    	alert("请输入用户密码");
			    	f.pass.focus();
			    	return(false);
			    }
			    if(f.new_pass.value == ""){
			    	alert("请输入新密码");
			    	f.new_pass.focus();
			    	return(false);
			    }
			    if(f.new_pass.value == f.pass.value){
			    	alert("新密码与原来密码一致!");
			    	f.new_pass.focus();
			    	return(false);	
			    }
			    if(f.new_pass.value != f.re_new_pass.value){
			    	alert("重复密码与新密码不一致!");
			    	f.re_new_pass.focus();
			    	return(false);
			    }
			}
		</script>
		
		<form method="post" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return check(this)">
		<?php	
		echo "<tr><td>原始密码:</td><td><input type=pass name=pass ></td></tr>";
		echo "<tr><td>新的密码:</td><td><input type=pass name=new_pass></td></tr>";
		echo "<tr><td>重复新的密码</td><td><input type=pass name=re_new_pass></td></tr>";
		echo "<tr><td colspan=2 align=center><input type=\"submit\" name=Submit value=确认修改></td></tr>";
		echo "</form>";

	} else{
		include "config.php";
		$new_pass=md5($POST['new_pass']);
		$pass = md5($_POST['pass']);
		try {
			$sql = "select count(*) from $my_user where name='$_COOKIE[login]' && password='$pass'";
			$row = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
		} catch(PDOException $e){
			echo $e->getMessage();
		}
		if ($row[0] == 0){
			echo "<meta http-equiv=refresh content=\"2, url=e_pass.php\">";
			echo "<tr><td>输入原始密码错误,两秒后返回重新输入</td></tr>";
		} else{
			try {
				$sql = "update $my_user set password='$new_pass' where name='$_COOKIE[login]' && password='$pass'";
				$re = $my_conn->query($sql);
			} catch(PDOException $e){
				echo $e->getMessage();
			}
			if($re){
				echo "<meta http-equiv=refresh content=\"2, url=userinfo.php\">";
				echo "<tr><td>成功修改用户密码, 2秒后转到信息查看页面</td></tr>";
			} else{
				echo "<meta http-equiv=refresh content=2, url=e_pass.php>";
				echo "<tr><td>修改用户密码错误, 2秒后返回重新输入</td></tr>";
			}
		} 
		
	}
}
?>
</table>