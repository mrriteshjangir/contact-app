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

$flag = 0;
$eCount = 1;
$mCount = 1;
$id = $_GET['q'];
$file = $_GET['f'];

if (isset($_GET['q']) && isset($_GET['f'])) {
    if (isset($_POST['update'])) {
        $name = $_POST['userName'];
        $adress = $_POST['userAddress'];

        $emails = implode(",", $_POST['userEmail']);
        $mobiles = implode(",", $_POST['userMobile']);

        if($_FILES['myFile']['size']!=0)
        {
            unlink($file);

            $dir="uploads/contacts/";

            $temp=explode(".",$_FILES['myFile']['name']);

            $newFileName="user-".round(microtime(true)).".".end($temp);

            $path=$dir.$newFileName;

            move_uploaded_file($_FILES['myFile']['tmp_name'], $path);

            $sql="UPDATE mycontacts SET userName='$name',userProfile='$path',userEmail='$emails',userMobile='$mobiles',userAdress='$adress',
                updated=now() WHERE userId=$id";
        }
        else
        {
            $sql="UPDATE mycontacts SET userName='$name',userEmail='$emails',userMobile='$mobiles',userAdress='$adress',
                updated=now() WHERE userId=$id";
        }
        
        if($conn->query($sql)===TRUE)
        {
            $flag=1;
        }
        else
        {
            $flag=2;
            echo "<script>console.log(".$conn->error.")</script>";
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
    <?php include('components/navbar.php'); ?>

    <?php
    if ($flag == 1) {
        echo "<script>swal('Contact updated successfully')</script>";
    } elseif ($flag == 2) {
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
            <div class="mb-3 text-center">
                <img src="<?php echo $file ?>" style="height:100px" />
                <p class="text-danger"><i>Current Profile Picture</i></p>
            </div>

            <div class="mb-3">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="myFile" class="form-control">
            </div>
            <?php
            $sql = "SELECT * FROM mycontacts WHERE userId=$id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $mArray = explode(",", $row['userMobile']);
                    $eArray = explode(",", $row['userEmail']);
            ?>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="userName" value="<?php echo $row['userName'] ?>" class="form-control" placeholder="John Deo">
                    </div>

                    <?php
                    foreach ($eArray as $oneEmail) {

                    ?>
                        <div class="mb-3" id="emailBox">
                            <label class="form-label">Email address</label>
                            <div class="input-group">
                                <input type="email" name="userEmail[]" class="form-control" value="<?php echo $oneEmail ?>" placeholder="name@example.com">
                                <?php
                                if ($eCount == 1) {
                                    echo '<button class="btn btn-success" type="button" id="addEmail">+</button>';
                                    $eCount++;
                                } else {
                                    echo '<button class="btn btn-danger" type="button" id="removeEmail">-</button>';
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div id="emailAll">

                    </div>
                    <?php
                    foreach ($mArray as $oneMobile) {
                    ?>
                        <div class="mb-3" id="mobileBox">
                            <label class="form-label">Mobile Number</label>
                            <div class="input-group">
                                <input type="tel" name="userMobile[]" class="form-control" value="<?php echo $oneMobile ?>" placeholder="xxxxxxxxxx">
                                <?php
                                if ($mCount == 1) {
                                    echo '<button class="btn btn-success" type="button" id="addMobile">+</button>';
                                    $mCount++;
                                } else {
                                    echo '<button class="btn btn-danger" type="button" id="removeMobile">-</button>';
                                }
                                ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div id="mobileAll">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="userAddress" rows="3"><?php echo $row['userAdress'] ?></textarea>
                    </div>
            <?php
                }
            }
            ?>

            <div class="mb3">
                <button class="btn btn-success" type="submit" name="update">Update Contact</button>
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