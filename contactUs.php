<?php session_start()  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Document</title>
</head>
<body>
    <div class="container"> 
        <center><h2>GET IN TOUCH</h2>
        <?php if (isset($_SESSION["feedback"])){
            ?>
            <p class="feedback"><?= $_SESSION["feedback"] ?></p>
           <?php }elseif(isset( $_SESSION["errors"])){
            ?><p class="errors"><?=  $_SESSION["errors"] ?></p>
            <?php } unset( $_SESSION["errors"]);
            unset($_SESSION["feedback"]);
            ?></center>
    <div class="form">
       
        <form action="index.php" method="POST">
      <input type="text" placeholder="Enter Your Name" name="Name"><br>
      <input type="email" placeholder="Enter Your email" name="email"><br>
     <input type="text" placeholder="What is the Message about ?" name="MsgDescription"><br>
     <textarea name="msg" id="" cols="40" rows="5" placeholder="please Enter Your Message"></textarea><br>
      <button type="submit">send message</button></div>
    </form></div>
</body>
</html>