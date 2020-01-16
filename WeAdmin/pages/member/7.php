 <?php
// 服务器
define('DB_HOST', '127.0.0.1');

//端口号
define('DB_PORT', '3306');

// 用户名
define('DB_USER', 'root');

// 密码
define('DB_PWD', 'zbwxh@150527');

// 数据库名
define('DB_NAME', 'rdj');


// 返回数据 的状态 消息 和数据
$code = 0; 
$msg = '';
$data = array();
$count = 1000;

//查询语句 
$query = "select * from rdj";  
//数据库连接
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_PORT) or die('数据库连接失败');
$data1 = mysqli_query($conn, $query);

if ($data1){
    $status = 0;
    $msg = '';

    $i = 0;
    while($row = mysqli_fetch_array($data1)){
    
        $data [$i]['id'] = $row['id'];
        $data [$i]['posnum'] = $row['posnum'];
        $data [$i]['jianum'] = $row['jianum'];
        $data [$i]['swip'] = $row['swip'];
        $data [$i]['swname'] = $row['swname'];
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
echo '{"code":0,"msg":"","count":1000,"data":';
echo json_encode ($data,JSON_UNESCAPED_UNICODE);
echo"}"
//封装json 格式

?>  