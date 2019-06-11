-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: cosmetics
-- ------------------------------------------------------
-- Server version	5.7.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_admin` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `name` varchar(200) DEFAULT NULL COMMENT '管理员姓名',
  `password` text COMMENT '密码',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'admin','eyJpdiI6Im9aRHVhN21ucmlCYWsyY3VjWUJrN2c9PSIsInZhbHVlIjoiVzlQZ0JJcm9hcm5IXC80RTBVOU9KTUE9PSIsIm1hYyI6IjJjY2VjNGZhNjg0M2E2NDFjYzE5ZjExMGU1NDNiZDkwODk3YzUxNjFlNjM5ZTNmZDZiNTRlNmNjODY5NTcyNzUifQ==',1),(5,'hja','eyJpdiI6Im9aRHVhN21ucmlCYWsyY3VjWUJrN2c9PSIsInZhbHVlIjoiVzlQZ0JJcm9hcm5IXC80RTBVOU9KTUE9PSIsIm1hYyI6IjJjY2VjNGZhNjg0M2E2NDFjYzE5ZjExMGU1NDNiZDkwODk3YzUxNjFlNjM5ZTNmZDZiNTRlNmNjODY5NTcyNzUifQ==',1),(7,'123','eyJpdiI6InB1VWhJTWJTazh6WkY0Z1NiSU8xaGc9PSIsInZhbHVlIjoiNFVaQ0s1dGRuRGNiVzFGOXhDYkxoQT09IiwibWFjIjoiNjZlYTRlZDBjNTIwODNmZGVkY2I3ZmI0NGZlMDA2ZjQzYmE2YTFlYTk2MmU2ODc1YjVhNTM5NDg5N2I4NDBkNSJ9',1),(9,'111','eyJpdiI6ImR2Qk5cL3cyNUo2MWxqRzhpUlRwM3pBPT0iLCJ2YWx1ZSI6ImpJNUo5NGNpYnZYV045MmRSQW1ZcEE9PSIsIm1hYyI6ImY5MmMwOTUxMmZjOWQ3ZWUxYjU5M2QzZGEwZTIxYTY1ZTg2MTJmY2FiMzI1YjkwYjY1ZTVhZDJhYWYyMzlmNjcifQ==',1);
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dingdan`
--

DROP TABLE IF EXISTS `tb_dingdan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dingdan` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `dingdanhao` varchar(125) DEFAULT NULL COMMENT '订单号',
  `spc` varchar(125) DEFAULT NULL COMMENT '商品串',
  `shouhuoren` varchar(255) DEFAULT NULL COMMENT '收货人姓名',
  `sex` varchar(4) DEFAULT NULL COMMENT '收货人性别',
  `dizhi` varchar(255) DEFAULT NULL COMMENT '收货地址',
  `youbian` varchar(10) DEFAULT NULL COMMENT '邮编',
  `tel` varchar(50) DEFAULT NULL COMMENT '联系电话',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `shff` varchar(50) DEFAULT NULL COMMENT '收货方式',
  `zfff` varchar(50) DEFAULT NULL COMMENT '支付方式',
  `leaveword` text COMMENT '用户留言',
  `time` varchar(50) DEFAULT NULL COMMENT '下单时间',
  `xiadanren` varchar(50) DEFAULT NULL COMMENT '下单姓名',
  `status` int(2) NOT NULL DEFAULT '2' COMMENT '状态',
  `number` int(8) NOT NULL DEFAULT '0' COMMENT '所购数量',
  `danjia` int(8) NOT NULL DEFAULT '0' COMMENT '单价',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dingdan`
--

LOCK TABLES `tb_dingdan` WRITE;
/*!40000 ALTER TABLE `tb_dingdan` DISABLE KEYS */;
INSERT INTO `tb_dingdan` VALUES (31,'3107051555141385','38',NULL,NULL,NULL,'cc','13034003710','1398152207@qq.com',NULL,NULL,NULL,'1555170185','hja',0,1,0),(32,'3980241555141389','36',NULL,NULL,NULL,'cc','13034003710','1398152207@qq.com',NULL,NULL,NULL,'1555170189','hja',2,1,0);
/*!40000 ALTER TABLE `tb_dingdan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_gonggao`
--

DROP TABLE IF EXISTS `tb_gonggao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_gonggao` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `title` varchar(255) DEFAULT NULL COMMENT '公告标题',
  `content` text COMMENT '公告内容',
  `time` varchar(50) DEFAULT NULL COMMENT '发表时间',
  `update_time` varchar(50) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_gonggao`
--

LOCK TABLES `tb_gonggao` WRITE;
/*!40000 ALTER TABLE `tb_gonggao` DISABLE KEYS */;
INSERT INTO `tb_gonggao` VALUES (6,'清明节','大甩卖','2019-03-31 16:55:02',NULL),(5,'双十一','全部半价','2019-03-31 16:54:06',NULL),(7,'五一节','八折优惠','2019-03-31 16:55:54',NULL),(8,'房贷首付VS的','反对v吧v的','2019-03-31 16:56:05',NULL),(9,'感到附属国','公司股份的边防官兵','2019-03-31 16:56:10',NULL),(10,'广泛的感到附属国的g','的广泛大使馆犯得上','2019-03-31 16:56:16',NULL),(12,'该方法南方姑娘你n','fn 发发 给','2019-03-31 16:56:30',NULL),(13,'官方大部分差不多b\'b','fgn\'b\'g\'vc','2019-03-31 16:56:36',NULL),(14,'反感不反感不','股份分别发给','2019-03-31 16:56:42',NULL),(15,'不得不从发v','官方不错v发f','2019-03-31 16:56:50',NULL),(16,'fb覆盖不规范发','gf 覆盖','2019-03-31 16:57:01',NULL);
/*!40000 ALTER TABLE `tb_gonggao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_leaveword`
--

DROP TABLE IF EXISTS `tb_leaveword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_leaveword` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `userid` varchar(8) DEFAULT NULL COMMENT '用户编号',
  `title` varchar(200) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `time` varchar(50) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_leaveword`
--

LOCK TABLES `tb_leaveword` WRITE;
/*!40000 ALTER TABLE `tb_leaveword` DISABLE KEYS */;
INSERT INTO `tb_leaveword` VALUES (3,'hja','XDSACA','CSV SV','1554207312'),(6,'hja','gvsgv','bvsfb','1554210709'),(5,'hja','FFGWG','GRBGV','1554207373'),(8,'hja','HKJLK','GLIGKJ','1554231833'),(9,'hja',NULL,NULL,'1554718461');
/*!40000 ALTER TABLE `tb_leaveword` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_links`
--

DROP TABLE IF EXISTS `tb_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_links` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) DEFAULT NULL COMMENT '链接名',
  `link_url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_links`
--

LOCK TABLES `tb_links` WRITE;
/*!40000 ALTER TABLE `tb_links` DISABLE KEYS */;
INSERT INTO `tb_links` VALUES (3,'首页','/'),(4,'全部商品','/home/all'),(6,'我的订单','/home/order'),(7,'留言中心','/home/liuyan'),(8,'购物车','/home/shopCar'),(9,'用户中心','/home/user'),(10,'活动公告','/home/action');
/*!40000 ALTER TABLE `tb_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_lunbotu`
--

DROP TABLE IF EXISTS `tb_lunbotu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_lunbotu` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL COMMENT '图片名',
  `image_url` varchar(255) DEFAULT NULL COMMENT '路径',
  `content` text COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_lunbotu`
--

LOCK TABLES `tb_lunbotu` WRITE;
/*!40000 ALTER TABLE `tb_lunbotu` DISABLE KEYS */;
INSERT INTO `tb_lunbotu` VALUES (16,'2d85063e813f5662.jpg','./uploads/20190413/2d85063e813f5662.jpg',NULL),(17,'9cb30db27c1992f1.jpg','./uploads/20190413/9cb30db27c1992f1.jpg',NULL),(18,'31c3fd2b98617609.jpg','./uploads/20190413/31c3fd2b98617609.jpg',NULL),(19,'39bb169fc2a909aa.jpg','./uploads/20190413/39bb169fc2a909aa.jpg',NULL),(20,'79d09e8ee9e8e408.jpg','./uploads/20190413/79d09e8ee9e8e408.jpg',NULL);
/*!40000 ALTER TABLE `tb_lunbotu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pingjia`
--

DROP TABLE IF EXISTS `tb_pingjia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pingjia` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `userid` varchar(50) DEFAULT NULL COMMENT '用户编号',
  `spid` varchar(50) DEFAULT NULL COMMENT '商品编号',
  `content` text COMMENT '内容',
  `time` varchar(50) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pingjia`
--

LOCK TABLES `tb_pingjia` WRITE;
/*!40000 ALTER TABLE `tb_pingjia` DISABLE KEYS */;
INSERT INTO `tb_pingjia` VALUES (13,'1111','35','好，very good','1555168162');
/*!40000 ALTER TABLE `tb_pingjia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_shangpin`
--

DROP TABLE IF EXISTS `tb_shangpin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_shangpin` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `spmingcheng` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `spjianjie` text COMMENT '商品简介',
  `time` varchar(50) DEFAULT NULL COMMENT '上架时间',
  `spdengji` varchar(50) DEFAULT NULL COMMENT '等级',
  `xinghao` varchar(50) DEFAULT NULL COMMENT '型号',
  `tupian` varchar(200) DEFAULT NULL COMMENT '图片',
  `shuliang` int(8) DEFAULT NULL COMMENT '数量',
  `cishu` int(8) DEFAULT '0' COMMENT '次数',
  `tupianurl` text COMMENT '图片路径',
  `typeid` int(8) DEFAULT NULL COMMENT '分类编号',
  `huiyuanjia` varchar(25) DEFAULT NULL COMMENT '会员价',
  `shichangjia` varchar(25) DEFAULT NULL COMMENT '市场价',
  `pinpai` varchar(25) DEFAULT NULL COMMENT '品牌',
  `update_at` varchar(50) DEFAULT NULL COMMENT '修改时间',
  `chengben` int(8) DEFAULT NULL COMMENT '成本价',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_shangpin`
--

LOCK TABLES `tb_shangpin` WRITE;
/*!40000 ALTER TABLE `tb_shangpin` DISABLE KEYS */;
INSERT INTO `tb_shangpin` VALUES (35,'欧莱雅（LOREAL）复颜抗皱紧致护肤化妆品套装礼盒（柔肤130ml+乳液110ml+乳液50ml+柔肤水65ml）',NULL,'1555166701','普通','200','140ef649ac72f6b0.jpg',319,0,'./uploads/20190413/140ef649ac72f6b0.jpg',26,'530','600','欧莱雅男士',NULL,400,1),(36,'尊蓝男士轻妆懒人霜50g（素颜霜 BB霜 男 面霜乳液 补水保湿 男士化妆品套装 男士遮瑕护肤）',NULL,'1555166740','普通','100','588c10fb8b879566.jpg',429,0,'./uploads/20190413/588c10fb8b879566.jpg',21,'230','354','欧莱雅',NULL,100,1),(37,'珀莱雅水漾肌密五件套（洗面奶+爽肤水+乳液+面霜/凝露+精华/眼霜）化妆品套装补水保湿男女护肤品',NULL,'1555685172','普通','150','2180d45ab730a7ae.jpg',258,0,'./uploads/20190413/2180d45ab730a7ae.jpg',20,'500','600','珀莱雅',NULL,400,1),(38,'珀莱雅水漾肌密五件套（洗面奶+爽肤水+乳液+面霜/凝露+精华/眼霜）化妆品套装补水保湿男女护肤品',NULL,'1555167153','普通','200','a09d6ad3f6684220.jpg',521,0,'./uploads/20190413/a09d6ad3f6684220.jpg',20,'520','600','欧莱雅男士',NULL,400,1);
/*!40000 ALTER TABLE `tb_shangpin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_type`
--

DROP TABLE IF EXISTS `tb_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_type` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `typename` varchar(50) DEFAULT NULL COMMENT '商品分类',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_type`
--

LOCK TABLES `tb_type` WRITE;
/*!40000 ALTER TABLE `tb_type` DISABLE KEYS */;
INSERT INTO `tb_type` VALUES (26,'护手霜',NULL),(19,'其他','它创始于美国纽约，是雅诗兰黛最基础的护肤品之一，旗下的产品护肤、香水、彩妆，这个牌子我不是特别的了解，知识觉得这个名字是我最喜欢的名字，你们是不是也是特别的喜欢这个名字？'),(20,'特殊功能化妆品','它是护肤品，能调节皮肤的平衡度，同时补水的效果也是非常的好，让你的肌肤变得很有光泽和弹性，如果油性皮肤使用之后会显得水油平衡。'),(21,'美容化妆品','它是一个非常高档的护肤品品牌，张艺兴和奚梦瑶代言过这个产品，可想而知这个产品是有非常的好，我呢不太喜欢国外的化妆品，比较喜欢国内的，也不知道是什么原因，它补水效果也是厉害的。'),(22,'发用化妆品','她是欧莱雅旗下的顶级奢华美容品牌，是现代美容行业的奠基品牌之一，是能让每个女人拥有自己的特色的品牌之一。');
/*!40000 ALTER TABLE `tb_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `name` varchar(50) DEFAULT NULL COMMENT '昵称',
  `password` text COMMENT '加密后密码',
  `dongjie` int(8) NOT NULL DEFAULT '0' COMMENT '冻结',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `sfzh` varchar(50) DEFAULT NULL COMMENT '身份证号',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `qq` varchar(50) DEFAULT NULL COMMENT 'qq',
  `tishi` varchar(200) DEFAULT NULL COMMENT '密码找回问题',
  `huida` varchar(200) DEFAULT NULL COMMENT '密码找回答案',
  `dizhi` varchar(200) DEFAULT NULL COMMENT '地址',
  `youbian` varchar(50) DEFAULT NULL COMMENT '邮编',
  `time` varchar(50) DEFAULT NULL COMMENT '注册时间',
  `true_name` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `password1` varchar(50) DEFAULT NULL COMMENT '未加密密码',
  `shouhuoren` varchar(255) DEFAULT NULL COMMENT '收货人',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'demon','eyJpdiI6ImdxZXM1N0VNek9VT2VselhkTlpUYkE9PSIsInZhbHVlIjoiaFR2U0NDaVBXVk51U2NBVmF5RnJpZz09IiwibWFjIjoiOTYzMTgzMzQ5ODBhNjI5NmY0OTFmMzZhZjE1NWM2MjZkOGRkMmNjZTk0YWRkZThmZDVkYWRhYTA2Yjk2MDRjMCJ9',0,'1398152207@qq.com','342222**************','13034003710','1398152207','1、你的姓名','3.10','南阳','235211','1554061155','黄金傲','123456','黄66'),(13,'hja','eyJpdiI6Ijh2ZHdJakVWNUpmTEJ3bmZuTjVqREE9PSIsInZhbHVlIjoiVmd3c1NSUDN2WXNEVXhKXC83OExNTHc9PSIsIm1hYyI6IjQ0YmM0ODdmMDdiYmVmMWQ4M2Q1YTAwNTlmMDBkYjBlOTU4MmQzZDlkMTgzNjJkMjk5YzI2MDAwZDVhNTgxZjgifQ==',0,'1398152207@qq.com','15612302152630','13034003710','1952078665','1、你的姓名',NULL,NULL,'cc','1554200044','hhhjjaa','123456',NULL),(14,'123','eyJpdiI6Ik9EYjFnZkdGM3ZYV3ZyQ0JBRTg4dkE9PSIsInZhbHVlIjoiRmFZeERod0ZvdXdtYUR1SHpUc1I4dz09IiwibWFjIjoiMjBlZTRkNTMxNjBjOTdhMDYwNjgyODA2MGE4MjQ1MTg0Y2NiZjU3NjRmNDU4NmQ3YTc2MjdmZGUyN2M3OWY2OCJ9',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'的得分v','eyJpdiI6IkppYzE0NGZMTW9URmFjNVhJSFRTdkE9PSIsInZhbHVlIjoiXC9YdUJGXC9UVWZFclR4QXBKMHc2MnpBPT0iLCJtYWMiOiI4NmI0OTgwOWZhMTAxNzIzMWFmMTRiNzUwMDcxOGZkNDM4NTI0ZmJjZjE4YzY1ZGM2M2E3ZTk2NDg1YjMwMmMyIn0=',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1555166636',NULL,'111',NULL),(16,'1111','eyJpdiI6IlJNTk9jQzMrMm90MjlIUVNiYVRSeFE9PSIsInZhbHVlIjoieVFSc3p3MHh5QnhMUVVoQW13akJRQT09IiwibWFjIjoiYjI2ZDBhMjA5MjVkMTU3ZTRjNTNkMDI2OTA4YzBmNWU2Zjg0ZDAyMGEwYWQ4M2I1MGMyZWI1YjFmYjJjOTNhMCJ9',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1555166652',NULL,'111',NULL);
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_xieyi`
--

DROP TABLE IF EXISTS `tb_xieyi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_xieyi` (
  `id` int(8) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_xieyi`
--

LOCK TABLES `tb_xieyi` WRITE;
/*!40000 ALTER TABLE `tb_xieyi` DISABLE KEYS */;
INSERT INTO `tb_xieyi` VALUES (1,'<ul class=\" list-paddingleft-2\"><li><p>1. 用户在注册成为生物通商城用户时提供的信息应真实、完整、有效，并保证生物通可以通过该等信息与用户本人进行联系。同时，用户也有义务在相关资料发生变更时及时更新注册资信息。</p></li><li><p>2. \r\n在成功注册后，生物通商城会为每位用户开通一个账户，作为其使用生物通商城服务的唯一身份标识，用户应妥善保管该账户的用户名和密码，并对在其账户和密码下发生的所有活动承担责任。用户不得以任何形式转让或授权他人使用自己的生物通商城账户，也不应用他人账户在生物通商城进行注册和购买商品。</p></li><li><p>3. 每位用户只允许拥有一个生物通商城账户。如有证据证明或生物通有理由相信用户存在注册多个生物通商城账户的情形，生物通有权采取取消订单、冻结或关闭账户、拒绝提供服务等措施，给生物通造成损失的，用户还应承担赔偿责任。</p></li><li><p>4. \r\n生物通商城用户必须是具有完全民事行为能力的自然人，无民事行为能力、限制民事行为能力人以及无经营或特定经营资格的组织不得注册为生物通商城用户或超过其民事权利或行为能力范围与生物通商城进行交易，如与生物通商城进行交易的，则本协议自始无效，生物通商城有采取取消订单、冻结或关闭账户、拒绝提供服务等措施的权利，给生物通商城造成损失的，用户还应承担赔偿责任。</p></li></ul><p><br/></p>');
/*!40000 ALTER TABLE `tb_xieyi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-13 16:21:03
