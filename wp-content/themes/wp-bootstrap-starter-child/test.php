<?php

function gen_response($type, $message) {

	return $type . ": " . $message;
	// if($type=="success")
	// {
	// 	return "<div class='success'>{$message}</div>";	
	// }
	// else if($type=="error")
	// {
	// 	echo $type + $message;
	// }
	// else
	// {
	// 	return "don't hack me plz";
	//	}
}

//error messages
$missing_content = "Please fill in all fields.";
$invalid_email = "Please enter a valid email address.";
$msg_sent = "Message sent!";
$msg_not_sent = "Please try again.";
$not_human = "Please verify your humanity.";

//post variables
$name = $_POST["name"];
$email = $_POST['email'];
$msg = $_POST['msg'];
$proof = $_POST['proof'];

//email variables and whatnot
$out_email="jonmorales2.718@gmail.com";
$sub = "Voyagerhigh";
$headers = "From: " . $email . "\r\n";

if(empty($name)||empty($email)||empty($msg)||empty($proof))
{
	echo gen_response("Error", $missing_content);
	return;
}
else if($proof!=4)
{
	echo gen_response("Error", $not_human);
	return;
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
	echo gen_response("Error", $invalid_email);
	return;
}
else
{
	$sent = mail($out_email, $sub, $msg, $headers);
	$sent = true;
	if($sent)
	{
		echo gen_response("Success", $msg_sent);
	}
	else
	{
		echo gen_response("Error", $msg_not_sent);
	}
}
?>