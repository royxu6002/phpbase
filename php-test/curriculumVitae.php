<html>
<head>

</head>
<body>

<form method="post" action="cv.php" enctype="multipart/form-data">	
	姓名<input type="text" name="name"> <br>
	性别<input type="radio" name="gender" value="male" checked> 男 
	<input type="radio" name="gender" value="female">女
	<br>
	密码<input type="password" name="pwd">
	<br>

	学历
	<select name="select" size="1">
		<option value="Bachelor" selected>本科</option> <!--value值可以传输到服务器-->
		<option value="Master">硕士</option>
		<option value="Docter">博士</option>
	</select>
	<br>

	爱好
	<input type="checkbox" name="fond[]" value="音乐">音乐
	<input type="checkbox" name="fond[]" value="舞蹈">舞蹈
	<input type="checkbox" name="fond[]" value="绘画">绘画
	<br>

	<!-- 实现的是获取上传文件的名称, 并没有实现图片的上传, 因此不需要在form表单设置enctype="multipart/form-data"-->

	个人写真<input type="file" name="photo" maxlength="1000">
	<br>

	个人简介<textarea name="introduction" cols="28" rows="24"></textarea>
	<br>

	<input type="submit" name="submit" value="提交">
	<input type="reset" name="submit2" value="重置">
</form>
</body>
</html>