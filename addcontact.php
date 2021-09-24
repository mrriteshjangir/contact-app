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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php'); ?>
</head>

<body>
    <?php include('components/navbar.php'); ?>

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
        <input type="file" class="form-control">
        </div>
        <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" placeholder="John Deo">
        </div>
        <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" placeholder="name@example.com">
        </div>
        <div class="mb-3">
        <label class="form-label">Mobile Number</label>
        <input type="tel" class="form-control" placeholder="XXXXXXXXXX">
        </div>
        <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea class="form-control" rows="3"></textarea>
        </div>

        </form>
    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>
</body>

</html>