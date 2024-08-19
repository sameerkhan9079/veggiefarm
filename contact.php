<?php 
session_start();
include('connect.php');
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    @$name = $_POST['fname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $admin_email = "sameerkhan04843@gmail.com"; 
    $full_message = "Name: $name\n";
    $full_message .= "Email: $email\n";
    $full_message .= "Subject: $subject\n";
    $full_message .= "Message:\n$message\n";

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
        $mail->setFrom($email, $name);
        $mail->addAddress($admin_email);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br($full_message);
        $mail->AltBody = $full_message;

        $mail->send();
        $msg = "Message sent successfully!";
    } catch (Exception $e) {
        $msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us - Veggie Farm</title>
    <!-- <meta charset="utf-8"> -->
    <!-- <meta name="viewport" content="shrink-to-fit=no"> -->
    
    <?php include('header.php');?>
    <?php include('boots_icon.php');?>
    <?php include('css/style.php');?>
    <?php include('css/media.php');?>

    <style>
      body {
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
        color: #333;
      }
      .banner {
        background-image: url('images/about_us.jpg');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        position: relative;
      }
      .banner::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
      }
      .banner h1 {
        position: relative;
        font-size: 3rem;
        z-index: 1;
      }
      .contact-info, .contact-form, #map {
        margin-top: 30px;
        padding: 20px;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
      }
      .contact-info p span {
        font-weight: bold;
      }
      .contact-info {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
      }
      .contact-info .info {
        flex: 1 1 calc(33.333% - 40px);
        min-width: 200px;
        padding: 20px;
        background-color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
      }
      .contact-form input, .contact-form textarea {
        width: 100%;
        padding: 15px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
      }
      .contact-form input:focus, .contact-form textarea:focus {
        border-color: #4CAF50;
        outline: none;
      }
      .contact-form input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      .contact-form input[type="submit"]:hover {
        background-color: #45a049;
      }
      #map {
        height: 550px;
        width: 100%;
      }
   
      .socials-md {
        background: #F4EDDD;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 40px 20px;
      }
      .socials-md .row {
        font-size: 2rem;
        margin-bottom: 20px;
      }
      .socials-md .icons {
        display: flex;
        /* gap: 20px; */
        width: 40%;
        margin-top:0;
      }
      .socials-md .icon {
        width: 50px;
        height: 50px;
        background: #FA7530;
        font-size: 1rem;
        font-weight: bold;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: white;
        transition: all 0.3s ease;
      }
      .socials-md .icon:hover {
        background-color: #fff;
        border-radius: 0%;
        color: #333;
        transition: all 0.5s ease-in;
      }
      @media screen and (max-width: 1000px) {
        .contact-info {
          flex-direction: column;
        }
        .contact-form, #map {
          margin-top: 20px;
        }
        .map_msg{
          display:flex;
          flex-direction:column;
          gap:1rem;
        }
        .col-md-6{
          max-width: 100%;
        }
      }
    </style>
</head>
<body>
    <div class="banner">
      <h1>CONTACT US</h1>
    </div>

    <section class="ftco-section contact-section bg-light mt-4">
      <div class="container">
        <?php if (isset($msg)): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg;?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <?php endif; ?>
        <div class="row contact-info">
          <div class="info">
            <p><span>Address:</span> Jodhpur, Rajasthan</p>
          </div>
          <div class="info">
            <p><span>Phone:</span> <a href="tel://1234567920">+91 9079997283</a></p>
          </div>
          <div class="info">
            <p><span>Email:</span> <a href="mailto:sameerkhan04843@gmail.com">sameerkhan04843@gmail.com</a></p>
          </div>
        </div>
        <div class="row block-9 map_msg border mt-4 mb-4">
          <div class="col-md-6 order-md-last d-flex ">
            <form action="" method="POST" class="bg-white contact-form w-100 mb-4 p-5">
              <div class="row mb-4"><h2>Send us a Message</h2></div>
              <div class="form-group">
                <input type="text" name="fname" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="Message" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
          <div class="col-md-6 d-flex">
            <div id="map">
              <iframe width="100%" height="100%" src="https://maps.google.com/maps?width=100%&amp;height=300&amp;hl=en&amp;coord=52.70967533219885,-8.020019531250002&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container socials-md mb-4">
<div class="row">Follow our social media</div>
<div class="icons ">
<div class="icon"><i class="fa-brands fa-facebook-f"></i></div>
<div class="icon"><i class="fa-brands fa-x-twitter"></i></div>
<div class="icon"><i class="fa-brands fa-instagram"></i></div>
<div class="icon"><i class="fa-brands fa-linkedin"></i></div>
</div>
</div>
<?php include('footer2.php');?>
<?php include('js/boot_script.php');?>

