<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 30%;
        }
    </style>
</head>
<body>
<?php
    include "include/css.html";
    include "config1.php";

    if(isset($_SESSION['userId'])!=null){
        $userId=$_SESSION['userId'];
        $sql="select * from user_details where id='$userId'";
        $result=$conn->query($sql);
        if($result->num_rows==0){

        echo "<script>alert('No Record Found');document.location.href='profile.php';</script>";

        }
        else {
            
        while($row=$result->fetch_assoc()){
            $name=$row["name"];
        }
    }
}
else{
     echo "<script>alert('Your Session is Expired');document.location.href='../login.php';</script>";
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
                    <a href="jobpost.php" class="nav-item nav-link active">Jobs</a>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Hello...<?php echo $name;?></h1>
                <nav aria-label="breadcrumb">
                   
                </nav>
            </div>
        </div>
        <!-- Header End -->
<?php 
    $getJobPost="SELECT id,sum(opening) as opening,jobtype FROM `jobpostdetail` WHERE status=1 group by jobtype";
    $jobPostResult=$conn->query($getJobPost);
?>
        <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
        <?php
                while($jobRows=$jobPostResult->fetch_assoc()){

                    $jobType = $jobRows["jobtype"];
    
    $icon = "";

    if ($jobType == "Customer Service") {
        $icon = "fa-headset";
    } else if ($jobType == "Design and Creative") {
        $icon = "fa-paint-brush";
    } else if ($jobType == "Marketing") {
        $icon = "fa-bullhorn";
    } else if ($jobType == "Human Resource") {
        $icon = "fa-users";
    } else if ($jobType == "Project Management") {
        $icon = "fa-tasks";
    }
    //  else ($jobType == " Other") {
    //     $icon = "fa-briefcase";
    // }
        ?>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="border: 2px solid #08cf7f; width: 270px; margin-right: 15px; border-radius: 10px;">
                        <a class="cat-item rounded p-4" href="view_jobs_details.php?jobtype=<?php echo $jobRows["jobtype"];?>">
                            <i class="fa fa-3x fa-mail-bulk text-primary <?php echo $icon; ?> mb-4"></i>
                            <h6 class="mb-3"><?php echo $jobRows["jobtype"];?></h6>
                            <p class="mb-0"><?php echo $jobRows["opening"];?> Vacancy</p>
                        </a>
                    </div>
        <?php
            }
        ?>
                    
            </div>
        </div>

</div>
<?php
    include "include/footer.html";
?>
</body>
</html>