<?php
    include('config.php');
    if(!isset($_COOKIE['email']))
    {
        if(!isset($_SESSION['user']))
        {
            echo "
                <script>
                    window.location='signin.php';
                </script>
            ";
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
    <h1>I'm dashboard</h1>
    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>
</body>
</html>