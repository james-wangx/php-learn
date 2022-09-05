<?php
require_once "common.php";

$db = new DB();

// $rows = $db->query("select articleid, headline from article where articleid < 11;");
// print_r($rows);

$db->modify("update article set headline='你好新标题' where articleid=10;");
