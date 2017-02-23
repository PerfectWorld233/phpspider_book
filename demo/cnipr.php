<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 18:52
 */

ini_set("memory_limit", "1024M");
$path =  dirname(__FILE__).'/../core/init.php';
print_r($path);die;

require dirname(__FILE__).'/../core/init.php';


$tbname	= 'jijin_cnipr';
$dbname	= 'jijin';
$cname	= '专利信息服务平台search.cnipr.com';

$link = mysql_connect("localhost", "root", "root")      or die("Could not connect");
mysql_select_db($dbname) or die("Could not select database");
mysql_query("set names utf8;");

$sqlrt	= "CREATE TABLE IF NOT EXISTS `$tbname` (
	`id` INT (11) NOT NULL AUTO_INCREMENT,
	`title` text NOT NULL COMMENT '专利名称',
	`is` text NOT NULL COMMENT '是否有效',
	`type` text NOT NULL COMMENT '专利类型',
	`sqh` char(30) NOT NULL UNIQUE COMMENT '申请号',
	`date` text NOT NULL COMMENT '申请日',
	`gkh` text NOT NULL COMMENT '公开(公告)号',
	`gkr` text NOT NULL COMMENT '公开(公告)日',
	`trsq` text NOT NULL COMMENT '同日申请',
	`faysqh` text NOT NULL COMMENT '分案原申请号',
	`sqren` text NOT NULL COMMENT '申请(专利权)人',
	`flh` text NOT NULL COMMENT '分类号',
	`yxq` text NOT NULL COMMENT '优先权',
	`abs` text NOT NULL COMMENT '摘要',

/*    `zqx` text NOT NULL COMMENT '主权项',
	`fmr` text NOT NULL COMMENT '发明人',
    `dz` text NOT NULL COMMENT '地址',
    `gsdm` text NOT NULL COMMENT '国省代码',
    `abs` text NOT NULL COMMENT '代理机构',
    `fmzlsq` text NOT NULL COMMENT '代理人',
    `shiwu` text NOT NULL COMMENT '优先权',
    `stype` text NOT NULL COMMENT '国际申请',
    `zldljg` text NOT NULL COMMENT '国际公布',
    `dlr` text NOT NULL COMMENT '进入国家日期',
    `searchkey` text NOT NULL COMMENT '检索词',

    `url` text NOT NULL COMMENT '法律状态公告日',
    `url` text NOT NULL COMMENT '原文链接',
    `url` text NOT NULL COMMENT '原文链接',
    `url` text NOT NULL COMMENT '原文链接',
    `url` text NOT NULL COMMENT '原文链接',
    `url` text NOT NULL COMMENT '原文链接',
    `url` text NOT NULL COMMENT '原文链接',
    `url` text NOT NULL COMMENT '原文链接',
    `url` text NOT NULL COMMENT '原文链接',*/
	PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARSET = utf8 COMMENT = '.$cname.' AUTO_INCREMENT = 1;";

mysql_query($sqlrt);