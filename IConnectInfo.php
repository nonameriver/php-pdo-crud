<?php
//数据库基础参数
interface IConnectInfo
{
	const DBMS="mysql";//数据库类型
	const HOST="localhost";//主机名称
	const UNAME="shop";//数据库用户名
	const PW="noname";//用户登陆密码
	const DBNAME="db_shop";//数据库名

	function doConnect();//创建数据库连接的抽象方法
}

?>
