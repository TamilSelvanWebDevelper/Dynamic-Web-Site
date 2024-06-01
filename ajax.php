<?php

   $term = $_GET['query'];
   include("dbconnect.php");
   $srchQuery = "SELECT * FROM `hotels` WHERE hotelName LIKE '%".$term."%'";

   $srchRes = mysqli_query($link, $srchQuery);
   if($srchRes)
   {
	   while($srchRow = mysqli_fetch_array($srchRes))
	   {
		   echo "<a href = 'hotels.php?hotelName=".$srchRow['hotelName']."'> ".$srchRow['hotelName']."</a><br/>";
	   }
   }
?>