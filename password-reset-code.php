<?php
session_start();
include('admin/db_connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function send_password_reset($get_name,$get_email,$password)
{
    $mail = new PHPMailer(true);

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';     
                              //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', $get_name);
    $mail->addAddress($get_email); 
        //Add a recipient

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); 

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Reset password notification";
  $email_template = "
    <h2>Hello</h2>
    <h3>you are receiving this email because of password reset request.</h3>
    <br></br>
    <a href='http://localhost/auction/password-change.php?token=$password&email= $get_email'>  click me</a>
    ";
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
}


if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5((rand()));

    $check_email = "SELECT name,email FROM users WHERE email= '$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_password = "UPDATE users SET password = '$password' WHERE email = '$get_email' LIMIT 1";
        $update_password_run = mysqli_query($conn, $update_password);

        if ($update_password_run)
        {
            send_password_reset($get_name, $get_email, $password);
            $_SESSION['status'] ="we emailed you a password reset link";
            header("Location: password-reset.php");
            exit(0);
        }
        else
        {
            $_SESSION['status'] ="something went wrong. #1";
            header("Location: password-reset.php");
            exit(0);

        }
    }
    else
    {

        $_SESSION['status'] ="no email found";
        header("Location: password-reset.php");
        exit(0);
    }

}

if(isset($_POST['password_update']))
{
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $new_password= mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password= mysqli_real_escape_string($con, $_POST['confirm_password']);

    $password= mysqli_real_escape_string($con, $_POST['password_token']);

    if(!empty(($password)))
    {
        if(!empty($email)&& !empty($new_password) && !empty($confirm_password))
        {
            $check_password ="SELECT password FROM users WHERE password='$password'LIMIT 1";
            $check_password_run = mysqli_query($con, $check_password);

            if(mysqli_num_rows($check_password_run) > 0)
            {
                if($new_password == $confirm_password)
                {
                    $update_password = "UPDATE users SET password = '$new_password' WHERE password ='$password'LIMIT 1"; 
                    $update_password_run = mysqli_query($con, $update_password);

                    if($update_password_run)
                    {
                        $_SESSION['status'] ="new password successfully updated";
                        header("Location: login.php");
                        exit(0);

                    }
                    else{
                        $_SESSION['status'] ="didn't update password,something went wrong";
                        header("Location: password-change.php?token=$password&email=$email");
                        exit(0);
                    }

                }
                else{
                    $_SESSION['status'] ="password and confirm password do not match";
                    header("Location: password-change.php?token=$password&email=$email");
                    exit(0);
                }
    

            }
            else{
                $_SESSION['status'] ="invalid password";
                header("Location: password-change.php?token=$password&email=$email");
                exit(0);
            }

        }
        else{
            $_SESSION['status'] ="all filed are mandatory";
            header("Location: password-change.php?token=$password&email=$email");
            exit(0);
        }

    }
    else
    {
        $_SESSION['status'] ="no token available";
        header("Location: password-change.php");
        exit(0);
    }



}

?>