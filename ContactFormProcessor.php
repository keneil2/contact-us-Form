<?php
use phpmailer\phpmailer\PHPMailer; 
spl_autoload_register(fn($class)=>require_once $class.".php");
require_once "vendor/autoload.php";
class ContactFormProcessor{
    protected string $Name;
    protected string  $email; 
    protected string $Msg;
   public function  __construct($Name,$email,$Msg){
   $this->Name=$Name;
   $this->Msg=$Msg;
   $this->email=$email;
   }
   public function getName(){
    return $this->Name;
    } 
    public function getemail(){
    return $this->email;
    }
    public function getMsg(){
     return $this->Msg;
    }
   public  function sendEmail(PHPMailer $pHPMailer){
    $mail=new PHPMailer(true);
    $mail->SMTPDebug=SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host="smtp.gmail.com";
   }
}