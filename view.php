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
  $tag_query = "select * from " . DB_TAG;
?>
<table>
  <tbody>
    <tr>
      <td>集数</td>
      <td>名字</td>
      <td>描述</td>
      <td>
        标签
        <select id="s" onchange="changetest()">
          <?php
            $tag_data1 = mysqli_query($dbc, $tag_query)
              or die('error tagdata');
            while($tag_row1 = mysqli_fetch_array($tag_data1)){
              echo '<option value="">' . $tag_row1['name'] . '</option>';
            }
          ?>
        </select>
      </td>
      <td>操作</td>
    </tr>
<?php
  // 输出表格
  // echo '<tr><td>集数</td><td>名字</td><td>描述</td><td>标签</td><td>操作</td></tr>';
  while($row = mysqli_fetch_array($data)){

    echo '<tr data-id=' . $row['episode'] . '>' .
      '<td>' . $row['episode'] . '</td>' .
      '<td>' . $row['name'] . '</td>' .
      '<td>' . $row['des'] . '</td>';

    // 为什么只能在循环里创建新查询？

    $tag_data = mysqli_query($dbc, $tag_query)
        or die('error tagdata');

    // add tag start
    // 这部分循环跟js的思路有差异..
    $hastag = 0; // set a flag
    while($tag_row = mysqli_fetch_array($tag_data)){
      if($row['tag_id'] == $tag_row['tag_id']){
        echo '<td>' . $tag_row['name'] . '</td>';
        $hastag = 1;
      }
    }
    if($hastag === 0){
      echo '<td>无</td>';
    }
    // add tag end

    echo '<td><a href="del.php?id=' . $row['episode'] . '">del</a></td>' .
      '</tr>';
  }
  // echo '</tbody></table>';
?>

  </tbody>
</table>
