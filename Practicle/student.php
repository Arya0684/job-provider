<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
 	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
		function validation()
		{
			var name = document.user.name.value;
			var email = document.user.email.value;
			var phone = document.user.phone.value;

			if(name.length==0)
			{
				alert('Please Enter Name');
				document.user.name.focus();
				return false;
			}
			if(name.length<2)
			{
				alert('Please Enter valid Name');
				document.user.name.focus();
                return false;
			}
			if(email.length==0)
			{
				alert('Please Enter Mail');
				document.user.email.focus();
				return false;
			}
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if(!email.match(mailformat))
            {
            	alert('Please Enter valid Mail');
				document.user.email.focus();
				return false;
            }
            if(phone==0)
			{
				alert('Please Enter Contact Number');
				document.user.phone.focus();
                return false;
			}
			var phoneexp=/^\d{10}$/;
			if(!phone.match(phoneexp))
			{
				alert('Please Enter valid Contact Number');
				document.user.phone.focus();
                return false;
			}
		}
	</script>
	<title>Student Information</title>
</head>
<body>
<?php
    include "config1.php";
?>
		
	<form method="POST" name="user" onsubmit="return validation()" enctype="multipart/form-data">
		<table cellpadding="5" cellspacing="5" border="1" align="center">
		<tr>
			<th>Name</th>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<th>Mobile</th>
			<td><input type="number" name="phone"></td>
		</tr>
		<tr>
			<th>Profile Image</th>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<th>Education</th>
			<td><select name="education">
				<option value=""></option>
				<option value="Bachelor of Engineering">Bachelor Of Engineering</option>
				<option value="Nursing">Nursing</option>
				<option value="Bachelor of commerce">Bachelor Of Commerce</option>
				<option value="MBA">MBA</option>
				<option value="BBA">BBA</option>
				<option value="Other">Other</option>
			</select></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td><input type="radio" name="r1" value="Male">Male
				<input type="radio" name="r1" value="Female">Female
			</td>
		</tr>
		<tr>
			<th>Hobby</th>
			<td><input type="checkbox" name="c1[]" value="Music">Music
				<input type="checkbox" name="c1[]" value="Travelling">Travelling
				<input type="checkbox" name="c1[]" value="Sports">Sports
				<input type="checkbox" name="c1[]" value="Singing">Singing
				<input type="checkbox" name="c1[]" value="Reading">Reading
			</td>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" name="b1" value="submit"></th>
		</tr>
	</table>

</form>
<?php
    if(isset($_POST['b1'])){
        $action=$_POST['b1'];

        if($action=="submit"){
        	$name=$_POST['name'];
        	$email=$_POST['email'];
        	$phone=$_POST['phone'];
        	$education=$_POST['education'];
        	$gender=$_POST['r1'];
        	$hobby = isset($_POST['c1']) ? $_POST['c1'] : array();
        	$hobby_str=implode(", ", $hobby);


        	$image = $_FILES['image']['name'];
    		$tmp_name = $_FILES['image']['tmp_name'];
   			move_uploaded_file($tmp_name, "uploads/".$image);

        	$sql = "insert into student (name , email , phone , image , education , gender , hobby) values ('$name', '$email', '$phone', '$image', '$education', '$gender', '$hobby_str')";

        	if($conn->query($sql)==true){
                 echo "<script>alert('Student information added successfully');document.location.href='student.php';</script>";
            }
             else {
                 echo "<script>alert('Something went wrong');document.location.href='student.php';</script>";
             	// die("Error: " . $conn->error);
            }
        }
    }
?>

</body>
</html>

<!-- extra
<?php
	include "config.php";

	if(isset($_POST['b1'])!=null){
		$action = $_POST['b1'];

		if($action == "save"){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$number = $_POST["number"];

			$sql = "insert into student (name, email, number) values('$name' , '$email' , '$number')";

			if($conn->query($sql)==true){
				echo "<script>alert('Data added successfully');document.location.href='practice.php';</script>";
			}
			else {
				echo "<script>alert('Data added successfully');document.location.href='practice.php';</script>";
			}
		}
	}

	if($action == "view"){
		$sql = "select * from student";
		$result = $conn->query($sql);

		if($result->num_rows == 0){
			echo "<script>alert('No record found');document.location.href='view.php';</script>";
		}
		else{
			while($row = $result->fetch_assoc()){
				echo "<br/>".$row[$id]." ".$row[$name]." ".$row[$email]." ".$row[$number];
			}
		}
	}

	if($action == "search"){
		$number = $_POST["number"];
		$sql = "select * from student where id = '$number'";
		$result = $conn->query($sql);

		if($result->num_rows == 0){
			echo "";
		}
		else{
			while($row = $result->fetch_assoc()){
				echo "";
			}
		}
	}

	if(isset($_GET['sid'])!=null){
		$sid = $_GET['sid'];
		$sql = "delete from student where id = '$sid'";

		if($conn->query($sql)){
			echo "";
		}
		else {
			echo "";
		}
	}

//before the form
	if(isset($_GET['sid'])!=null){
		$sid = $_GET['sid'];
	}
	  else {
	  	echo "";
	  }

	  $sql = "select * from student where id = '$sid'";
	  $result = $conn->query($sql);

	  if($result->num_rows == 0){
	  	echo "";
	  }
	  else {
	  	while($row = $result->fetch_assoc()){
	  		echo "";
	  	}
	  }
 
//after the form
	  if(isset($_POST['b1'])!=null){
	  	$action = $_POST['b1'];

	  	if($action == "update"){
	  		$name = $_POST['name'];
	  		$email = $_POST['email'];
	  		$number = $_POST['number'];

	  		$sql = "update student set name = '$name' , email = '$email' , number = '$number' where id = '$sid'";

	  		if($conn->query($sql)==true){
	  			echo "";
	  		}
	  		else {
	  			echo "";
	  		}
	  	}
	  }
?> --> 