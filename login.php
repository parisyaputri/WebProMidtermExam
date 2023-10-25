<?php
function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function db_connect(){
	$servername = "localhost";
	$db_username = "root";
	$password = "";
	$database = "mydiary";
	
	$conn = new mysqli($servername, $db_username, $password, $database);
	return $conn;
}

function login(){
	if (isset($_POST['Username']) && isset($_POST['Password'])) {
	
		$Username = validate($_POST['Username']);
		$Pass = md5(validate($_POST['Password']));
		
		if (empty($Username)){
			header("Location: index.php?error=Username is required");
			exit();
			
		} else if (empty($Pass)){
			header("Location: index.php?error=Password is required");
			exit();
		} else {
			$conn = db_connect();
			
			if ($conn->connect_error){
				die("Connection failed: " . $conn->connect_error);
			}
			$query = "SELECT `Username` FROM `user` WHERE `Username`= '$Username'";
			$result = $conn->query($query);
			if ($result->num_rows){
				$query = "SELECT `ID`, `Username` FROM `user` WHERE `Username`= '$Username' AND `Password`='$Pass'";
				$result = $conn->query($query);
				$conn->close();
				if($result->num_rows){
					//echo "Valid Input";
					session_start();
					$row=mysqli_fetch_assoc($result);
					$_SESSION['UserID'] = $row['ID'];
					$_SESSION['Username'] = $row['Username'];
					header("Location: landingpage.php");
					exit();
				}
				else{
					header("Location: index.php?error=Password is wrong");
					exit();
				}
			}
			else {
				header("Location: index.php?error=Username is wrong");
				exit();
			}
		}
	} else{
		header("Location: index.php");
		exit();
	}
}
	
function signup(){
	$Username = validate($_POST["Username"]);
	$Pass = md5(validate($_POST["Password"]));
    $Question = validate($_POST["Question"]);
    $Answer = validate($_POST["Answer"]);
	
	$conn = db_connect();
	
	$query = "SELECT 'Username' FROM `user` WHERE `Username`='".$Username."'";
	if($conn->query($query)->num_rows){
		// User exists
		header("Location: register.php?error=Username already taken");
		exit();
	}
	
	$query = "INSERT INTO `user`  (`Username`, `Password`, `Secretquestion`, `Answer`)
	            VALUES ('$Username', '$Pass', '$Question', '$Answer');";
				
	
	if ($conn->connect_error){
		die("Connection failed: " . $conn->connect_error);
	}
	$result = $conn->query($query);
	$conn->close();
	if($result){
		//echo "New user added successfully";
		header("Location: index.php?success=New User Succesfully Added");
	    exit();
	} else {
		echo "Failed to add new user";
	}
	
	
}
function CheckUserExist(){
	$Username = validate($_POST["Username"]);
	$Pass = md5(validate($_POST["Password"]));
	$Confirm = md5(validate($_POST["Confirm"]));
	$conn = db_connect();
	
	$query = "SELECT 'Username' FROM `user` WHERE `Username`='".$Username."'";
	if($conn->query($query)->num_rows){
		// User exists
		$conn->close();
		header("Location: register.php?error=Username already taken");
		exit();
	} else {
		$conn->close();
		 // Username does not exist
            echo '<form action="secretq.php" method="post">';
            echo '<input type="hidden" name="Username" value='.$Username.'>';
            echo '<input type="hidden" name="Password" value='.$Password.'>';
            echo '<input type="hidden" name="Confirm" value='.$Confirm.'>';
            echo '</form>';
            echo '<script>document.forms[0].submit();</script>';
            exit();
	}
}
function CheckUsername() {
    if (isset($_POST['Username'])) {
        $Username = validate($_POST['Username']);

        $servername = "localhost";
        $db_username = "root";
        $password = "";
        $database = "mydiary";

        $conn = new mysqli($servername, $db_username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT `Username` FROM `user` WHERE `Username` = '$Username'";
        $result = $conn->query($query);

        if ($result->num_rows) {
            // Username exists, redirect to the reset password page
            echo '<form action="resetpass2.php" method="post">';
            echo '<input type="hidden" name="Username" value="' . $Username . '">';
            echo '</form>';
            echo '<script>document.forms[0].submit();</script>';
            exit();
        } else {
            // Username does not exist, redirect to a page with an error message
            echo '<form action="resetpass1.php" method="post">';
            echo '<input type="hidden" name="error" value="Username not found">';
            echo '</form>';
            echo '<script>document.forms[0].submit();</script>';
            exit();
        }
    }
}

function CheckSecretquestion(){
	 if (isset($_POST['Username']) && isset($_POST['Answer']) ) {
        $Username = validate($_POST['Username']);
		$Answer = validate($_POST['Answer']);
		

        $conn = db_connect();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT `Username` FROM `user` WHERE `Username` = '$Username' AND `Answer`= '$Answer'";
        $result = $conn->query($query);
		$conn->close();
		
		if ($result->num_rows) {
            // Answer correct
            echo '<form action="resetpass3.php" method="post">';
            echo '<input type="hidden" name="Username" value="' . $Username . '">';
            echo '</form>';
            echo '<script>document.forms[0].submit();</script>';
            exit();
        } else {
            //  
			echo '<form action="resetpass2.php" method="post">';
            echo '<input type="hidden" name="Username" value="' . $Username . '">';
            echo '<input type="hidden" name="error" value="Wrong Answer">';
            echo '</form>';
            echo '<script>document.forms[0].submit();</script>';
            exit();
        }
	 }
}



function UpdatePassword(){
    if (isset($_POST['Username']) && isset($_POST['NewPassword']) && isset($_POST['ConfirmPassword'])) {
        $Username = validate($_POST['Username']);
        $Pass = md5(validate($_POST['NewPassword']));


        $conn = db_connect();

        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
		$query = "UPDATE `user` SET `Password` = '$Pass' WHERE `Username`= '".$Username."'";
		echo $query;
        $result = $conn->query($query);
		$conn->close();
        if ($result){
			header("Location: index.php?success=Password updated successfully");
			exit();
		}
       else {
            header("Location: resetpass3.php?error=Connection Error");
            exit();
        }
    }
}

function LogOut(){
	$_SESSION =array();
	header("Location: index.php");
    exit();
}

if ($_POST['submit'] == "Login"){
	login();
}
else if ($_POST['submit'] == "Sign Up"){
	signup();
}
else if ($_POST['submit'] == "resetpass1"){
	CheckUsername();
}else if ($_POST['submit'] == "resetpass2"){
	CheckSecretquestion();
}else if ($_POST['submit'] == "Update"){
	UpdatePassword();
}else if ($_POST['submit'] == "logout"){
	LogOut();
}else if ($_POST['submit'] == "register"){
	CheckUserExist();
}
?>