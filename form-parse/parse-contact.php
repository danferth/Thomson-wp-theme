<?php
require_once("PHPMailer/PHPMailerAutoload.php");
date_default_timezone_set('America/Los_Angeles');
$server_dir = $_SERVER['HTTP_HOST'] . '/';
$next_page = 'contact-form/';
header('HTTP/1.1 303 See Other');

//trim post
array_walk($_POST, 'trim_value');

//form variables
$title   = filter_var($_POST['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);
$fname   = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);
$lname   = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);
$phone   = filter_var($_POST['telephone'], FILTER_SANITIZE_NUMBER_INT);
$email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$company = filter_var($_POST['company'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);
$comment = filter_var($_POST['message'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_ENCODE_HIGH);

//for body and sending email
$query_string = '?first_name=' . $fname;

if ($_POST['title'] == "title"){
	$title = "";
}

	if (is_array($_POST)){
		$body  = sprintf("<html>"); 
		$body .= sprintf("<body>");
		$body .= sprintf("<h2>Contact form submission results:</h2>\n");
		$body .= sprintf("<hr />");
		
		$body .= sprintf("\nCompany: <b>%s</b><br />\n",$company);
		$body .= sprintf("\nName: <b>%s %s</b><br />\n",$fname,$lname);
		$body .= sprintf("\nTitle: <b>".$title."</b><br />\n");
		$body .= sprintf("\nTelephone: <b>%s</b><br />\n",$phone);
		$body .= sprintf("\nEmail: <b>%s</b><br />\n",$email);
		$body .= sprintf("<br />");

		$body .= wordwrap(sprintf("\nMessage:\n\n".$comment."<br />",75,"\n"));
		$body .= sprintf("<br /><hr />");
		$body .= sprintf("For internal use:<br />\n");
		$body .= sprintf("<br />-----------------<br />\n");
		$body .= sprintf("\nSender's IP: %s<br />\n", $_SERVER['REMOTE_ADDR']);
		$body .= sprintf("\nReceived: %s<br />\n",date("Y-m-d H:i:s"));
		$body .= sprintf("</body>");
		$body .= sprintf("</html>");

		if (trim($_POST['important-input']) == ''){
			$mail = new PHPMailer;
			$mail->setFrom('general_con@htslabs.com', 'Contact Form');
			$mail->addReplyTo($email, $fname." ".$lname);
			$mail->addAddress('general_con@htslabs.com', 'Contact Form');
			$mail->Subject = "General Contact From - " . $company;
			$mail->msgHTML($body);
			if (!$mail->send()){
				$mail_error = $mail->ErrorInfo;
				$error_date = date('m\-d\-Y\-h:iA');
				$log = "logs/contact-error.txt";
				$fp = fopen($log,"a+");
				fwrite($fp,$error_date . "\n" . $mail_error . "\n\n");
				fclose($fp);
				$query_string = '?success=false';
				header('Location: http://' . $server_dir . $next_page . $query_string);
			}else{
				$query_string .= '&success=true';
				header('Location: http://' . $server_dir . $next_page . $query_string);
			}
		}else{
			$query_string = '?first_name=Edward';
			$query_string .= '&success=true';
				header('Location: http://' . $server_dir . $next_page . $query_string);
		}
	}
?>