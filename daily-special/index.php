<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
?>






<html lang="en" class="no-js">

<!--<![endif]-->



<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-9994729-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());



  gtag('config', 'UA-9994729-1'), { 'optimize_id': 'GTM-N9XR6RG'};

</script>



    

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
 <meta name="description" content="Salty dog Cafe Bohicket Marina Daily specials - images and descriptions - see what's serving today!!!">
    <title>SaltyDogSpecials </title>

    <!-- Modernizr -->



    <!-- jQuery-->

      <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>

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

    <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="https://saltydog.com/headers/styleBoot.css">

    <link type="text/css" rel="stylesheet" href="https://saltydog.com/headers/mega-header.css">





   

   <style>

    h5{

       font-size: .8em;

        font-weight:bolder;

    }
    
      h2{

       font-size: .8em;

        font-weight:bolder;

    }

    h1{

        font-size: 1.5em;

    }

    h4{

font-family: 'Lily Script One', cursive;

font-size: 1.5em;

}

    p{

        font-size: .7em;

    }

    img {
  width: 100%;
}

    </style>



</head>



<?php include 'load.php' ; ?> 



<body>
<?php include '../headers/headerbo.html' ; ?> 
   <br>


         <br>  
















    <br>

    <div class="container">

        <div class="container" style="width:90%; margin-left: 6%">

            <div class="row">

                   <div class="col">

<a href="https://www.bohicket.saltydog.com/chefs"><button type="button" class="btn btn-secondary btn-block" >
       <h1> MEET OUR CHEFS!</h1> </button></a>


</div>

      
</div>


 <br>

   






             











                    <div class="block1" style="background-color: white !important;">

<h1> The Salty Dog Cafe at Bohicket Marina</h1>
<h2 class="card-title"><?php echo $data['bodog']['meal']; ?>  <?php echo  date("m-d-Y") ;  ?>  </h2>


   <h2 class="card-title"> <?php echo $data['bodog']['chef'];  ?> </h2>


  <br><h4>Daily Specials</h4>

  <h5 class="card-title"> <?php echo $data['bodog']['special_name'];  ?> </h5>

  <p class="card-text">  <?php echo $data['bodog']['special_descr'];  ?> </p>

 <br>

 

 <h4> <?php echo $data['bodog']['header'];  ?> </h4>

  

  <h5 class="card-title"> <?php echo $data['bodog']['child_name'];  ?> </h5>

  <p class="card-text">   <?php echo $data['bodog']['child_descr'];  ?> </p>

                  
  <?php

 $filename = 'uploads/uploads/bodog.png';
        if (file_exists($filename)) {
            $filename = "uploads/uploads/bodog.png";
            $filemtime = filemtime($filename);
}
?>
                    <div class="col"> 
                   <img src="https://www.saltydog.com/daily-special/uploads/uploads/bodog.png?<?php echo $filemtime; ?>" >
</div>

                    </div>

</div> 
 

        </div> 

    </div>



</body>



</html>