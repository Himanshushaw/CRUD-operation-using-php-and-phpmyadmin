<?php 
	include 'include/db.php';

 	$sql=" DELETE  FROM `department` WHERE id='".$_GET['id']."' ";
 	if(mysqli_query($mysqli,$sql)){
 		
 		echo " Record Deleted Successfully!";
 		header('location:index.php');
 	}
 	else
 	{

 		echo "Oops!! Error in Delete process";
 	}

?>