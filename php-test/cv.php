<?php
if(isset($_POST['submit']) && $_POST['submit']!=""){
	echo "Your name is ".$_POST['name'];
	echo "Your gender is ".$_POST['gender'];

	echo "Your password is ".$_POST['pwd'];

	echo "Your are graduated with a degree of".$_POST['select'];

	echo "You like ";
	//获取“爱好”复选框的值
	for($i=0;$i<count($_POST['fond']);$i++)
	echo $_POST['fond'][$i]."&nbsp";

	//实现文件上传功能, 将上传的文件存储在image文件夹中
	$path = './test/upload/'.$_FILES['photo']['name']; //指定上传的路径及文件名
	move_uploaded_file($_FILES['photo']['tem_name'],$path); //上传文件
	echo "Your photo:".$path;
	echo "Your motto is ".$_POST['introduction'];
}



?>