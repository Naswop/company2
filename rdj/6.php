<?php
//PHP查询MySql数据库，将结果用表格输出
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
        $conn=mysql_connect("localhost:33061","root","zbwxh@150527");
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