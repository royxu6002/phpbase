//传值 将值赋给函数中的另一个变量, 
//传址 变量传址 需要在变量‘$’前面加上一个"&"符号

instanceof 用来检查对象是否属于类或继承类的子类, 或者是接口的实例
__autoload 函数, 用途是实例化一个尚未被定义的类时, 此函数会自动被调用

浏览网页时候, 地址栏“?”符号后, 紧接着就是网页所传送的变量和数据, 每对变量与数据之间用“&”隔开, 这一串数据使用“GET”方式来发送.

cookie session

构造函数: 就是当对象被创建时,第一次会自动执行的函数.(当类中的函数功能名称与类名称相同时,这个函数功能就可以被称为此类的构造函数)


//数据库的连接
//第一步, mysqli_connect();
$conn = mysqli_connect("localhost","root","123456");

//第二步,判断错误 mysqli_error();
if (!$conn){
	die('could not connect:'.mysqli_error)
}

//第三步, 选择数据库 mysqli_select_db();
mysqli_select_db($conn,'edu');

//第四步,设置字符集, mysqli_set_charset();
mysqli_set_charset("utf8");

//第五步, 准备SQL语句 $sql = "INSERT INTO TableName(username, age) VALUES('aily','32')";

//第六步, 发送SQL语句, mysqli_query();
$result = mysqli_query($conn, $sql);

//第七步, 判断是否执行正常或者遍历数据 mysqli_fetch_array(); 参数: 传入MySQLI_NUM返回索引数组, MYSQLI_ASSOC返回关联数组, MYSQLI_BOTH返回索引和关联




//第八步, 关闭数据库 mysqli_close($conn);


类的构造函数, 继承inheritane, 多态polymorphism

class class_name2 extends class_name {} 


MySQL, 是一种快速, 多线程multithread, 多用户且功能强大的 关系数据库管理系统, 可以与C++, VB, Java, Perl, PHP等程序语言连接, 也可以运行于多种平台上. 例如Windows, Linuxm FreeBDS, OS/2等等

查询数据 SELECT .. FROM table_name WHERE..
添加数据 INSERT INTO table_name(.,.) VALUES('','')
删除数据 DELETE FROM table_name WHERE..
更新数据 UPDATE table_name SET .='' WHERE..
替换数据 REPLACE INTO table() VALUES()

表单元素
输入域标记input
选择域标记select和option
文字域标记textarea

date("M-d-y",nmktime());


如果子类没自定义构造函数，则自动执行父类的构造函数，反之，则要显式调用parent::__construct();




