<?php

$host = $_SERVER['HTTP_HOST'];

if ($host == 'localhost:8888') {
  // Local database credentials
  $dbhost = "localhost:8889";
  $dbuser = "root";
  $dbpass = "root";
  $dbname = "cookbook";
}
else {
    // Remote database credentials
   $dbhost = "localhost";
   $dbuser = "dytulcmy_idm232";
   $dbpass = "Z!ggy2016";
   $dbname = "dytulcmy_idm232";
   
}

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
  die("Database connection failed: " .
    mysqli_connect_error() .
    " (" . mysqli_connect_errno() . ")"
  );

}

//echo "connected succesfully";

?>