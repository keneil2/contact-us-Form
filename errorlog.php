<?php 
function custom_exceptionhandler($exception){
$message="[".date("Y-m-d H:i:s")."]".$exception->getMessage()."file name is ".$exception->getFile()."Line".$exception->getLine()."\n";
error_log($message,3,"errorlog.txt");
require_once "error.view.php";
// echo "cant process this page at the moment try again later";
}

function errorhandler($massage,$file,$line){
 $Message=$massage.$file.$line;
 error_log($Message,3,"errorlog.txt");
 require_once "error.view.php";

//  echo "unable to Process the page try again later";
}