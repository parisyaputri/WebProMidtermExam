<?php
include 'connect.php';
session_start();
 
$query= "SELECT `ID`, `Title`, `Date`, SUBSTRING(`Content`, 1, 100) AS `Content`  FROM `newdiary` WHERE `UserID` = '".$_SESSION['UserID']."' ORDER BY `Date` DESC";
$result = mysqli_query($con, $query);
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
			  <div class="navbarcontainer" action="post">
				<div style="background-size: cover; height:480px; padding-top:-5px; text-align: center;">
				 <img src="male-avatar.jpg" style="height:150px; border-radius: 50%; border: 10px solid #FEDE00;">
					<li><div class= "navbarUsername" ><?php  echo $_SESSION['Username']; ?></a></div></li>
					  <li><div class= "navbarbutton"><a href="landingpage.php" style="text-decoration: none; color: white;">My Diary</a></div></li>
					  <li><div class= "navbarbutton"><a href="public.php" style="text-decoration: none; color: white;">Public Diary</a></div></li>
					  <li><div class= "button buttonRound" ><a href="AddNew.php" style="text-decoration: none; color: white; font-weight: bold; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">+ Add New</a></div></li>
			  </div>
				</div>
			</ul>
           </nav>
  
  <article>
    <div class= "articleContainer">
      <form action="searchh.php" method="post" class="search-bar">
        <input type="text" placeholder="Search Here" name="Search">
        <button type="submit" name="search-sub"> <img src="search.png"> </button> 
     </form>
	 <?php
		if ($result) {
		  while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['ID'];
			$title = $row['Title'];
			$date = $row['Date'];
			$content = $row['Content'];
			echo '<div class="diary_Container diary_Round">
			        <div class="diaryentry">
                       <div id="diary_Title" name="Title">'.$title.'</div>
                       <div class="diary_DayDate" name="Date">'.$date.'</div>
                       <div class="diary_content" name="Content">'.$content.'</div>
				    </div>
					<div class="features">
					    <div class="diary_Preview">
					      <form method="post" action="seeDetail.php">
						     <input type="hidden" name="id" value="'.$id.'">
					         <button type="submit" value="submit"><img src="detail.svg" style="height: 40px;"></button>
						  </form>
					    </div>
						<br>
                        <div class="diary_editButton"><a href="edit.php?ID='.$id.'"><img src="edit.svg" style="height: 40px;"></a></div> 
						<br>
                        <div class="diary_delete">
					      <a href="remove.php?deleteid='.$id.'" onclick="showRemoveConfirmation();""><img src="remove.svg" style="height: 40px;"></a>
					   </div>
                    </div>
                  </div>';
		  }
		}
	 
	 ?>
    </div>
  </article>
</section>


</body>
</html>