<?php
session_start();
?>
<html lang="en">
	<head>
	<title>Landing Page</title>
	<link rel="stylesheet" href="style1.css" href='https://fonts.googleapis.com/css?family=DM Sans'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<script>
	  function diary_Remove(index) {
		  var confirmRemove = confirm("Are you sure you want to remove this diary?");
		  if (confirmRemove) {
			diaries.splice(index, 1);
			renderDiaries();
		  }
		}
		</script>
		</head>
	<body>
	<section>
	  <header class="header">
		<li><div class="headertext">My Diary Online</div>
		<li><div class= "logoutButton">
				<form method="post" action="login.php">
			       <button name="submit" class= "logout" style="text-decoration: none; color: black" value="logout">Logout
			         <img src="logout.svg" style="vertical-align: middle; padding-left: 5px; height: 50px;">
			       </button>
			    </form>
			    </div></li>
	  </header>
	  <nav>
		<ul>
		<div class="navbarcontainer">
		<div style="background-size: cover; height:480px; padding-top:-5px; text-align: center;">
		<img src="male-avatar.jpg" style="height:150px; border-radius: 50%; border: 10px solid #FEDE00;">
		<li><div class= "navbarUsername"><?php  echo $_SESSION['Username']; ?></a></div></li>
		  <li><div class= "navbarbutton"><a href="landingpage.php" style="text-decoration: none; color: white;">My Diary</a></div></li>
		  <li><div class= "navbarbutton"><a href="public.php" style="text-decoration: none; color: white;">Public Diary</a></div></li>
		  <li><div class= "button buttonRound"><a href="AddNew.php" style="text-decoration: none; color: white; font-weight: bold; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">+ Add New</a></div></li>
		</div>
		</div>
		</ul>
	  </nav>
  
  <article>
    <div class= "articleContainer">
      <form action="" class="search-bar">
        <input type="text" placeholder="Search Here" name="q">
        <button type="submit"> <img src="search.png"> </button> 
     </form>
	 <?php 
include 'connect.php';

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  
  $sql = "SELECT `Title`, `Date` , `Content` FROM `newdiary` WHERE id = $id AND `UserID` = '".$_SESSION['UserID']."'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $title = $row['Title'];
  $date = $row['Date'];
  $content = $row['Content'];

     echo '<div class="diary_Container2 diary_Round">
        <div class="diary_TitleDetail">'.$title.'</div>
        <!--Content disini ya, diary delete & edit harus dibawahnya content-->
        <div class="diary_DayDate">'.$date.'</div>
        <div class="diary_content">'.$content.'</div>
        <div class="button buttonRound"><a href="landingpage.php" style="text-decoration: none; color: white; font-weight: bold; font-family: system-ui, -apple-system, BlinkMacSystemFont, Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;">BACK</a></div>
      </div>';
}
	  ?>
	  
  </article>
</body>
</html>

