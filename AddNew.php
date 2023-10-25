<?php
	include 'connect.php';
	//require_once('./operations.php');
	 session_start();
	
	if(isset($_POST['AddNew'])){
		$title=$_POST['Title'];
		$date=$_POST['Date'];
		$content=$_POST['Content'];
		$publish=$_POST['diary_Publish'];
		
		$sql = "INSERT INTO `newdiary` (`Title`, `Date`, `Content`, `UserID`, `Publish`) 
		   VALUES ('$title', '$date', '$content', ".$_SESSION['UserID']." , '$publish')";
		$result=mysqli_query($con,$sql);
		if($result){
			header("Location:landingpage.php");
		}else {
			die(mysqli_error($con));
		}
	}
?>

<html lang="en">
<head>
	<title>Landing Page</title>
		<link rel="stylesheet" href="style1.css">
		<link href='https://fonts.googleapis.com/css?family=DM Sans'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
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
      <li><div class= "button buttonRound"><a href="AddNew.php" style="text-decoration: none; color: white;">+ Add New</a></div></li>
    </div>
    </ul>
  </div>
  </nav>
  </nav>
<div class="articlebg">
  <article>
      
    <div class= "articleContainer">
	
        <div class ="diary_New">
     
          <div class="diary_Container2 diary_Round">
          <form method="post" action="AddNew.php">
		     <h2><center> <b> NEW DIARY <b> </center></h2> <br>
			   <p> Please fill this form! </p> </br>
			    <div class="diary_new">
				<label for="title"> <b> Title</b></label><br>
				<input type="text" id="title" name="Title"  class="date" autocomplete="off" value=""></br>
					<label for="date">Date</label><br>
					<input type="date" id="date" name="Date" required  class="date" autocomplete="off" ></br>
						<label for="diary_Content" >Contents</label></br>
						<textarea id="diary_Content" name="Content" class="Content" required autocomplete="off"></textarea><br></br>
						     <p>Public the diary?</p>
								<input type="radio" id="diary-publish-yes" name="diary_Publish" value="1" action="public.php"checked>
								    <label for="diary-publish-yes" > Yes</label>
								<input type="radio" id="diary-publish-no" name="diary_Publish" value="0" action="landingpage.php>
									<label for="diary-publish-no">No</label>
								</div> <br>
            <button type="submit" class="btn-submit" name="AddNew">Submit</button>
		  <button class="btn-back" ><a href="landingpage.php" class="text-light">Back</a></button> </br>
          </form>
        </div>
        </div>
		</div>
      </article>
      </section>
  </body>
</html>