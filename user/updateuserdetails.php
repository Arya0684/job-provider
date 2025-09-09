<?php
    session_start();
        if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId']; 
    }
    else
    {
        echo "<script>alert('Invalid Access');document.location.href='../login.php';</script>";
    }
    $target_path = "../userimage/";
    $target_path = $target_path.basename( $_FILES['fileToUpload']['name']);

    include "config1.php";
    
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {
     $sql="update user_details set image='$target_path'where id='$userId'";

             if($conn->query($sql)==true){
                 echo "<script>alert('Update successfully');document.location.href='profile.php';</script>";
            }
             else {
                 echo "<script>alert('Something went wrong');document.location.href='profile.php';</script>";
            }
} else{
    echo "<script>alert('Sorry, file not uploaded, please try again!');document.location.href='profile.php';</script>";
}

?>