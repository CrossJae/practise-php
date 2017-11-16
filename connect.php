<?php
/**
 * 连接数据库
 * User: CrossJae
 * Date: 2017/11/15
 */

  require_once('connectvars.php');
  // 数据库
  define('DB_DATABASE', 'comic');
  define('DB_TABLE', 'conan');
  define('DB_TAG', 'tag');
  // connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DATABASE)
    or die('Error connecting');
?>
