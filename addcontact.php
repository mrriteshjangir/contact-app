<?php
include('config.php');
if (!isset($_COOKIE['email'])) {
    if (!isset($_SESSION['user'])) {
        echo "
                <script>
                    window.location='signin.php';
                </script>
            ";
    }
}

$flag=0;

if(isset($_POST['submit']))
{
    $name=$_POST['userName'];
    $address=$_POST['userAddress'];
    
    $emails=implode(",",$_POST['userEmail']);
    $mobiles=implode(",",$_POST['userMobile']);

    if(isset($_COOKIE['email'])){
        $authEmail=$_COOKIE['email'];
    }
    else
    {
        $authEmail=$_SESSION['user']['email'];
    }

    $dir="uploads/contacts/";

    $temp=explode(".",$_FILES['myFile']['name']);

    $newFileName="user-".round(microtime(true)).".".end($temp);

    $path=$dir.$newFileName;

    $sql="INSERT INTO mycontacts(userName,userProfile,userEmail,userMobile,userAdress,authEmail,created)
    VALUES('$name','$path','$emails','$mobiles','$address','$authEmail',now());";

    if($conn->query($sql)) {
        move_uploaded_file($_FILES['myFile']['tmp_name'], $path);
        
        $flag=1;
    }
    else
    {
        echo "Error is ".$conn->error;
        $flag=2;
    }  

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php'); ?>
</head>

<body>
    <?php include('components/navbar.php'); ?>

    <?php
        if($flag==1){
            echo "<script>swal('Contact saved successfully')</script>";
        }
        elseif($flag==2){
            echo "<script>swal('Something went wrong')</script>";
        }
    ?>
    <div class="container mt-3">
        <h3 class="text-center text-primary mt-3">Add Contact</h3>
        <hr>
        <div class="d-flex justify-content-evenly">
            <a class="btn btn-success" href="dashboard.php">Dashboard</a>
            <a class="btn btn-success" href="addcontact.php">Add Contact</a>
        </div>
        <hr>

        <form class="s-form" action="" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="myFile" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="userName" class="form-control" placeholder="John Deo">
            </div>

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <div class="input-group">
                    <input type="email" name="userEmail[]" class="form-control" placeholder="name@example.com">
                    <button class="btn btn-success" type="button" id="addEmail">+</button>
                </div>
            </div>

            <div id="emailAll">
                
            </div>

            <div class="mb-3">
                <label class="form-label">Mobile Number</label>
                <div class="input-group">
                    <input type="tel" name="userMobile[]" class="form-control" placeholder="xxxxxxxxxx">
                    <button class="btn btn-success" type="button" id="addMobile">+</button>
                </div>
            </div>

            <div id="mobileAll">
                
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="userAddress" rows="3"></textarea>
            </div>

            <div class="mb3">
                <button class="btn btn-success" type="submit" name="submit">Add Contact</button>
                <button class="btn btn-warning" type="reset">Clear</button>
            </div>
        </form>
    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>

    <!-- This is my custome script to add multiple email input fields -->
    <script src="js/addMoreEmail.js"></script>

    <!-- This is my custome script to add multiple mobile input fields -->
    <script src="js/addMoreMobile.js"></script>
</body>

</html>