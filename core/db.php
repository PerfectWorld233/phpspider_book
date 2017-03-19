<?php
/**
 * Created by PhpStorm.
 * User: Taylor yue
 * Date: 2017/1/15
 * Time: 12:15
 */

header("content-type:text/html;charset=utf-8");
$dsn="mysql:dbname=test;host=localhost";
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
//新增
$sql="insert into buyer (username,password,email) values ('ff','123456','admin@admin.com')";
$res=$pdo->exec($sql);
echo '影响行数：'.$res;

//修改
$sql="update buyer set username='ff123' where id>3";
$res=$pdo->exec($sql);
echo '影响行数：'.$res;
//查询
$sql="select * from buyer";
$res=$pdo->query($sql);
foreach($res as $row){
    echo $row['username'].'<br/>';
}
//删除
$sql="delete from buyer where id>5";
$res=$pdo->exec($sql);
echo '影响行数：'.$res;




