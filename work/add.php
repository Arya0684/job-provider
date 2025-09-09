<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Data</title>
</head>
<body>
<?php
	include "config.php";
?>
<form method="POST">
	<table cellpadding="5" cellspacing="5" border="1">
		<tr>
			<th>Name</th>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<th>Course</th>
			<td><select name="course">
				<option value="">-- Select Course --</option>
				<option value="Bachelor of Engineering">Bachelor of Engineering</option>
				<option value="Bachelor of commerce">Bachelor of Commerce</option>
				<option value="MBA">MBA</option>
				<option value="LLB">LLB</option>
				<option value="Other">Other</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="b1" value="submit"> <button type="submit" name="view">View</button></a></td>
		</tr>
	</table>
</form>
<?php

	if(isset($_POST['b1'])== "submit"){
		$action = $_POST['b1'];

		if($action == "submit"){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$course = $_POST['course'];

			$sql = "insert into studentdata (name , email , course) values ('$name' , '$email' , '$course')";

			if($conn->query($sql) === true){
				echo "<script>alert('Data added successfully');document.location.href='add.php';</script>";
			}
			else {
				// echo "<script>alert('Something went wrong');document.location.href='add.php';</script>";
				echo "Error: " . $conn->error;
			}
		}
	}

	if (isset($_POST['view'])) {
    header("Location: view.php");
    exit;
}
?>
</body>
</html>