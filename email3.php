<?php

if(!$_POST)
{	
	$display_block = <<<END_OF_BLOCK
	<form method=post action="$_SERVER[PHP_SELF]">
	<p><label for="subject">Subject:</label><br/>
	<input type="text" id="subject" name="subject" size="40"></p>
	<p><label for="message">Mail Body</label><br/>
	<textarea id="message" name="message" cols="50" rows="10">test</textarea></p>
	<button type="submit" name="submit" value="submit">Submit</button>
	</form>
END_OF_BLOCK;

}
elseif ($_POST) 
{
	if ($_POST[subject]=='' || $_POST[message] =='')
	{
		header("location:email.php");
		exit;
	} 
	else 
	{
		include_once "config.php";
		$sql = "select email from email";
		$result = $my_conn->query($sql);
		$mailHeaders = "From: Your Mailing List<export@comlibra.com>";
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			set_time_limit(0);
			$email = $row[email];
			mail("$email",stripslashes($_POST[subject]),stripslashes($_POST[message]),$mailHeaders);
			$display_block .="Newletter sent to:".$email."<br/>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sending a newsletter</title>
	</head>
	<body>
		<h1>Send a newletter</h1>
		<?php echo $display_block;?>

	</body>

</html>