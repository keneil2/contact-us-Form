<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use ParagonIE\Certainty\RemoteFetch;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "errorlog.php";
echo $flase;
set_exception_handler("custom_exceptionhandler");
set_error_handler("errorhandler");
spl_autoload_register(function ($class) {
    if (file_exists($class . ".php")) {
        require_once $class . ".php";
    } else {

    }
});
require_once "vendor/autoload.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // var_dump($_POST);
    if (!empty($_POST["msg"]) || !empty($_POST["email"]) || !empty($_POST["Name"]) || !empty($_POST["MsgDescription"])) {
        // initailzinf obj here
        $formprocesssor = new formErrorHandlerImp($_POST["Name"], $_POST["email"], $_POST["msg"], $_POST["MsgDescription"]);
        try {
            // ensure that the data entered is valid throws an exception if not
            $formprocesssor->inputTypes();
            $formprocesssor->sendEmail(new PHPMailer);
            $_SESSION["feedback"] = "Message sent!!";
            header("Location:contactUs.php");
            exit;
        } catch (Inputerror $e) {
            // storing the error  to display to the user
            $_SESSION["errors"] = $e->getMessage();
            error_log($e->getMessage(), 3, "clientsideError.txt");
            header("Location:contactUs.php");
            exit;
        }
    } else {
        try {

            throw new Inputerror("please fillout all the fields");
        } catch (Inputerror $e) {
            $_SESSION["errors"] = $e->getMessage();
            error_log($e->getMessage(), 3, "clientsideError.txt");
            header("Location:contactUs.php");
            exit;
        }
    }
} else {
    try {

        throw new Inputerror("Invalid request method");
    } catch (Inputerror $e) {
        $_SESSION["errors"] = $e->getMessage();
        header("Location:contactUs.php");
        error_log($e->getMessage(), 3, "clientsideError.txt");
        exit();
    }
}
