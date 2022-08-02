<?php
error_reporting(0);


use PHPMailer\PHPMailer\PHPMailer;
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";
require('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port     = 465; 
$mail->Username =  'MAIL';  // Enter your email address from where you want to send email
$mail->Password = 'PASS' ; // Enter your email password from where you want to send email
$mail->Host     = "smtp.gmail.com"; // Leave as it as
$mail->Mailer   = "smtp"; // Leave as it as
$mail->SetFrom('MAIL');
$mail->AddReplyTo($_POST["userEmail"]);
$mail->AddAddress($_POST["userEmail"]);
$mail->addCC($_POST["CC"]);
$mail->addBCC($_POST["BCC"]);    
$mail->AddAddress($_POST["userEmail1"]);
$mail->AddAddress($_POST["userEmail2"]); // Enter your email address where you want to recieve email	
$mail->Subject = utf8_decode($_POST["subject"]);
$mail->WordWrap   = 80;
$mail->MsgHTML($_POST["content"]);

foreach ($_FILES["attachment"]["name"] as $k => $v) {
    $mail->AddAttachment( $_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k] );
}

$mail->IsHTML(true);

if(!$mail->Send()) {
	echo "<p class='error'>Problem in Sending Mail.</p>";
} else {
	echo '<p class="success">
		<div class="alert alert-success">
		  <div class="alert-icon text-center">
			<i class="fa fa-check-square-o  fa-3x" aria-hidden="true"></i>
		  </div>
		  <div class="alert-message text-center">
			<strong>Envoyé!</strong>.
		  </div>
	</div>.</p>';
}	
?>