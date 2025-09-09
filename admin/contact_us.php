<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    
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
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <!-- <a href="jobpost.php" class="nav-item nav-link">Jobpost</a> -->
                    <a href="contact.php" class="nav-item nav-link active">Contact</a>
        
                    <a href="logout.php" class="nav-item nav-link">LOGOUT</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact Details</h1>
            </div>
        </div>

        <!-- Contact End -->
       
<?php
    
      $sql="select * from contactdetails";
      $result=$conn->query($sql);
      $cnt=$result->num_rows;
      if($cnt==0){
        echo "<script>alert('No Record Found');document.location.href='../contact.php';</script>";
       }
     else{
?>
<?php
     
       while($row=$result->fetch_assoc()){   
   
    ?>
                        <div class="job-item p-4 mb-4" style="width: 90%; margin-left: 5%; border: 2px solid #08cf7f; border-radius: 15px; background-color: #fff;">
                                <div class="row g-4">   
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row["name"];?></h5>
                                            <span class="text-truncate me-3"><i class="far fa-envelope text-primary me-2"></i> Email :- <?php echo $row["email"];?></span><br>                                        
                                            <span class="text-truncate me-0"><i class="fas fa-book-open text-primary me-2"></i> Subject :- <?php echo $row["subject"];?></span><br>
                                            <span class="text-truncate me-0"><i class="fas fa-comment-alt text-primary me-2"></i> Message :- <?php echo $row["message"];?></span><br><br>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">     
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-primary" style="margin-left: 3px; margin-top: 45%" href="contact_us.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                        </div>
</div>

<?php
      }
    }
?>

<?php

  include "include/footer.html";

  if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sql = "delete from contactdetails where id='$id'";
    
    if($conn->query($sql)===true) {
        echo "<script>alert('Record Deleted Successfully');document.location.href='contact_us.php';</script>";
        exit ;
    } else {
        echo "<script>alert('Sorry Record Not Deleted');</script>";
    }
}
?>
<!-- <i class="fa fa-briefcase"></i> -->