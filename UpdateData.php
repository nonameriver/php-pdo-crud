<?php
//更新数据  算法具体实现
class UpdateData implements IStrategy
{
	public function algorithm(String $tableName,Array $fieldKeyArray,Array $fieldValueArray,String $condition)
	{
		$connObject=new UniversalConnect();//实例化连接类
		$hookup=$connObject->doConnect();//创建连接
		
		
		$fieldString=implode("=?,",$fieldKeyArray);//需要更新的字段数组 转换成预处理语句字符串
		$fieldString.="=?";


		$sql="update ".$tableName." set ".$fieldString." where ".$condition;

		$stmt=$hookup->prepare($sql);

		if($stmt->execute($fieldValueArray))
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
