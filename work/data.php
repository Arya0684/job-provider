<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
				<th>Number</th>
				<td><input type="number" name="number"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="b1" value="save"> <input type="submit" name="b1" value="view"> <input type="submit" name="b1" value="search"></td>
			</tr>
		</table>
	</form>
<?php
		
	if (isset($_POST['b1'])!=null){
		$action = $_POST['b1'];

		if($action == "save"){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$number = $_POST["number"];

			$sql = "insert into data (name , email , number) values ('$name' , '$email' , '$number')";

			if($conn->query($sql)==true){
				echo "<script>alert('Data added successfully');document.location.href='data.php';</script>";
			}
			  else {
				echo "<script>alert('Something went wrong');document.location.href='data.php';</script>";
			  }
		}

	if ($action == "view"){
		$sql = "select * from data";
		$result = $conn->query($sql);

		if($result->num_rows == 0){
			echo "<script>alert('No record found');document.location.href='data.php';</script>";
		}
		  else {
		  	while($row = $result->fetch_assoc()){
		  		echo "<br/>".$row["id"]." ".$row["name"]." ".$row["email"]." ".$row["number"];
		  		echo "<a href='update.php?sid=$row[id]'>update</a>"." ";
		  		echo "<a href='data.php.php?sid=$row[id]'>delete</a>"." ";
		  	  	}
		  }
	}

	if ($action == "search"){
		$name = $_POST["name"];
		$sql = "select * from data where name = '$name'";
		$result = $conn->query($sql);

		if($result->num_rows == 0){
			echo "<script>alert('No record found');document.location.href='data.php';</script>";
		}
		  else{
		  	while($row = $result->fetch_assoc()){
		  		echo "<br/>".$row["id"]." ".$row["name"]." ".$row["email"]." ".$row["number"];
		  	}
		  }
	}
}
?>
</body>
</html>