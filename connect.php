<?php
  // 数据库
  define('DB_DATABASE', 'comic');
  define('DB_TABLE', 'conan'); 
  // connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DATABASE)
    or die('Error connecting');
?>
