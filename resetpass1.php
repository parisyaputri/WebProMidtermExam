<html>
	<head>
		<title>RegisterPage</title>
		<link rel="stylesheet" type="text/css" href="style1.css">
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
					<form action="login.php" method="post">
						<h2>Reset <br>Password</br> </h2>
						<?php
						  if(isset($_POST['error'])){
							  echo "<div class='error'>".$_POST['error']."</div>";
						  }
						?>
						<div class="input-box">
							<input type="text" placeholder="Enter your Username here" name="Username" required>
							<i class='bx bxs-user'></i>
						</div>
						<button type="submit"  name="submit" value="resetpass1" class="Login_btn"> Next </button>
						
						<div class="Register">
							<p> Already have an account? <a href="index.php" class="Cont_link">Login</a></p>
						</div>
					</form>
				</div>
			</div>
		</section>
   </body>
	
</html>