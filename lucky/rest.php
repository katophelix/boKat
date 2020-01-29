
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

$sql = "SELECT * FROM rest_receipts ORDER BY id  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $requests[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>


 <!-- $result = $mysqli->query($sql);

 while($row = $result->fetch_assoc()) {
    $requests[] = $row;
 }

$result->free();
}
 $mysqli->close();

?>  -->
<!DOCTYPE html>

<html class="no-js">
<!--<![endif]-->

<head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-9994729-1"></script>
      <script>
          window.dataLayer = window.dataLayer || [];
          function gtag() { dataLayer.push(arguments); }
          gtag('js', new Date());
  
          gtag('config', 'UA-9994729-1'), { 'optimize_id': 'GTM-N9XR6RG'};
      </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>SaltyDogReceipts</title>
    <!-- Modernizr -->

    <!-- jQuery-->
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <!-- framework css -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns"
        crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <!--<![endif]-->
    
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Quicksand" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="../headers/styleBoot.css">
    <link type="text/css" rel="stylesheet" href="../headers/mega-header.css">

    <style>
        h1 {

            font-size: .9em;
        }

        h5 {

            font-size: .7em;
        }

        p {

            font-size: .5em;
        }
    </style>

</head>



<body>


        <script>
                $(document).ready(function () {
                    $("div[data-includeHTML]").each(function () {                
                        $(this).load($(this).attr("data-includeHTML"));
                    });
                });
            </script>



<header>
        <div data-includeHTML="../headers/_HeaderPartial.html"></div>
    </header>
    <br>
    <br>

  
    <br>
    <br>
 

     
  <div class="container ">
  <div class="row justify-content-center" style="text-align:center;">
  <button type="button" class="btn btn-secondary"  >
                                                        <a href="https://saltydog.com/lucky/LuckyRecformrest/formpage.html" style="color: rgb(4, 4, 51) !important;"> 
                                                        If your receipt number matches one of these receipt numbers 
                                                        click here to send us a copy of your receipt.
                                                      
                                                           
                            
                                                    </a>
                                                    </button>
              </div>
    <div class="row justify-content-center">
      <div class="col-xs-12" style="text-align:center">
        <h1>Salty Dog Restaurant Receipts</h1>        
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
      <table class="table table-striped table-responsive{-sm|-md|-lg|-xl}">
  <thead>
    <tr>
    
              <th>Receipt Number</th>
              <th>Date</th>
              <th>Location</th>
              <th>Server</th>
              <th>Amount</th>
    </tr>
  </thead>
  <tbody>

 <?php foreach($result AS $request): ?>
  <tr>
    <td><?php echo $request['receipt_num']; ?></td>
    <td><?php echo $request['date']; ?></td>
    <td><?php echo $request['location']; ?></td>
    <td><?php echo $request['servers']; ?></td>
    <td><?php echo $request['amount']; ?></td>
  </tr>
<?php endforeach; ?>  

</tbody>
</table>
        

      </div>
    </div>

  </div>


 


  
  </body>
</html>