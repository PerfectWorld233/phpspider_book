<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/2
 * Time: 16:25
 */


$sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_connect($sock,"255.255.255.255", 10000);
socket_set_option($sock, SOL_SOCKET, SO_BROADCAST, 1);
$buf = "Hello World!";
socket_write($sock,$buf,strlen($buf));
socket_close($sock);
die;

// 创建一个新cURL资源
$ch = curl_init();

// 设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://www.baiten.cn/");
curl_setopt($ch, CURLOPT_HEADER, 0);

// 抓取URL并把它传递给浏览器
$content = curl_exec($ch);

// 关闭cURL资源，并且释放系统资源
curl_close($ch);

print_r($content);die;



require('../core/init.php');
//
//$opt = new util();
//
//
//$opt->outputCsv();

$requestList[] = array(
    'name' => '11',
    'add' => '22',
    'tel' => '33',
    'website' => '44',
    'email'=> '55',
    'postalcode'=> '66',
);

$exe = new util();
$exe->outputCsv($requestList, '777');

//echo "<pre>";print_r($requestList);echo "<pre>";