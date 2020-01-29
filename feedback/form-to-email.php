<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$phone = $_POST['phone'];
$visitor_email = $_POST['email'];
$date = $_POST['date'];
$restaurant = $_POST['restaurant'];
$server = $_POST['server'];
$wait = $_POST['wait'];
$manager = $_POST['manager'];
$hostess = $_POST['hostess'];
$hostessAgree = $_POST['hostessAgree'];
$recommedAgree= $_POST['recommedAgree'];
$recommend= $_POST['recommend'];
$promptAgree = $_POST['promptAgree'];
$prompt = $_POST['prompt'];
$hotAgree = $_POST['hotAgree'];
$hot = $_POST['hot'];
$enjoyAgree = $_POST['enjoyAgree'];
$enjoy = $_POST['enjoy'];
$startAgree = $_POST['startAgree'];
$start = $_POST['start'];
$comments = $_POST['comments'];

//Validate first
// if(empty($name)||empty($visitor_email)) 
// {
//     echo "Name and email are mandatory!";
//     exit;
// }

// if(IsInjected($visitor_email))
// {
//     echo "Bad email value!";
//     exit;
// }

$email_from = "info@saltydog.com";//<== update the email address
$email_subject = "New  Feedback Form submission";
$email_body = "You have received a new message from : $name.\n".
"Their phone number is:  $phone.\n".
"Their email is: $visitor_email.\n".
"The date they visited was:  \n $date. \n".
"The restaurant they visited was:  $restaurant. \n".
" How many minutes did you wait before being served?  Answer:  $wait. \n".
"What was your Server's Name  Answer:  $server. \n".
"Were you visted by a manager during your visit?  Answer:  $manager. \n".
" the Hostess was helpful and polite  Answer:  $hostessAgree. \n".
" the Hostess was helpful and polite Elaborate:  $hostess. \n".
"you would recommend our restaurant.:  Answer:  $recommedAgree. \n".
"you would recommend our restaurant.:  Elaborate:  $recommend. \n".
" your food served promptly.  Answer:  $promptAgree. \n".
" your food served promptly.  Elaborate:  $prompt. \n".
" your food served hot and fresh.  Answer:  $hotAgree. \n".
" your food served hot and fresh.  Elaborate:  $hot. \n".
"  your experience was enjoyable. Answer:  $enjoyAgree. \n".
" your experience was enjoyable. Elaborate:  $enjoy. \n".
"Start to finish, the service was excellent.  Answer:  $startAgree. \n".
"Start to finish,  the service was excellent.  Elaborate:  $start. \n".
"Any other comments or suggestions?:  Answer:  $comments. \n".

    
    
$to = " feedback@saltydog.com";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 