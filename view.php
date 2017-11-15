<?php
/**
 * 展示全部内容
 * User: CrossJae
 * Date: 2017/11/15
 */

  // show table
  $query = "select * from " . DB_TABLE;

  $data = mysqli_query($dbc, $query)
    or die('Error data');

  // 输出表格
  echo '<table><tbody><tr><td>集数</td><td>名字</td><td>描述</td></tr>';
  while($row = mysqli_fetch_array($data)){
    echo '<tr>' .
      '<td>' . $row['episode'] . '</td>' .
      '<td>' . $row['name'] . '</td>' .
      '<td>' . $row['des'] . '</td>' .
      '</tr>';
  }
  echo '</tbody></table>';
?>
