<?php
include "head.php";
echo "<center>";
if (!$_COOKIE['login']){

	echo "尚未登录,点<a href=login.php>这里,请以管理员身份登录</a>再执行该画面";

} else{
	$name = $_COOKIE['login'];
	include "config.php";
	$sql = "select admin from $my_user where id='$name'";
	$result = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
	if (count($result)==0){
		echo "您没有权限执行该画面,&nbsp;";
		echo "请以<a href=login.php>管理员</a>身份登录, 再执行该画面";
	} else{
		if(!$_POST['product'])
		{
?>  
		<script language="javascript">
			function check(f){
				if(f.product.value==""){
					alert("请输入商品名称");
					f.product.focus();
					return(false);
				}
				if(f.cost.value==""){
					alert("请输入产品价格");
					f.cost.focus();
					return(false);
				}
				if(f.num.value==""){
					alert("请输入商品数量");
					f.num.value();
					return(false);
				}
				if(f.hs_code.value==""){
					alert("请输入产品海关编码");
					f.hs_code.value();
					return(false);
				}
			}
		</script>
		<table border="1" cellspacing="0" cellpadding="1" width="80%">
			<form method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" onsubmit="return check(this)">
				<tr>
					<td colspan="2" bgcolor="#ccccff" align="center">添加商品信息</td>
				</tr>
				<tr>
					<td>添加商品名称</td>
					<td><input type="text" name="product"></td>
				</tr>
				<tr>
					<td>添加商品描叙</td>
					<td><textarea wrap="soft" name="description"></textarea></td>
				</tr>
				<tr>
					<td>添加商品海关编码</td>
					<td><input name="hs_code"></td>
				</tr>
				<tr>
					<td>添加商品售价</td>
					<td><input type="text" name="cost"></td>
				</tr>
				<tr>
					<td>添加商品图片</td>
					<td>
						<input type="file" name="img">
					</td>
				</tr>
				<tr>
					<td>产品所属类别</td>
					<td>
						<select name="category" size="1">
					<?php
						include "config.php";
						$sql = "select id,name from $my_type";
						$result = $my_conn->query($sql);
						while($row = $result->fetch(PDO::FETCH_ASSOC)){
							echo "<option value=$row[id]>";
							echo "$row[name]";
							echo "</option>";
						}
					?>
						</select>
					</td>
				</tr>
				<tr>
					<td>产品供应商</td>
					<td>
						<select name="supplier" size="1">
					<?php
						include "config.php";
						$sql = "select id,supplier_name from $my_suppliers";
						$result = $my_conn->query($sql);
						while($row = $result->fetch(PDO::FETCH_ASSOC)){
							echo "<option value=$row[id]>";
							echo "$row[supplier_name]";
							echo "</option>";
						}
					?>
						</select>
					</td>
				</tr>		
				<tr>
					<td>添加商品数量</td>
					<td><input type="text" name="num"></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="添加"></td>
				</tr>
			</form>
		</table>
		<?php 
		} 
		else
		{
			$name =$_POST['product'];
			$type = $_POST['category'];
			$supplier = $_POST['supplier'];
			$cost = $_POST['cost'];
			$hs =$_POST['hs_code'];
			$num = $_POST['num'];
			if ($_POST['description']!=="")
			{
				$description = $_POST['description'];
			} 
			else
			{
				$description = "暂无介绍";
			}	
			$sql = "update $my_type set num=num+'$num' where id='$type'";
			try 
			{
				$my_conn->query($sql);
			} 
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			if(!empty($_FILES['img']))
			{	
				$sort=array("image/jpeg","image/jpg","image/gif","image/png");
				if((in_array($_FILES['img']['type'],$sort)) && ($_FILES['img']['size'] < 5*1024*1024))
				{	
					$path = './upload/';
					if (!file_exists($path))
					{
						mkdir('$path');
					} 
					else
					{	
						$time=date('YmdHis',time());
						$file_name = explode('.',$_FILES['img']['name']);
	 					$file_name[0] = $time;
	 					$file_new_name = implode('.',$file_name);
						$imgname = $path.$file_new_name;
						move_uploaded_file($_FILES['img']['tmp_name'],$imgname);		
					}
				} 
				else
				{
					echo "图片类型不符合或大小超过5Mb,未上传成功<br>";
				}
			} 
			else
			{
				$imgname='';
			}	
			$sql ="insert into $my_goods(name,img,hs_code,type,supplier,cost,description,num) values('$name','$imgname','$hs','$type','$supplier','$cost','$description','$num')";
			$re = $my_conn->query($sql);
			if($re)
			{
				echo "成功添加商品:$name";
				echo "点<a href=add_goods.php>这里</a>继续添加";
			}	
		}
	}
}
echo "</center>";

?>
	


		
