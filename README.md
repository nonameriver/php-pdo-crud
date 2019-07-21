# php-pdo-crud
对PDO数据库操作进行封装，提供了四个API，所有操作都使用预处理语句，有效防止sql注入，不依赖任何框架

IConnectInfo.php是数据库连接接口，提供了pdo连接数据库所需要的参数
UniversalConnect.php继承了IConnectInfo,创建数据库连接

IStrategy.php是操作数据库算法接口，定义了具体算法方法和参数类型
InsertData.php,
DeleteData.php,
SearchData.php,
UpdateData.php这4个类都继承了IStrategy接口，完成操作数据库的算法具体实现，返回结果

Context.php是上下文聚合类，使 客户端数据请求 和 算法具体实现 可以独立的工作，实现请求和结果的松绑定


DataAction.php是客户端请求类，用来接受数据和选择具体算法策略

example.php是这个模块的具体使用实例

