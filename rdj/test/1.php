<?php
 
header('Content-Type: application/json; charset=utf8'); 
class Response{
/* interger $Status 状态码 200/400
* string $Msg 提示信息
* array $Data 数据
* return string 返回值  json返回的数据
* */
public static function json($Status,$Msg,$Data=array()){
if(!is_numeric($Status)){ //是否为数字
return "";
}
//组装好新的数据
$result=array(
'Status'=>$Status,
'Msg'=>$Msg,
'Data'=>$Data
);
//变成json格式的
echo json_encode($result,JSON_UNESCAPED_UNICODE);//JSON_UNESCAPED_UNICODE让中文不编码
exit;
}
}
?>