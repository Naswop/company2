<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>淄博万象汇网络管理系统</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="./layui/css/layui.css"  media="all">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>

<script>
window.alert = function(name){
                var iframe = document.createElement("IFRAME");
                iframe.style.display="none";
                document.documentElement.appendChild(iframe);
                window.frames[0].window.alert(name);
                iframe.parentNode.removeChild(iframe);
            }
            window.confirm = function (message) {
                var iframe = document.createElement("IFRAME");
                iframe.style.display = "none";
                iframe.setAttribute("src", 'data:text/plain,');
                document.documentElement.appendChild(iframe);
                var alertFrame = window.frames[0];
                var result = alertFrame.window.confirm(message);
                iframe.parentNode.removeChild(iframe);
                return result;
      }

</script> 


          <ul class="layui-nav layui-bg-cyan">
  <li class="layui-nav-item"><a href="">淄万弱电井</a></li>
</ul>
  <fieldset class="layui-elem-field site-demo-button">
  <legend></legend>
  </br>

  <blockquote class="layui-elem-quote layui-quote-nm">


<BODY>
<form  id="selectpos" class="layui-form" action="13.php" method="post">
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">店铺名</label>
      <div class="layui-input-inline">
        <input type="text" name="posnum" lay-verify="required|number" autocomplete="off" class="layui-input">
      </div>
    </div>

    <div class="layui-inline">
      <label class="layui-form-label">弱电井</label>
      <div class="layui-input-inline">
        <input  type="text" name="swname" lay-verify="required|number" autocomplete="off" class="layui-input">
      </div>
    </div>
  </div>

  <div align="center">
  <button type="submit" form="selectpos" value="Submit"  class="layui-btn layui-btn-radius" >搜索</button>
  </div>
  </form>
        <div id="table"></div>
      <div id="pageBar"></div>
  </center>

</body>
<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
<script language="Javascript" src="js/layui.js"></script>
<script language="Javascript" src="js/nicePage.js"></script>

<script LANGUAGE="javascript">
var json = 

<?php 
// 服务器
define('DB_HOST', '127.0.0.1');

//端口号
define('DB_PORT', '33061');

// 用户名
define('DB_USER', 'root');

// 密码
define('DB_PWD', 'zbwxh@150527');

// 数据库名
define('DB_NAME', 'rdj');


// 返回数据 的状态 消息 和数据
  $tj1 = " 1 = 1 ";
  $tj2 = " 1 = 1 ";
  //恒成立，如果没有写数据，那就让条件等于1=1，这个条件是查找所有的数据
  $posnum="";
  $swname="";
  //如果你写入数据，按照数据查
  if(!empty($_POST["posnum"])) //第一个条件的判断（用到了模糊查询）
  {
    $posnum = $_POST['posnum'];
    $tj1 = " posnum like '%{$posnum}%'";
  }
    if(!empty($_POST["swname"])) //第一个条件的判断（用到了模糊查询）
  {
    $swname = $_POST['swname'];
    $tj2 = " swname like '%{$swname}%'";
  }
   //将条件拼接到SQl语句
        $query = "select * from rdj WHERE {$tj1} AND {$tj2}";
//查询语句 
//$query = "select * from rdj";  
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
echo json_encode ($data,JSON_UNESCAPED_UNICODE);
echo ';';
//封装json 格式
?>
  var nameList = ['序号', '姓名', '年龄', '年龄', '年龄'] //table的列名
  var widthList = [100, 100, 100, 100, 100] //table每列的宽度
$(function () {
    nicePage.setCfg({
      table: 'table',
      bar: 'pageBar',
      limit: 20,
      color: '#1E9FFF',
      layout: ['count', 'prev', 'page', 'next', 'limit', 'skip']
    });
  }); 
</script>

</html>