<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
//Create an instance; passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'ssl://smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'leylamatar10@gmail.com';                     //SMTP username
    $mail->Password   = 'thjkwiujvqpmwndx';                               //SMTP password
    $mail->CharSet       = "utf8";   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Alıcı
    $mail->setFrom($_POST["email"], $_POST["firstName"] . " " .$_POST["lastName"]);
    $mail->addAddress('leylamatar10@gmail.com');     //Add a recipient
    $mail->addReplyTo($_POST["email"], $_POST["firstName"]);
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST["message"];
    $mail->Body    = '<div> From : ' . $_POST["firstName"]." ". $_POST["lastName"] .'<br>'.
    ' Phone Number : ' . $_POST["phone"] . 
    '<br>E-mail :'.$_POST["email"]. '<br>Message: '.
     $_POST["message"] .
      '</div>';
    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
 
 
 <!DOCTYPE html>
 <head>
 <title>Nur Interior Architecture</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="descreption" content="Nur Interior Architecture">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
 </head>
 <body>
 <section id="section-wrapper">
        <div class="box-wrapper">
            <div class="info-wrap">
                <h2 class="info-title"> Contact information</h2>
                <h3 class="info-sub-title">I am based in Turkey, Istanbul.
                    You can contact me via the form
                    or,</h3>
                <ul class="info-details">
                    <li>
                        <i class="fa fa-phone"></i>
                        <span>phone: </span> <a href="tel: 0 555-555-55-55">0 555-555-55-55</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>
                        <span>Email: </span> <a href="Email: nur@gmail.com">nur@gmail.com</a>
                    </li>
                    <li>
                        <i class="fa fa-street-view"></i>
                        <span>city: Istanbul </span>
                    </li>
                </ul>
                <ul class="social-icons">
                    <li><a href="#"> <i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"> <i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"> <i class="fa fa-facebook"></i></a></li>

                </ul>
            </div>
            <div class="form-wrap">
                <form action="mail.php" method="POST" >
                    <h2 class="form-title"> Send me a message</h2>
                    <div class="form-fields">
                        <div class="form-group">
                            <input type="text" name="firstName" class="fname" placeholder="First Name" >
                        </div>
                        <div class="form-group">
                            <input type="text" name="lastName" class="lname" placeholder="Last Name" >
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="email" placeholder="Your E-mail" >
                        </div>
                        <div class="form-group">
                            <input type="Phone" name="phone" class="phone" placeholder="Your phone number" >
                        </div>
                        <div class="form-group">
                            <textarea name="message" id=" " placeholder="Write your message"></textarea>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Send message" class="submit-button">
                </form>

            </div>
        </div>
    </section>

    </body>

 </html>
 
 
