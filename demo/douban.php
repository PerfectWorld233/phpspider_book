<?php
/**
 * Created by PhpStorm.
 * User: Taylor yue
 * Date: 2017/1/15
 * Time: 21:07
 */


require '../core/init.php';
//$redis = new Redis();
//$redis->connect('127.0.0.1', 6379);
//echo "Connection to server sucessfully";
////check whether server is running or not
//echo "Server is running: " . $redis->ping();


require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

// Create the logger
$logger = new Logger('my_logger');
// Now add some handlers
$logger->pushHandler(new StreamHandler(__DIR__.'/my_app.log', Logger::DEBUG));
$logger->pushHandler(new FirePHPHandler());

// You can now use your logger
$logger->info('My logger is now ready');


die;
echo 124;die;
