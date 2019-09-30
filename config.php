<?php
	define('PROJECT_URL','https://3b44913e.ngrok.io');	
	$con = mysqli_connect('127.0.0.1','root','','php_track_emails');
	if($con){
		mysqli_select_db($con,'php_track_emails');
	}else{
		die("Couldn't connect to database : " . mysqli_connect_error());
	}
	function generateUnique($length_of_string=10){
		global $con;
		$str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$uniq_id = substr(str_shuffle($str_result),0,10); 
		if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM `emails` WHERE uniq_id = '".$uniq_id."'"))>0){
    		$uniq_id = generateUnique($length_of_string);
    	}
		return $uniq_id;
	}
?>