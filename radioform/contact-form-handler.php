<?php 
$errors = '';
$myemail = 'radio@saltydog.com';//<-----Put Your email address here.
$from = 'radio@saltydog.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['artist']) )
   
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$artist = $_POST['artist']; 
$message = $_POST['message']; 
$ipFormInput = $_POST['ipFormInput']; 


// if (!preg_match(
// "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
// $email_address))
// {
//     $errors .= "\n Error: Invalid email address";
// }

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Radio Playlist request";
	$email_body = "You have received a new Radio Playlist Request: ".
	" \n Song Name:    $name \n Artist Name:    $artist \n Message:   $message \n  IP Address:   $ipFormInput "; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $from";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: thankYou.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>