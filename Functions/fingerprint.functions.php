<?php
if($_COOKIE["fingerprint"]==""){
$fingerprint = md5(rand());

setcookie("fingerprint", $fingerprint, time() + (86400 * 1000), "/",httponly:true); // 86400 = 1 day
}



function os(){
  $dataAgent= strtolower($_SERVER["HTTP_USER_AGENT"]);


$system=explode("|",'Android|\biPhone.*Mobile|\biPod|\biPad|webOS|hpwOS|linux x86_64');

for($i=0;$i<=count($system);$i++){


 $system[$i];


$fi = is_numeric(stripos($dataAgent,strtolower($system[$i])));

if($fi){

return $os=$system[$i];
}

}

}


//echo $_COOKIE["fingerprint"];

