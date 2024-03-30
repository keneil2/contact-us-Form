<?php
spl_autoload_register(function ($class) {
  if (file_exists($class . ".php")) {
      require_once $class . ".php";
  }else{
      require_once "vendor/autoload.php";
  }
});
class formErrorHandlerImp extends ContactFormProcessor  implements FormErrorHandlerInterface {
   public function getName(){
   return $this->Name;
   } 
   public function getemail(){
   return $this->Name;
   }
   public function getMsg(){
    return $this->Msg;
   }
   public function getMsgdescription(){
    return $this->Msgdescription;
   }
 // ensure that the inputs are not empty  
  //  public function inputErrorHandler(){
  //   if(empty($this->Name) || empty($this->email)||empty($this->Msg)){
  //     var_dump($_POST);
  //      throw new  Inputerror("please fill out all the fields in the form");
  //   }
  // }
  //  throws an error if the inputs are not valid   
    public function inputTypes(){
    if(!preg_match("/[A-Za-z]/",$this->Name)){
      throw new Inputerror( "Name must be letters only A-z or A-z");
    }
    if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      throw new Inputerror("please check that you entered the right Email address");
    }
    if(!preg_match("/^[A-Za-z0-9\s.,!?']+$/", $this->Msg)){
      throw new Inputerror("please check that you entered the right Email address");
    } 
    }


}