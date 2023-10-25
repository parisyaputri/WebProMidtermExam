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
					     <?php $query = "SELECT `Secretquestion` FROM `user` WHERE `Username` = '".$_POST["Username"]."'";
						    $servername = "localhost";
								$db_username = "root";
								$password = "";
								$database = "mydiary";

								$conn = new mysqli($servername, $db_username, $password, $database);
									$result = $conn->query($query);
									$row=mysqli_fetch_assoc($result);
						 ?>
					<h2>Reset <br>Password<br> </h2>
						<?php
						  if(isset($_POST['error'])){
							  echo "<div class='error'>".$_POST['error']."</div>";
						  }
						?>
					  <div class="input-box">
						<div id="Question">
						  <center><?php echo $row['Secretquestion']; ?></center>
						</div>
					  </div>
					
					  <div class="input-box">
						<input type="text" placeholder="Enter your Answer here" name="Answer" required>
						  <i class='bx bxs-pencil'></i>
					  </div>
					
					<button name="submit" type="submit" class="Login_btn" value="resetpass2"> Next </button>
					
					<div class="Register">
						<p> Already have an account? <a href="index.php" class="Cont_link">Login</a></p>
					</div>
				  </form>
				 </div>
				</div>
		   </body>
			
</html>