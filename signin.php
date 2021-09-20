<?php
    include('config.php');

    if(isset($_POST['signin']))
    {
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        $sql="SELECT * FROM auth WHERE email='$email'";

        $result=$conn->query($sql);
                
        if($result->num_rows>0){
            
            while($row=$result->fetch_assoc())
            {
                $encPass=md5($pass);

                echo $row['pass']."==".$encPass."<br>";
                if($row['pass']==$encPass)
                {
                    echo "
                        <script>
                            alert('Login successfully');
                            window.location='dashboard.php';
                        </script>
                    ";
                }
                else
                {
                    echo "Password is wrong";
                }
            } 
        }
        else{
            echo "You are not registed with us";
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
        <h2 class="text-center text-danger">Sign In at Contact Book</h2>
        <form class="s-form" action="" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label class="form-label">Email address :</label>
                <input type="email" class="form-control" name="email" required maxlength="100" minlength="10">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass" required maxlength="15" minlength="6">
            </div>
            
            <div class="mb-3">
                <button class="btn btn-success" type="submit" name="signin">
                   Sign In
                </button>
                <button class="btn btn-warning" type="reset">
                    Reset
                </button>
            </div>
            <a href="signup.php" class="refral-link">New user ? Click Here to create account</a>
        </form>
    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>
</body>
</html>