<?php
/**
 * Created by PhpStorm.
 * User: Taylor yue
 * Date: 2017/1/15
 * Time: 12:13
 */

function vcurl($url, $post = '', $cookie = '', $cookiejar = '', $referer = '',$stime='20',$localhost='0',$header='')
{
    $tmpInfo = '';
    $cookiepath = getcwd().'./'.$cookiejar;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    switch($localhost)
    {
        case "3":
            curl_setopt($curl, CURLOPT_PROXY, '210.34.4.59:808');   //厦大
            curl_setopt($curl, CURLOPT_PROXYUSERPWD, 'mylibrary:mylibrary');
            break;
        default :
            $a='njnu';break;
    }
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    if($referer) {
        curl_setopt($curl, CURLOPT_REFERER, $referer);
    } else {
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
    }
    if($post) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    }
    if($cookie) {
        curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    }
    if($cookiejar) {
        curl_setopt($curl, CURLOPT_COOKIEJAR, $cookiepath);
        curl_setopt($curl, CURLOPT_COOKIEFILE, $cookiepath);
        //curl_setopt($curl, CURLOPT_COOKIE, $cookie);
    }
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, $stime);

    curl_setopt($curl, CURLOPT_HEADER, 0);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Expect:'));
    $tmpInfo = curl_exec($curl);
    $errno = curl_errno($curl);
    curl_close($curl);
    /*
    if($errno==28) { self::$timeout_infos='2';}
    elseif($errno==7){self::$timeout_infos='3';}
    elseif($errno==52){self::$timeout_infos='4';}
    */
    return $tmpInfo;
}



