<?php

//PDO方式连接数据库
include_once('IConnectInfo.php');
class UniversalConnect implements IConnectInfo //继承数据库基础参数接口
{
	private static $dbms=IConnectInfo::DBMS;
	private static $server=IConnectInfo::HOST;
	private static $currentDB=IConnectInfo::DBNAME;
	private static $user=IConnectInfo::UNAME;
	private static $pass=IConnectInfo::PW;
	private static $dsn;
	private static $hookup;

	public function doConnect()
	{
		try{
			self::$dsn=self::$dbms.":host=".self::$server.";dbname=".self::$currentDB.";charset=utf8";//拼接数据库连接参数，并设置数据库编码方式utf8,防止中文乱码
			self::$hookup=new PDO(self::$dsn,self::$user,self::$pass,array(PDO::ATTR_PERSISTENT=>true));//通过PDO基类实例化建立数据库连接（长连接）
			self::$hookup->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//设置处理错误模式为 异常模式
		}
		catch(PDOException $e)
		{
			die("Error!:".$e->getMessage()."<br/>");
		}
		return self::$hookup;//返回pdo对象
	}
}
?>
