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

    include "include/config1.php";
    include "include/css.html";

    if(isset($_GET["id"])!==null){
        $id=$_GET['id'];
        $sql="select * from jobpostdetail where id='$id'";
        $result=$conn->query($sql);
        while ($row=$result->fetch_assoc()) {
            $jobtype=$row["jobtype"];
            $name=$row["name"];
            $address=$row["address"];
            $email=$row["email"];
            $contact=$row["contact"];
            $description=$row["description"];
            $opening=$row["opening"];
            $status=$row["status"];
        }
    }
    else
    {
        echo "<script>alert('Sorry Something Is Wrong');document.location.href='jobpost.php';</script>";
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
                    <a href="jobpost.php" class="nav-item nav-link">Jobpost</a>
                    <a href="userlist.php" class="nav-item nav-link">Users</a>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Admin</h1>
                <nav aria-label="breadcrumb">
                    
                </nav>
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Update</h1>
            </div>
        </div>

        <!-- Contact End -->

 <form method="post" name="user" onsubmit="return validation()">
                  
                    <div class="row g-3">
                                    <div class="col-8">
                                        <div class="form-floating">
                                         <select style="background-color: #fff;" class="form-control" name="jobtype" id="jobtype">
                                            <option><?php echo $jobtype;?></option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Customer Service">Customer Service</option>
                                            <option value="Human Resource">Human Resource</option>
                                            <option value="Project Management">Project Management</option>
                                            <option value="Design & Creative">Design & Creative</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Company Name" value="<?php echo $name;?>">
                                            <label for="name">Company Name</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="textarea" class="form-control" id="address" name="address" placeholder="Company Address" value="<?php echo $address;?>">
                                            <label for="address">Company Address</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Company Email" value="<?php echo $email;?>">
                                            <label for="email">Company Email</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact" value="<?php echo $contact;?>">
                                            <label for="contact">Company Contact No</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="textarea" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description;?>">
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="opening" name="opening" placeholder="No Of Opening" value="<?php echo $opening;?>">
                                            <label for="opening">No Of Opening</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="status" name="status" placeholder="Status" value="<?php echo $status;?>">
                                            <label for="status">Status</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="b1" value="Update" style="border-radius: 15px;">Update</button>
                                    </div>
                                </div>
        </form>
  <?php
  if(isset($_POST["b1"])!=null){
    $action=$_POST["b1"];

    if($action=="Update"){
        $jobtype=$_POST["jobtype"];
        $name=$_POST["name"];
        $address=$_POST["address"];
        $email=$_POST["email"];
        $contact=$_POST["contact"];
        $description=$_POST["description"];
        $opening=$_POST["opening"];
        $status=$_POST["status"];

        $sql="update jobpostdetail set jobtype='$jobtype',name='$name',address='$address',email='$email',contact='$contact',description='$description',opening='$opening',status='$status' where id='$id'";

        if($conn->query($sql)==true){
          echo "<script>alert('Jobpost Update Successfully');document.location.href='jobpost.php';</script>";
          exit();  
        }
        else{
            echo "<script>alert('Sorry Jobpost Not Update');document.location.href='jobpost.php';</script>";
        }
    }
  }
  ?>    
</div>
</body>
</html>
<?php

  include "include/footer.html";

?>