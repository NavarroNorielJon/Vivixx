<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'vendor/autoload.php';
include '../utilities/db.php';
$conn = Connect();

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$username = mysqli_real_escape_string($conn, $username);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT password FROM user where email = '$email';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$pass = $row['password'];




$developmentMode = true;
$mail = new PHPMailer($developmentMode); // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    if ($developmentMode) {
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ),
        );
    }
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'vivixxcorporation@gmail.com'; // SMTP username
    $mail->Password = 'vivixxcorp123'; // SMTP password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to

    //Recipients
    $mail->setFrom('vivixxcorporation@gmail.com', 'VIVIXX');
    // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
    $mail->addAddress($email); // Name is optional
    // $mail->addReplyTo('zenad.scarlet@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $body = file_get_contents("style.html");
    $body .= "<div id='main_content'>";
    $body .= "
    <h1>Your Account Has been Activated</h1>
    <p>Your Username is <strong>\"". $username ."\"</strong> and your temporary password is <strong>\"". $password ."\"</strong></p>";
    $password = password_hash($password, PASSWORD_DEFAULT);

    $body .= "<p>If your account is not working, Please use your registered email first then contact HR</p>";
    $body .= "<a class='pure-button pure-button-primary' href='http://vivixx.ph/pages/reset_password.php?account=" . $username . "." . $password . "'>Enter your new Password?</a>";
    $body .= "</div>";

    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Registered Account';
    $mail->Body = $body;
    $mail->AltBody = 'Your account has been activated';

    $mail->send();
    $mail->ClearAllRecipients();

    echo "Email sucessfully sent, please check your email.";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
