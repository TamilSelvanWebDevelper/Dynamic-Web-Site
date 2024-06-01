<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Book My Trip | Home </title>
	<link href="css/indexStylePC.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
</head>

<body>
	<div id="wrapper">
		<?php include("header.php"); ?>
		<?php include("nav.php"); ?>
		<div id="bannerArea">
			<div id="banner1" class="banner"> </div>
			<div id="banner2" class="banner"> </div>
			<div id="banner3" class="banner"> </div>
			<div id="leftArrow" class="banner-btn"> </div>
			<div id="rightArrow" class="banner-btn"> </div>
			<div id="widgetArea">
				<div class="grid1440">
					<h2> Book your trip now! </h2>
					<div id="widget">
						<form action="search.php">
							<div class="smallSection">
								<label for="category"> Booking for? </label>
								<select name="what" id="category">
									<option value="Buses"> Buses </option>
									<option value="Flights"> Flights </option>
									<option value="Hotels"> Hotels </option>
								</select>
							</div>
							<div class="tinySection">
								<input type="radio" name="trip" id="one" value="one"> <label> One-way </label> <br />
								<input type="radio" name="trip" id="two" value="two"> <label> Round-trip </label>
							</div>
							<div class="largeSection">
								<label for="starting"> Starting Place </label>
								<input type="text" placeholder="" id="starting" name="starting" />
							</div>
							<div class="largeSection">
								<label for="destination"> Destination </label>
								<input type="text" placeholder="" id="destination" name="destination" />
							</div>
							<div class="mediumSection">
								<label for="doj"> Date of Journey </label>
								<input type="date" placeholder="" id="doj" name="doj" />
							</div>
							<div class="smallSection">
								<label for="passengers"> No.of Seats </label>
								<input type="number" placeholder="adults" id="passengers" name="adult" />
								<input type="number" placeholder="kids" id="kids" name="child" />
							</div>
							<div class="smallSection">
								<input type="submit" id="widgetSubmit" name="widgetSubmit" value="Search" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<section id="bodyContent">
			<section id="featured">
			<div class="grid1440">
				<h1 class="title"> Why choose Bookmytrip? </h1>
				<div class="container">
					<div class="compartment">
						<img src="images/convenient.png" alt="convenience_in_booking">
						<h2> Convenience </h2>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni quod eum dicta accusamus natus ab
							minus sint adipisci omnis quibusdam illo odio suscipit hic tempora excepturi porro maiores, quidem
							qui eveniet ratione! </p>
					</div>
					<div class="compartment">
						<img src="images/dependable.png" alt="dependable_service">
						<h2> Dependable </h2>
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni quod eum dicta accusamus natus ab
							omnis quibusdam suscipit hic tempora excepturi porro maiores architecto cum nisi et, optio, quidem
							qui eveniet ratione! Eos quis mollitia soluta! </p>
					</div>
					<div class="compartment">
						<img src="images/compliment.png" alt="delightful_compliments">
						<h2> Delightful Compliments </h2>
						<p> Lorem ipsum dolor sit amet, elit. Magni quod eum dicta accusamus natus ab minus sint adipisci
							omnis quibusdam illo odio suscipit hic tempora excepturi porro maiores architecto cum nisi et,
							optio, quidem qui eveniet ratione! Eos quis mollitia soluta! </p>
					</div>
				</div>
				<h1 class="title"> Featured Hotels </h1>
				<div class="card-container">
					 
				<?php
     					include("dbconnect.php");
						$myquery = "SELECT * FROM `hotels` LIMIT ";
						$myres = mysqli_query($link, $myquery);
						if ($myres) {
							while( $myrow = mysqli_fetch_array($myres))
							{
								echo "<div class = 'card'>";
								echo "<img src = 'images/" . $myrow['imagePath'] . ".jpg' width = '100%' height = '150' />";
								echo "<div class = 'description'> <h1> Hotel " . $myrow['hotelName'] . "</h1>";
								echo "<h3>" . $myrow['location'] . "</h3>";
								echo "<p> Lorem ipsum dolor sit amet, adipisicing elit. Error quis cum ratione similique minima suscipit accusantium, molestias porro odit sapiente.! </p> </div>";
								echo "<button> Book Now </button> </div>";	
							}
						}
					?>
			
				</div>
			</div>
		</section>
		<section id="offers">
			<div id="parallax">
				<div id="layer1">

				</div>
				<div id="layer2">
					<div id="plane"> </div>
				</div>
				<!--<div class="grid1440"> </div>-->
			</div>
			<div id="personalize">
				<div class="grid1440">
					<div id="accordion">
						<h2> Today's Offers </h2>
						<ul class="myaccord">
							<li class="accordTitle">
								<section> International Flight Offers <div class="btnBorder"> <span class="plus"> </span> </div>
								</section>
								<p> Get super offers of upto 5% cashback when you book international flights. <span> Use
										promocode: <kbd> FLYHIGH </kbd> </span> </p>
							</li>
							<li class="accordTitle">
								<section> Offers on Luxury Hotels <div class="btnBorder"> <span class="plus"> </span> </div>
								</section>
								<p> Live the royale life! Majestic experience awaits you on the other side of booking. Now get
									complimentary access to spas, gyms and restaurants inside during your stay <span> Use code:
										<kbd> Majestic </kbd> </span> </p>
							</li>
							<li class="accordTitle">
								<section> Package Offers <div class="btnBorder"> <span class="plus"> </span> </div>
								</section>
								<p> Book for accomodation and travel together with bookmytrip and get super offers including 10%
									instant offer upto Rs.500 and 5% cashback to your bookmytrip wallet <span> Use promocode:
										<kbd> Combo15 </kbd></span> </p>
							</li>
							<li class="accordTitle">
								<section> Weekend Offers <div class="btnBorder"> <span class="plus"> </span> </div>
								</section>
								<p> Book tickets for buses or flights during the weekends and get extra 5% discount now. <span>
										Use promocode: <kbd> Weekend </kbd></span> </p>
							</li>
							<li class="accordTitle">
								<section> First-time User Offers <div class="btnBorder"> <span class="plus"> </span> </div>
								</section>
								<p> New to Bookmytrip? Get our super welcome offer of 40% cashback upto Rs.500 for booking
									flights, buses or hotels <span> Use promocode: <kbd> WELCOME </kbd> </span> </p>
							</li>
						</ul>
					</div>
					<div id="form">
						<h2> Login now to enjoy hand-made offers for you! </h2>
						<div id="loginBtn" class="btn-sign active-btn"> Login </div>
						<div id="signupBtn" class="btn-sign"> Sign Up </div>
						<form id="loginForm">
							<div>
								<input type="text" required />
								<label> Username or Email address </label>
							</div>
							<div>
								<input type="password" required />
								<label> Password </label>
							</div>
							<input type="submit" />
						</form>
						<form id="signupForm">
							<div>
								<input type="text" required />
								<label> Your Name </label>
							</div>
							<div>
								<input type="text" required />
								<label> Email ID </label>
							</div>
							<div>
								<input type="text" required />
								<label> Phone number </label>
							</div>
							<div>
								<textarea required="required"></textarea>
								<label> Bio </label>
							</div>
							<div>
								<input type="text" required />
								<label> Password </label>
							</div>
							<div>
								<input type="text" required />
								<label> Confirm Password </label>
							</div>
							<input type="submit" />
						</form>
					</div>
				</div>
			</div>
		</section>
		<section id="blogs">
			<div class="grid1440">
				<h1 class="title"> Latest Blogs </h1>
				<div id="screen">

				</div>
				<div id="loadingAnim">
					<img src="images/loading-spin.gif" alt="">
				</div>

				<div id="pagination">

				</div>
			</div>
		</section>
		<section id="apps">
			<div class="grid1440">
				<div class="explainer">
					<p> Get the same hassle-free experience to book tickets now on mobile apps! </p>
				</div>
				<div class="app-btn apple">
					<button> Download from Apple Store </button>
				</div>
				<div class="app-btn android">
					<button> Download from Play Store </button>
				</div>
			</div>
		</section>
		<section id="policies">
			<div class="grid1440">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores beatae illum eveniet, voluptatibus
					voluptate numquam, modi! Maiores numquam temporibus excepturi, nesciunt vero, consectetur ex quae
					eligendi, veniam officia quas beatae possimus assumenda. Error fugit laboriosam, quaerat nesciunt
					voluptatum repudiandae ex. </p>

				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores beatae illum eveniet, voluptatibus
					voluptate numquam, modi! Maiores numquam temporibus excepturi, nesciunt vero, consectetur ex quae
					eligendi, veniam officia quas beatae possimus assumenda. </p>
			</div>
		</section>
			
			

		</section>
		<?php include("footer.php"); ?>
	</div>


	<script src="js/carouselScript.js"> </script>
	<script src="js/parallaxScript.js"> </script>
	<script src="js/loaderScript.js"> </script>
	<script src="js/uiScript.js"> </script>
</body>

</html>
