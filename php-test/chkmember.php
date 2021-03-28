<?php
require "member_class.php";
$member = new member_class;

$adopt = $member->chkpasw($username, $userpasw);

if($adopt==true){
	echo "你的用户名是:".$member->name;
	echo "你的密码是:".$member->password;
} else {
	echo "请重新登录!";
}




?>