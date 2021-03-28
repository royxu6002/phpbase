-- https://blog.csdn.net/xusongsong520/article/details/8448632


--测试表与测试数据
CREATE TABLE test_main (
id      INT,
value   VARCHAR(10),
PRIMARY KEY(id)
);

-- 创建测试子表.
CREATE TABLE test_sub (
id      INT,
main_id INT,
value   VARCHAR(10),
PRIMARY KEY(id)
);


-- 插入测试主表数据.
INSERT INTO test_main(id, value) VALUES (1, 'ONE');
INSERT INTO test_main(id, value) VALUES (2, 'TWO');

-- 插入测试子表数据.
INSERT INTO test_sub(id, main_id, value) VALUES (1, 1, 'A');
INSERT INTO test_sub(id, main_id, value) VALUES (2, 1, 'B');
INSERT INTO test_sub(id, main_id, value) VALUES (3, 1, 'G');
INSERT INTO test_sub(id, main_id, value) VALUES (7, 2, 'C');
INSERT INTO test_sub(id, main_id, value) VALUES (5, 2, 'E');
INSERT INTO test_sub(id, main_id, value) VALUES (6, 2, 'F');

要求：主从表关联的时候,主表仅仅第一条记录显示,后面相同的情况下,不显示
默认情况下
---------- ----------
ONE        A
ONE        B
ONE        C
TWO        D
TWO        E
TWO        F
希望查询结果能变为
---------- ----------
ONE        A
           B
           C
TWO        D
           E
           F
--https://jingyan.baidu.com/article/9989c74604a644f648ecfef3.html
--https://blog.csdn.net/qq_35246620/article/details/56290903

思路：
首先, 根据主表的数据 分组显示 ROW_NUMBER
然后，仅仅显示 ROW_NUMBER = 1 的主表数据， 其他的主表数据不显示
实现
第一步 根据主表的数据 分组显示 ROW_NUMBER
SELECT
test_main.value,
test_sub.value,
ROW_NUMBER() OVER (PARTITION BY test_main.value ORDER BY test_sub.value)
FROM
test_main,
test_sub
WHERE
test_main.id = test_sub.main_id
value      value
---------- ---------- --------------------
ONE        A                             1
ONE        B                             2
ONE        C                             3
TWO        D                             1
TWO        E                             2
TWO        F                             3
第二步 仅仅显示 ROW_NUMBER = 1 的主表数据， 其他的主表数据不显示
SELECT
CASE WHEN
    ROW_NUMBER() OVER (PARTITION BY test_main.value ORDER BY test_sub.value) = 1 THEN test_main.value
    ELSE ''
END AS Main_Value,
test_sub.value
FROM
test_main,
test_sub
WHERE
test_main.id = test_sub.main_id
执行结果
Main_Value value
---------- ----------
ONE        A
           B
           C
TWO        D
           E
           F

---------------------

mysql SQL设置外键约束ON DELETE CASCADE
2017年06月19日 21:47:16 wuxing164 阅读数：3372更多
个人分类： mysql
摘要: 当删除父节点时，由数据库来帮助删除子节点，这样就不用我们显示地写代码先删子节点，再删父节点了。
第一步：删除原有的外键约束
ALTER TABLE child_table DROP FOREIGN KEY `FK_Reference_2` ;

第二步：添加新的外键约束，增加ON DELETE CASCADE
ALTER TABLE child_table 
  ADD CONSTRAINT `FK_Reference_2`
  FOREIGN KEY (`parent_id` )
  REFERENCES parent_table (`parent_id` )
  ON DELETE CASCADE
  ON UPDATE RESTRICT;
这样，就可以达到删除父节点的时候，自动删除子节点的目的了。
on update 和 on delete 后面可以跟的词语有四个
no action ， set null ， set default ，cascade
no action 表示 不做任何操作，
set null 表示在外键表中将相应字段设置为null
set default 表示设置为默认值
cascade 表示级联操作，就是说，如果主键表中被参考字段更新，外键表中也更新，主键表中的记录被删除，外键表中改行也相应删除