<?php
session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
require 'mis/vendor/autoload.php';
include '../mis/utilities/db.php';
$conn = Connect();

$email = mysqli_real_escape_string($conn, $_POST['email']);
$firstname = mysqli_real_escape_string($conn, $_POST['emp_name']);
$sql = "SELECT * FROM user where email = '$email';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $password = $row['password'];
        $username = $row['username'];
    }
} else {
    echo "
            <script>
                alert('That email is not being used by any account.');
                window.history.back();
            </script>
        ";
        exit();
}
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
    if($_POST["status"] == "accepted"){

        $body = file_get_contents("style.html");
        $body .= "<div id='main_content'>";
        $body .= "
        <h1>Leave Request Accepted</h1>
        <p>Dear <strong>$firstname</strong>, your leave request has been accepted.</p>";
        $body .= "<p>If you did not request for any leave request, ignore this message</p>";
        $body .= "</div>";

        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Leave Request';
        $mail->Body = $body;
        $mail->AltBody = 'You have requested for a leave request';

        $mail->send();
        $mail->ClearAllRecipients();

    }else{
        $body = file_get_contents("style.html");
        $body .= "<div id='main_content'>";
        $body .= "
        <h1>Leave Request Rejected</h1>
        <p>Dear <strong>$firstname</strong>, your leave request has been rejected, if you have any questions please head to the HR office.</p>";
        $body .= "<p>If you did not request for a leave request, ignore this message</p>";
        $body .= "</div>";

        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Leave Request';
        $mail->Body = $body;
        $mail->AltBody = 'You have requested for a leave request';

        $mail->send();
        $mail->ClearAllRecipients();
    }
} catch (Exception $e) {
    echo "
    <script>
        alert('Message could not be sent. Mailer Error: , $mail->ErrorInfo');
    </script>";
}
