<?php
use PHPMailer\PHPMailer\PHPMailer;
use ParagonIE\Certainty\RemoteFetch;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


spl_autoload_register(function ($class) {
    if (file_exists($class . ".php")) {
        require_once $class . ".php";
    }else{
        require_once "vendor/autoload.php";
    }
});
class ContactFormProcessor{
    protected string $Name;
    protected string  $email; 
    protected string $Msg;
    protected string $Msgdescription;
   public function  __construct($Name,$email,$Msg,$Msgdescription){
   $this->Name=$Name;
   $this->Msg=$Msg;
   $this->email=$email;
   $this->Msgdescription=$Msgdescription;
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
    public function getMsgdescription(){
        return $this->Msgdescription;
       }
   public  function sendEmail(PHPMailer $PHPMailer){
    // try{
    // server setting here 
    $mail= $PHPMailer;
    $mail->SMTPOptions = [
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ]
    ];
    $mail->SMTPDebug = 0;                      
    // calling the method that sends the email 
   $mail->isSMTP();
   // setting the smtp host
   $mail->Host = gethostbyname('smtp.gmail.com'); 
   // ensuring it is secure
   $mail->SMTPAuth = true; 
   $mail->SMTPSecure = "tls";
   // the port used to send the email
   $mail->Port = 587; 
   // the senders email this is where the emails are send from
   $mail->Username = 'keneilsamms85@gmail.com';
   // app password
   $mail->Password = 'mkpo pugz pqzr hdzf';
   $mail->setFrom('keneilsamms85@gmail.com');
    // recipient
    $mail->addAddress("keneilsamms23@gmail.com",$this->getName());
    $mail->addReplyTo($this->email,$this->Name);
    // content of the email
    $mail->isHTML(true);
    $mail->Subject = $this->getMsgdescription();
    $mail->Body    = $this->getMsg();
    $mail->AltBody =  $this->getMsg();
    $mail->send();
    }
}