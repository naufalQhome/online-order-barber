<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
{

	function send()
	{
		// Load PHPMailer library
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'mail.m-barber.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'layanan@m-barber.com';
		$mail->Password = 'ljt=uaA{Od8u';
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('layanan@m-barber.com', 'm-Barber');
		$mail->addReplyTo('layanan@m-barber.com', 'm-Barber');

		// Add a recipient
		$mail->addAddress('n20041996@gmail.com');

		// // Add cc or bcc 
		// $mail->addCC('cc@example.com');
		// $mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}
}
