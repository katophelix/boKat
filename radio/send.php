<?php
 echo '<style type="text/css">
 .Stylize {
     font-family: Helvetica Neue,Helvetica,Arial,sans-serif; 
     font-size: 2.5em;
     text-align:center;
 }
 .my-class{
     text-align:center;
 }
 </style>'; 

//  $to_email  = "retail@saltydog.com"; //recepient
 $to_email    = "radio@saltydog.com"; //recepient
 $from_email    = "radio@saltydog.com"; 
// $from_email   = "retail@saltydog.com"; //from email using site domain.

 $subject = "Radio add a Song";

if($_POST){
	
    //php validation, exit outputting json string
    if(empty($_POST["song"])){ //check for valid numbers in phone number field
        print 'Song Title is required';
        exit;
    }
 
   
    if(empty($_POST["artist"])){
        print 'Artist is required!';
        exit;
    }
  
  $song = ($_POST["song"]);
  $artist = ($_POST["artist"]);
    
    //construct a message body to be sent to recipient
    $message_body =  "Add a song to Saltydog Radio \n";
    $message_body .=  "------------------------------\n";
    $message_body .=  "Song title: ".$song."\n";
    $message_body .=  "Artist: ".$artist."\n";
    
 

        $headers = "From:".$from_email."\r\n".
        $body = $message_body;
        "Reply-To: ".$to_email. "\n" .
        "X-Mailer: PHP/" . phpversion();
       
        mail($to_email, $subject, $body, $headers);
  
        
    $sentMail = mail($to_email, $subject, $body, $headers);

    if($sentMail){//output success or failure messages
        
        echo "<div style='text-align:center'><h1>Form sent sucessfully!</h1>
       
        </div>";
        exit;
    }
    else{
        print 'Could not send mail! Please check your PHP mail configuration.';  
        exit;
    }
}
