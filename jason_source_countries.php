<?php

$link = mysql_pconnect("localhost", "root", "iri2010") or die("Could not connect");
mysql_select_db("rest") or die("Could not select database");
 
// brings the users in jason
//$arr = array();
//$rs = mysql_query("SELECT * FROM user");
//while($obj = mysql_fetch_object($rs)) {
//$arr[] = $obj;
//}

// bring countries in json
$arr_countries = array();
$rsc = mysql_query("select * from countries");
while($obj2= mysql_fetch_array($rsc)) {
 $arr2[] = $obj2;  
}

//echo '{"members":'.json_encode($arr).'}';
echo '{"countries":'.json_encode($arr2).'}';
//echo json_encode($arr2);


?>