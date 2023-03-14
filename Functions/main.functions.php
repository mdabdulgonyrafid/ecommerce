<?php


$list=(scandir(__DIR__));

for($i=0;$i < count($list);$i++){

  $ifDir=end(explode(".",$list[$i]));

if($ifDir!="php"){

}elseif($list[$i]=="README.md"){

}elseif($list[$i]=="main.functions.php"){

}else{

//echo $listVal= $list[$i];

include($list[$i]);


}

}