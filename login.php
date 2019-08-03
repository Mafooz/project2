<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<?php include('conf/db_conn.php')?>
	<?php
	$erroruse="";
	$errorpass="";
	$username="";
		if(isset($_GET['button'])){
			$username=$_GET["username"];
			$psw=$_GET["psw"];
			$erroruse=checkuse($username);
			$errorpass=checkpass($psw);
			if($erroruse=="" && $errorpass==""){
				header("Location:Accounts/home.php");
			}
		}
		function checkuse($str1){
			if(strlen($str1)==0){
				return "username cannot be empty";
			}
			if(!preg_match("/^[a-zA-Z0-9]*$/",$str1)){
				return "username should be alphanumeric";
			}
		}
		function checkpass($str1){
			if(empty($str1)){
				return "enter a password";
			}
			if(strlen($str1)<8 ||strlen($str1)>15){
				return "password length should be between 8 and 16";
			}
			if(preg_match("/\s/",$str1)){
				return "no whitespaces allowed";
			}
			if(!preg_match("/\d/",$str1)){
				return "password should contain atleast one digit";
			}
		}
					
	?>



	<h1 style="text-align: center; font-size: 70px">Login</h1>
	<div style="border-style:solid; padding-top:10px;margin:10% 40% 90%; background-color:#FFFFFF;" >
	<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="get" >
		<label>Username</label>
		<input style="border-style:solid; border-radius:100px; border-width: 1.5px; border-color:green; border-left-color:green;"type="text" title="Enter username" name="username" value="<?php echo $username;?>">
		<span style="color:red"><?php echo $erroruse;?></span>
		<br>
		<br>
		<label>Password</label>
		<input type="password" title="Enter password" name="psw">
		<span style="color:red"><?php echo $errorpass;?></span>
		<br>
		<br>
		<button type="submit" name='button'>Login</button>
	</form>
</div>


</body>
</html>