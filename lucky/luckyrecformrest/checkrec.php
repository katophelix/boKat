
<!-- <?php
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
$amount = $_POST['amount'];
$salesperson = $_POST['salesperson'];

$sql = "SELECT id FROM retail_receipts WHERE $salesperson = 'salesperson';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "some results";
    }
else {
    echo "0 results";
}
$conn->close();
?> -->



<?php
   $dbhost = '23.238.115.234';
   $dbuser = 'saltydog_kat';
   $dbpass = 'Saltyk9';
   $dbname = 'saltydog_Lucky_Receipts';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

   $amount = $_POST['amount'];
   $salesperson = $_POST['salesperson'];
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   echo 'Connected successfully<br>';
   $sql = "SELECT * FROM retail_receipts WHERE salesperson = '$salesperson' AND amount = $amount;";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
         echo "Name: " . $row["id"]. "<br>";
         
      }
   } else {
      echo "0 results";
   }
   mysqli_close($conn);
?>

