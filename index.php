<?php
  // 引入数据库信息
  require_once('connectvars.php');
  require_once('connect.php');

  $episode = $_POST['episode']; // 获取表格的集数
  $name = $_POST['name']; // 获取表格的名字
  $des = $_POST['des']; // 获取表格的描述

  // insert
  $insert_query = "insert into " . DB_TABLE . " (episode, name, des)" .
    "values ('" . $episode . "','" . $name . "','" . $des . "')";

  $insert_result = mysqli_query($dbc, $insert_query)
    or die('Error insert_result');

  require_once('view.php'); // 查看结果

  // close database
  mysqli_close($dbc);
?>
