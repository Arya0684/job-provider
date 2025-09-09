<?php 
	
	include "include/config1.php";
	if( isset($_GET["id"])!=null && isset($_GET["status"])!=null){
		$status=$_GET["status"]==1?0:1;
		$id=$_GET["id"];
		$sql="update jobpostdetail set status='$status' where id=$id";
		if($conn->query($sql)==true){
			echo "<script>alert('Status Update Successfully');document.location.href='jobpost.php';</script>";
			exit();
		}
		else{
			echo "<script>alert('Sorry Job Status Not Updated');document.location.href='jobpost.php';</script>";
		}
	}

?>