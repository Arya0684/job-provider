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
            var name = document.user.name.value;
            var number = document.user.number.value;
            var email = document.user.email.value;
            var password = document.user.password.value;
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
            if(password.length==0)
            {
                alert('Please Enter password');
                document.user.password.focus();
                return false;
            }
            if(password.length <8 || password.length >20)
            {
                alert('Password min length is 8 and max is 20');
                document.user.password.focus();
                return false;
            }
            var upperCaseLetters = /[A-Z]/g;
            if(!password.match(upperCaseLetters))
            {
                alert('Password Conatin atleast one lowercase');
                document.user.password.focus();
                return false;
            }
            var lowerCaseLetters = /[a-z]/g;
            if(!password.match(lowerCaseLetters))
            {
                alert('Password Conatin atleast one lowercase');
                document.user.password.focus();
                return false;
            }
            
            var digitExp = /[0-9]/g;
            if(!password.match(digitExp))
            {
                alert('Password Contain atleast one number');
                document.user.password.focus();
                return false;
            }
            var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
            if(!password.match(format))
            {
                alert('Password Conatin One Special Letter');
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

    if(isset($_POST['b1'])!=null){
        $action=$_POST["b1"];

        if($action=="Sign Up"){
            $name=$_POST["name"];
            $number=$_POST["number"];
            $email=$_POST["email"];
            $password=$_POST["password"];

            $sql="insert into user_details (name,number,email,password) values('$name','$number','$email','$password')";

            if($conn->query($sql)==true){
                echo "<script>alert('User Registered successfully');document.location.href='login.php';</script>";
            }
            else {
                echo "<script>alert('Registration is not completed');document.location.href='login.php';</script>";
            }
        }
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
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="login.php" class="nav-item nav-link active">Login</a>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Sign Up</h1>
            </div>
        </div>
        <!-- Header End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="font-size: 54px;">Sign Up</h1>
            </div>
        </div>

        <!-- Contact End -->

        <form method="post" name="user" onsubmit="return validation()">
                                <div class="row g-3">
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name">
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
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email ">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="b1" value="Sign Up" style="border-radius: 15px;">Sign Up</button>
                                    </div>
                                    <!-- <div class="tag" style="font-size: 18px; margin-left: 20%;">
                                        <a style="font-weight: 500; color: #6b6e6c;">Already have an account ?<a href="login.php" style="font-weight: 500;"> Login </a></a>
                                    </div> -->
                                </div>
            </form>
</div>

<?php
    include "include/footer.html";
?>

</body>
</html>