<html>
<head>
	<title></title>
</head>
<body>
	<?php
		if($_SERVER['REQUEST_METHOD']=='GET'){
			$error=array('username'=>'','password'=>'','firstname'=>'','lastname'=>'','email'=>'');
			$username=$password=$firstname=$lastname=$email='';			
		}
		$error=array('username'=>'','password'=>'','firstname'=>'','lastname'=>'','email'=>'');
		$username=$password=$firstname=$lastname=$email='';
		//username
		if(isset($_POST['button'])){
			$username=htmlspecialchars($_POST['username']);
			if(empty($username)){
				$error['username']="Username cannot be empty";
			}
			else if(!preg_match('/^[A-Za-z1-9@]{6,}$/',$username)){
				$error['username']="Username can only contain alphabets, digits and @ and must be atleast 6 characters long";
			}
			//email 
			$email=htmlspecialchars($_POST['email']);
			if(empty($email)){
				$error['email']="Email cannot be empty";
			}
			else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$error['email']="Email is invalid";
			}
			//first name
			$firstname=htmlspecialchars($_POST['firstname']);
			if(empty($firstname)){
				$error['firstname']="Firstname cannot be empty";
			}
			else if(!preg_match('/^[A-Za-z@]+$/',$firstname)){
				$error['firstname']="Firstname is invalid";
			}
			//Last name
			$lastname=htmlspecialchars($_POST['lastname']);
			if(empty($lastname)){
				$error['lastname']="Lastname cannot be empty";
			}
			else if(!preg_match('/^[A-Za-z@]+$/',$firstname)){
				$error['Lastname']="Lastname is invalid";
			}
			if(!array_filter($error)){
				include('conf/db_conn.php');
				$username=mysqli_real_escape_string($conn,$_POST['username']);
				$firstname=mysqli_real_escape_string($conn,$_POST['firstname']);
				$lastname=mysqli_real_escape_string($conn,$_POST['lastname']);
				$email=mysqli_real_escape_string($conn,$_POST['email']);
				$query="INSERT INTO user(USERNAME,FIRSTNAME,LASTNAME,EMAIL) VALUES ('$username','$firstname','$lastname','$email')";
				if(mysqli_query($conn,$query)){
					$result=mysqli_query($conn,$query);
				}
				header("Location:Accounts/home.php?username=".$username);
			}
		}
			?>




	<h1 style="text-align: center; font-size: 70px">Login</h1>
	<div style="border-style:groove; padding:10px 20px 10px 100px;margin:10% 20% 10% 20%; background-color:powderblue;" >
		<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" >
			
			<label>Username</label>
			<input style="border-style:solid; border-radius:100px; border-width: 1px; border-color:green; border-left-color:green;"type="text" title="Enter username" name="username" value="<?php echo $username;?>">
			<b title="Username can only contain alphabets, digits,@ na dminimum 6 characters long">?</b>
			<span style="color:red"><?php echo $error['username'];?></span>
			<br>
			<br>
			
			<label>Password</label>
			<input style="border-style:solid; border-radius:100px; border-width: 1px; border-color:green; border-left-color:green;"type="password" title="Enter password" name="psw">
			<span style="color:red"><?php echo $error['password'];?></span>
			<br>
			<br>
			
			<label>First Name</label>
			<input style="border-style:solid; border-radius:100px; border-width: 1px; border-color:green; border-left-color:green;"type="text" title="Enter First Name" name="firstname" value="<?php echo $firstname;?>">
			<span style="color:red"><?php echo $error['firstname'];?></span>
			<br>
			<br>	
			
			<label>Last Name</label>
			<input style="border-style:solid; border-radius:100px; border-width: 1px; border-color:green; border-left-color:green;"type="text" title="Enter Last Name" name="lastname" value="<?php echo $lastname;?>">
			<span style="color:red"><?php echo $error['lastname'];?></span>
			<br>
			<br>
			
			<label>Email</label>
			<input style="border-style:solid; border-radius:100px; border-width: 1px; border-color:green; border-left-color:green;"type="text" title="Enter email" name="email" value="<?php echo $email;?>">
			<span style="color:red"><?php echo $error['email'];?></span>
			<br>
			<br>			

			<label>Batch</label>
			<input type="radio" name="batch" value="2019" checked>2019
			<input type="radio" name="batch" value="2018">2018
			<input type="radio" name="batch" value="2018">2017
			<input type="radio" name="batch" value="2018">2016

			<button type="submit" name='button'>Signup</button>
		</form>
	</div>
</body>
</html>