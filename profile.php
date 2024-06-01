<?php

   //session_start();
   if($_COOKIE['myUser'])
   {
	 // $thisUser = $_SESSION['myuser'];
	  $thisUser = $_COOKIE['myUser'];
      echo "<h1> Hello ".$thisUser." </h1>"; 
   }
   else
   {
	   header('Location: login.php');
   }
     

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Profile</title>
</head>

<body>
</body>
</html>