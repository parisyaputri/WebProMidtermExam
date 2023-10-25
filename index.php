<html>
	<head>
		<title>LoginPage</title>
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
	   <section class="LogPage"></section>
	      <div class="Form_container">
		    <div class="Login_form">
		     <form action="login.php" method="post">
			   <h2>Login </h2>
			   <?php
				if (isset($_GET['error'])) {
				echo '<p class="error"> '.$_GET["error"].'</p>';
				}
				   if (isset($_GET['success'])) {
				   echo '<p class="success"> '.$_GET["success"].'</p>';}
			     ?>
			   <div class="input-box">
				  <input type="text" placeholder="Enter your Username here" name="Username" required>
				  <i class='bx bxs-user'></i>
			    </div>
			
			<div class="input-box">
				<input type="password" placeholder="Enter your Password here" name="Password" required>
				<i class='bx bxs-lock'></i>
			</div>
			
			<div class="Forgot">
				<a href="resetpass1.php"> Forgot Password? </a>
			</div>
			
			<button name="submit" type="submit" class="Login_btn" value="Login">Login Now </button>
			
            <div class="Register">
				<p> Don't have an account? <a href="register.php">Register</a></p>
			</div>
		  </form>
		 </div>
		</div>
   </body>
</html>