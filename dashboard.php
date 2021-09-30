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

            <?php
            if(isset($_COOKIE['email'])){
                $authEmail=$_COOKIE['email'];
            }
            else
            {
                $authEmail=$_SESSION['user']['email'];
            }

            $sql = "SELECT * FROM mycontacts WHERE authEmail='$authEmail' AND hide=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {                    
                    $mArray=explode(",",$row['userMobile']);
                    $eArray=explode(",",$row['userEmail']);
                    
                                       
                    echo '
            <div class="col-md-2">
                <div class="card ">
                    <img src="'.$row['userProfile'].'" class="card-img-top userProfile" alt="...">
                    <div class="card-body d-flex flex-column align-items-center ">
                        <h5 class="card-title text-danger">'.$row['userName'].'</h5>
                        <p class="card-text">'.$mArray[0].'</p>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row['userId'].'">
                            Show More
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$row['userId'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Contact Information</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5><b>Name : </b>'.$row['userName'].'</h5>

                                        ';  

                                            $mCount=1;
                                            foreach($mArray as $oneMobile)
                                            {
                                                echo"<p><b>Mobile ".$mCount." : </b>
                                                    <a class='text-decoration-none' href='tel:".$oneMobile."'>".$oneMobile."</a>
                                                </P>";
                                                $mCount++;
                                            }

                                            $eCount=1;
                                            foreach($eArray as $oneEmail)
                                            {
                                                echo"<p><b>Email ".$eCount." : </b>
                                                    <a class='text-decoration-none' href='mailto:".$oneEmail."'>".$oneEmail."</a>
                                                </P>";
                                                $eCount++;
                                            }

                                        echo'
                                        <address><b>Address : </b>'.$row['userAdress'].'</address>
                                        ';
                                         if($row['updated']!=null)
                                         {
                                            $date1=date_create($row['updated']);
                                            echo "<i>Contact Updated on <b>".date_format($date1,'d-M-y h:i A')."</b></i><br>";
                                         }
                                         $date=date_create($row['created']);
                                         echo "<i>Contact Created on <b>".date_format($date,'d-M-y h:i A')."</b></i>";

                                    echo"</div>
                                    <div class='modal-footer'>
                                        <button onclick='alertDelete(".$row['userId'].",".json_encode($row['userProfile']).")' class='text-decoration-none btn btn-danger'>Delete</button>
                                        <button onclick='alertUpdate(".$row['userId'].",".json_encode($row['userProfile']).")' class='text-decoration-none btn btn-primary'>Edit</button>
                                        <button type='button' class='btn btn-warning' data-bs-dismiss='modal'>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
                }
            } else {
                echo '<h3 class="text-center text-danger">No Contact Found</h3>';
            }
            ?>
        </div>

        <!-- Contact List Ended -->

    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>
    <script>
        function alertDelete(q,f){
            swal({
                title:"Alert",
                text:"Do you want to delete this contact ?",
                icon:"warning",
                buttons: true,
                dangerMode: true,
            })
            .then((res)=>{
                if(res)
                {
                    window.location.href="deletecontact.php?q="+q+"&f="+f;
                }
                else
                {
                    swal("Your data is safe");
                }
            })
        }
        function alertUpdate(q,f){
            swal({
                title:"Alert",
                text:"Do you want to edit this contact ?",
                icon:"warning",
                buttons: true,
                dangerMode: true,
            })
            .then((res)=>{
                if(res)
                {
                    window.location.href="editcontact.php?q="+q+"&f="+f;
                }
            })
        }
    </script>
</body>

</html>