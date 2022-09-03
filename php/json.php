<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>JSON</title>
  <script>
    function json() {
      // let users = ["张三", "李四", "王五", "赵六", "田七"];
      //
      // for (let i = 0; i < users.length; i++) {
      //   document.write(users[i]);
      // }

      // let users = {name: "张三", sex: "男", age: 20, phone: "18312345678", addr: "苏州"};
      // document.write(users.name);

      // let user1 = {name: "张三", sex: "男", age: 20, phone: "18312345678", addr: "苏州"};
      // let user2 = {name: "李四", sex: "女", age: 22, phone: "13112345678", addr: "南京"};
      // let users = [user1, user2];
      // document.write(users[0].name);
      // document.write(users[0]["name"]);

      // let users = [{name: "张三", sex: "男", age: 20, phone: "18312345678", addr: "苏州"},
      //   {name: "李四", sex: "女", age: 22, phone: "13112345678", addr: "南京"}];
      // document.write(users[1].name);

      let users = {user1: ["张三", "男", 20, "18312345678", "苏州"], user2: ["李四", "女", 22, "13112345678", "南京"]};
      document.write(users.user1[3]);
    }
  </script>
</head>
<!--<body onload="json()">-->
<body>
  <?php
  // 引用 common.php，如果之前已经引用则不再引用
  // require_once("common.php");
  // include_once("common.php");
  //
  // $conn = create_connection();
  // $sql = "select articleid, author, headline, viewcount, createtime from article where articleid < 30;";
  // $result = mysqli_query($conn, $sql);
  // $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
  //
  // echo json_encode($data);

  // $student01 = array('name' => '张三', 'age' => 30, 'addr' => '成都高新区', 'phone' => '18812345678');
  // $student02 = array('name' => '李中', 'age' => 30, 'addr' => '成都高新区', 'phone' => '18912345676');
  // $student03 = array('name' => '王九', 'age' => 25, 'addr' => '成都高新区', 'phone' => '19812345678');
  // $student04 = array('name' => '赵六', 'age' => 30, 'addr' => '成都高新区', 'phone' => '18112345679');
  // $student05 = array('name' => '周七', 'age' => 27, 'addr' => '成都高新区', 'phone' => '18812345978');
  // $class01 = array($student01, $student02, $student03, $student04, $student05);
  // echo json_encode($class01); // JSON 序列化，将变量或对象转换成字符串

  // JSON 反序列化
  $string = '[{"name":"\u5f20\u4e09","age":30,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"18812345678"},{"name":"\u674e\u4e2d","age":30,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"18912345676"},{"name":"\u738b\u4e5d","age":25,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"19812345678"},{"name":"\u8d75\u516d","age":30,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"18112345679"},{"name":"\u5468\u4e03","age":27,"addr":"\u6210\u90fd\u9ad8\u65b0\u533a","phone":"18812345978"}]';
  $array = json_decode($string);
  print_r($array);
  ?>
</body>
</html>