<?php    
// fetch_style

// 控制下一行如何返回给调用者。此值必须是 PDO::FETCH_* 系列常量中的一个，缺省为 PDO::ATTR_DEFAULT_FETCH_MODE 的值 （默认为 PDO::FETCH_BOTH ）。

// PDO::FETCH_ASSOC：返回一个索引为结果集列名的数组

// PDO::FETCH_BOTH（默认）：返回一个索引为结果集列名和以0开始的列号的数组

// PDO::FETCH_BOUND：返回 TRUE ，并分配结果集中的列值给PDOStatement::bindColumn() 方法绑定的 PHP 变量。

// PDO::FETCH_CLASS：返回一个请求类的新实例，映射结果集中的列名到类中对应的属性名。如果 fetch_style 包含 PDO::FETCH_CLASSTYPE（例如：PDO::FETCH_CLASS | PDO::FETCH_CLASSTYPE），则类名由第一列的值决定

// PDO::FETCH_INTO：更新一个被请求类已存在的实例，映射结果集中的列到类中命名的属性

// PDO::FETCH_LAZY：结合使用 PDO::FETCH_BOTH 和 PDO::FETCH_OBJ，创建供用来访问的对象变量名

// PDO::FETCH_NUM：返回一个索引为以0开始的结果集列号的数组

// PDO::FETCH_OBJ：返回一个属性名对应结果集列名的匿名对象

$dbAdapter = new PDO("mysql:host=localhost;dbname=test", "root", "1234");    
$dbAdapter->exec("SET NAMES 'utf8';");    
    
$data = $dbAdapter->query("   
   SELECT id, name, method FROM category   
")->fetchAll(PDO::FETCH_ASSOC);    
    
//var_dump($data);    
/*   
array(   
   array(   
       'id' => '1',   
       'name' => 'HBO',   
       'method' => 'service',   
   ),   
   array(   
       'id' => '2',   
       'name' => '本周新片',   
       'method' => 'movie',   
   ),   
   array(   
       'id' => '3',   
       'name' => '热映中',   
       'method' => 'movie',   
   ),   
)   
*/    
    
    
    
$data = $dbAdapter->query("   
   SELECT name, method FROM category   
")->fetchAll(PDO::FETCH_COLUMN);    
    
//var_dump($data);    
/*   
array(   
   'HBO',   
   '本周新片',   
   '热映中',   
)   
*/    
    
    
    
$data = $dbAdapter->query("   
   SELECT id, name, method FROM category   
")->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);    
    
//var_dump($data);    
/*   
array(   
   '1' => array(   
       'name' => 'HBO',   
       'method' => 'service',   
   ),   
   '2' => array(   
       'name' => '本周新片',   
       'method' => 'movie',   
   ),   
   '3' => array(   
       'name' => '热映中',   
       'method' => 'movie',   
   ),   
)   
*/    
    
    
    
$data = $dbAdapter->query("   
   SELECT method, id, name FROM category   
")->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_ASSOC);    
    
//var_dump($data);    
/*   
array(   
   'service' => array(   
       'id' => '1',   
       'name' => 'HBO',   
   ),   
   'movie' => array(   
       'id' => '3',   
       'name' => '热映中',   
   ),   
)   
*/    
    
    
    
$data = $dbAdapter->query("   
   SELECT id, name, method FROM category   
")->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_COLUMN);    
    
//var_dump($data);    
/*   
array(   
   '1' => 'HBO',   
   '2' => '本周新片',   
   '3' => '热映中',   
)   
*/    
    
    
    
$data = $dbAdapter->query("   
   SELECT method, name, id FROM category   
")->fetchAll(PDO::FETCH_UNIQUE | PDO::FETCH_COLUMN);    
    
//var_dump($data);    
/*   
array(   
   'service' => 'HBO',   
   'movie' => '热映中',   
)   
*/    
    
    
    
    
$data = $dbAdapter->query("   
   SELECT method, id, name FROM category   
")->fetchAll( PDO::FETCH_ASSOC | PDO::FETCH_GROUP);    
    
//var_dump($data);    
/*   
array(   
   'service' => array(   
       array(   
           'id' => '1'   
           'name' => 'HBO'   
       ),   
   )   
   'movie' => array(   
       array(   
         'id' => '2'   
         'name' => '本周新片'   
       ),   
       array(   
         'id' => '3'   
         'name' => '热映中'   
       ),   
   )   
)   
*/    
    
    
    
    
$data = $dbAdapter->query("   
   SELECT method, name, id FROM category   
")->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_COLUMN);    
    
//var_dump($data);    
/*   
array(   
   'service' => array(   
       'HBO'   
   ),   
   'movie' => array(   
       '本周新片'   
       '热映中'   
   ),   
)   
*/    
    
    
    
    
    
$data = $dbAdapter->query("   
   SELECT id, name, method FROM category   
")->fetchAll(PDO::FETCH_OBJ);    
    
//var_dump($data);    
/*   
array(   
   stdClass{   
       public $id = '1';   
       public $name = 'HBO';   
       public $method = 'service';   
   },   
   stdClass{   
       public $id = '2';   
       public $name = '本周新片';   
       public $method = 'movie';   
   },   
   stdClass{   
       public $id = '3';   
       public $name = '热映中';   
       public $method = 'movie';   
   },   
)   
*/    
    
    
    
    
    
    
    
class Category_1 {}    
    
$data = $dbAdapter->query("   
   SELECT id, name, method FROM category   
")->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Category_1");    
    
//var_dump($data);    
/*   
array(   
   Category_1{   
       public $id = '1';   
       public $name = 'HBO';   
       public $method = 'service';   
   },   
   Category_1{   
       public $id = '2';   
       public $name = '本周新片';   
       public $method = 'movie';   
   },   
   Category_1{   
       public $id = '3';   
       public $name = '热映中';   
       public $method = 'movie';   
   },   
),   
*/    
    
    
    
    
    
class Category_2 {    
   public $name;    
   public $method;    
    
   public function __construct() {}    
   public function __set($name, $value ){}    
}    
    
$data = $dbAdapter->query("   
   SELECT id, name, method FROM category   
")->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Category_2");    
    
//var_dump($data);    
/*   
array(   
   Category_2{   
       public $name = 'HBO';   
       public $method = 'service';   
   },   
   Category_2{   
       public $name = '本周新片';   
       public $method = 'movie';   
   },   
   Category_2{   
       public $name = '热映中';   
       public $method = 'movie';   
   },   
)   
*/   