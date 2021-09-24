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

    <div class="container">
        <h3 class="text-center text-primary mt-3">Welcome in Contact App</h3>
        <hr>
        <div class="d-flex justify-content-evenly">
            <a class="btn btn-success" href="dashboard.php">Dashboard</a>
            <a class="btn btn-success" href="addcontact.php">Add Contact</a>
        </div>
        <hr>

        <!-- Contact List Started -->

        <div class="row">
            <div class="col-md-2">
                <div class="card ">
                    <img src="uploads\profile\demo1.png" class="card-img-top userProfile" alt="...">
                    <div class="card-body d-flex flex-column align-items-center ">
                        <h5 class="card-title text-danger">John Deo</h5>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Show More
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact List Ended -->

    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>
</body>

</html>