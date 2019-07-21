<?php
//上下文组合类
class Context
{
	private $strategy;
	private $tableName;
	private $fieldKeyArray;
	private $fieldValueArray;
	private $condition;


	public function __construct(IStrategy $strategy)//将 算法具体实现类 作为参数
	{
		$this->strategy=$strategy;
	}

	public function algorithm(String $tableName,Array $fieldKeyArray,Array $fieldValueArray,String $condition)
	{
		$this->tableName=$tableName;
		$this->fieldKeyArray=$fieldKeyArray;
		$this->fieldValueArray=$fieldValueArray;
		$this->condition=$condition;
		//将客户端的参数，传递给 算法具体实现类的实例A，并调用A的algorithm方法，完成数据操作
		$this->strategy->algorithm($this->tableName,$this->fieldKeyArray,$this->fieldValueArray,$this->condition);
	}
}
?>
