
<?php
/**
 * 主要
 * User: CrossJae
 * Date: 2017/11/15
 */
  // header
  require_once('header.php');
  // 引入数据库信息
  require_once('connect.php');


  if(isset($_POST['addData'])){ // 点击添加的时候才录入数据
    $episode = $_POST['episode']; // 获取表格的集数
    $name = $_POST['name']; // 获取表格的名字
    $des = $_POST['des']; // 获取表格的描述
    $tag = $_POST['tag']; // 获取表格的描述

    // insert
    $insert_query = "insert into " . DB_TABLE . " (episode, name, des, tag_id)" .
      "values ('" . $episode . "','" . $name . "','" . $des . "','" . $tag . "')";

    $insert_result = mysqli_query($dbc, $insert_query)
      or die('Error insert_result');
  }

  require_once('view.php'); // 查看结果

  // close database
  mysqli_close($dbc);
?>
