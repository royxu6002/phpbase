
<form name="form1" method="post" action="file.php">
	<input type="file" name="file" value="Please select a file">
	<input type="submit" name="submit" value="Upload File">

</form>


<?php
if(isset($_POST['file']) && $_POST['file'] !=null ){
	echo $_POST['file'];

}


?>