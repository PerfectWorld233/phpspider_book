<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/25
 * Time: 10:53
 */



/**
 *文件编码需为UTF-8，否则会存在生成的文档内容乱码
 */

/** 引入需要的类库*/
require_once '..\library\phpexcel\PHPExcel.php';
require_once '..\library\phpexcel\PHPExcel\IOFactory.php';
require_once '..\library\phpexcel\PHPExcel\Reader\Excel5.php';
//require_once '..\library\phpexcel\PHPExcel\Reader\Excel2007.php';
date_default_timezone_set("Asia/Shanghai");
//ini_set('memory_limit', '100M');
ob_end_clean();
$objPHPExcel = new PHPExcel();

//设置生成的Excel文件名
$date = date("Y_m_d",time());
$fileName = "{$date}.xls";


header("content-type:text/html;charset=utf-8");
$dsn="mysql:host=localhost;dbname=jijin";
$db_user='root';
$db_pass='root';
try
{
    $pdo=new PDO($dsn,$db_user,$db_pass);
}
catch(PDOException $e)
{
    echo '数据库连接失败'.$e->getMessage();
}

    for($i = 1; $i < 10; $i ++){
        $start = 1+10*($i-1);
        $end = 10*$i;
        $sql="select * from kxjj WHERE id BETWEEN ".$start." AND ".$end;
        $data=$pdo->query($sql);

        //测试数据，正常会从数据库中获取
        //$data = array(
        //    0 => array('id'=>2012,'name'=>'胡','age' => 25)
        //);

        //Excel文件的说明信息
        $objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
            ->setLastModifiedBy("Maarten Balliauw")
            ->setTitle("Office 2005 XLSX Test Document")
            ->setSubject("Office 2005 XLSX Test Document")
            ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
            ->setKeywords("office 2005 openxml php")
            ->setCategory("Test result file");

        //设置表格内容，具体内容根据A1这种具体位置来确定
        //$objPHPExcel->setActiveSheetIndex(0)
        //    ->setCellValue('A1','编号')
        //    ->setCellValue('B1','姓名')
        //    ->setCellValue('C1','年龄');

        //适合把表中数据导入Excel文件中，多数据循环设置值
        foreach($data as $key=> $value) {
            $key+=2;
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$key,$value['id'])
                ->setCellValue('B'.$key,$value['pzh'])
                ->setCellValue('C'.$key,$value['title'])
                ->setCellValue('D'.$key,$value['xmlb'])
                ->setCellValue('E'.$key,$value['sqdm'])
                ->setCellValue('F'.$key,$value['xmfzr'])
                ->setCellValue('G'.$key,$value['fzrzc'])
                ->setCellValue('H'.$key,$value['ytdw'])
                ->setCellValue('I'.$key,$value['zzjf'])
                ->setCellValue('J'.$key,$value['zwzy'])
                ->setCellValue('K'.$key,$value['zwztc'])
                ->setCellValue('L'.$key,$value['ywzy'])
                ->setCellValue('M'.$key,$value['ywztc'])
                ->setCellValue('N'.$key,$value['jtzy'])
                ->setCellValue('O'.$key,$value['jtbg']);
        }

        // 重命名表
        // $objPHPExcel->getActiveSheet()->setTitle('Simple');

        // 设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        // 将输出重定向到一个客户端web浏览器(Excel2007)
        //header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        //header('Content-Disposition: attachment;filename='.$fileName);
        //header('Cache-Control: max-age=0');

        //要是输出为Excel2007,使用 Excel2007对应的类，生成的文件名为.xlsx.如果是Excel2005,使用Excel5,对应生成.xls文件
        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        //支持浏览器下载生成的文档
        //$objWriter->save('php://output');

        //支持保存生成的文件在当前目录下,直接文件名做为参数

        $objWriter->save($start.'---'.$end.'.xls');


    }



?>