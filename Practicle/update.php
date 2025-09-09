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

	if(isset($_GET["sid"])!=null){
		$sid=$_GET["sid"];
	}
	else {
		echo "<script>alert('Something wrong here');document.location.href='practice.php';</script>";
		// exit();
	}

	$sql = "select * from info where id = '$sid'";
	$result = $conn->query($sql);

	if($result->num_rows==0){
		echo "<script>alert('No record found');document.location.href='practice.php';</script>";
		// exit();
	}
	 else {
	 	while($row = $result->fetch_assoc()){
	 		$name = $row["name"];
	 		$email = $row["email"];
	 	}
	 }

?>
<form method="POST">
	<table cellpadding="10" cellspacing="5" border="1">
		<tr>
			<th>Name</th>
			<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email" value="<?php echo $email; ?>"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="b1" value="Update"></td>	
		</tr>
	</table>
</form>

<?php
	
	if(isset($_POST['b1'])!=null){
		$action=$_POST['b1'];

		if($action=="Update"){
	 		$name = $_POST["name"];
	 		$email = $_POST["email"];

	 		$sql = "update info set  name = '$name' , email = '$email' where id = '$sid'";

	 		if($conn->query($sql)==true){
	 			echo "<script>alert('Data Upadted successfully');document.location.href='practice.php';</script>";
	 		}
	 		else {
	 			echo "<script>alert('Something went wrong');document.location.href='practice.php';</script>";
	 		}
		}
	}
?>
</body>
</html>