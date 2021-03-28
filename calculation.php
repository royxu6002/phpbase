<?php
if($_POST[price]==""){

	echo "
	<script language="javascipt">
		function check(f){
			if(f.price.value==""){
				alert(价格不能为空);
				f.price.focus();
				return(false);
			}


		}
	</script>";
echo "<table border=1 cellspacing=0 cellpadding=10 align=center >";
?>
	<form method="post" action="c.php" onsubmit="return check(this)">
		<tr>
			<td>不含税成本价:<input typ="text" name="price"></td>
			<td>开票增加点:<input typ="text" name="tax"></td>
		</tr>
		<tr>
			<td>增值税点:<input type="text" name="taxed_rate"></td>
			<td>退税点<input type="text" name="refunded_rate"></td>
		</tr>

		<tr>
			<td>开票价:<input type="text" name="taxed_price"></td>
		</tr>
		<tr>
			<td>FOB内陆操作费用:<input type="text" name="FOB"></td>
		</tr>
	</form>
</table>
}
