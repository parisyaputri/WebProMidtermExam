<?php

	$con=new mysqli('localhost', 'root', '', 'mydiary');

	if(!$con){
		die(mysqli_error($con));
	} 
?>