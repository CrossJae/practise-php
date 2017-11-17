<?php
/**
 * 展示全部内容
 * User: CrossJae
 * Date: 2017/11/15
 */

  if(isset($_POST['select_tag']) || isset($_POST['search_input'])){
    // 搜索
    if($_POST['select_tag'] === '0'){
      // 无标签
      $query = "select * from " . DB_TABLE .
        " where episode='" . $_POST['search_text'] . "'" .
        " or name like '%" . $_POST['search_text'] . "%'" .
        " or des like '%" . $_POST['search_text'] . "%'" ;
    }else{
      // 有标签
      $query = "select * from " . DB_TABLE . " where tag_id=" . $_POST['select_tag'] .

      " and name like '%" . $_POST['search_text'] . "%'" .
      " or des like '%" . $_POST['search_text'] . "%'" .
      " or episode='" . $_POST['search_text'] . "'" ;
    }
  }else{
    $query = "select * from " . DB_TABLE;
  }

  $data = mysqli_query($dbc, $query)
    or die('Error data');
  $tag_query = "select * from " . DB_TAG;
?>

<!-- search module s -->
<form action="index.php" method="post">
  <input type="text" name="search_text" value="" />
  <select class="" name="select_tag">
    <option value="0">无</option>
  <?php
    $tag_data = mysqli_query($dbc, $tag_query)
      or die('error tagdata');
    while($tag_row = mysqli_fetch_array($tag_data)){
      echo '<option value="' . $tag_row['tag_id'] . '">' . $tag_row['name'] . '</option>';
    }
  ?>
  </select>
  <input type="submit" value="搜索" />
</form>
<!-- search module e -->

<!-- table module s -->
<table>
  <tbody>
    <tr>
      <td>集数</td>
      <td>名字</td>
      <td>描述</td>
      <td>标签</td>
      <td>操作</td>
    </tr>
    <?php
      // 输出表格
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
    ?>
  </tbody>
</table>
<!-- table module e -->
