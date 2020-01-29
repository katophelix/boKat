<?php
$target_dir = "uploads/";
$target_file = $target_dir . 'bodog.png';
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
  echo "<h1>File is an image - " . $check["mime"] . ".</h1>";
  $uploadOk = 1;
  } else {
  echo "<h1 style='color:red;'> File is not an image.</h1>";
  $uploadOk = 0;
  }
}
// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }
// Check file size
if ($_FILES["fileToUpload"]["size"] > 3000000) {
  echo "<h1 style='color:red;'> Sorry, your file is too large.</h1>";
  $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "<h1 style='color:red;'> Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h1>";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "<h1 style='color:red;'> Sorry, your file was not uploaded.</h1>";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  echo "<h1> The file has been uploaded.</h1>";
  } else {
  echo "<h1 style='color:red;'> Sorry, there was an error uploading your file.</h1>";
  }
}