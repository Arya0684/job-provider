<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 30%;
        }
    </style>
</head>
<body>
<?php

    include "config1.php";
    include "include/css.html";

    if(isset($_GET["jobtype"])!==null){
        $jobtype=$_GET["jobtype"];
    }
    else
    {
        echo "<script>alert('Sorry Something Is Wrong');document.location.href='jobpost.php';</script>";
    }

?>
<?php
if(isset($_SESSION['userId'])!=null){
        $userId=$_SESSION['userId'];
    $sql="select * from user_details where id='$userId'";
    $result=$conn->query($sql);
    if($result->num_rows==0){

        echo "<script>alert('No Record Found');document.location.href='profile.php';</script>";
    }else{
        while($row=$result->fetch_assoc()){
            $name=$row["name"];
        }
    }
}
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
        <!-- Navbar End -->

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Hello...</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Company Information</h1>
            </div>
        </div>
<?php
        $getJobPost="SELECT * from jobpostdetail where status=1 and jobtype='$jobtype'";
        $jobPostResult=$conn->query($getJobPost);
        while($row=$jobPostResult->fetch_assoc()){
?>
            <div class="job-item p-4 mb-4" style="width: 90%; margin-left: 5%; border: 2px solid #08cf7f; border-radius: 15px;">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="../img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row["name"];?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row["address"];?></span>
                                            <span class="text-truncate me-3"><i class="far fa-envelope text-primary me-2"></i><?php echo $row["email"];?></span>
                                            <span class="text-truncate me-0"><i class="fa fa-phone text-primary me-2"></i><?php echo $row["contact"];?></span>
                                            <span><i class="far fa--alt text-primary me-2">Openings</i><?php echo $row["opening"];?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <small class="text-truncate"><a class="btn btn-primary py-3 px-5 mt-3" href="" style="color: white; font-size: 18px; border-radius: 10px;">Apply Now</a></small>
                                    </div>
                                </div>
                            </div>

<?php
}
  include "include/footer.html";
?>
</div>
</body>
</html>