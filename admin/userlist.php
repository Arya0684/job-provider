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
    include "include/css.html";
    include "include/config1.php";

    $sql = "select * FROM user_details";
    $result = $conn->query($sql);
?>

<div class="container-xxl bg-white p-0">


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">JobEntry</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="jobpost.php" class="nav-item nav-link">Jobpost</a>
                    <a href="userlist.php" class="nav-item nav-link active">Users</a>
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
                <h1 class="display-3 text-white mb-3 animated slideInDown">Users</h1>
            </div>
        </div>
        <!-- Header End -->

        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Users</h1>
            </div>
        </div>

        <?php if ($result->num_rows > 0)
        
         {
        
        ?>
                    <?php while ($row = $result->fetch_assoc())
                     
                        {
                            if($row["image"]==null){
                                $image="../userimage/default.png";
                            }
                            else{
                                $image=$row["image"];
                            }
                    ?>
                        <div class="job-item p-4 mb-4" style="width: 80%; margin-left: 10%; border: 2px solid #08cf7f; border-radius: 15px;">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        
                                        <img class="flex-shrink-0 img-fluid border rounded" src="<?php echo $image; ?>" alt="User Image" style="width: 80px;height: 80px;">

                                        <div class="text-start ps-4">
                                            <h5 class="mb-3"><?php echo $row["name"];?></h5>
                                            <span class="text-truncate me-3"><i class="far fa-envelope text-primary me-2"></i><?php echo $row["email"];?></span>
                                            <span class="text-truncate me-0"><i class="fa fa-phone text-primary me-2"></i><?php echo $row["number"];?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <!-- <div class="d-flex mb-3">
                                            <a class="btn btn-primary" href="../user/profile.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-primary" style="margin-left: 3px;" href="userlist.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                    <?php
                            }
                    ?>
    
            <?php 
        }

        else {
            ?>
                <p class="text-center">No users found</p>
            <?php 
        } 
?>

<?php
    include "include/footer.html";

    if(isset($_GET["id"])){
        $id=$_GET["id"];
        $sql = "delete from user_details where id='$id'";
    
    if($conn->query($sql)===true) {
        echo "<script>alert('Record Deleted Successfully');document.location.href='userlist.php';</script>";
        exit ;
    } else {
        echo "<script>alert('Sorry Record Not Deleted');</script>";
    }
}
?>
</body>
</html>