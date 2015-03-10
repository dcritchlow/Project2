<?php
echo '<span>dev </span>';

$db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'root', '');
$dbSqlite = new PDO('sqlite:'.$sourceDir.'/test.db') or die (' i died');