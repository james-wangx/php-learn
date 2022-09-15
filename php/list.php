<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="static/css/list.css">

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
  <script src="static/js/article.js"></script>

  <title>文章列表</title>
</head>
<body>
  <?php
  session_start();

  if (!(isset($_SESSION["is_login"]) and $_SESSION["is_login"] === "true")) {
    die("请先登录！");
  }
  ?>

  <table>
    <thead>
      <tr>
        <td>编号</td>
        <td>作者</td>
        <td>标题</td>
        <td>阅读</td>
        <td>时间</td>
        <td>操作</td>
      </tr>
    </thead>
    <tbody>
      <?php
      $conn = mysqli_connect("localhost", "root", "mysql", "learn", 3306) or die("数据库连接不成功");
      mysqli_set_charset($conn, "utf8mb4");

      $sql = "select articleid, author, headline, viewcount, createtime from article;";
      $result = mysqli_query($conn, $sql);

      // // 将数据库查询的结果集中的数据取出，保存到一个数组中
      // $rows = mysqli_fetch_all($result);
      // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC); // 使用关联数组

      // // 遍历结果集数据在表格中显示
      // foreach ($rows as $row) {
      //   echo "<tr>";
      //   echo "<td>$row[0]</td>";
      //   echo "<td>$row[1]</td>";
      //   echo "<td><a href='read.php?id=$row[0]'>$row[2]</a></td>";
      //   echo "<td>$row[3]</td>";
      //   echo "<td>$row[4]</td>";
      //   echo "<td><button>删除</button></td>";
      //   echo "</tr>";
      // }

      // mysqli_fetch_array: 获取一行数据，每次调用都会返回下一行数据，直到没有数据后返回 null
      while (($row = mysqli_fetch_array($result)) !== null) {
        echo "<tr>";
        echo "<td>$row[articleid]</td>";
        echo "<td>$row[author]</td>";
        echo "<td><a href='read.php?id=$row[articleid]'>$row[headline]</a></td>";
        echo "<td>$row[viewcount]</td>";
        echo "<td>$row[createtime]</td>";
        echo "<td><button onclick='deleteArticle($row[articleid])'>删除</button></td>";
        // echo "<td><a href='delete.php?articleid=$row[articleid]'>删除</a></td>";
        echo "</tr>";
      }

      mysqli_close($conn);
      ?>
    </tbody>
  </table>
</body>
</html>