<?php
	include "config.php";

	$sql = "select * from studentdata";
	$result = $conn->query($sql);

		if($result->num_rows==0){
			echo "<script>alert('No record found');document.location.href='add.php';</script>";
		}
		else {
			while($row = $result->fetch_assoc()){
				echo "<br/>".$row["id"]." ".$row["name"]." ".$row["email"]." ".$row["course"];
			}
		}
?>