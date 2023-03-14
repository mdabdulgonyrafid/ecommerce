<?php
error_reporting(0);
/*
$host = "localhost";
$username = "root";
$password = "";
$database = "season_1";

foreach($dAr as $aa){
echo  $ab=end(explode("=", $aa));
}
*/
$farfrom=file_get_contents(".env");
$file = fopen("./Functions/.env","w");

 fwrite($file,$farfrom);
fclose($file);


 $ci=file_get_contents(".env");

$dAr=explode("\n", $ci);


  $host =  end(explode("=",$dAr[0]));
 $username =  end(explode("=",$dAr[1]));
 $password =  end(explode("=",$dAr[2]));
 $database =  end(explode("=",$dAr[3]));



$conn=mysqli_connect($host,$username,$password,$database);

if($conn){

}else{
echo "<b>MySQL connection error</b>";
}
