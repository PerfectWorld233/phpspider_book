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

}


