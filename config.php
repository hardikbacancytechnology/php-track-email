<?php
	$con = mysqli_connect('127.0.0.1','root','','project1');
	if($con){
		mysqli_select_db($con,'project1');
	}else{
		die("Couldn't connect to database : " . mysqli_connect_error());
	}
	function generateUnique(){
		global $con;
		$uniq_id= rand(111, 999);
        $uniq_id.= rand(111, 999);        
    	if (mysqli_num_rows(mysqli_query($con,"SELECT * FROM `emails` WHERE uniq_id = '".$uniq_id."'"))>0){
    		$uniq_id = generateUnique();
    	}
		return $uniq_id;
	}
?>