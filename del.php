<?php
/**
 * 删除内容
 * User: CrossJae
 * Date: 2017/11/16
 */
  require_once('connect.php');

  $del_id = $_GET['id'];

  $del_query = "delete from " . DB_TABLE . " where episode=" . $del_id;

  $del_result = mysqli_query($dbc, $del_query)
    or die ('Error del');

  require_once('view.php'); // 查看结果

  mysqli_close($dbc);
?>
