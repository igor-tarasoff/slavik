<?php
    use PHPMAiler\PHPMailer\PHPMailer;
    use PHPMAiler\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    //от кого
    $mail->setForm('тут почта', 'Саятор');
    //кому
    $mail->addAddress('тут почта');
    //Тема письма
    $mail->Subject = "Письмо с сайта"


    $body = '<h1>Вам письмо, хозяин</h1>';

    if(trim(!empty($_POST['name']))) {
        $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['email']))) {
        $body.='<p><strong>Email:</strong> '.$_POST['email'].'</p>';
    }
    if(trim(!empty($_POST['message']))) {
        $body.='<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
    }

    $mail->Body = $body;

    if (!$mail->send()) {
        $message = 'Error';
    } else {
        $message = 'Done!';
    }

    $response = ['message' => $mesage];

    header('Content-type: application/json');
    echo json_encode($response);

?>