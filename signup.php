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
        imgValidation();

        $encPass = md5($pass);
        
        $abc = "INSERT INTO auth(photo,fullname,email,mobile,pass,created)
                        VALUES('$path','$name','$email',$mobile,'$encPass',now())";

        if ($conn->query($abc)) 
        {
            echo "<script>
                alert('Data added successfully');
                window.location='signin.php';
            </script>";
        } 
        else 
        {
            echo "Error : " . $conn->error;
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
                <input type="file" class="form-control" name="profile_img" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Full Name : <sup class="text-danger">*</sup></label>
                <input type="text" class="form-control" name="fullname" required maxlength="50" minlength="2">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address : <sup class="text-danger">*</sup></label>
                <input type="email" class="form-control" name="email" required maxlength="100" minlength="10">
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile Number :<sup class="text-danger">*</sup></label>
                <input type="tel" class="form-control" name="mobile" required maxlength="10" minlength="10">
            </div>
            <div class="mb-3">
                <label class="form-label">Password : <sup class="text-danger">*</sup></label>
                <input type="password" class="form-control" name="pass" required maxlength="15" minlength="6">
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password : <sup class="text-danger">*</sup></label>
                <input type="password" class="form-control" name="conf_pass" required maxlength="15" minlength="6">
            </div>
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