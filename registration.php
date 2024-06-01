<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Form Submission </title>
<style>
*
	{
		margin: 0px;
		padding: 0px;
		font-family: signika;
	}
#formContainer
	{
		width: 720px;
		padding: 30px;
		margin: 0px auto;
		background-color: #BCBCBC;
		background: linear-gradient(#EFEFEF,#BCBCBC);
	    box-shadow: 0px 2px 12px #666;
	}
form label
	{
		display: block;
	}
#formContainer h1
	{
		margin-bottom: 30px;
	}
form input[type=text], form input[type=password], form select
	{
		width: 100%;
		height: 30px;
		margin-bottom: 15px;
		text-indent: 15px;
	}
form input[type=submit]
	{
		display: block;
		padding: 10px 60px;
		background-color: #2B68A7;
		color: white;
		border: none;
		margin: 30px auto;
	}
 .success
	{
		padding: 10px 10px 10px 40px;
		background-color: #9CDF9A;
		color: #196919;
		font-weight: bold;
		margin-bottom: 15px;
		background-image: url("images/right1.png");
		background-size: 40px 40px;
		background-repeat: no-repeat;
		background-position: top left;
	}
 .danger
	{
		padding: 10px 10px 10px 40px;
		background-color: #EFADAD;
		color: #891212;
		font-weight: bold;
		margin-bottom: 15px;
		background-image: url("images/wrong1.png");
		background-size: 40px 40px;
		background-repeat: no-repeat;
		background-position: top left;
	}
  .phone-prefix
	{
		width: 34px;
		height: 33px;
		line-height: 34px;
		text-align: center;
		float: left;
		background-color: white;
	}
  #phone
	{
		width: 90%;
	}
</style>
</head>

<body>
<div id = "formContainer">
<?php
	
	if(isset($_GET['submit']))
     {
	   $fname = $_GET['fname'];
	   $lname = $_GET['lname'];	
	   $pwd1 = $_GET['pwd1'];
	   $pwd2 = $_GET['pwd2'];
	   $email = $_GET['email'];
	   $phone = $_GET['mobile'];
	   $state = $_GET['state'];
	   if(isset($_GET['gender']))
	     $gender = $_GET['gender'];
	   else
		 $gender = "";
	   $errorno = 0;
	   $errormsg = "<ul> ";

	  if(empty($fname))
	   {
		  $errorno++;
		  $errormsg = $errormsg."<li> First name is missing </li> ";
	   } 
		
	  if(empty($lname))
	   {
		  $errorno++;
		  $errormsg = $errormsg."<li> Last name is missing </li> ";
	   }

	   if(empty($pwd1))
	   {
		  $errorno++;
		  $errormsg = $errormsg."<li> Password is missing </li> ";
	   }
	   else
	   {
		   if(strlen($pwd1)<6)
		   {
			  $errorno++; 
			  $errormsg = $errormsg."<li> Password must have at least 6 characters </li> ";
		   }
		  
	   }
	   

	   if(empty($pwd2))
	   {
		  $errorno++;
		  $errormsg = $errormsg."<li> Please retype your password </li> ";
	   }
	   else
	   {
		   if(strcmp($pwd1, $pwd2) != 0)
		   {
			  $errorno++;
		      $errormsg = $errormsg."<li> Passwords do not match </li> ";  
		   }
		   else
		   {
			  passwordEncrypt($pwd2); 
		   }
	   }

	   if(empty($email))
	   {
		  $errorno++;
		  $errormsg = $errormsg."<li> Email is missing </li> ";
	   }
	   else
	   {
		   $emailpattern = '/^[A-z0-9]{1,}((\.)?(\_)?(\.)?)?[A-z0-9]{1,}(\@){1}[A-z]{2,10}(\.){1}[A-z]{2,6}((\.)[A-z]{3})?((\.)[A-z]{2})?/';
		   if(!preg_match($emailpattern,$email))
		   {
			  $errorno++;
		      $errormsg = $errormsg."<li> Type a valid email </li> ";  
		   }
	   }

	   if(empty($phone))
	   {
		  $errorno++;
		  $errormsg = $errormsg."<li> Phone number is missing </li> ";
	   }
	   else
	   {
		  /* if(!is_numeric($phone))
		   {
			  $errorno++;
		      $errormsg = $errormsg."<li> Phone number is not valid </li>"; 
		   }  */
		   
		   $pattern =  '/^((\+)?[9][1](\s)?(\-)?(\s)?)?[789]\d{9}$/';
		   if(!preg_match($pattern, $phone))
		   {
			  $errorno++;
		      $errormsg = $errormsg."<li> Phone number is not valid </li>"; 
		   }
	   }

	   if($state == "0")
	   {
		  $errorno++;
		  $errormsg = $errormsg."<li> State is missing </li> ";
	   }

	   if(empty($gender))
	   {
		  $errorno++;
		  $errormsg = $errormsg."<li> Please enter your gender </li> ";  
	   }

	   $errormsg = $errormsg." </ul>";
	   
	   if($errorno != 0)
		 echo "<div class = 'danger'> Your form has ".$errorno." errors ".$errormsg." </div>";  
	   else   
         echo "<div class = 'success'> Form submitted succesfully </div>";
     }
	
	function passwordEncrypt($pwd)
	{
		$hashFormat = '$2y$10$';  //any conventional hash_format
		$mySalt = generateSalt();
	    $mixture = $hashFormat.$mySalt;
	    $encryptedPwd = crypt($pwd,$mixture); //Blowfish algorithm
		echo $encryptedPwd;
	}
	
	function generateSalt()
	{
		$uniqueString = md5(uniqid(mt_rand(),true)); 
		$base64encoded = base64_encode($uniqueString);
		$modifiedString = str_replace("+",".",$base64encoded);
		$actualSalt = substr($modifiedString,0,22);
		return $actualSalt;
	}

	   
?>
<h1> Register your bookmytrip account! </h1>
 <form method = "GET" action = "">
    <label> First Name </label>	
	<input type = "text" placeholder = "Type your First Name (Eg., John)" name = "fname" value = "<?php if(isset($fname)) if($errorno!=0) echo $fname; ?>" />
    <label> Last Name </label>
	<input type = "text" placeholder = "Type your Last Name (Eg., Smith)" name = "lname" value = "<?php if(isset($lname)) echo $lname; ?>" />
    <label> Email </label>
	<input type = "text" placeholder = "Type your email (Eg., johnsmith@gmail.com)" name = "email" value = "<?php if(isset($email)) echo $email; ?>" />
	<label> Password </label>
	<input type = "password" placeholder = "Type a strong password" name = "pwd1" value = "<?php if(isset($pwd1)) echo $pwd1; ?>"/>
	<label> Confirm Password </label>
	<input type = "password" placeholder = "Retype your password" name = "pwd2" value = "<?php if(isset($pwd2)) echo $pwd2; ?>"/>
    <label> Phone Number </label>
	<div class = "phone-prefix"> +91 </div><input id = "phone" type = "text" placeholder = "Enter your phone number (Eg. 9655XXXXXX)" name = "mobile" value = "<?php if(isset($phone)) echo $phone; ?>" />
    <label> State </label>
	<select name = "state">
	   <option value = "0"> -- Choose a state -- </option>
	   <option> Tamil Nadu </option> 
	   <option> Karnataka </option> 
	   <option> Kerala </option> 
	   <option> Andhra </option> 
	   <option> Maharastra </option> 
	</select>
    <label> Gender </label>
	<input type="radio" name = "gender" value = "Male" /> Male
	<input type="radio" name = "gender" value = "Female" /> Female
	<br/>
	<input type="submit" name = "submit" value = "Register" />
	
 </form>
</div>
</body>
</html>