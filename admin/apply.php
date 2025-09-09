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
<?php

    include "include/config1.php";
    include "include/css.html";

?>

<div class="container-xxl bg-white p-0">
        
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobProvider</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="profile.php" class="nav-item nav-link">Profile</a>
                    <a href="jobpost.php" class="nav-item nav-link">Jobs</a>
                    <a href="../about.php" class="nav-item nav-link">About</a>
                    <a href="../contact.php" class="nav-item nav-link">Contact</a>
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </nav>
</div>
	
	<form name="user" onsubmit="return validation()" style="height:100vh; width:100%; display: flex; align-items: center; justify-content: center; margin-left: 10%;">
                                <div class="row g-3">
                                	<div class="heading"><h3 value="<?php echo $jobtype ?>"></h3></div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name"placeholder="Enter Your Name">
                                            <label for="name">Enter Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="number" name="number" placeholder="Mobile No">
                                            <label for="number">Mobile No</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"placeholder="Email">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="b1" value="Submit" style="border-radius: 15px;">Submit</button>
                                    </div>
                                </div>
        </form>

</body>
</html>