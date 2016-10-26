<?php
/**************************************
 * RCHTHEME Send Mail
 *
 * @package  RCHTHEME/Framework
 * @author   RCHTHEME
 * @link     http://www.rchtheme.com
**************************************/
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

$post = (!empty($_POST)) ? true : false;
if($post)
{
	$first_name = stripslashes($_POST['first_name']);
	$last_name = stripslashes($_POST['last_name']);
	$subject = __('Contact Form', 'Longpoint');
	$email = trim($_POST['email']);
	$to = get_option('admin_email');
	$message = stripslashes($_POST['message']);
	$error = '';
	
	// Check name
	if(!$first_name){
		$error .= __('Please enter your first name.', 'Longpoint') . '<br />';
	}
	if(!$last_name){
		$error .= __('Please enter your last name.', 'Longpoint') . '<br />';
	}
 
	// Check email
	if(!$email)
	{
		$error .= __('Please enter an e-mail address.', 'Longpoint') . '<br />';
	}
 
	if($email && !ValidateEmail($email))
	{
		$error .= __('Please enter a valid e-mail address.', 'Longpoint') . '<br />';
	}
 
	// Check message (length)
	if(!$message || strlen($message) < 15)
	{
		$error .= __('Please enter your message. It should have at least 15 characters.', 'Longpoint') . '<br />';
	}
 
	if(!$error) // send email
	{
		$mail = wp_mail($to, $subject, $message,
			 'From: ' . $first_name . ' ' . $last_name . ' <'.$email.'>\r\n'
			.'Reply-To: '.$email.'\r\n'
			.'X-Mailer: PHP/' . phpversion());
 
		if($mail)
		{
			echo 'Success';
		}
 
	}
	else
	{
		echo '<div class="alert alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
				<h4> ' . __('Oh snap! You got an error!', 'Longpoint') . '</h4>
				<p>'.$error.'</p>
				</div>'; 
	}
 
}


function ValidateEmail($email){

	$regex = '/([a-z0-9_.-]+)@([a-z0-9.-]+){2,255}.([a-z]+){2,10}/i';

	if($email == '') { 
		return false;
	}
	else {
		$eregi = preg_replace($regex, '', $email);
	}
 
	return empty($eregi) ? true : false;
}
?>