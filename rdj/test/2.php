<?php
require_once("interCom.php");//引用interCom.php文件
//http://127.0.0.1/list.php?page=1&pagesize=12 //
$page=isset($_GET['page'])?$_GET['page']:1;
//如果存在就是传上来的值 如果不逊在就赋值为1
$pagesize=isset($_GET['pagesize'])?$_GET['pagesize']:1;
if(!is_numeric($page)||!is_numeric($pagesize)){
Response::json(401, "数据不合法"); //
}
?>