<?php
    $server='localhost';
    $user='root';
    $pass='';
    $db='contacts';

    $conn = new mysqli($server,$user,$pass,$db);

    if($conn->connect_error)
    {
        die("Coonection not done".$conn->connect_error);
    }
    // else
    // {
    //     echo "Connection is successfull";
    // }
?>