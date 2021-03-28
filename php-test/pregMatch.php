<?php

// $zz = '/[^0-9A-Za-z_]/';

// $string = 'aaaaab311dd';

// $string1 = '$@!#%$###';

// if(preg_match($zz, $string1, $matches)){
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// }else{
//    echo '没有匹配到';
// }




// $zz = '/^猪哥好帅\w+/';

// $string1 = "猪哥好帅abccdaaaasds";
// //$string2没有以猪哥好帅开始
// $string2 = "帅abccdaaaasds";


// if (preg_match($zz, $string2, $matches)) {
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// } else {
//    echo '没有匹配到';
// }


// $zz = '/\d*努力$/';

// $string1 = "12321124333努力";

// $string2 = "努力力";
// $string3 = "努力";

// if (preg_match($zz, $string3, $matches)) {
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// } else {
//    echo '没有匹配到';
// }


// $zz = '/\w+\b/';

// $string1 = "this is a apple";
// $string2 = "thisis a apple";
// $string3 = "thisisaapple";

// if (preg_match($zz, $string3, $matches)) {
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// } else {
//    echo '没有匹配到';
// }


// $zz = '/\Bthis\b/';

// $string1 = "hellothis9";

// $string2 = "hellothis 9";
// $string3 = "/this 9中国万岁";

// if (preg_match($zz, $string3, $matches)) {
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// } else {
//    echo '没有匹配到';
// }


// $zz = '/喝\d{2,3}酒/';

// $string1 = "喝9933酒";

// $string2 = "喝988酒";

// if (preg_match($zz, $string1, $matches)) {
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// } else {
//    echo '没有匹配到';
// }




// $pattern = '/新的未来.+\d+/s';

// $string = '新的未来
// 987654321';

// if (preg_match($pattern, $string, $matches)) {
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// } else {
//    echo '没有匹配到';
// }


// $pattern = '/a b c /x';

// $string = '学英语要从abc开始';

// if (preg_match($pattern, $string, $matches)) {
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// } else {
//    echo '没有匹配到';
// }


// $pattern = '/a b c #我来写一个注释
// /x';

// $string = '学英语要从abc开始';

// if (preg_match($pattern, $string, $matches)) {
//    echo '匹配到了，结果为：';
//    var_dump($matches);
// } else {
//    echo '没有匹配到';
// }


// $string = "{April 15, 2003}";

// //'w'匹配字母，数字和下划线，'d'匹配0-99数字，'+'元字符规定其前导字符必须在目标对象中连续出现一次或多次
// $pattern = "/{(\w+\d+), (\d+)}/i";

// $replacement = "\$1";

// //字符串被替换为与第 n 个被捕获的括号内的子模式所匹配的文本
// echo preg_replace($pattern, $replacement, $string);



// $pattern = '/this/Am';

// $string = 'hello 
// this is a ';
// $string1 = 'this is a ';

// if (preg_match($pattern, $string1, $match)) {
//    echo '匹配到了，结果为：';
//    var_dump($match);
// } else {
//    echo '没有匹配到';
// }


$pattern = '/\w+this$/'; 
$pattern1 = '/\w+this$/D'; 
$string = "hellothis
"; 
if (preg_match($pattern, $string, $match)) {
echo '匹配到了，结果为：'; 
var_dump($match);
}else {
echo '没有匹配到'; 
} 


?>

