<?php
 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/phpmailer/src/SMTP.php';

enviarEmail();

function enviarEmail(){

    $name=$_POST['name'];
    $clave=$_POST['psw'];
    $equipo=$_POST['equipo'];
    $rol=$_POST['rol'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'gestordatavolley@hotmail.com';                     //SMTP username
        $mail->Password   = 'Voleibolmadrid2021';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('gestordatavolley@hotmail.com', 'Mailer');
        $mail->addAddress('gestordatavolley@gmail.com', 'Nuevo registro');     //Add a recipient
        /*$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        */
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nuevo registro';
        $mail->Body    = 'Usuario: ' .$name. '<br/>Clave: ' .$clave. '<br/>Equipo: ' .$equipo. '<br/>Rol: ' .$rol;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>