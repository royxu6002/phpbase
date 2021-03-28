

<script type="text/javascript">
function check(f)
{
	if(f.name.value=="")
	{
		alert("请输入注册用户姓名!");
		f.name.focus();
		return(false);
    }
    if(f.pass.value=="")
    {
    	alert("请输入注册用户密码");
    	f.pass.focus();
    	return(false);
    }
   
    if(f.mail.value=="")
    {
    	alert("请输入注册邮箱~");
    	f.mail.focus();
    	return(false);
    }

}
</script>


<table border="1" cellspacing="0" cellpadding="1" bordercolordark="#ffffff" bordercolorlight="0000FF" width="300">
	<form method="post" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return check(this)">
		<tr>
			<td colspan="2" bgcolor="#ccccff" align="center">注册用户信息</td>
		</tr>
		<tr>
			<td>注册用户姓名</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>注册用户密码</td>
			<td><input type="password" name="pass" size="21"></td>
		</tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" value="注册"></td>
		</tr>
	</form>
</table>
