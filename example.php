<?php

include_once('DataAction.php');


/*假如有一张数据表citylist
表结构:
id int primary key auto_increment,
name varchar(20) not null,
country varchar(20) not null

*/


//插入数据
$arr1=array("name","country");//字段数组
$arr2=array(
	array('深圳','中国'),
	array('haikou','china')
);//字段数组对应的值，这里为了不在算法具体实现中判断数组维度，即使只有一条数据都写成二维数组，

$object1=new DataAction('insertdata');//实例化DataAction，动作参数为 insertdata #这里是不区分大小写的

$result=$object1->showResult("citylist",$arr1,$arr2,"");//参数顺序（参数类型的顺序是不能变的，算法接口IStrategy规定了参数类型和顺序），数组名（string），字段名数组（array），值数组（array）,条件语句（string）

echo $result;



//删除数据

$condition="id= ? and country= ?";//条件语句，使用pdo预处理语句的写法，使用“？” 占位

$valueArr=array(1,'china');//数组中的值必须对应条件语句的占位符

$object1=new DataAction('deletedata');//动作参数为deltedata

$result=$object1->showResult('citylist',array(),$valueArr(),$condition);//当参数为空时，可以为空数组或空字符串，但不能缺失，也不能为NULL;

echo $result;


//查询数据

$arr1=('name','country');//查询的字段数组
$condition="in (?,?)";//条件语句
$valueArr=array(1,2);//值数组对应条件语句中的占位符

$object1=new DataAction('searchdata');//动作参数searchdata
$result=$object1->showResult('citylist',$arr1,$valueArr,$condition);//再次强调，参数顺序由和类型不能变

echo $result;//返回的是json字符串

//更新数据

$arr1=('name','country');//更新数据的字段数组
$condition="in (?,?)";//条件语句

$valueArr=array("巴黎","法国",1,2);//预处理语句中的值使用占位符，所以值数组的长度必须和占位符的数量相等

$object1=new DataAction('updatedata');//动作参数updatedata
$result=$object1->showResult('citylist',$arr1,$valueArr,$condition);

echo $result;



?>
