<?php 
session_start();
spl_autoload_register(fn($class)=>require_once $class.".php");
use phpmailer\phpmailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "vendor/autoload.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){ 
    var_dump($_POST);
    if(!empty($_POST["msg"])|| !empty($_POST["email"]) || !empty($_POST["Name"])){
        // initailzinf obj here
        $formprocesssor=new formErrorHandlerImp($_POST["Name"],$_POST["email"],$_POST["msg"]);
   try{
    // ensure that the data entered is valid throws an exception if not
    $formprocesssor->inputTypes();
    $formprocesssor->sendEmail(new PHPMailer);
   }catch(Exception $e){
    // storing the error  to display to the user
    $_SESSION["errors"]=$e->getMessage();
    echo  $_SESSION["errors"];
   }}else{
    try{
  
        throw new Inputerror("please fillout all the fields");
    }catch(Exception $e){
        $_SESSION["errors"]=$e->getMessage();
        echo  $_SESSION["errors"];
    }
}
}else{
    try{
  
        throw new Inputerror("Invalid request method");
    }catch(Exception $e){
        $_SESSION["errors"]=$e->getMessage();
        header();
        echo  $_SESSION["errors"];
        
        exit();
    }
}