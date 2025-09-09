<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form method="POST">
	<table cellpadding="10" cellspacing="5" border="1">
		<tr>
			<th>Name</th>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="b1" value="Save"> <input type="submit" name="b1" value="View"> <input type="submit" name="b1" value="Search"></td>	
		</tr>
	</table>
</form>
<?php
	include "config.php";

	if(isset($_POST['b1'])!=null){
		$action=$_POST['b1'];

	if($action=="Save"){

		$name=$_POST['name'];
		$email=$_POST['email'];

		$sql="insert into info (name , email) values ('$name' , '$email')";

		if($conn->query($sql)==true){
			echo"<script>alert('Data added successfully');document.location.href='practice.php';</script>";
		}
		else{
			echo"<script>alert('Something went wrong!');document.location.href='practice.php';</script>";	
		}
	}

	if($action == "View"){
		$sql="select * from info";
		$result=$conn->query($sql);

	if($result->num_rows==0){
		echo "<script>alert('No record found');document.location.href='practice.php';</script>";
	}
	else {
		// while($row=$result->fetch_assoc()){
		// 	echo "<br/>"."<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td></tr>";
		// }
		echo "<br/><table border='1' cellpadding='5'>";
		echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Update & Delete</th></tr>";

		while($row = $result->fetch_assoc()){
    	echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td><td>"."<a href='update.php?sid=$row[id]'>Update</a>"." "."<a href='practice.php?sid=$row[id]'>Delete</a>"."</td></tr>";
    	// echo "<a href='update.php?sid=$row[id]'>Update</a>";
    	// echo "<a href='practice.php?sid=$row[id]'>Delete</a>";
}

echo "</table>";
	}
}
	
	if($action == "Search"){
		$name=$_POST["name"];
		$sql="select * from info where name= '$name'";

		$result=$conn->query($sql);

	if($result->num_rows==0){
		echo "<script>alert('No record found');document.location.href='practice.php';</script>";
	}
	else {
		// while($row=$result->fetch_assoc()){
		// 	echo "<br/>"."<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td></tr>";
		// }
		echo "<table border='1' cellpadding='5'>";
		echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

		while($row = $result->fetch_assoc()){
    	echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td></tr>";
	}

echo "</table>";
	}
}
}
	
	if(isset($_GET['sid'])!=null){
		$sid = $_GET['sid'];

		$sql = "delete from info where id = '$sid'";

		if($conn->query($sql)==true){
			echo "<script>alert('Record deletd successfully');document.location.href='practice.php';</script>";
		}
		else {
			echo "<script>alert('Something went wrong');document.location.href='practice.php';</script>";
		}
	}

?>
</body>
</html>
