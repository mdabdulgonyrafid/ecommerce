<?php
function file_include($tookfromme){
    $file=$tookfromme;
           if(file_exists($file)){
       include($file);
       }elseif($file==""){
       
           
           
           
       echo "[!] Including a file cannot be empty";
           
           
       
            }else{
          
           echo "[!] Included (".$file.") file missing";
       
          }
          
          }
          
          
          