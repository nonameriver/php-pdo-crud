<?php
//删除数据 算法的具体实现
class DeleteData implements IStrategy
{
	public function algorithm(String $tableName,Array $emptyArray,Array $conditionValueArray,String $condition)
	{
		$connObject=new UniversalConnect();//实例化连接类
		$hookup=$connObject->doConnect();//创建PDO连接


		$sql="delete from ".$tableName." where ".$condition;

		$stmt=$hookup->prepare($sql);
		if($stmt->execute($conditionValueArray))
		{
			echo true;
		}
		else
		{
			echo false;
		}
	}
}
?>
