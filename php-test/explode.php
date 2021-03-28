<?php
// 参数										描述
// separator								必需。规定在哪里分割字符串。
// string									必需。要分割的字符串。
// limit	
// 可选。规定所返回的数组元素的数目。
// 可能的值：
// 										大于 0 - 返回包含最多 limit 个元素的数组
// 										小于 0 - 返回包含除了最后的 -limit 个元素以外的所有元素的数组
// 										0 - 返回包含一个元素的数组

$str = 'one,two,three,four';
echo "$str";
// 零 limit
echo "<br>";
print_r(explode(',',$str,4));
echo "<br>";
// 正的 limit
print_r(explode(',',$str,2));
echo "<br>";
// 负的 limit
print_r(explode(',',$str,-3));


// implode(separator,array)
// 参数										描述
// separator								可选。规定数组元素之间放置的内容。默认是 ""（空字符串）。
// array									必需。要组合为字符串的数组。



?>