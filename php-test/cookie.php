<?php
array_keys($_COOKIE);
SetCookie(cat.id, 1)

/*
购物车实现的原理: 
0) 产品加入购物车按钮, input带按钮属性, 引入JS->SetCookie功能,
1) SetCookie, 设置cart标识符带产品ID为键名, 
2) $temp = array_keys($_COOKIE), 整理保存在Cookie中的key信息, 
3) for($i=0; $i<count($temp); $i++)遍历$temp数组,
3.1) preg_match判断Cookie中含有cart标识符数组$temp[$i], 
3.2) preg_replace获取产品ID


COOKIE();
banners10, 1
posters11, 1

$temp = array_keys(); //array_keys(array,value,strict)
0=>banners10
1=>posters11

preg_replace();

*/



?>