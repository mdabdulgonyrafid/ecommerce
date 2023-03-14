<?php
include("autoloader.php");

session_start();
date_default_timezone_set("Asia/Dhaka");

  $H = (date("H")+1);



 $extended1hr = date("Y-m-d ".$H.":i:s");
 
 $timerH= date("Y-m-d H:i:s");
 
 
if(!isset($_SESSION["number"])){
header("location:../");
}
if(is_numeric($_SESSION["number"])){
$numur=$_SESSION["number"];
}else{
$numur="000000000";
}

$code=$_POST["code0"].$_POST["code1"].$_POST["code2"].$_POST["code3"].$_POST["code4"].$_POST["code5"];

if(is_numeric($code)){

$sql=mysqli_query($conn,"SELECT uniq_id FROM user_credintial WHERE email='$numur' AND verify_code='$code'");

		

				
				
				
if(mysqli_num_rows($sql)==1){

mysqli_query($conn,"UPDATE user_credintial SET verify_code='V' WHERE email='$numur'");

//reseting 0;
mysqli_query($conn,"UPDATE user_credintial SET reset_block='0' WHERE email='$numur'");

header("location:../login/?info='Account verification successful'");
}else{
$sql2=mysqli_fetch_array(mysqli_query($conn,"SELECT reset_block,reset_block_time FROM user_credintial WHERE email='$numur'"));

 $resetTime=$sql2["reset_block"];
 
//asd
		if($resetTime >= 10){
		
		  $resetDateN=$sql2["reset_block_time"];
		if($resetDateN!=="N"){
		
		}else{
		
		
		
		mysqli_query($conn,"UPDATE user_credintial SET reset_block_time='$timerH' WHERE email='$numur'");
		}
		
		
$timestamp = $resetDateN;
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
     $h= $seconds." second";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       $h = "1 minute";  
     }  
     else  
           {  
       $h= $minutes." minutes";
     }  
   }  
      else if($hours <=1)  
      {  
     if($hours==1)  
           {  
       $hr= "c";
       $h= $hours." hour";
     }  
           else  
           {  
       $hr= "c";
            $h= $hours;
     }
     }else{
     
       $hr= "c";
         }  
		
		
		if($hr=="c"){
		mysqli_query($conn,"UPDATE user_credintial SET reset_block='0' WHERE email='$numur'");
			mysqli_query($conn,"UPDATE user_credintial SET reset_block_time='N' WHERE email='$numur'");
		}
		
		
		$infoCode="• Verification blocked for 1 hour (EST ".$h.")";
		
		
		
		}else{
		
		
		
 $plusR=($resetTime+1);
$infoCode="• Verification code is wrong. ".(10-$resetTime)." attempts left";

mysqli_query($conn,"UPDATE user_credintial SET reset_block='$plusR' WHERE email='$numur'");

}//asd


}


			
}


			

?>
<html>
<head>
          <meta name="viewport" content="width=device-width"/>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<title><?php echo getApp("app_name","./");?> Account Verification</title>

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


form {
  padding: 2rem;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0,0,0,.1);
  max-width: 400px;
  background: #fff;
  
  .form-control {
    display: block;
    height: 40px;
    margin-right: 1px;
    text-align: center;
    font-size: 1.1rem;
    min-width: 0;
    
    &:last-child {
      margin-right: 0;
    }
  }
}
</style>
<head>
<body>
<div class="nav_b">
<span class="name"><a style="color:gray;font-size: 20px;" href="../"><i class="fa-solid ic-err fa-arrow-left"></i></a>&nbsp;&nbsp;<?php echo getApp("app_name","./");?></span>
<div style="float:right;font-family:'Roboto';font-size:14px;margin-right:10px;margin-top:5px;color:rgba(255,255,255,.7);"><!--<a style="color:rgba(255,255,255,.7);" href="<?php echo getApp('domain','./');?>/login/ref=signup">Login</a>--></div>
</div>
</div>
<div class="inputBox">
<div align="center" style="font-family:'Oswald';margin-bottom:10px;">


<?php
$check=mysqli_fetch_array(mysqli_query($conn,"SELECT verify_code FROM user_credintial WHERE email='$numur'"))["verify_code"];


if($check=="V"){
$infoMasi=1;
			}

				 if($infoMasi==1){
?>

<h2>Thank you. Your account is verified successfully.</h2>
<?php }else{?>


<h2>Account Verification</h2>
<p>We have sent you a text message with a verification code at <b>(+880) <? echo substr($_SESSION["number"],1);?></b>. Please verify your account.</p>
<p class="errmsgS"><?php echo $infoCode;?></p>
</div> 
<!--
<form method="POST" autocomplete="off">

<label for="email2">Full name</label>
<div class="exInp">
<input type="text" id="email2" value="<? echo base64_decode($name);?>" size="33" name="name" placeholder=""/><i class="fa-solid ic-inp fa-signature"></i>
</div>

<input type="submit" value="Sign up" name="Login"/>
</form>

-->

<form method="POST" autocomplete="off">
  <h4 class="text-center mb-4">Enter your code</h4>
  <div class="d-flex mb-3">
    <input type="tel"  maxlength="1" name="code0" pattern="[0-9]" class="form-control">
    <input type="tel" name="code1" maxlength="1" pattern="[0-9]" class="form-control">
    <input type="tel" name="code2"  maxlength="1" pattern="[0-9]" class="form-control">
    <input type="tel"  name="code3"  maxlength="1" pattern="[0-9]" class="form-control">
    <input type="tel" name="code4"  maxlength="1" pattern="[0-9]" class="form-control">
    <input type="tel" name="code5"  maxlength="1" pattern="[0-9]" class="form-control">
  </div>
  <button type="submit" class="w-100 btn btn-primary">Verify account</button>
</form>

<?php }?>
</div>



<script src="java.js"></script>


<script>
/*
document.getElementById('code').addEventListener('keydown', (event) => {
  var name = event.key;
  var code = event.code;
  // Alert the key name and key code on keydown
  alert(`Key pressed ${name} \r\n Key code value: ${code}`);
}, false);

*/
const form = document.querySelector('form')
const inputs = form.querySelectorAll('input')
const KEYBOARDS = {
  backspace: 8,
  arrowLeft: 37,
  arrowRight: 39,
}

function handleInput(e) {
  const input = e.target
  const nextInput = input.nextElementSibling
  if (nextInput && input.value) {
    nextInput.focus()
    if (nextInput.value) {
      nextInput.select()
    }
  }
}

function handlePaste(e) {
  e.preventDefault()
  const paste = e.clipboardData.getData('text')
  inputs.forEach((input, i) => {
    input.value = paste[i] || ''
  })
}

function handleBackspace(e) { 
  const input = e.target
  if (input.value) {
    input.value = ''
    return
  }
  
  input.previousElementSibling.focus()
}

function handleArrowLeft(e) {
  const previousInput = e.target.previousElementSibling
  if (!previousInput) return
  previousInput.focus()
}

function handleArrowRight(e) {
  const nextInput = e.target.nextElementSibling
  if (!nextInput) return
  nextInput.focus()
}

form.addEventListener('input', handleInput)
inputs[0].addEventListener('paste', handlePaste)

inputs.forEach(input => {
  input.addEventListener('focus', e => {
    setTimeout(() => {
      e.target.select()
    }, 0)
  })
  
  input.addEventListener('keydown', e => {
    switch(e.keyCode) {
      case KEYBOARDS.backspace:
        handleBackspace(e)
        break
      case KEYBOARDS.arrowLeft:
        handleArrowLeft(e)
        break
      case KEYBOARDS.arrowRight:
        handleArrowRight(e)
        break
      default:  
    }
  })
})

</script>
</body>
</html>