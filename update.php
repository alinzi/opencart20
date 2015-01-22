<?php
header('Content-Type: text/html; charset=utf-8');
include_once('config.php');
require_once(DIR_SYSTEM . 'startup.php');

$json_str=file_get_contents('http://api.dangqian.com/apidiqu2/api.asp?id=000000000000');
//echo $json_str;exit();
$json=substr($json_str,9,-1);

$json=json_decode($json,TRUE);
$area=$json['list'];
//var_dump($area);

$area_code=array();

for ($i=1; $i <count($area)+1 ; $i++) { 
	$area_code[$area['wjr'.$i]['diming']]=$area['wjr'.$i]['daima'];
	
}

var_dump($area_code);

$db = new DB(DB_DRIVER, DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

$query = $db->query("SELECT * FROM `zone` order by zone_id asc");

foreach ($query->rows as $result) {
	echo $result['name']."<br>";
}
?>