<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>table模块快速使用</title>
  <link rel="stylesheet" href="./layui/css/layui.css"  media="all">
</head>
<body>
 
<table id="demo" lay-filter="test"></table>
 
<script src="./layui/layui.js" charset="utf-8"></script>
<script>
layui.use('table', function(){
  var table = layui.table;
  
  //第一个实例
  table.render({
    elem: '#demo'
    ,height: 312
    ,url: '7.php' //数据接口
    ,page: true //开启分页
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