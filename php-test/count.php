<?php
include "../config.php";
$sql="select count(*) from $my_user where name='roy'";
$result = $my_conn->query($sql)->fetch(PDO::FETCH_NUM);
echo "<pre>";
var_dump($result[0]);
echo "</pre>";
?>