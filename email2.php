<?php
$subject = "Test a email only!";
$mail = <<<emailContent
	<!DOCTYPE html>
	<head></head>
	<body>
	<p align="center" style="font-size: 20px;">COMLIBRA ELECTRONIC CO., LTD.</p>
<p align="center"><i>ROOM 2112, BAOLONG SQUARE, XIAOSHAN, HANGZHOU, ZHEJIANG</i></p>
<table border="1" cellspacing="0" cellpadding="1" bordercolordarker="#ffffff" bordercolorlight="$0000ff" width="80%" align="center">

<center><tr><td align="right">Welcome&nbsp;<a href=userinfo.php>royxu</a>&nbsp;&nbsp;<a href=quit.php>Quit the system</a></td></tr></center></table>
<br>

<style type=text/css>
tr,td {font-size:10pt;}
</style>


<center><table align= center border=1 cellspacing=0 cellpadding=1 width=80% bordercolordark=#ffffff bordercolorlight=#0000ff><tr><td colspan=4><center>您选购了以下商品:</center></td></tr><tr><td>名称</td><td>单价</td><td>数量</td><td>小计</td></tr><tr><td>kitchen</td><td>2</td><td>40</td><td>80</td></tr><tr><td colspan=4><center>总计:80</center></td></tr><tr><td colspan=4><center>成功生成订单,<input type=button value=点这里结束操作 onclick=window.close()></center></td></tr></table></center>
</body>
</html>
emailContent;


include_once "config.php";
$sql = "select email from email";
$result = $my_conn->query($sql);
$mailHeaders = "From: Your Mailing List<export@comlibra.com>";
$mailHeaders .="CC: simplicity.aily@live.com";
$mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\n";
while ($row = $result->fetch(PDO::FETCH_ASSOC))
{
	set_time_limit(0);
	$receipt = $row[email];
	mail("$receipt",$subject,$mail,$mailHeaders);
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sending a newsletter</title>
	</head>
	<body>
		<h1>Send a newletter</h1>
		<?php echo 'Newletter sent to:'.$receipt.'<br/>';?>

	</body>

</html>
