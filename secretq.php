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
		
	 
	   
	   <button class="Login_button">Login</button>
	   </nav>
	   </header>
	   
	   <!-- Login Page-->
	   <section class="LogPage"></section>
	      <div class="Form_container">
		  <div class="Login_form">
		  <form action="login.php" method="post">
			<input type="hidden" name="Username" value="<?php echo $_POST["Username"]?> ">
			<input type="hidden" name="Password" value="<?php echo $_POST["Password"]?> ">
			<input type="hidden" name="Confirm" value="<?php echo $_POST["Confirm"]?> ">
			
			<h2>Register </h2>
			<div class="input-box">
				<input type="text" placeholder="Enter your Secret Question here" name="Question" required>
				<i class='bx bx-question-mark' ></i>
			</div>
			
			<div class="input-box">
				<input type="text" placeholder="Enter your Answer here" name="Answer" required>
				<i class='bx bxs-pencil'></i>
			</div>
			

			
			<button name="submit" type="submit" class="Login_btn" value="Sign Up"> Sign Up </button>
			
            <div class="Register">
				<p> Already have an account? <a href="index.php" class="Cont_link">Login</a></p>
			</div>
		  </form>
		 </div>
		</div>
   </body>
	
</html>