<?php
    require_once 'config/Connect.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    if( isset( $_COOKIE['login'] ) )
    {
        $json = json_decode( $_COOKIE['login'], true );
    }

    if( isset( $_POST['send'] ) )
    {
        $eposta = $functions->formControl( 'mail' );
        $insta = $functions->formControl( 'insta' );
        $tel = $functions->formControl( 'tel' );
        $message = $functions->formControl( 'message' );

        if( empty( $eposta ) || empty( $insta ) || empty( $tel ) || empty( $message ) )
        {
            echo '<b>Please, fill in the all blanks...</b>';
            exit();
        }

        else if( !filter_var( $eposta, FILTER_VALIDATE_EMAIL ) )
        {
            echo '<b>Please, check your e-mail address</b>';
            exit();
        }

        else
        {
            $mail = new PHPMailer();
            $mail->SMTPKeepAlive = true;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';

            $mail->Port = 587;
            $mail->Host = ''; // Mail sunucusunu giriniz

            $mail->Username = ''; // Buraya mailin geleceği adresi giriniz
            $mail->Password = ''; // buraya mailinizin şifresini giriniz

            $mail->setFrom( $eposta );
            $mail->addAddress( '' ); // Mailin gideceği adresi giriniz

            $mail->isHTML();
            $mail->Subject = 'Bizimle iletişim kurmak istedi';
            $mail->Body = '<div>'.$message.'<br /> Instagram Account: '.$insta.'<br /> Telephone Number: '.$tel.'</div>';

            if( $mail->send() )
            {
                echo '<p style="color: #ffffff; text-align: center;"><b>Successfull...</b></p>';
            }

            else
            {
                echo '<p style="color: #ffffff; text-align: center;"><b>Failed!!!</b></p>';
            }
        }
    }
?>