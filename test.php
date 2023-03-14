<?php

$number="1411473920";



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
$num=number_validation($number)[1];

function getSim($number){

 $threeDigit=substr($number, 0, 3);
 
switch($threeDigit){
case "013";

 echo "Grameenphone v013 or Sikkito";

break;

case "014";

 echo "Banglalink v014";

break;


case "015";

 echo "TeleTalk";

break;

case "016";

 echo "Airtel";

break;

case "017";

 echo "Grameenphone";

break;

case "018";

 echo "Robi";

break;

case "019";

 echo "Banglalink";

break;
default:
	echo "SIM card must be Bangladeshi";

}
}

//echo getSim($num);




echo "@@@@@@";

$timestamp= "2023-03-13 15:30:50";
 date_default_timezone_set('Asia/Dhaka');  
// echo facebook_time_ago();  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );   
      $hours           = round($seconds / 3600); 
      $days          = round($seconds / 86400); 
      $weeks          = round($seconds / 604800);
      $months          = round($seconds / 2629440);    
   
      $years          = round($seconds / 31553280);   
      if($seconds <= 60)  
      {  
     echo "$seconds second ago";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       echo "1m";  
     }  
     else  
           {  
       echo $minutes."m";
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       echo "1hr";
     }  
           else  
           {  
       echo $hours."hr";  
     
     }
     }  
   
     /*
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       echo "Yesterday";  
     }  
           else  
           {  
       echo "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       echo "A week ago";  
     }  
           else  
           {  
       echo "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       echo "A month ago";  
     }  
           else  
           {  
       echo "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       echo "1 year ago";  
     }  
           else  
           {  
       echo "$years years ago";  
     }  
   }  
   */