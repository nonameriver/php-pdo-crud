<?php
//接受客户端 选择的操作类型 和 数据，调用上下文聚合类，完成具体操作

//自动加载类文件
function __autoload($class_name)
{
	include $class_name.'.php';
}

class DataAction
{
	public $context;
	function __construct($actionType)//根据 操作类型（字符串） 参数 选择 算法具体实现
	{
		if(strcasecmp($actionType,"insertdata")==0)//操作类型参数为insertdata（不区分大小写）
		{
			$this->context=new Context(new InsertData());
		}
		elseif(strcasecmp($actionType,"deletedata")==0)//参数为deletedata
		{
			$this->context=new Context(new DeleteData());
		}
		elseif(strcasecmp($actionType,"searchdata")==0)//参数为searchdata
		{
			$this->context=new Context(new SearchData());
		}
		elseif(strcasecmp($actionType,"updatedata")==0)//参数为updatedata
		{
			$this->context=new Context(new UpdateData());
		}
		else
		{
			echo "参数错误！";
		}
		
	}
	
	public function showResult($tableName,$fieldKeyArray,$fieldValueArray,$condition)
	{
		$result=$this->context->algorithm($tableName,$fieldKeyArray,$fieldValueArray,$condition);//调用上下文实例B的algorithm方法，传递客户端数据
		echo $result;
	}

}
?>
