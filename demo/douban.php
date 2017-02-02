<?php
/**
 * Created by PhpStorm.
 * User: Taylor yue
 * Date: 2017/1/15
 * Time: 21:07
 */

require '../core/init.php';
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
echo "Connection to server sucessfully";
//check whether server is running or not
echo "Server is running: " . $redis->ping();

echo 124;die;
