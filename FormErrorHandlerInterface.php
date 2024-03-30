<?php 
interface FormErrorHandlerInterface{
    public function inputTypes(); // throws an exception if user dont enter right info
    // public function Inputerrorhandler(); // throws an exception if the data entered by the user is incorrect

}