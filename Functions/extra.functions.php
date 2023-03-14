
<?php


function number_validation($number){
if(strlen($number)=="14"){

$is_plus_sign = substr($number, 0, 1);

if($is_plus_sign=="+"){

 $final = substr($number, 3, 11);
 
 return [1,$final];
 
}

}elseif(strlen($number)=="11"){


 $final = $number;
 return [1,$final];
}elseif(strlen($number)=="10"){


 $final = "0".$number;
return [1,$final];
}else{

return " Invalid number";
}

}


//echo number_validation("+8801611473920")[0];