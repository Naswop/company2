<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>淄博万象汇弱电井管理系统</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="./layui/css/layui.css"  media="all">
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

<form  id="selectpos" class="layui-form" action="7.php" method="post">
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
<table class="layui-hide" id="test" style:'height:auto;overflow:visible;text-overflow:inherit;white-space:normal;'></table>       
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
    ,cols: [[
      {field:'id', width:50, title: 'ID', sort: true}
      ,{field:'posnum', width:70, title: '店铺'}
      ,{field:'jianum', width:60, title: '配线架'}
      ,{field:'swip', width:95, title: '交换机'}
      ,{field:'swname', title: '端口号', width: '30%', minWidth: 100} //
    ]]
  });
});
</script>

</body>
</html>