<?php
  // 引入数据库信息
  require_once('connectvars.php');

  // connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PWD, 'comic')
    or die('Error connecting');

  $episode = $_POST['episode'];
  $name = $_POST['name'];
  $des = $_POST['des'];

  $query = "insert into conan (episode, name, des)" .
    "values ('" . $episode . "','" . $name . "','" . $des . "')";

  $result = mysqli_query($dbc, $query)
    or die('Error query');

  // close database
  mysqli_close($dbc);
?>
