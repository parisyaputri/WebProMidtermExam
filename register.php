<html>
	<head>
		<title>RegisterPage</title>
		<link rel="stylesheet" type="text/css" href="style1.css">
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<script>
		   function checkPass(){
			let password = document.getElementById 
			("Pass").value;
			let cnfrmPassword = document.getElementById 
			("Conf").value;
			console.log(password, cnfrmPassword);
			let message = document.getElementById("message");
	
			if(password.length != 0){
					if(password == cnfrmPassword){
						return true;
					}
					else{
						message.textContent = "Password don't match!"
						   message.style.backgroundColor = "#F7BDB1";
						   message.style.color = "#8A1B04"; // Add text color
						   message.style.padding = "5px";
						   message.style.border = "0 20px solid #fff";
						   
						  
						return false;
					
			   }
             }
			 return false;
		   }
		   

		</script>
	</head>
	<body>
		<header class="mydiary">
			<nav class="nav">
				<a href="#" class="nav_logo"> <b> MyDiary </b> </a>
				<button class="Login_button" action="index.php">Login</button>
		   </nav>
	   </header>
	   
		<!-- Login Page-->
		<section class="LogPage">
			<div class="Form_container">
				<div class="Login_form">
					<form action="login.php" method="post" onsubmit="return checkPass()">
						<h2>Register </h2>
						<?php
						  if(isset($_GET['error'])){
							  echo "<div class='error'>".$_GET['error']."</div>";
						  }
						?>
							<p id="message"></p>
						<div class="input-box">
							<input type="text" placeholder="Enter your Username here" name="Username" required>
							<i class='bx bxs-user'></i>
						</div>
						
						<div class="input-box">
							<input type="password" placeholder="Enter your Password here" name="Password" id="Pass" >
							<i class='bx bxs-lock'></i>
						</div>
						
						<div class="input-box">
							<input type="password" placeholder="Confirm your Password here" name="Confirm" id="Conf" required  >
							<i class='bx bxs-lock'></i>
							
						</div>
						
						
						<button type="submit" name="submit" value="register" class="Login_btn"> Next </button>
						
						<div class="Register">
							<p> Already have an account? <a href="index.php" class="Cont_link">Login</a></p>
						</div>
					</form>
				</div>
			</div>
		</section>
   </body>
	
</html>