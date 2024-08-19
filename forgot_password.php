<?php
// Include the Composer autoload file
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('connect.php');

    $email = $_POST['email'];
    
    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(50));
        $stmt = $conn->prepare("UPDATE registration SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        // Send reset email
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sameerkhan04843@gmail.com';  // Use your email address
            $mail->Password = 'bqzi wmnv hgsd jnfc';  // Use your app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('sameerkhan04843@gmail.com', 'MajorProject');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset';
            $mail->Body    = "Click <a href='http://localhost/MajorProject/update_password.php?token=$token'>here</a> to reset your password.";
            $mail->AltBody = "Click the following link to reset your password: http://localhost/MajorProject/update_password.php?token=$token";

            $mail->send();
            echo '<script>alert("Reset link has been sent to your email.")</script>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo '<script>alert("No user found with that email address.")</script>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Bootstrap CSS and icons -->
    <?php include('boots_icon.php'); ?>
    <?php include('css/style.php'); ?>
    <title>Forgot Password</title>
    <style>
        /* Your styles here */
    </style>
</head>
<body>
    <div class="full-con ">
        <div class="row-1 login-row1">
            <h3 class="name">FORGOT PASSWORD</h3>
        </div>
        <div class="row-2 login-row-2" style="height:45%;">
            <form action="forgot_password.php" method="post">
                <div class="form-container">
                    <div>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div style="margin-top:1rem;">
                        <input type="submit" class="form-control btnn btn-success" value="SEND RESET LINK">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <?php include('js/boot_script.php'); ?>
</body>
</html>
