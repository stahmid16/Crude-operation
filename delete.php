<?php
 require('config.php');

if(isset($_GET['delid'])){
	$id=$_GET['delid'];
	$sql= "DELETE FROM  `imgreg`  WHERE id='$id'";
	$result=mysqli_query($conn,$sql);
	if($result){
		echo "Delete successfull";
		header('location:display.php');


	}
	else{
		mysqli_error($conn);
		echo "Failed";
	}
}


?>