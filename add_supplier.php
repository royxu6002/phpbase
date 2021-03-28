<style type="text/css">
tr,td {font-size: 10pt;}
</style>


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
		if(!$_POST['supplier_name']){
?>  
	<script language="javascript">
		function check(f){
			if(f.supplier_name.value==""){
				alert("请输入公司名称!");
				f.supplier_name.focus();
				return(false);
			}
			if(f.supplier_legal_person.value==""){
				alert("请输入公司法人!");
				f.supplier_legal_person.focus();
				return(false);
			}
			if(f.supplier_add.value==""){
				alert("请输入公司地址!");
				f.supplier_add.focus();
				return(false);
			}
			if(f.supplier_tel.value==""){
				alert("请输入电话!");
				f.supplier_tel.focus();
				return(false);
			}
			if(f.supplier_contact.value==""){
				alert("请输入类别名称!");
				f.supplier_contact.focus();
				return(false);
			}
			if(f.supplier_tax.value==""){
				alert("请输入开票需要增加的税点!");
				f.supplier_tax.focus();
				return(false);
			}
		}
	</script>

	<table border="1" cellspacing="0" cellpadding="1" width="80%">
		<form method="post" action="<?php $_SERVER['PHP_SELF']?>" onsubmit="return check(this)">
			<tr>
				<td colspan="2" bgcolor="#ccccff" align="center">添加供应商信息<br>Add Suppllier's Information</td>
			</tr>
			<tr>
				<td>公司名称Company Name</td>
				<td><input type="text" style="float:left; width:100%; " name="supplier_name"></td>
			</tr>
			<tr>
				<td>公司法人Legal Person</td>
				<td><input type="text" name="supplier_legal_person" style="float:left; width:100%; "></td>
			</tr>
			<tr>
				<td>公司地址Address</td>
				<td><input type="text" name="supplier_add" style="float:left; width:100%; "></td>
			</tr>
			<tr>
				<td>电话Telephone</td>
				<td><input type="text" name="supplier_tel" style="float:left; width:100%; "></td>
			</tr>
			<tr>
				<td>联系人Address</td>
				<td><input type="text" name="supplier_contact" style="float:left; width:100%; "></td>
			</tr>
			<tr>
				<td>税点Tax</td>
				<td><input type="text" name="supplier_tax" style="float:left; width:100%; "></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="添加到系统Add Into System"></td>
			</tr>
		</form>
	</table>
	<?php

		} else{
			$name = $_POST['supplier_name'];
			$legal = $_POST['supplier_legal_person'];
			$add = $_POST['supplier_add'];
			$tel = $_POST['supplier_tel'];
			$contact = $_POST['supplier_contact'];
			$tax = $_POST['supplier_tax'];
			$sql = "select count(*) from $my_suppliers where supplier_name='$name'";
			$re = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
			if ($re[0]>0){
				echo "已经存在该供应商信息,请勿重复输入~";
				echo "点<a href=add_supplier.php>这里</a>重新添加供应商信息";
			} else {
				$sql = "insert into $my_suppliers(supplier_name,supplier_legal_person,supplier_add,supplier_tel,supplier_contact,supplier_tax) values('$name','$legal','$add','$tel','$contact','$tax')";
				$re = $my_conn->query($sql);
				if ($re){
					echo "成功添加供应商信息: $name";
					echo "点<a href=e_supplier.php>这里</a>查看";
				}
			}

		}
	}
}

?>



