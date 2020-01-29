
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

$questionID = $_POST['id'];
$userAnswer = $_POST['answer'];

$query = "SELECT amount FROM lucky_receipts WHERE id=?";
$statement = $mysqli->prepare($query);
$statement ->bind_param('i', $questionID);

$statement->execute();

$statement->bind_result($answer);


while($statement->fetch()){
    if($answer != $userAnswer){
        echo "Wrong";
    }else{
        echo "correct!";
}


}
$conn->close();


?>
