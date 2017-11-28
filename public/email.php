<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
define('ROOT', dirname(__DIR__));
require ROOT. '/vendor/autoload.php';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

	//Server settings
	$mail->SMTPDebug = 1;                                 // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'ns3072249.fbox.fr';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'm.sakho@momilc.com';                 // SMTP username
	$mail->Password = 'oPZH.3mQ$O#4';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to
	//Recipients
	$mail->setFrom('m.sakho@momilc.com', 'Mohamed');
	$mail->addAddress('m.sakho@momilc.com', 'Mohamed');
	$mail->Subject = $_POST['subject'];

//Content
	if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
		//Keep it simple - don't use HTML
		$mail->isHTML(false);
		//Build a simple message body
		$mail->Body = <<<EOT
		{$_POST['message']}
EOT;

//		$mail->AltBody = strip_tags('message'); //Remove // in front of this if you set isHTML to true.


		//Send the message, check for errors
		if (!$mail->send()) {
			//The reason for failing to send will be in $mail->ErrorInfo
			//but you shouldn't display errors to users - process the error, log it on your server.
			echo $msg = 'Désolé, il y\'a eu une érreur. Veuillez réessayer SVP.';
		} else {
			echo $msg = 'Message envoyé ! Merci de m\'avoir contacter. Je fais tout mon possible pour vous répondre dans les plus brefs délais.';
			}
		} else {
		echo $msg = 'Adresse E-mail invalide, message ignoré.';
		}