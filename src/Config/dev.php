<?php
echo '<span>dev </span>';

$db = new PDO('mysql:host=localhost;dbname=testdb;charset=utf8', 'root', '');
//$dbSqlite = new SQLite3('test');
//$dbSqlite = new SQLite3('test.db');
//$dbSqlite = sqlite_open('test.db');
//$mydb = new SQLite3('test.db');
//phpinfo();


$dbSqlite = new PDO('sqlite:'.$sourceDir.'/test.db') or die (' i died');

//$mydb = new SQLite3('data');

//$projectDir = dirname(__FILE__);
//$projectDir = realpath($projectDir.DIRECTORY_SEPARATOR.'..');

//echo $sourceDir;


//echo 'sqlite:'.$sourceDir.'/testdb.sqlite';