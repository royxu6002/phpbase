<?php

$txt = "First line of text\nSecond line of text";

// 如果一行大于 70 个字符，请使用 wordwrap()。
$txt = wordwrap($txt,70);

// 发送邮件
mail("543439279@qq.com","My subject",$txt);
?>