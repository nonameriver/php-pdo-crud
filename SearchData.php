<?php

//查找数据 算法的具体实现
class SearchData implements IStrategy
{
	public function algorithm(String $tableName,Array $fieldKeyArray,Array $conditionValueArray,String $condition)
	{
		
		$connObject=new UniversalConnect();//实例化连接类
		$hookup=$connObject->doConnect();//创建PDO连接

		$fieldString=implode(",",$fieldKeyArray);//字段数组转换成sql字符串

		if(empty($condition))//如果没有条件语句
		{
			$sql="select ".$fieldString." from ".$tableName;
		}
		else{//有条件语句

			$sql="select ".$fieldString." from ".$tableName." where ".$condition;
		}
		

		$stmt=$hookup->prepare($sql);

		if($stmt->execute($conditionValueArray))
		{

			$result=$stmt->fetchAll();
			echo json_encode($result,JSON_UNESCAPED_UNICODE);//返回json字符串
		}
		else
		{
			echo false;
		}
	}
}
?>
