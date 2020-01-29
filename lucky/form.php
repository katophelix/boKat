
<?php
$servername = "23.238.115.234";
$username = "saltydog_kat";
$password = "Saltyk9";
$dbname = "saltydog_Lucky_Receipts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from lucky_receipts LIMIT 1";

$myData = mysqli_query($Link, $sql);   

    echo '<form method = "POST">';

while($iden = mysqli_fetch_array($myData))
{
    echo '<center>' . $iden['amount'] . '. ' . $iden['statement'] . ' <input type = "text" name = "ans"></center><br/>';

 if(isset($_POST['submit']))

{

    if(isset($_POST['ans']) && $iden['correct_answer'] == $_POST['ans']){

      echo "Correct<br><br>";
       }
    else
       {
        echo "Wrong<br><br>";
       } 


    } // if(isset($_POST['submit'])) end brace

} // while loop end brace

echo '<input type = "submit" name = "submit" value = "Submit" class="btn btn-warning">';

     echo '</form>';
?>