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
            margin-left: 22%;
        }
    </style>
    <script type="text/javascript">
        function validation()
        {
            var name = document.user.name.value;
            var number = document.user.number.value;
            var email = document.user.email.value;

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
            if(number.length ==0)
            {
                alert('Please Enter Contact Number');
                document.user.number.focus();
                return false;
            }
            var numberexp=/^\d{10}$/;
            if(!number.match(numberexp))
            {
                alert('Please Enter valid Contact Number');
                document.user.number.focus();
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
        }
    </script>
</head>
<body>
<?php
    include "include/css.html";
    include "config1.php";

    if (isset($_GET['id'])) {
    $userId = $_GET['id'];  
    }
    elseif (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId']; 
    }
    else
    {
    echo "<script>alert('Invalid Access');document.location.href='../login.php';</script>";
    exit;
}

    $sql = "SELECT * FROM user_details WHERE id='$userId'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "<script>alert('No Record Found');document.location.href='profile.php';</script>";
        } 
        else {

        $row = $result->fetch_assoc();
        $name = $row["name"];
        $number = $row["number"];
        $email = $row["email"];
        $password = $row["password"];
        $image = $row["image"];

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
                    <a href="profile.php" class="nav-item nav-link active">Profile</a>
                    <a href="jobpost.php" class="nav-item nav-link">Jobs</a>
                    <a href="../about.php" class="nav-item nav-link">About</a>
                    <a href="../contact.php" class="nav-item nav-link">contact</a>
                    <a href="changepassword.php" class="nav-item nav-link">Change Password</a>
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

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Your Profile</h1>
            </div>
        </div>

        <!-- Contact End -->

        <?php

      $sql="select * from user_details where id='$userId'";
      $result=$conn->query($sql);
      $cnt=$result->num_rows;
      if($cnt==0){
        echo "<script>alert('No Usser Found');</script>";
             }
             else{
  ?>
  

   <?php
    while($row=$result->fetch_assoc()){


        if($row["image"]==null){
                    $image="../userimage/default.png";
                    }
                    else{
                    
                    $image=$row["image"];
                    
                    }
    
   ?>
   <tr>
    
    <td><img src="<?php echo $image;?>" height="200px" width="200px" style="margin-left: 580px; border-radius: 50%;"></td>
    <td><a href="updateuserdetails.php?id=<?php echo $row["image"];?>"></a></td>
   </tr><br/><br/>

        <form action="updateuserdetails.php" method="POST" enctype="multipart/form-data" style="">
                                <div class="row g-4" style="width: 750px;">
                                    <div class="col-8">
                                        <!-- <div class="form-floating">
                                            <input type="file" class="form-control" id="name" name="fileToUpload" style="background-color: #fff;">
                                        </div> -->
                                    <div class="col-12 col-sm-6" id="name" name="fileToUpload" style="width: 480px;">
                                        <input type="file" class="form-control bg-white">
                                    </div>
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" type="submit"  value="Update" style="border-radius: 15px;">Change Image</button>
                                    </div>
                                </div>
        </form><br/><br/>


        <form name="user" onsubmit="return validation()">
                                <div class="row g-3">
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Your Name" value="<?php echo $name;?>">
                                            <label for="name">Enter Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="number" name="number" placeholder="Mobile No" value="<?php echo $number;?>">
                                            <label for="number">Mobile No</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email " value="<?php echo $email;?>">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="b1" value="Update" style="border-radius: 15px;">Update</button>
                                    </div>
                                </div>
        </form><br/><br/>

</div>
<?php

}
}
    include "include/footer.html";
    if(isset($_POST['b1'])!=null){
        $action=$_POST['b1'];

        if($action=="Update"){
            $name=$_POST["name"];
            $number=$_POST["number"];
            $email=$_POST["email"];

             $sql="update user_details set name='$name',number='$number',email='$email'where id='$userId'";

             if($conn->query($sql)==true){
                 echo "<script>alert('Update successfully');document.location.href='profile.php';</script>";
            }
             else {
                 echo "<script>alert('Something went wrong');document.location.href='profile.php';</script>";
            }
        }
    }
?>
</body>
</html>