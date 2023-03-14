<?php
    function getApp($obj,$path=0){
    
    if($path==0){
    echo "getApp() second parameter is missing";
    }
    
$json = file_get_contents($path."/variables.json");
/*
$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump(json_decode($json));
var_dump(json_decode($json, true));
*/

echo json_decode($json,true)[$obj];
}

//getApp();
?>