<!DOCTYPE php>
<html>

  <head>
    <meta charset="UTF-8">
    <title>添加会员-WeAdmin Frame型后台管理系统-WeAdmin 1.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="../../static/css/font.css">
    <link rel="stylesheet" href="../../static/css/weadmin.css">
    <link rel="stylesheet" href="./layui/css/layui.css"  media="all">
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
        <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
        <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <style type="text/css">
          .layui-table-cell {
            font-size:14px;
            padding:0 5px;
            height:auto;
            overflow:visible;
            text-overflow:inherit;
            white-space:normal;
            word-break: break-all;
        }

  </style>
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
  <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>
<body>
  <fieldset class="layui-elem-field site-demo-button">
  <legend></legend>
  </br>

  <blockquote class="layui-elem-quote layui-quote-nm">


<form  id="selectpos" class="layui-form" action="5.php" method="post">
  <div class="layui-form-item">
    <div class="layui-inline">
      <label class="layui-form-label">店铺名</label>
      <div class="layui-input-inline">
        <input type="text" name="swname" placeholder="请输入店铺号" autocomplete="off" class="layui-input">
      </div>
    </div>

    <div class="layui-inline">
      <label class="layui-form-label">弱电井</label>
      <div class="layui-input-inline">
        <input type="text" name="swname" placeholder="请输入弱电井号" autocomplete="off" class="layui-input">
      </div>
    </div>
  </div>

  <div align="center">
  <button type="submit" form="selectpos" value="Submit"  class="layui-btn layui-btn-radius" >搜索</button>
  </div>
  </form>
  </blockquote>
  </blockquote>
 </fieldset>    
<table class="layui-hide" id="test" ></table>       
<script src="./layui/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
 
<script>
layui.use('table', function(){
  var table = layui.table;
    table.render({
    elem: '#test'
    ,url:'7.php'
    ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
    //,page: true //开启分页
    ,limit: 30
    ,height: 315
    ,cols: [[
       {field:'id',width:'18%', title: '序号',align: 'center'}
      ,{field:'posnum', title: '店铺',align: 'center'}
      ,{field:'jianum',  title: '配线架',align: 'center'}
      ,{field:'swip', title: '交换机',align: 'center'}
      ,{field:'swname', title: '端口号',align: 'center'} //
    ]]
  });
});
</script>

</body>
</html>