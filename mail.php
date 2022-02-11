<?php
require_once 'SMTP.php';
require_once 'PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail {
    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer;    
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp-mail.outlook.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'lutherie.105guitars@outlook.com'; 
        $this->mail->Password   = '';
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port       = 587;

        $this->mail->From = 'lutherie.105guitars@outlook.com';
        $this->mail->setFromName = '105Guitars';
    }

    public function sendEmail($email, $subject, $body, $name="", $surname="") {
        $this->mail->addAddress($email, $name." ".$surname);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->send();
    }

   
}

?>
