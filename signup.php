<?php
    include('config.php');
    include('components/validation.php');

    if(isset($_POST['create']))
    {
        $name=$_POST['fullname'];
        $email=$_POST['email'];
        $mobile=$_POST['mobile'];
        $pass=$_POST['pass'];
        $conf_pass=$_POST['conf_pass'];

        if($pass==$conf_pass)
        {
            imgValidation();
            
            $encPass=md5($pass);
            $abc="INSERT INTO auth(photo,fullname,email,mobile,pass,created)
                        VALUES('$path','$name','$email',$mobile,'$encPass',now())";
            
            if($conn->query($abc))
            {
                echo "<script>alert('Data added successfully');</script>";
            }
            else
            {
                echo "Error : ".$conn->error;
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
            <label  class="form-label">Select Profile Image :</label>
            <input type="file" class="form-control" name="profile_img">
        </div>
        <div class="mb-3">
            <label  class="form-label">Full Name :</label>
            <input type="text" class="form-control" name="fullname">
        </div>
        <div class="mb-3">
            <label  class="form-label">Email address :</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label  class="form-label">Mobile Number :</label>
            <input type="tel" class="form-control" name="mobile">
        </div>
        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="pass">
        </div>
        <div class="mb-3">
            <label  class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="conf_pass">
        </div>
        <div class="mb-3">
            <button class="btn btn-success" type="submit" name="create">Create Account</button>
            <button class="btn btn-warning" type="reset">Reset</button>
        </div>
        </form>
    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>
</body>
</html>