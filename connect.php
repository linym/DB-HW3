<?php
$db_host = "dbhome.cs.nctu.edu.tw";
$db_name = "linym_cs";
$db_user = "linym_cs";
$db_password = "xup6u.4aup6";
$dsn = "mysql:host=$db_host;dbname=$db_name";
$db = new PDO($dsn, $db_user, $db_password);
?>