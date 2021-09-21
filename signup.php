<?php
include('config.php');
include('components/validation.php');

if (isset($_POST['create'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];

    if ($pass == $conf_pass)
    {   
        $errList=array();
        $errList=signupValid();

        $encPass = md5($pass);
        
        if(!count($errList))
        {
            $abc = "INSERT INTO auth(photo,fullname,email,mobile,pass,created)
                        VALUES('$path','$name','$email',$mobile,'$encPass',now())";

            if ($conn->query($abc)) 
            {
                echo "<script>
                    swal('Data added successfully');
                    window.location='signin.php';
                </script>";
            } 
            else 
            {
                echo "Error : " . $conn->error;
            }
        }
    } 
    else 
    {
        echo "Password not matched";
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

    <div class="container mt-3">
        <form class="s-form" action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Select Profile Image : <sup class="text-danger">*</sup></label>
                <input type="file" class="form-control" name="myFile">
            </div>
            <?php if(isset($errList['fileErr'])) {echo "<span class='text-danger'>".$errList['fileErr']."</span>";} ?>
            <div class="mb-3">
                <label class="form-label">Full Name : <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="fullname">
            </div>
            <?php if(isset($errList['nameErr'])) {echo "<span class='text-danger'>".$errList['nameErr']."</span>";} ?>
            <div class="mb-3">
                <label class="form-label">Email address : <sup class="text-danger">*</sup></label>
                <input type="email" class="form-control" name="email">
            </div>
            <?php if(isset($errList['emailErr'])) {echo "<span class='text-danger'>".$errList['emailErr']."</span>";} ?>
            <div class="mb-3">
                <label class="form-label">Mobile Number :<sup class="text-danger">*</sup></label>
                <input type="tel" class="form-control" name="mobile">
            </div>
            <?php if(isset($errList['mobErr'])) {echo "<span class='text-danger'>".$errList['mobErr']."</span>";} ?>
            <div class="mb-3">
                <label class="form-label">Password : <sup class="text-danger">*</sup></label>
                <input type="password" class="form-control" name="pass">
            </div>
            <?php if(isset($errList['passErr'])) {echo "<span class='text-danger'>".$errList['passErr']."</span>";} ?>
            <div class="mb-3">
                <label class="form-label">Confirm Password : <sup class="text-danger">*</sup></label>
                <input type="password" class="form-control" name="conf_pass">
            </div>
            <?php if(isset($errList['ConfPassErr'])) {echo "<span class='text-danger'>".$errList['ConfPassErr']."</span>";} ?>
            <div class="mb-3">
                <button class="btn btn-success" type="submit" name="create">
                    Create Account
                </button>
                <button class="btn btn-warning" type="reset">
                    Reset
                </button>

            </div>
            <a href="signin.php" class="refral-link">Already have an account ? Click Here</a>
        </form>
    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>
</body>

</html>