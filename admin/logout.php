<?php
	session_start();
	session_unset();
	session_destroy();
	echo "<script>alert('Logout Successfully');document.location.href='../adminlogin.php';</script>";	
?>