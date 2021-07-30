<?php
session_start();
require_once "config.php";
$record= $_POST['record'];
$year= (int)$_POST['year'];
$s="SELECT * FROM roadtrafficincidents WHERE `Police_Force`='$record' && `Accident_Year`=$year;";
$result = mysqli_query($con, $s);
$num= mysqli_num_rows($result);
echo $num;
if($num >0 ){
		$reg= "DELETE FROM roadtrafficincidents WHERE `Police_Force`='$record' && `Accident_Year`=$year";
		mysqli_query($con, $reg);
		echo $reg;
		$_SESSION['msg']="$record   succesfully deleted";
			header ('location:admin.php');
	}else{
		$_SESSION['msg']="$record  not created";
		header ('location:admin.php');
	}   
?>