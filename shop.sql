/*SQL语句*/

/* 打开 sql, 依次执行 sql 语句 */

--用户表 $my_user
CREATE TABLE `mini_user`(
	`id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '标识ID	',
	`name` varchar(12) NOT NULL DEFAULT '' COMMENT '用户名称, 其内容为用户注册时填写的值',
	`password` varchar(40) NOT NULL DEFAULT '' COMMENT '用户注册输入的密码, 用md5()加密',
	`email` varchar(80) NOT NULL DEFAULT '' COMMENT '用户电子邮箱',
	`reg_date` varchar(20) NOT NULL DEFAULT '' COMMENT ' 注册日期 ',
	`admin` enum('1','0') NOT NULL DEFAULT '0' COMMENT '管理员标识符: 1-管理员, 0-普通用户'
)

--商品类别表 $my_type
CREATE TABLE `mini_type`(
	`id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '标识ID',
	`name` varchar(12) NOT NULL DEFAULT '' COMMENT '类别名称',
	`description` varchar(80) NOT NULL DEFAULT '' COMMENT '类别介绍',
	`num` int(5) NOT NULL DEFAULT 0 COMMENT '本类别所有商品总可出售的数量, 非商品种类数'
)

--商品表 $my_goods
CREATE TABLE `mini_goods`(
	`id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '标识ID',
	`name` varchar(40) NOT NULL DEFAULT '' COMMENT '商品名称',
	`type` int(5) NOT NULL DEFAULT 0 COMMENT '商品所属类别, 该值对应商品类别表指定类别的ID值',
	`supplier` varchar(100) NOT NULL DEFAULT '' COMMENT '供应商名称, 对应供应商表格中供应商姓名',
	`cost` varchar(6) NOT NULL DEFAULT '' COMMENT '商品售价',
	`description` varchar(200) NOT NULL DEFAULT '' COMMENT '商品介绍',
	`num` int(5) NOT NULL DEFAULT 0 COMMENT '该商品现存货数量'
)
-- ALTER TABLE `mini_goods` add `supplier` varchar(100) NOT NULL DEFAULT '' COMMENT '供应商名称, 对应供应商表格中供应商姓名' AFTER TYPE
-- ALTER TABLE `mini_goods` add `hs_code` varchar(12) NOT NULL DEFAULT 0 COMMENT '商品海关编码' AFTER NAME
-- ALTER TABLE `mini_goods` add `img` varchar() NOT NULL DEFAULT ''COMMENT '产品图片'

--订单表; $my_sales
CREATE TABLE `mini_sales`(
	`id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '标识ID',
	`sale_user_name` varchar(12) NOT NULL DEFAULT '' COMMENT '下订单的用户名称,其值对应用户表中的name值',
	`sale_goods_id` int(5) NOT NULL DEFAULT 0 COMMENT '订购的商品ID, 对应商品表中的ID值',
	`sale_goods_num` int(5) NOT NULL DEFAULT 0 COMMENT '商品的数量, 其值范围从1到该类商品存货量最大值',
	`sale_cost` varchar(10) NOT NULL DEFAULT '' COMMENT '售价, 其值对应商品表中的cost值',
	`sale_state` enum('1','0') NOT NULL DEFAULT '0' COMMENT '订单状态: 1-订单已经处理 0-订单未处理', 
	`sale_date` varchar(40) NOT NULL DEFAULT '' COMMENT '下订单的日期'
)

--供应商表格$my_suppliers
CREATE TABLE `my_suppliers`(
	`id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '标识ID',
	`supplier_name` varchar(100) NOT NULL DEFAULT '' COMMENT '供应商名称',
	`supplier_legal_person` varchar(12) NOT NULL DEFAULT '' COMMENT '供应商公司法人', 
	`supplier_add` varchar(100) NOT NULL DEFAULT '' COMMENT '供应商地址',
	`supplier_tel` varchar(30) NOT NULL DEFAULT '' COMMENT '供应商联系电话',
	`supplier_contact` varchar(10) NOT NULL DEFAULT '' COMMENT '供应商联系人',
	`supplier_tax` decimal(4,2) NOT NULL DEFAULT 0 COMMENT '供应商开票税点'
)
  
    
--报价表格$my_quotation
CREATE TABLE `my_quotation`(
	`id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT '标识ID',
	`buyer` varchar(30) NOT NULL COMMENT '用户名称',
	`date` varchar(40) NOT NULL COMMENT '报价日期',
	`item` varchar(40) NOT NULL COMMENT '商品名, 对应商品表的商品名',
	`quantity` int(6) NOT NULL COMMENT '产品数量',
	`cost` varchar(10) NOT NULL COMMENT '商品售价,对应商品表的售价'
)

