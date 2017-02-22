<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22
 * Time: 14:56
 */



$html = file_get_contents('http://opac.dlou.edu.cn/opac/item.php?marc_no=0000005579');
$dom = new DOMDocument();
// load html into document object model
@$dom->loadHTML($html);
// create domxpath instance
$xPath = new DOMXPath($dom);
// get all elements with a particular id and then loop through and print the href attribute
$elements = $xPath->query('//*[@id="item_detail"]/dl[1]');
foreach ($elements as $e)
{
    echo ($e->nodeValue);
}