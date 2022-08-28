<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <style>
    table {
      width: 800px;
      margin: auto;
      border: solid 1px green;
      border-spacing: 0;
    }

    td {
      height: 30px;
      border: solid 1px green;
    }
  </style>
  <title>文章列表</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <td>编号</td>
        <td>作者</td>
        <td>标题</td>
        <td>阅读</td>
        <td>时间</td>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "learn", 3306) or die("数据库连接不成功");
      mysqli_set_charset($conn, "utf8mb4");

      $sql = "select articleid, author, headline, viewcount, createtime from article where articleid < 10;";
      $result = mysqli_query($conn, $sql);

      // 将数据库查询的结果集中的数据取出，保存到一个数组中
      $rows = mysqli_fetch_all($result);

      // // 遍历结果集数据输出到页面
      // foreach ($rows as $row) {
      //     echo $row[0] . '-' . $row[1] . '-' . $row[2] . "<br>";
      // }

      // 遍历结果集数据在表格中显示

      foreach ($rows as $row) {
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td><a href='read.php?id=$row[0]'>$row[2]</a></td>";
        echo "<td>$row[3]</td>";
        echo "<td>$row[4]</td>";
        echo "</tr>";
      }

      mysqli_close($conn);
      ?>
    </tbody>
  </table>
</body>
</html>

