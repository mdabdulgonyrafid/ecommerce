<?php 

    include("autoloader.php");
    
   // print_r($_COOKIE);
   
   
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
 		
 
$verifyLogin=mysqli_query($conn,"SELECT uniq_id FROM user_credintial WHERE cookie='$xs' AND uniq_id='$uid'");


$verifyLogin2=mysqli_query($conn,"SELECT uniq_id FROM user_credintial WHERE cookie='$xs' AND uniq_id='$uid' AND device_fingerprint='$fingerprintDev'");

if(mysqli_num_rows($verifyLogin)==1){
 		 
 		 if(mysqli_num_rows($verifyLogin2)==1){
 		 //echo "no need to set again";
 		 }else{
 mysqli_query($conn,"UPDATE user_credintial SET device_fingerprint='$fingerprintDev' WHERE cookie='$xs' AND uniq_id='$uid'");
 
 }
}else{
$info="not logged in";
}
//echo $_SERVER["HTTP_USER_AGENT"];



$xfs=$_COOKIE["fingerprint"];
$osx=os();
$uidjsjddj=$_COOKIE['uid'];

if($xfs=="" || $uidjsjddj==""){}else{
$gajdj=mysqli_query($conn,"SELECT id FROM devices WHERE device_fingerprint='$xfs' AND user_agent='$osx'");

if(mysqli_num_rows($gajdj)==1){

}else{
mysqli_query($conn,"INSERT INTO devices(id,device_fingerprint,user_agent,uid) VALUES (null,'$xfs','$osx','$uidjsjddj')");

echo mysqli_error($conn);

}
		}
		
		
     //file_include("");
          
          ?>
          
          <html translate="no">
          <head>
          <title><?php echo getApp("app_name","./");?>.&nbsp;Onilne used book store.</title>
          <link rel="preload" href="img.jpeg" as="image">
           <link rel="preload" href="ifnn.jpeg" as="image">
          <meta name="viewport" content="width=device-width"/>
          
         <?php echo google_fonts(true); ?>
          <style>
          *{
          margin:0;
          padding:0;
          }
          @media all and (min-width: 800px) {
          
    body{
    display: none;
    }
}
          img {
    pointer-events: none;
    width:100%;
}
         .top-head{
         width:100%;
         height:auto;
         background: rgba(18,25,33,255);
         color: #fff;
         
         }
        .name{
        padding:14px;
        padding-left: 20px;
        font-size:20px;
        font-family:'Berkshire Swash';
        color:;
        }
       .name a{
          text-decoration: none;
          color: rgba(255,255,255,.6);
          }
         .searchbox{
         padding:6px 0 6px 3px;
         margin-left: 5px;
         outline: none;
         }
         input::placeholder{
         color: #000;
         font-family:'Poppins';
         font-size:15px;
         }
         
        .ic-thin{
        font-weight: lighter;
        font-size: 25px;
        float: right;
        color: #fff;
        }
       .search_btn{
       outline: none;
       border: none;
       background: #4267B2;
       color: #fff;
       padding: 7px;
       border-radius: 3px;
       font-size:14px;
       font-weight: bold;
       }
      .secondNav{
      width:100%;
      height:auto;
      background: #3e8774;
      }
     .navBar{
     margin-left:15px;
    padding-bottom:10px;
    overflow: auto;
  white-space: nowrap;
  margin-right:15px;
     }
     
    .navBar a{
     color:#fff;
     text-decoration: none;
     font-family:'Nunito';
     font-size:15px;
     font-weight: bold;
    }
  .nava{
  margin-left: 15px;
  margin-right:15px;
  }
 .fContainer{
 width:100%;
 position: relative;
 
 
 }
.fContainer h1{
font-family:'Oswald';
padding:20px;
position: absolute;
  top: 0;
  left: 4%;
  color:#fff;
  /*transform: translate(-50%, -50%);*/

}

.fCp{
font-family:'Monsterrat';
padding:20px;
position: absolute;
  top: 42%;
  left: 4%;
  color:#000;
  /*transform: translate(-50%, -50%);*/

}
.sContainer{
position: relative;
}
.bookself{
position: absolute;
  top: 0;
  left: 4%;
  
  
}
.bookself h1{
font-family:'Roboto';
margin-left:10px;
padding-bottom:20px;
padding-top:10px;
font-weight: lighter;
color: #000;

}
   .bookInfo{
   width:110%;
   background: #fff;
   margin-left: 10px;
   padding:15px;
   border-radius: 5px;
   color:#000;
   margin-bottom: 5px;
   box-shadow: 0 3px 1px -1px rgba(0,0,0,.5);
   }
   
.fCp2{
font-family:'Lato';
padding:20px;
position: absolute;
  top: 67%;
  left: 41%;
  color: gray;
  font-size: 25px;
  font-weight: bold;
  /*transform: translate(-50%, -50%);*/

}
#spin {
  color: #fff;
}
#spin:after {
  content:"";
  animation: spin 4s linear infinite;
}
@keyframes spin {
  0% { content:"Good."; }
  /*10% { content:"dolor"; }
  20% { content:"sit"; }
  30% { content:"amet"; }
  40% { content:"consectetur"; }
  */
  60% { content: "Better."; }
 /* 60% { content: "elit"; }
  70% { content: "Hic"; }
  80% { content: "atque"; }
  90% { content: "fuga"; }
  */
  100% { content: "Best.";}
}
.bookRel{
font-family:'Nunito';
font-weight: bold;
margin-left:10px;
float: right;
/*border:1px solid black;*/
width:70%;

}



/*Universal CSS*/

.buynowbtn{
padding: 5px;
background: #4267B2;
color:#fff;
text-decoration: none;
border-radius: 4px;
font-size: 13px;
}
/**/
          </style>
          
      <body>
      
              <form method="GET" action="search.php"/>
      <div class="top-head">
      <div class="name">
        <i class="fa-solid fa-bars"></i>&nbsp;&nbsp;<a href="<?php echo getApp('domain','./');?>/?ref=nav_bar_logo"><?php echo getApp("app_name","./");?></a>

      <input type="text" size="17" name="query" class="searchbox" id="br" placeholder="Search Here"/> 
      
      <datalist id="br">
    <option value="Edge">
    <option value="Firefox">
    <option value="Chrome">
    <option value="Opera">
    <option value="Safari">
  </datalist>
  
  <button name="search_btn" class="search_btn" value="Submit">Find&nbsp;<i class="fa-solid fa-magnifying-glass"></i></button>
      <a href="./login/?back_link=homepage&ref=page.home">
      <i class="fa-regular ic-thin fa-circle-user"></i>
      </a>
      </div>
      <div class="navBar">
      <a href="#">Deals</a>  <a class="nava" href="#">Payment</a>  <a class="nava" href="#">Books</a><a class="nava" href="#">Code Redemption</a> <a class="nava" href="#">Contacts</a> <a class="nava" href="#">Ownership</a>
      </div>
      </div>
      
            </form>
            
            
<div class="fContainer">
<img src="img.jpeg" style="width:100%;height:30%;"/>
<h1>Best online book exchange and buy store</h1>
<p class="fCp"><b>Welcome</b> to Bangladesh's <b>first </b>online used book store.&nbsp;Buy old book's from this site at <b>low cost with delivery charge.</b></p>
<p class="fCp2"><?php getApp("app_name","./");?> <span style="font-size:18px;color:#000;">is&nbsp;</span><span id="spin"></span></p>
</div>
<div class="sContainer">

<div class="bookself">
<h1> Book's you may want</h1>

<div class="bookInfo">

<img src="tommy.jpeg" style="width:85px;height: 110px;"/> 


<div class="bookRel" onclick="location.href ='./pro/'">


<div style="float:right;"><img style="width:16px;height;16px;" src="icLove.jpg"/>
</div>


<div style="">Bangla 2nd Paper</div>


<div style="font-weight:300;margin-bottom:7px;">20 available</div>



<div style="margin-bottom:5px;">50Tk<sup style="color:rgba(0,0,0,.7);"><del>&nbsp;100Tk</del></sup>(-50% off)</div>
<a href="" class="buynowbtn">Buy now</a>





</div>

</div>





</div>
<img src="ifnn.jpeg" style="border-radius:30px 30px 0 0;"/>



</div>

      </body>
          </head>
          </html>