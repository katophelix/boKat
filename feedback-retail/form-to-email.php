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
$store = $_POST['store'];
$employee = $_POST['employee'];
$greet = $_POST['greet'];
$sales = $_POST['sales'];
$question = $_POST['question'];
$helpful = $_POST['helpful'];
$contest= $_POST['contest'];
$find = $_POST['find'];

$enjoy = $_POST['enjoy'];
$suggestions = $_POST['suggestions'];



$email_from = "info@saltydog.com";//<== update the email address
$email_subject = "New  Feedback Form submission";
$email_body = "You have received a new message from : $name.\n".
"Their phone number is:  $phone.\n".
"Their email is: $visitor_email.\n".
"The date they visited was:  \n $date. \n".
"The store they visited was:  $store. \n".
" Which employee or employees helped you?  Answer:  $employee. \n".
">Were you greeted by a clerk?  Answer:  $greet. \n".
"Were you told about any sales going on in the store upon entering?  Answer:  $sales. \n".
"Did the employee answer any questions you had?  Answer:  $question. \n".
"Was the employee helpful and polite?:  Answer:  $helpful. \n".
" If you made a purchase, were you told about the Lucky Receipt Contest? ?  Answer:  $contest. \n".
"If the store was out of a product, did the employee make an attempt to find it at another retail location?  Answer:  $find. \n".
"What did you like about shopping in the store?? Answer:  $enjoy. \n".
"Any suggestions for products or for making your shopping experience better in the store?  Answer:  $suggested. \n".


    
    
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