<?php

//插入数据 的算法具体实现
class InsertData implements IStrategy//继承算法公共接口
{
	public function algorithm(String $tableName,Array $fieldKeyArray,Array $fieldValueArray,String $condition)
	{
		$connObject=new UniversalConnect();//实例化连接类
		$hookup=$connObject->doConnect();//创建数据库连接


		$fieldKeyString=implode(",",$fieldKeyArray);//将插入的字段数组转换成sql语句字符串

		$keyArray=array();
		foreach($fieldKeyArray as $f)
		{
			$keyArray[]="?";
		}
		$fieldValueString=implode(",",$keyArray);//将插入的字段值转换成预处理sql语句字符串

		$sql="insert into ".$tableName." (".$fieldKeyString.") values (".$fieldValueString.")";

		$stmt=$hookup->prepare($sql);

		foreach($fieldValueArray as $v)
		{
			$result=$stmt->execute($v);
			if(!$result)
			{
				echo false;
				break;
			}
		}
		echo true;

	}
}
?>
