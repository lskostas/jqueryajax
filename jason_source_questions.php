<?php

$link = mysql_pconnect("localhost", "root", "iri2010") or die("Could not connect");
mysql_select_db("rest") or die("Could not select database");
 

// bring questions in json
$arr_countries = array();
$rsc = mysql_query("select * from wiki");
while($obj3= mysql_fetch_array($rsc)) {
 $arr2[] = $obj3;  
}

echo '{"questions":'.json_encode($arr2).'}';


?>