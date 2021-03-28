<?php
$string = "This is a test";

//hp 升级到 5.3+ 后出现的一些错误，如 ereg(); ereg_replace(); 函数报错
//echo preg_match("/( )is/", $string);
echo preg_replace("{( )is}", " was", $string);
?>