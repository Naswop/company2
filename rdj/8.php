<?php
require_once 'connect_config.php';

// 返回数据 的状态 消息 和数据
$status = false; 
$msg = '';
$data = array();

//查询语句 
$query = "select * from city  limit 5";  
//数据库连接
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_PORT) or die('数据库连接失败');
$data1 = mysqli_query($conn, $query);

if ($data1){
    $status = true;
    $msg = '成功';
    $i = 0;
    while($row = mysqli_fetch_array($data1)){
    
        $data [$i]['ID'] = $row['ID'];
        $data [$i]['Name'] = $row['Name'];
        $data [$i]['CountryCode'] = $row['CountryCode'];
        $data [$i]['District'] = $row['District'];
        $data [$i]['Population'] = $row['Population'];
        $i++;
    }

}else{
    $status = false;
    $msg = '数据查询失败';
    $valuse = array(
        $status,
        $msg
    );

}
 echo json($status,$msg,$data); 
//封装json 格式
function json($status, $message = '', $data = array()) {
        if (! is_bool ( $status )) {
            return '';
        }
    $result = array (
            'status' => $status,
            'message' => $message,
            'data' => $data 
        );
        echo json_encode ( $result,JSON_UNESCAPED_UNICODE);
    }
?>  