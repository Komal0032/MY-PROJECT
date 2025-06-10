<?php
// Use PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer class files
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
// Create a new PHPMailer instance
$mail = new PHPMailer(true);  // true enables exceptions

try {
    // Server settings for Gmail's SMTP server
    $mail->isSMTP();  // Set email to use SMTP
    $mail->Host       = 'smtp.gmail.com';   // Set the SMTP server to Gmail
    $mail->SMTPAuth   = true;               // Enable SMTP authentication
    $mail->Username   = 'kbjadhav193email@gmail.com';  // Your Gmail email address
    $mail->Password   = 'jtcaexspbicojvdn';    // Your 16-digit App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Encryption method
    $mail->Port       = 587;    // Use Port 587 for Gmail

    // Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);  // Sender's email
    $mail->addAddress('kbjadhav193@gmail.com');  // Replace with your email to receive the contact form

    // Content of the email
    $mail->isHTML(false);  // Set email format to plain text
    $mail->Subject = $_POST['subject'];  // Subject from the form
    $mail->Body    = "Name: " . $_POST['name'] . "\n"   // Name from the form
                   . "Email: " . $_POST['email'] . "\n\n" // Email from the form
                   . $_POST['message'];  // The message itself from the form

    // Attempt to send the email
    if ($mail->send()) {
        echo 'Message sent successfully!';  // Success message
    } else {
        echo 'Failed to send the message. Please try again later.';
    }

} catch (Exception $e) {
    // Catch any errors and display them
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
