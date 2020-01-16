<html>
<head>
  <meta charset="utf-8">
  <title>淄博万象汇网络管理系统</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="./layui/css/layui.css"  media="all">
  <link rel="stylesheet" href="../../static/css/font.css">
  <link rel="stylesheet" href="../../static/css/weadmin.css">
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
<script src="./layui/layui.js" charset="utf-8"></script>
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
<script>
layui.use('element', function(){
  var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
  
  //监听导航点击
  element.on('nav(demo)', function(elem){
    //console.log(elem)
    layer.msg(elem.text());
  });
});
</script>
		<div class="weadmin-nav">
			<span class="layui-breadcrumb">
        <a href="">首页</a>
        <a href="">信息查询</a>
        <a>
          <cite>弱电井信息</cite></a>
      </span>
			<a class="layui-btn layui-btn-sm" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
				<i class="layui-icon" style="line-height:30px">&#x1002;</i></a>
		</div>
		<div class="weadmin-body">
  <blockquote class="layui-elem-quote layui-quote-nm">


<form  id="selectpos" class="layui-form" action="5.php" method="post">
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
  </blockquote>
 </fieldset>

<div class="layui-form" >
<table class="layui-table" lay-even="" lay-skin="row" width="90%">
    <thead ><tr>
        <th >序号</th>
        <th >店铺号</th>
        <th >配线架号</th>
        <th >交换机ip</th>
        <th >端口号</th>
        </tr></thead>
        <tbody>

<?php

    function ShowTable($table_name){
        //连接数据库
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
        $sql = "select * from rdj WHERE {$tj1} AND {$tj2}";
  //echo $sql;
        $conn=mysql_connect("localhost","root","zbwxh@150527");
        mysql_select_db("rdj",$conn);
        mysql_query("set names utf8");
        $res=mysql_query($sql,$conn);
        $rows=mysql_affected_rows($conn);//获取行数
        $colums=mysql_num_fields($res);//获取列数
        //echo "test数据库的"."rdj"."表的所有用户数据如下：<br/>";
        //echo "共计".$rows."行 ".$colums."列<br/>";
        if ($rows==0) {
          echo "<SCRIPT LANGUAGE='javascript'> alert('没有结果或输入错误，请重新输入。'); </SCRIPT> ";
          # code...
         }else{
          $a=1;
        while($row=mysql_fetch_row($res)){
            echo "<tr>";
            echo "<td>$a</td>";
            for($i=3; $i<$colums; $i++){//第四列开始读取

                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
            $a+=1;
        }
        
        }
        echo "";
    }
    ShowTable("demo");
?>
    </tbody>
  </table>
  </div>
</div>
</body>
</html>