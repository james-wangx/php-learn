<?php
/**
 * 使用 PHP 执行操作系统命令
 * 1、使用反引号直接执行
 */
$result = `net start MySQL57`;
$result = iconv("GBK", "UTF-8", $result);
echo $result;