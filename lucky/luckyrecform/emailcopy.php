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

//  $recipient_email   = "kat@saltydog.com"; //recepient
 $recipient_email    = "luckyreceipt@saltydog.com"; //recepient

$from_email   = "luckyreceipt@saltydog.com"; //from email using site domain.

$subject = "Lucky Receipt Contest Submission";

if($_POST){
	
    //php validation, exit outputting json string
    if(empty($_POST["ReceiptNumber"])){ //check for valid numbers in phone number field
        print 'Enter only digits in receipt number';
        exit;
    }
 
   
    if(empty($_POST["date"])){ //check for valid numbers in phone number field
        print 'Enter only digits in date';
        exit;
    }
    if(empty($_POST["Salesperson"])){
        print 'Name is too short or empty!';
        exit;
    }
    if(empty($_POST["location"])){ //check emtpy subject
        print 'Location is required';
        exit;
    }
    if(empty($_POST["amount"])){ //check for valid numbers in phone number field
        print 'Enter only digits in amount';
        exit;
    }
  
   
    if(empty($_POST["name"])){
        print 'Name is too short or empty!';
        exit;
    }
    
  
    $ReceiptNumber   = $_POST["ReceiptNumber"];
    $date   = $_POST["date"];
    $Salesperson        =$_POST["Salesperson"];
    $location       = $_POST["location"]; //capture message
    $amount   = $_POST["amount"];
    $name = $_POST["name"]; //capture sender name
    $sender_email  = $_POST["email"] ; //capture sender email
    $email2   = $_POST["email2"] ; //capture sender email
    $message  = $_POST["message"];
    $from_email         = "luckyreceipt@saltydog.com"; //from email using site domain.
    $subject = "Lucky Receipt Contest Submission";
   
    $attachments = $_FILES['my_files'];
  
    $file_count = count($attachments['name']); //count total files attached
    $boundary = md5("sanwebe.com"); 
    
    //construct a message body to be sent to recipient
    $message_body =  "Message from Store Lucky Receipts\n";
    $message_body .=  "------------------------------\n";
    $message_body .=  "Receipt Number: ".$ReceiptNumber."\n";
    $message_body .=  "Date: ".$date."\n";
    $message_body .=  "Sales Person: ".$Salesperson."\n";
    $message_body .=  "Location: ".$location."\n";
    $message_body .=  "Amount: ".$amount."\n";
   



    $message_body .=  "------------------------------\n";
    $message_body .=  "Name: $name\n";
    $message_body .=  " Email address: $sender_email\n";
    $message_body .=  "Message: $message\n";
    
    if($file_count > 0){ //if attachment exists
        //header
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "From: ". $from_email .""."\r\n"; 
        // $headers .= "Subject: ".$subject."" . "\r\n";
        $headers .= "CC: ".$email2."" . "\r\n";
        $headers .= "Reply-To: ".$email."" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n"; 
        
        //message text
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
        $body .= chunk_split(base64_encode($message_body)); 

        //attachments
        for ($x = 0; $x < $file_count; $x++){       
            if(!empty($attachments['name'][$x])){
                
                if($attachments['error'][$x]>0) //exit script and output error if we encounter any
                {
                    $mymsg = array( 
                    1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini", 
                    2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form", 
                    3=>"The uploaded file was only partially uploaded", 
                    4=>"No file was uploaded", 
                    6=>"Missing a temporary folder" ); 
                    print  $mymsg[$attachments['error'][$x]]; 
                    exit;
                }
                
                //get file info
                $file_name = $attachments['name'][$x];
                $file_size = $attachments['size'][$x];
                $file_type = $attachments['type'][$x];
                
                //read file 
                $handle = fopen($attachments['tmp_name'][$x], "r");
                $content = fread($handle, $file_size);
                fclose($handle);
                $encoded_content = chunk_split(base64_encode($content)); //split into smaller chunks (RFC 2045)
                
                $body .= "--$boundary\r\n";
                $body .="Content-Type: $file_type; name=".$file_name."\r\n";
                $body .="Content-Disposition: attachment; filename=".$file_name."\r\n";
                $body .="Content-Transfer-Encoding: base64\r\n";
                $body .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
                $body .= $encoded_content; 
            }
        }

    }
    else{ //send plain email otherwise
        $headers = "From:".$from_email."\r\n".
         $body = $message_body;
         "Reply-To: ".$sender_email. "\n" .
         "X-Mailer: PHP/" . phpversion();
        
         mail($recipient_email, $subject, $body, $headers);
       
    }
        
    $sentMail = mail($recipient_email, $subject, $body, $headers);
$link_address = "https://bohicket.saltydog.com";
    if($sentMail){//output success or failure messages
        
         echo "<div style='text-align:center'><h1>Thank you for filling out our Lucky Receipts form!</h1>
          <h1>Confirmation of your submission has been sent to your email.</h1>
          <a href='".$link_address."'>Salty Dog Bohicket Marina Home Page</a>
        </div>";
       
        exit;
    }
    else{
        print 'Could not send mail! Please check your PHP mail configuration.';  
        exit;
    }
}
