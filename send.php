

<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer\src\Exception.php';
    require 'PHPMailer\src\PHPMailer.php';
    require 'PHPMailer\src\SMTP.php';

    $mail = new PHPMailer(true);

    try {            
        $mail->isSMTP();                               //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'imh.shinehtetaung@gmail.com';                     //SMTP username
        $mail->Password   = 'kvneggrihwjmfsnp';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('imh.shinehtetaung@gmail.com');     //Add a recipient

        $message = 'Name: '.$name.'<br>'. 'Email: '.$email.'<br>'. 'Phone: '.$phone.'<br>'. 'Message: '.$message;

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Portfolio';
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 
            "<script>
                alert('Message has been sent');
                window.location.href = 'index.php';
            </script>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
