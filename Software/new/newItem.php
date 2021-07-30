<?php
session_start();
require_once "config.php";
$record= $_POST['record'];
$count= (int)$_POST['count'];
$year= (int)$_POST['year'];

if(!isset($record)){
		$_SESSION['msg']="$record  already created";
		header ('location:admin.php');
	}else{
		$reg= "INSERT INTO roadtrafficincidents(`Accident_Year`, `Police_Force`, `All_Accidents`) VALUES ($year,'$record',$count)";
		mysqli_query($con, $reg);
		echo $reg;
		$_SESSION['msg']="$record succesfully created";
			header ('location:admin.php');
	}


?>