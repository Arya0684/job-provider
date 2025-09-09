<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Student Information</title>
</head>
<body>
<table>
		
	<form method="post">
		<tr>
			<th>Name</th>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" name="email"></td>
		</tr>
		<tr>
			<th>Mobile No.</th>
			<td><input type="number" name="number"></td>
		</tr>
		<tr>
			<th>Education</th>
			<td><select>
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
			<td><input type="radio" value="Male">Male
				<input type="radio" value="Female">Female
			</td>
		</tr>
		<tr>
			<th>Hobby</th>
			<td><input type="checkbox" value="Music">Music
				<input type="checkbox" value="Travelling">Travelling
				<input type="checkbox" value="Sports">Sports
				<input type="checkbox" value="Singing">Singing
				<input type="checkbox" value="Reading">Reading
			</td>
		</tr>
	</form>
</table>

</body>
</html>