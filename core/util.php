<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22
 * Time: 14:42
 */

class util
{


    function mysql_prep($value)
    {
        if(get_magic_quotes_gpc()){
            //$value = stripslashes($value);
            $value = addslashes($value);

        } else {
            $value = addslashes($value);
        }
        return $value;
    }



    //PHP中遍历stdclass object
    //调用这个函数，将其幻化为数组，然后取出对应值
    function object_array($array)
    {
        if(is_object($array))
        {
            $array = (array)$array;
        }
        if(is_array($array))
        {
            foreach($array as $key=>$value)
            {
                $array[$key] = object_array($value);
            }
        }
        return $array;
    }


//outputCsv($requestList, "list-{$now}");

    //将数据输出为csv

    function outputCsv($data, $filename)
    {
        if($data==false || count($data)==0)
        {
            echo 'no_data';
            exit;
        }
        header('Content-Type: text/csv; charset=UTF-8');
        header("Content-Disposition: attachment; filename={$filename}.csv");
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Expires:0');
        header('Pragma:public');
        ob_start();
        $fp = fopen( 'php://output', 'w' ) or die( 'error_on_generate_file') ;
        // 输出CSV头信息
        fputcsv($fp, array_keys(reset($data)));
        // 输出CSV数据
        foreach ($data as $dataRow){
            fputcsv($fp, array_values($dataRow));
        }
        @fclose($fp);
        $output = ob_get_contents();
        ob_end_clean();
        echo "\xEF\xBB\xBF" . $output;
    }

}




