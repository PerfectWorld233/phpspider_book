<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22
 * Time: 14:56
 */

set_time_limit(0);

$html = file_get_contents('https://www.amazon.com/Cracking-Calculus-Exam-2017-Preparation/dp/110191985X/ref=sr_1_1?s=books&ie=UTF8&qid=1488377747&sr=1-1&keywords=ab');
print_r($html);die;
$dom = new DOMDocument();
// load html into document object model
@$dom->loadHTML($html);
// create domxpath instance
$xPath = new DOMXPath($dom);
// get all elements with a particular id and then loop through and print the href attribute
//$elements = $xPath->query('//*[@id="item_detail"]/dl[1]');
////*[@id="productTitle"]
$elements = $xPath->query('//*[@id="productTitle"]');
foreach ($elements as $e)
{
    $result['title']= ($e->nodeValue);
}
$elements = $xPath->query('//*[@id="iframeContent"]');
foreach ($elements as $e)
{
    $result['aact']= ($e->nodeValue);
}
print_r($result);die;
$elements = $xPath->query('//*[@id="byline"]/span[1]/a');
foreach ($elements as $e)
{
    $result['isbn']= ($e->nodeValue);
}

$elements = $xPath->query('//*[@id="s_content_1"]/p');
foreach ($elements as $e)
{
    $result['page']= ($e->nodeValue);
}

$elements = $xPath->query('//*[@id="detail_bullets_id"]/table/tbody/tr/td/div/ul/li[6]');
foreach ($elements as $e)
{
    $result['pingpai']= ($e->nodeValue);
}

$elements = $xPath->query('//*[@id="s_content_0"]/p');
foreach ($elements as $e)
{
    $result['bianji']= ($e->nodeValue);
}

$elements = $xPath->query('//*[@id="imgBlkFront"]/img/@src');
$result['abstract'] = $elements->item(1)->nodeValue;
print_r($result);die;
foreach ($elements as $e)
{
    $result['abstract']= ($e->nodeValue);
}
print_r($result);die;



$elements = $xPath->query('//*[@id="item_detail"]/dl[2]/dd');
foreach ($elements as $e)
{
    $result['title']= ($e->nodeValue);
}

$elements = $xPath->query('//*[@id="item_detail"]/dl[2]/dd');
foreach ($elements as $e)
{
    $result['title']= ($e->nodeValue);
}
print_r($result);die;
