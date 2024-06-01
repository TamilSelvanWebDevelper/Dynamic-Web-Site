<?php

  $actualUsername = "udhaiya";
  $actualPwd = "Uday1202";
  $errorMsg = "";
  $isError = false;

  if(isset($_POST['signin']))
  {
	 $user = $_POST['username']; 
	 $pwd = $_POST['pwd'];
	 if($user == $actualUsername)
	 {
		 if($pwd == $actualPwd)
		 {
			 //Login
			 //Cookies
			 //session_start();
			 //$_SESSION['myuser'] = $actualUsername;
			 setcookie("myUser",$actualUsername,time()+60*60*24);
			 header('Location: profile.php');
		 }
		 else
		 {
			 $isError = true;
			 $errorMsg = "Password is wrong";
		 }
	 }
	 else
	 {
		 //Username not found
		 $isError = true;
		 $errorMsg = "Username not found registered with us";
	 }
  }
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
body
{
   background: url(rays.jpg);
   background-size: cover;
   font-family: Roboto;
}
	
#loginForm
{
   width: 600px;
   padding: 20px;
   backgound-color: black;
   background: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.95));
   box-shadow: 2px 2px 8px #000;
   margin: 150px auto;
   color: white;
}
	
#loginForm h1
{
	text-align: center;
}
	
form label
{
	display: block;
	margin-bottom: 10px;
}
	
form input[type = text], form input[type=password]
{
	width: 100%;
	height: 30px;
	margin-bottom: 25px;
	text-indent: 15px;
}
	
form input[type = submit], form input[type=reset]
{
	width: 49.5%;
	height: 35px;
	margin-bottom: 25px;
	margin-top: 25px;
}
	
form input[type = submit]
{
	background: linear-gradient(#2167C8,#14459A);
	border: none;
	color: white;
}
	
form input[type = reset]
{
	background: linear-gradient(#747474,#353535);
	border: none;
	color: white;
}

.error
	{
		background-color: #FBB;
		color: #900;
		padding: 5px 10px;
		margin: 20px 0px;
	}
	
	
</style>
</head>

<body>
  <div id = "loginForm"> 
	<h1> Login to BookMyTrip </h1>
	<?php
	   if(isset($_POST['signin']))
	   {
		   if($isError)
		   {
			   echo "<div class = 'error'>".$errorMsg."</div>";
		   }
	   }
	?>
	<form method = "POST">
	   <label> Username </label>
	   <input type="text" name = "username" placeholder = "Eg: JohnDoe"/>
	   <label> Password </label> 
	   <input type="password" name = "pwd" placeholder = "Your Password"/>
	   <a href = "registration.php"> New Here? Sign Up! </a><br/>
	   <input type="submit" name = "signin" value = "Login" />
	   <input type="reset" value = "Clear" />
	</form>
  </div>
</body>
</html>