<?php
include("dbconnect.php");
$errorMsg = "";
$errorCount = 0;
if (isset($_GET['widgetSubmit'])) {
	$what = $_GET['what'];
	switch ($what) {
		case "Hotels":
			$where = $_GET["where"];
			$indate = $_GET["indate"];
			$outdate = $_GET["outdate"];
			$adult = $_GET["adult"];
			$children = $_GET["child"];
			echo "<p> User booking for " . $what . "in ".$where." from " . $indate . " to " . $outdate . " with " . $adult . " adults and " . $children . " children.";
			break;
		case "Buses":
		case "Flights":
			$startingPt = $_GET["starting"];
			$destination = $_GET["destination"];
			if (strcmp($startingPt, $destination) == 0) {
				$errorCount++;
				$errorMsg = "Source and Destination cannot be the same";
			}
			$journeydate = $_GET["doj"];
			$adult = $_GET["adult"];
			$children = $_GET["child"];
			if ($errorCount > 0) {
				echo $errorMsg;
			} else {
				echo "<p> User booking for " . $what . " from " . $startingPt . " to " . $destination . " with " . $adult . " adults and " . $children . " children on " . $journeydate;
			}

			break;
	}
}

?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Search Results | Bookmytrip </title>
	<link href="css/indexStylePC.css" rel="stylesheet" />
</head>

<body>
	<?php
	include("header.php");
	include("nav.php");

	echo "<section id = 'bodyContent'> <div class='grid1440'>";

	$myquery = "SELECT * FROM `hotels` WHERE location LIKE '" . $where . "%'";

	$myres = mysqli_query($link, $myquery);
	$cardCount = 0;
	echo "<div class = 'card-container'>";
	if ($myres) {
		while ($myrow = mysqli_fetch_array($myres)) {
			$cardCount++;
			//if ($cardCount % 3 == 1) 
				//echo "<div class = 'card-container'>";
			

			echo "<div class = 'card'>";
			echo "<img src = 'images/" . $myrow['imagePath'] . ".jpg' width = '100%' height = '150' />";
			echo "<div class = 'description'> <h1> Hotel " . $myrow['hotelName'] . "</h1>";
			echo "<h3>" . $myrow['location'] . "</h3>";
			echo "<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quis cum ratione similique
			minima suscipit accusantium, molestias porro odit sapiente.! </p> </div>";
			echo "<button> Book Now </button> </div>";

			//if ($cardCount % 3 == 0) 
			//	echo "</div>";
			
		}
	}
	echo "</div>";
	echo "</div> </section>"
	?>


	<?php
	include("footer.php");
	?>
</body>

</html>