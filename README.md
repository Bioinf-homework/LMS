# 传说中的图书管理系统
## 开发环境
- thinkphp框架，添加ThinkPHP文件夹到根目录，修改/Application/Home/Conf下的配置
- 导入SQL文件夹的.sql数据


## 实验要求
使用MySQL建立一个“图书数据库“BookDB,包含两张表:
– Book {ISBN (PK), Title, AuthorID (FK), Publisher, PublishDate, Price}
– Author {AuthorID (PK), Name, Age, Country}
 手工输入足够多的若干测试数据;
 功能需求:
– 输入作者名字,查询该作者所著的全部图书的题目;
– 当用户点击某本图书的题目时,展示图书详细信息和作者详细信息; 
- 当用户点击“删除”按钮时,将对应行的图书从数据表中删除;ajax api jquery
– (选做) 用户可新增一本图书,若该书作者不在库中,还需增加新作者;
– (选做) 用户可更新一本图书的作者、出版社、出版日期、价格。
 性能需求:
– 页面的美观性

## tp路径...
http://serverName/index.php（或者其他应用入口文件）/模块/控制器/操作/[参数名/参数值...]
http://localhost/tp/index.php/home/index/show_book
