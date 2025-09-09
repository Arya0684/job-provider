<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        form {
            display: flex;
            justify-content: center;
            margin-left: 10%;
        }
    </style>
    <script type="text/javascript">
        function validation(){
            var username = document.user.username.value;   
            var password = document.user.password.value;

            if(username.length==0)
            {
                alert('Please Enter Name');
                document.user.name.focus();
                return false;
            }
            if(username.length<2)
            {
                alert('Please Enter valid Name');
                document.user.name.focus();
                return false;
            }
            if(password.length==0)
            {
                alert('Please Enter password');
                document.user.password.focus();
                return false;
            }
        }
    </script>
</head>
<body>
<?php
    include "include/css.html";
    include "config1.php";
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
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobProvider</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="admin/jobpost.php" class="nav-item nav-link">Jobpost</a>
                    <a href="admin/userlist.php" class="nav-item nav-link">Users</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="" class="nav-item nav-link">Logout</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Admin Login</h1>
            </div>
        </div>

        <!-- Contact End -->

        <form method="post" name="user" onsubmit="return validation()">
                            <div class="row g-3">
                                <div class="col-10">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="username" placeholder="Enter User Name">
                                        <label for="name">Enter User Name</label>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="col-10">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="b1" value="Login" style="border-radius: 15px;">Login</button>
                                </div>
                            </div>
        </form>
<?php
    include "include/footer.html";

    if(isset($_POST['b1'])){
        $action=$_POST['b1'];
        if($action=="Login"){
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="select * from admin where username='$username' and password='$password'";
        $result=$conn->query($sql);
        $cnt=$result->num_rows;

        if($cnt>0){
            while($row=$result->fetch_assoc()){
                $id=$row["id"];
                $username=$_POST["username"];
                $password=$_POST["password"];
            }
                $_SESSION['adminId']=$id;
            echo "<script>alert('Login Successfully');document.location.href='admin/jobpost.php';</script>";
        }
        else{
            echo "<script>alert('Sorry Invalid Username or Password');document.location.href='adminlogin.php';</script>";
        }
     }   
    }
?>
</div>

</body>
</html>