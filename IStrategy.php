<?php
//数据处理方式接口
interface IStrategy
{
	public function algorithm(String $tableName,Array $fieldKeyArray,Array $fieldValueArray,String $condition);//操作数据库算法的抽象方法，公共接口,规定参数类型
}
?>
