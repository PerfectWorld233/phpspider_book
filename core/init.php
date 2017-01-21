<?php
/**
 * Created by PhpStorm.
 * User: Taylor yue
 * Date: 2017/1/15
 * Time: 12:15
 */

// 图书抓取入口文件

error_reporting(E_ALL);
set_time_limit(0);

define('CORE', dirname(__FILE__));
require CORE.'/db.php';
require CORE.'/spider.php';

