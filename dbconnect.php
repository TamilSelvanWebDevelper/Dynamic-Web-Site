<?php

   // Connecting to a Database through PHP
  
 $DB_SERVER = "localhost";
 $DB_USERNAME = "root";
 $DB_PASSWORD = "";
 $DB_NAME = "bookmytrip";
 $link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

 if(mysqli_connect_error())
 {
	 die("Database connection failed ".mysqli_connect_errno());
 }




 

         
?>
