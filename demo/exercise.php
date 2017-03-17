<?php
/**
 * Created by PhpStorm.
 * User: taylor yue
 * Date: 2017/3/8
 * Time: 22:54
 */

//php编程：两数相除,如何取商的整数部分?
$a=8;
$b=3;
$out= $a/$b;
echo '无取整:'.$out.'<br>';
echo '进一法取整:'.ceil($out).'<br>';
echo '舍去法取整:'.floor($out).'<br>';
echo '对变数转成整数型态 :'.intval($out).'<br>';
echo '对浮点数进行四舍五入:'.round($out).'<br>';
//根据你的要求列出了典型的 根据你的需求来吧....
?>