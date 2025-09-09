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
    <script type="text/javascript">
        function validation()
        {
            var jobtype = document.user.jobtype.value;
            var name = document.user.name.value;
            var address = document.user.address.value;
            var email = document.user.email.value;
            var contact = document.user.contact.value;
            var description = document.user.description.value;
            var opening = document.user.opening.value;

            if(jobtype==0){
                alert('Please Choose Jobtype');
                document.user.jobtype.focus();
                return false;
            }
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
            if(address.length==0)
            {
                alert('Please Enter Address');
                document.user.address.focus();
                return false;
            }
            if(address.length<50)
            {
                alert('Please Enter valid Address');
                document.user.address.focus();
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
            if(contact.length ==0)
            {
                alert('Please Enter Contact Number');
                document.user.contact.focus();
                return false;
            }
            var contactexp=/^\d{10}$/;
            if(!contact.match(contactexp))
            {
                alert('Please Enter valid Contact Number');
                document.user.contact.focus();
                return false;
            }
            if(description.length==0)
            {
                alert('Please Enter Description');
                document.user.description.focus();
                return false;
            }
            if(description.length<50)
            {
                alert('Please Enter valid Description');
                document.user.description.focus();
                return false;
            }
            if(opening.length ==0)
            {
                alert('Please Enter Valid Opening');
                document.user.opening.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<?php

    include "include/css.html";
    include "include/config1.php";

    if(isset($_SESSION['userId'])!=null){
    $userId=$_SESSION['userId'];
    $sql="select * from admin where id='$userId'";
    $result=$conn->query($sql);
    if($result->num_rows=0){

        echo "<script>alert('No Record Found');document.location.href='../login.php';</script>";
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
                    <a href="jobpost.php" class="nav-item nav-link active">Jobpost</a>
                    <a href="userlist.php" class="nav-item nav-link">Users</a>
                    <a href="../about.php" class="nav-item nav-link">About</a>
                    <a href="../contact.php" class="nav-item nav-link">contact</a>
                    <a href="logout.php" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Admin</h1>
                <nav aria-label="breadcrumb">
                    
                </nav>
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Post</h1>
            </div>
        </div>

        <!-- Contact End -->

        <form method="post" name="user" onsubmit="return validation()">
                  
                   <div class="row g-3">
                                    <div class="col-8">
                                        <div class="form-floating">
                                         <select style="background-color: #fff;" class="form-control" name="jobtype" id="jobtype" class="">
                                            <option  value="">Select JobType</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Customer Service">Customer Service</option>
                                            <option value="Human Resource">Human Resource</option>
                                            <option value="Project Management">Project Management</option>
                                            <option value="Design & Creative">Design & Creative</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Company Name">
                                            <label for="name">Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="textarea" class="form-control" id="address" name="address" placeholder="Company Address">
                                            <label for="address">Company Address</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Company Email">
                                            <label for="email">Company Email</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
                                            <label for="contact">Company Contact No</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="textarea" class="form-control" id="description" name="description" placeholder="Description">
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="opening" name="opening" placeholder="No Of Opening">
                                            <label for="opening">No Of Opening</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="b1" value="Save" style="border-radius: 15px;">Save</button>
                                    </div>
                                </div>
        </form>
<?php
   if(isset($_POST["b1"])){
        $jobtype=$_POST["jobtype"];
        $name=$_POST["name"];
        $address=$_POST["address"];
        $email=$_POST["email"];
        $contact=$_POST["contact"];
        $description=$_POST["description"];
        $opening=$_POST["opening"];
        $sql="insert into jobpostdetail(jobtype , name,address,email,contact,description,opening)values('$jobtype' , '$name','$address','$email','$contact','$description','$opening')";

        if($conn->query($sql)==true){
            echo "<script>alert('Jobpost Added Successfully');document.location.href='jobpost.php';</script>";
        }
        else{
            echo "<script>alert('Sorry jobpost Not Added Successfully');document.location.href='jobpost.php';</script>";
        }
    }
      $sql="select * from jobpostdetail";
      $result=$conn->query($sql);
      $cnt=$result->num_rows;
      if($cnt==0){
        echo "<script>alert('No User Found');document.location.href='jobpost.php';</script>";
        exit();
      }
      else{
        ?><br/><br/><br/>
     <?php
        while($row=$result->fetch_assoc()){
            $status=$row["status"]==1?"Inactive":"Active";
       ?>
         <div class="job-item p-4 mb-4" style="width: 90%; margin-left: 5%; border: 2px solid #08cf7f; border-radius: 10px;">

                            <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded" src="../img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row["name"];?></h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $row["address"];?></span>
                                            <span class="text-truncate me-3"><i class="far fa-envelope text-primary me-2"></i><?php echo $row["email"];?></span>
                                            <span class="text-truncate me-0"><i class="fa fa-phone text-primary me-2"></i><?php echo $row["contact"];?></span>
                                            <br>
                                            <span><a href="changestatus.php?id=<?php echo $row["id"];?>&&status=<?php echo $row["status"];?>"><?php echo $status; ?></a></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-primary" href="update.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-primary" style="margin-left: 3px;" href="jobpost.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                        <div class="text-truncate" style="font-size:18px; color: black"><i class="far fa--alt text-primary me-2">Openings</i><?php echo $row["opening"];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
     <?php
          }
     ?>
  <?php
      }

      if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sql = "delete from jobpostdetail where id='$id'";
    
    if($conn->query($sql)===true) {
        echo "<script>alert('Record Deleted Successfully');document.location.href='jobpost.php';</script>";
        exit ;
    } else {
        echo "<script>alert('Sorry Record Not Deleted');</script>";
    }
}
?>
</div>
</body>
</html>
<?php

  include "include/footer.html";

?>