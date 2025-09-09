<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        form {
            display: flex;
            justify-content: center;
            text align: center;
            margin-left: 20%;
        }
    </style>
    <script type="text/javascript">
        function validation()
        {
            var oldpassword=document.user.oldpassword.value;
            var newpassword=document.user.newpassword.value;
            var confirmpassword=document.user.confirmpassword.value;

            if(oldpassword.length==0)
            {
                alert('Please Enter Old Password');
                document.user.oldpassword.focus();
                return false;
            }
            if(newpassword.length==0)
            {
                alert('Please Enter New Password');
                document.user.newpassword.focus();
                return false;
            }
            if(newpassword.length <8 || newpassword.length>20)
            {
                alert('Password min length is 8 and max is 20');
                document.user.newpassword.focus();
                return false;
            }
            var lowerCaseLetters = /[a-z]/g;
            if(!newpassword.match(lowerCaseLetters))
            {
                alert('Password Contain Atleast one Lower Case');
                document.user.newpassword.focus();
                return false;
            }
            var upperCaseLetters = /[A-Z]/g;
            if(!newpassword.match(upperCaseLetters))
            {
                alert('Password Contain Atleast one Upper Case');
                document.user.newpassword.focus();
                return false;
            }
            if ($newpassword !== $confirmpassword)
            {
            alert('New Password and Confirm Password do not match.');document.location.href='change_password.php';
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<?php
include "include/css.html";
include "config1.php";
   if(isset($_SESSION['userId'])!=null){
        $userId=$_SESSION['userId'];
    $sql="select password from user_details where id='$userId'";
    $result=$conn->query($sql);
    if($result->num_rows==0){

        echo "<script>alert('No Record Found');document.location.href='profile.php';</script>";
    }else{
        while($row=$result->fetch_assoc()){
            $currentPassword=$row["password"];
           
        }
    }
}
else{
     echo "<script>alert('Your Session is Expired');document.location.href='../login.php';</script>";
}

?>

<div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
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
                    <a href="../about.php" class="nav-item nav-link">About</a>
                    <a href="../contact.php" class="nav-item nav-link">Contact</a>
                    <a href="login.php" class="nav-item nav-link">Login</a>
        
        </nav>
        <!-- Navbar End -->

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Password</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                    
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Change Password</h1>
            </div>
        </div>

        <!-- Contact End -->
 <form method="post" name="user" onsubmit="return validation()">
                                <div class="row g-3">
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="oldpassword" name="oldpassword" placeholder="Old Password">
                                            <label for="name">Old Password</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="newpassword" name="newpassword"placeholder="New Password">
                                            <label for="subject">New Password</label>
                                        </div>
                                    </div>
                                     <div class="col-8">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="New Password">
                                            <label for="subject">Confirm Password</label>
                                        </div>
                                    </div>
                            
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="b1" value="Login" style="border-radius: 15px;">Change Password</button>
                                    </div>
                                    <div class="tag">
                                        <a ></a>
                                    </div>
                                </div>
                            </div>
<?php

    if(isset($_POST["b1"])){
    
        $oldpassword=$_POST["oldpassword"];
        $newpassword=$_POST["newpassword"]; 
        $confirmpassword=$_POST["confirmpassword"];

        if($currentPassword==$oldpassword){
            if($newpassword==$confirmpassword){
              $sql="update user_details set password='$newpassword' where id='$userId'";  
              if($conn->query($sql)==true){
                echo "<script>alert('Your Password Change Successfully');document.location.href='../login.php';</script>";
              }    
            }
            else{
                echo "<script>alert('Your confirm password does not match');document.location.href='../login.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Current Password does not match');document.location.href='../login.php';</script>";
        }
    
 }

  include "include/footer.html";
?>

    </form>
</body>
</html>