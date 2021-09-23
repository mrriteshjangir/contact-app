<?php
include('config.php');

if(isset($_COOKIE['email']))
{
    echo"
        <script>
            window.location='dashboard.php';
        </script>
    ";
}

$flag = 0;

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $errList = array();
    $errList = signinValid();

    if (!count($errList)) {
        $sql = "SELECT * FROM auth WHERE email='$email'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $encPass = md5($pass);

                if ($row['pass'] == $encPass) {
                    $flag = 1;

                    $_SESSION['user'] = $row;

                    if (!empty($_POST['saveme'])) {
                        setcookie('email', $row['email'], time() + (86400 * 30));
                    }
                } else {
                    $flag = 2;
                }
            }
        } else {
            $flag = 3;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php'); ?>
</head>

<body>
    <!-- If value of flag will be changed -->
    <?php
    if ($flag == 1) {
        echo '<script>
            swal("Logged in successfully")
            .then((value) => {
                window.location="dashboard.php"
            });
        </script>';
    } else if ($flag == 2) {
        echo
        '<script>
                swal("Something went wrong! Try after sometime.")
            </script>';
    } else if ($flag == 3) {
        echo
        '<script>
                swal("This email is not registered with us.")
            </script>';
    }
    ?>

    <?php include('components/navbar.php'); ?>

    <div class="container mt-3">


        <h2 class="text-center text-danger">Sign In at Contact Book</h2>
        <form class="s-form" action="" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Email address :</label>
                <input type="email" class="form-control" name="email">
            </div>
            <?php if (isset($errList['emailErr'])) {
                echo "<span class='text-danger'>" . $errList['emailErr'] . "</span>";
            } ?>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <?php if (isset($errList['passErr'])) {
                echo "<span class='text-danger'>" . $errList['passErr'] . "</span>";
            } ?>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="saveme" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember my info
                </label>
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