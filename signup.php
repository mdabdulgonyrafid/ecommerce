<?php
include("autoloader.php");
session_start();

$name= base64_encode($_POST["name"]);
$email= $_POST["email"];
$pass=md5($_POST["pwd"]);
$pass2=md5($_POST["pwd2"]);

if(ctype_alnum($_COOKIE['fingerprint'])){
 $fingerprintDev=$_COOKIE["fingerprint"];
}else{

}


$cookis=md5(rand());
$rand=rand(111111,999999);




if(isset($_POST["Signup"])){

$query=mysqli_query($conn,"SELECT * FROM user_credintial WHERE email='$email'");


echo mysqli_num_rows($query).$email;

$fQuery = mysqli_fetch_array($query);

$is_v = $fQuery["verify_code"];

$nume = $fQuery["email"];


		if($pass!==$pass2){
			
		
		}elseif(strlen($_POST["pwd"]) < 6){
		$infoPass6="• Password must be 6 characters";
	
}elseif(mysqli_num_rows($query)==1){
	
		if($is_v=="V"){
		$infoEmail="• This number is already in use";
	
	}else{
	mysqli_query($conn,"UPDATE user_credintial SET fullname='$name' WHERE email='$email'");
	
	mysqli_query($conn,"UPDATE user_credintial SET password='$pass' WHERE email='$email'");
	
	mysqli_query($conn,"UPDATE user_credintial SET cookie='$cookis' WHERE email='$email'");
	
	mysqli_query($conn,"UPDATE user_credintial SET verify_code='$rand' WHERE email='$email'");
	
	mysqli_query($conn,"UPDATE user_credintial SET fullname='$name' WHERE email='$email'");
	
	//mysqli_query($conn,"UPDATE user_credintial SET reset_block='0' WHERE email='$email'");
	
	
	$_SESSION["number"]=$email;
header("location:../verify/");
	//echo $is_v;
	
	}
	
	

	}else{

if(number_validation($email)[0]!==1){
	
	$infoEmail="• Invalid phone numb/er";
	
	}else{
	
	
	mysqli_query($conn,"INSERT INTO user_credintial(uniq_id,fullname,photo,class,email,phone,password,cookie,verify_code,login_block,reset_block,point,device_fingerprint,login_block_time,reset_block_time) VALUES(null,'$name',0,0,'$email',0,'$pass','$cookis','$rand',0,0,0,'$fingerprint',0,0)");
	$_SESSION["number"]=$email;
	
	echo "opem mew".mysqli_num_rows($query);
	header("location:../verify/");
	
	
	}

	






}



}

?>
<html>
<head>
          <meta name="viewport" content="width=device-width"/>
<title><?php echo getApp("app_name","./");?> Signup</title>

        <?php echo google_fonts(true); ?>
         
         
<style>
*{margin:0;padding:0;text-decoration:none;}
body{
margin:0;padding:0;text-decoration:none;
}
.nav_b{
    width:100%;
         height:auto;
         background: rgba(18,25,33,255);
         color: #fff;
         
         padding:15px 0 15px 0;
         }
        .name{
        color: rgba(255,255,255,.6);
        padding-left:10px;
       font-family:'Berkshire Swash';
         font-size: 20px;
         
}
.inputBox{
margin-top: 50px;
width:97%;
}
#email,#email2,#pwd2,#pwd{
padding:7px;
font-size:16px;
outline: none;
border: none;
}
.exInp{
border:1px solid rgba(0,0,0,.6);
width: 97%;
border-radius:3px;
margin-bottom:5px;
margin-left:10px;
}
input::placeholder{
font-size:16px;
}
.ic-inp{
margin-left: 10px;
color: rgba(0,0,0,.7);
}
label{
font-family:'Lato';
font-weight: bold;
margin-left:10px;
}
input[type=submit]{
margin-top:10px;
width:97%;
padding:7px 0 7px 0;
border: none;
outline: none;
color:#fff;
background: gray;
border-radius: 3px;
margin-left:10px;
}

a{
color: rgba(0,0,0,.7);
font-family: 'Roboto';
}
.errmsgS{
font-family:'Roboto';
margin-left:10px;
color: red;
}
</style>
<head>
<body>
<div class="nav_b">
<span class="name"><a style="color:gray;font-size: 20px;" href="./<?php echo $_GET['back_link'];?>"><i class="fa-solid ic-err fa-arrow-left"></i></a>&nbsp;&nbsp;<?php echo getApp("app_name","./");?></span>
<div style="float:right;font-family:'Roboto';font-size:14px;margin-right:10px;margin-top:5px;color:rgba(255,255,255,.7);"><a style="color:rgba(255,255,255,.7);" href="<?php echo getApp('domain','./');?>/login/ref=signup">Login</a></div>
</div>
</div>
<div class="inputBox">
<div align="center" style="font-family:'Oswald';margin-bottom:10px;">
<h2>Signup for an account</h2>
</div> 

<form method="POST" autocomplete="off">

<label for="email2">Full name</label>
<div class="exInp">
<input type="text" id="email2" value="<? echo base64_decode($name);?>" size="33" name="name" placeholder=""/><i class="fa-solid ic-inp fa-signature"></i>
</div>



<label for="email">Phone number</label>
<p class="errmsgS"><?php echo $infoEmail;?></p>

<div class="exInp">
<input type="number" id="email" value="<? echo $email;?>" size="" name="email" placeholder=""/><!--<i class="fa-solid ic-inp fa-at"></i>-->
</div>
<label for="pwd">Password</label>
<p class="errmsgS"><?php echo $infoPass6;?></p>
<div class="exInp">
<input type="text" id="pwd" name="pwd" size="33"  placeholder=""/><i class="fa-solid ic-inp fa-key" id="eye"></i>
</div>
<p id="msgRetype" style="font-family:'lato';margin-left:10px;color: red;font-weight:bold;"></p>
<label for="pwd2">Re-type password</label>
<div class="exInp">
<input type="text" id="pwd2" name="pwd2" size="33"  placeholder=""/><i class="fa-solid ic-inp fa-key" id="eye"></i>
</div>

<p style="font-family:'lato';margin-left:10px;">*By creating an account, you accept to our <b>terms and cookie</b> policies</p>
<input type="submit" value="Sign up" name="Signup"/>
<div style="margin-top:59px;text-align:center;">
<a href="../login/?ref=page.signup">Already have an account? Login here!!</a>
</div>
</form>
</div>



<script src="jquery.js"></script>
<script>
var pwd = document.getElementById('pwd');

var pwd2 = document.getElementById('pwd2');

document.querySelector('#pwd2').addEventListener("keyup",function(){
if(pwd.value !== pwd2.value){
document.getElementById('msgRetype').innerHTML= "Re-type password doesn’t match";
}else{
document.getElementById('msgRetype').innerHTML= "";
}
});
</script>
</body>
</html>