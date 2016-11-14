<html>
<head>
	<!-- 5menit -->
	<meta http-equiv="refresh" content="300">
	<title></title>
</head>
<body>
<?php
//MySQL connection parameters
$dbhost = 'localhost';
$dbuser = 'felix';
$dbpsw = '09081993';
$dbname = 'evote';

//Connects to mysql server
$connessione = @mysql_connect($dbhost,$dbuser,$dbpsw);

//Set encoding
mysql_query("SET CHARSET utf8");
mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");

//Includes class
require_once('MySQL-Dump-with-Foreign-keys-master/FKMySQLDump.php');

date_default_timezone_set("Asia/Bangkok");
$datetime = date('Y-m-d_H-i-s');
echo $filename = "backup/fk_dump($datetime).sql";
//Creates a new instance of FKMySQLDump: it exports without compress and base-16 file
$dumper = new FKMySQLDump($dbname, $filename ,false,false);

$params = array(
    //'skip_structure' => TRUE,
    //'skip_data' => TRUE,
);

//Make dump
$dumper->doFKDump($params);

?>
</body>
</html>
