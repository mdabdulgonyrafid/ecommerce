<?php
include("autoloader.php");
session_start();
$info="";
if(ctype_alnum($_COOKIE['xs'])){
  $xs=$_COOKIE["xs"];
}else{

}
if(ctype_alnum($_COOKIE['uid'])){
 $uid=$_COOKIE["uid"];
}else{

}
 
 if(ctype_alnum($_COOKIE['fingerprint'])){
 $fingerprintDev=$_COOKIE["fingerprint"];
}else{

}



$emailV=$_POST["email"];

 
 
$pwd=md5($_POST["pwd"]);



$verifyLogin=mysqli_query($conn,"SELECT uniq_id FROM user_credintial WHERE cookie='$xs' AND uniq_id='$uid'");

if(mysqli_num_rows($verifyLogin)==1){
header("location:../?ref=push_back_from_loginpage");
}
if(isset($_POST["Login"])){

if (preg_match("/^[0-9+]+$/i", $_POST['email'])) {
       
$email=$_POST["email"];
    }else{
 $infoEmail="only number allowed";
 $email="";
 }
 
	$sql=mysqli_query($conn,"SELECT email,password,cookie,device_fingerprint,uniq_id,verify_code FROM user_credintial WHERE email='$email' AND password='$pwd'");
			$is_num=number_validation($email);
			if($is_num[0] == 1){
	if(mysqli_num_rows($sql)==1){
	
	
		$fSql=mysqli_fetch_array($sql);
		 $iddd=$fSql["uniq_id"];
		
		 $cookie=$fSql["cookie"];
		 $getV=$fSql["verify_code"];
		 
		 
		 
		 if($getV!=="V"){
		 $_SESSION["number"]=$email;
		 header("location:../verify.php");
		 }else{
		 
		 
		 
	setcookie("uid", $iddd, time() + (86400 * 30 * 12), "/",httponly:false);
	
	setcookie("xs", $cookie, time() + (86400 * 30 * 12), "/",httponly:true);
	
	


	
	 $dataFinger=$fSql["device_fingerprint"];
	 
	 if($dataFinger !==  $fingerprintDev){
	 
	 mysqli_query($conn,"UPDATE user_credintial SET device_fingerprint='$fingerprintDev' WHERE cookie='$xs' AND uniq_id='$uid'");
	 }else{
	 
	 }
	
	header("location:./");
	
	
	}
	}else{
		$sqlEmailCheck=mysqli_query($conn,"SELECT uniq_id FROM user_credintial WHERE email='$email'");
			
	$ddskxjxbnd=mysqli_num_rows($sqlEmailCheck);
	if($ddskxjxbnd==1){
	
	$infoPass="• Seems that password is wrong";
	}else{
	
	
	$infoEmail="• The number isn’t registered with an account";
	
	}
	
	
	
	}
	
	}else{
	
	$infoEmail=" • Invalid number";
	
	}
	
	
	
}
?>
<html>
<head>
          <meta name="viewport" content="width=device-width"/>
<title><?php echo getApp("app_name","./");?> Login</title>

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
#email,#pwd{
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
<span class="name"><a style="color:gray;font-size: 20px;" href="../<?php echo $_GET['back_link'];?>"><i class="fa-solid ic-err fa-arrow-left"></i></a>&nbsp;&nbsp;<?php echo getApp("app_name","./");?></span>
<div style="float:right;font-family:'Roboto';font-size:14px;margin-right:10px;margin-top:5px;color:rgba(255,255,255,.7);"><a style="color:rgba(255,255,255,.7);" href="<?php echo getApp('domain','./');?>/signup/?back_link=../login&ref=page.login">Sign up</a></div>
</div>
</div>

<div class="inputBox">
<div align="center" style="font-family:'Oswald';margin-bottom:10px;">
<h2>Login to continue</h2>
<p style="color:green"><?php echo htmlspecialchars($_GET["info"]);?></p>
</div> 


<form method="POST">
<label for="email">Phone number</label>
<p class="errmsgS"><?php echo $infoEmail;?></p>
<div class="exInp">
<input type="text" id="email" value="<? echo $_POST['email'];?>" size="33" name="email" placeholder=""/><i class="fa-solid ic-inp fa-at"></i>
</div>
<label for="pwd">Password</label>
<p class="errmsgS"><?php echo $infoPass;?></p>
<div class="exInp">
<input type="text" id="pwd" name="pwd" size="33"  placeholder=""/><i class="fa-solid ic-inp fa-eye" id="eye"></i>
</div>
<input type="submit" value="Login" name="Login"/>
<div style="margin-top:59px;text-align:center;">
<a href="../signup/?back_link=../login&ref=page.login">Don't have an account? Sign up here!</a>
</div>
</form>
</div>



<script>
var eye = document.querySelector('#eye');
var inp = document.querySelector('#pwd');
eye.addEventListener("click",function(){
if(eye.getAttribute('class')=="fa-solid ic-inp fa-eye"){

eye.setAttribute('class','fa-solid ic-inp fa-eye-slash');
inp.setAttribute('type','password');

}else{

eye.setAttribute('class','fa-solid ic-inp fa-eye');
inp.setAttribute('type','text');

}
});
</script>
</body>
</html>