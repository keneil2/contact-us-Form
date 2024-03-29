<?php

class formErrorhandler {
    private string $Name;
    private string  $email; 
    private string $Msg;
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
  public function Inputerrorhandler(){
    if(empty($this->Name) || empty($this->email)||empty($this->Msg)){
       throw new Exception("please fill out all the fields in the form");
    }
  }
    public function inputTypes(){
    if(!preg_match("/[A-Za-z]/",$this->Name)){
      throw new Inputerror( "Name must be letters only A-z or A-z");
    }
    if(!preg_match("/^[A-Za-z]+[0-9]*\@[A-Za-z]+[.com]$/",$this->email)){
      throw new Inputerror("please check that you entered the right Email address");
    }
    if(!preg_match("/^[A-Za-z0-9\s.,!?']+$/", $this->Msg)){

    }
    }


}